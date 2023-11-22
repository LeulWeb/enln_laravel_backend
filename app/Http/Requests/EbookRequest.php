<?php

namespace App\Http\Requests;

use App\Rules\EitherPdfOrYoutubeLink;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EbookRequest extends FormRequest
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
            "title" => ["string", 'required', 'min:4', 'max:255'],
            "author" => ['string', 'nullable', 'max:255'],
            'content' => ['string', 'min:150', 'max:1000'],
            'published_date' => ['date', 'nullable'],
            'pdf' => ['required_without:youtube_link',  'file', 'mimes:pdf, doc, docx, ppt, pptx, xls, xlsx', 'max:102400'],
            'youtube_link' => ['sometimes', 'required_without:pdf', 'nullable', 'regex:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/'],
            'category' => ['required'],
            'thumbnail' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif', 'max:10240']
        ];
    }
}
