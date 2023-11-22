<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UpcomingEvent>
 */
class UpcomingEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    /*

        'title',
'content',
'location',
'start_date'.
'end_time'

    */


    protected $fillable =[
        'title',
'content',
'location',
'start_date'.
'end_time'
    ];

    public function definition(): array
    {

        $start_date = fake()->dateTimeThisMonth;
        $end_date = fake()->dateTimeBetween($start_date,'+1 month');
        return [
            "title"=>fake()->sentence,
            "content"=>fake()->paragraph,
            "location"=>fake()->address,
            "start_date"=>$start_date,
            "end_date"=>$end_date
        ];
    }
}
