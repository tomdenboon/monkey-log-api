<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween('+0 days', '+1 month');
        $start_date_clone = clone $start_date;
        $end_date = $this->faker->dateTimeBetween($start_date, $start_date_clone->modify('+1 hours'));
        return [
            "started_at" => $start_date,
            "completed_at" => $end_date,
        ];
    }
}
