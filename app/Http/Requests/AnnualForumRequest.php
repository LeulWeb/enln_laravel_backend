<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnualForumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required','string','min:12','max:255'],
            'content'=>['string','min:200','required'],
            'image'=>['nullable','image','mimes:png,jpg,jpeg,gif','max:10240'],
            'location'=>['string', 'nullable'],
            'event_date'=>['date','nullable']
        ];
    }
}
