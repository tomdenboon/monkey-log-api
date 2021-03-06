<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightedExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reps' => $this->faker->numberBetween(20, 100),
            'weight' => $this->faker->numberBetween(20, 100),
            'rpe' => $this->faker->numberBetween(20, 100),
        ];
    }
}
