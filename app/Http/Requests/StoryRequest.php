<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //*change this guy later when working with auth
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
            'title'=>['string','required'],
            'summary'=>['required','string','min:50','max:200'],
            'is_top'=>['boolean'],
            'content'=>['string','min:200','required'],
            'date_published'=>['date'],
            'reference'=>['string'],
            'tags'=>['string'],
            'thumbnail'=>['nullable', 'image','mimes:png,jpg,jpeg,gif','max:10240']
        ];
    }
}
