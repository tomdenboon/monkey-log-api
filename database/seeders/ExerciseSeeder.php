<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Exercise::create([
            'name' => 'Bench Press',
            'exercise_type' => 'App\Models\WeightedExercise',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Pull up',
            'exercise_type' => 'App\Models\BasicExercise',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Chin up',
            'exercise_type' => 'App\Models\BasicExercise',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Squat',
            'exercise_type' => 'App\Models\WeightedExercise',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Deadlift',
            'exercise_type' => 'App\Models\WeightedExercise',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Overhead press',
            'exercise_type' => 'App\Models\WeightedExercise',
            'user_id' => '1'
        ]);
    }
}
