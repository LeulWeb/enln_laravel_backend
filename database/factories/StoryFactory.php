<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        /*

            'title'
'content'
'date_published'
'reference'
'is_top'
'tags'
'thumbnail'

        */
        return [
            'title'=>fake()->sentence(fake()->numberBetween(4,7)),
            'content'=>fake()->paragraph(),
            'date_published'=>fake()->date(),
            'reference'=>"google.com facebook.com",
            'is_top'=>fake()->boolean,
            'tags'=>"nutrition health ",
            'thumbnail'=>fake()->imageUrl(640, 480, 'cats')


        ];
    }
}
