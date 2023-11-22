<?php

namespace Database\Factories;

use App\Enums\EbookCategoryEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ebook>
 */
class EbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        /*

            'title',
'author',
'content',
'published_date',
'pdf',
'youtube_link',
'category',

        */
        return [
            "title" => fake()->sentence,
            "author" => fake()->sentence,
            "content" => fake()->paragraph,
            'published_date' => fake()->date,
            'pdf' => fake()->sentence,
            'youtube_link' => fake()->url,
            'category' => fake()->randomElement(EbookCategoryEnum::getValues()),
            'thumbnail' => fake()->imageUrl(480, 640, 'cat'),
        ];
    }
}
