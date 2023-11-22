<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //showing register form
    public function register()
    {
        return view('auth.register');
    }


    // storing new use
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:12',
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,JPG', 'max:5120']
        ]);

        if ($request->has('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // move to public path
            // $imagePath = public_path('profile');
            $image->move(public_path('profile'), $imageName);
            $validatedInput['profile'] = 'profile/' . $imageName;
        }

        $validatedInput['password'] = Hash::make($validatedInput['password']);
        $user = User::create($validatedInput);

        return redirect('/login')->with('success', 'user has been created successfully');
    }

    // return login form
    public function login()
    {
        return view('auth.login');
    }


    // authenticate user to be logged in
    public function authenticate(Request $request)
    {
        $validatedInput = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validatedInput)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Successfully logged in ');
        } else {
            return redirect('/login')->withErrors([
                'notCorrect' => 'Email or password is incorrect'
            ]);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login')->with('success', 'Successfully Logged out ');
    }
}
