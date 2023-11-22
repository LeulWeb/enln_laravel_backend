<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EitherPdfOrYoutubeLink implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (request()->filled('pdf') && request()->filled('youtube_link')) {
            $fail('The :attribute You can not upload both video and file at a time.');
        }



        if (!request()->has('pdf') && request()->has('youtube_link')) {
            $youtubeLink = request()->get('youtube_link');
            $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

            if (!preg_match($pattern, $youtubeLink)) {
                $fail('The :attribute must be a valid YouTube link.');
            }
        }
    }

    public function passes($attribute, $value)
    {
        return request()->has('pdf') xor request()->has('youtube_link');
    }

    public function message()
    {
        return 'The :attribute must be a file or a youtube link, not both.';
    }
}
