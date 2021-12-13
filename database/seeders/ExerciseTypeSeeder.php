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
            'type' => 'App\Models\WeightedExercise',
        ]);
        ExerciseType::create([
            'type' => 'App\Models\WeightTimeExercise',
        ]);
        ExerciseType::create([
            'type' => 'App\Models\BasicExercise',
        ]);
        ExerciseType::create([
            'type' => 'App\Models\TimeExercise',
        ]);
    }
}
