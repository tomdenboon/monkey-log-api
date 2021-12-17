<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExerciseType;

class ExerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExerciseType::create([
            'name' => 'Reps | Weight',
            'type' => 'App\Models\WeightedExercise',
        ]);
        ExerciseType::create([
            'name' => 'Time | Weight',
            'type' => 'App\Models\WeightTimeExercise',
        ]);
        ExerciseType::create([
            'name' => 'Reps',
            'type' => 'App\Models\BasicExercise',
        ]);
        ExerciseType::create([
            'name' => 'Time',
            'type' => 'App\Models\TimeExercise',
        ]);
    }
}
