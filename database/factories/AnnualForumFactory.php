<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnnualForum>
 */
class AnnualForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    /*

         'title',
'content',
'image',
'location',
'event_date'

     */


    public function definition(): array
    {
        return [
            "title"=>fake()->sentence,
            "content"=>fake()->paragraph,
            "image"=>fake()->image,
            "location"=> fake()->address,
            "event_date"=>fake()->dateTime,
        ];
    }
}
