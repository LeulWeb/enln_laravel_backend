@extends('auth.layout')


@section('title')
    Login
@endsection
@section('content')
    <div class="w-full text-end">
        @error('notCorrect')
            <x-typography.error-form>{{ $message }}</x-typography.error-form>
        @enderror
    </div>

    <form action="/login" method="post">
        @csrf

        <div>
            <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                Email</label>
            <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="text" id="input-group-1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="enln@gmail.com" name="email">
                @error('email')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>
        </div>

        <div>
            <label for="website-admin" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <iconify-icon icon="carbon:password"></iconify-icon>

                </span>
                <input
                    class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="****" name="password" type="password">
                @error('password')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>

        </div>

        {{-- password confirmation --}}



        <button class="py-2 w-full text-white bg-blue-500 text-center rounded-lg font-semibold my-2">
            Login
        </button>

        <div class="w-full text-end text-blue-500">
            <a href="/register">Add new admin? Register Here</a>
        </div>
    </form>
@endsection
