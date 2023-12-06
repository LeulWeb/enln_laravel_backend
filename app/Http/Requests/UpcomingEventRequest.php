<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpcomingEventRequest extends FormRequest
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

        /*

            'title',
'content',
'location',
'start_date',
'end_date',

        */

        return [
            'title' => ['string', 'required', 'min:12', 'max:255'],
            'content' => ['string', 'required', 'min:12', 'max:1000'],
            'location' => ['string', 'max:1000', 'nullable'],
            'start_date' => ['date', 'nullable'],
            'end_date' => ['date', 'after:start_date', 'nullable'],
        ];
    }


    // return list of message
    public function messages(): array
    {
        return [
            'end_date.after' => 'The end date must be a date after the start date'
        ];
    }
}
