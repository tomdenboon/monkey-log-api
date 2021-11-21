<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightedExercise;

class WeightedExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        WeightedExercise::create([
            'name' => 'Bench Press',
            'user_id' => '1'
        ]);
        WeightedExercise::create([
            'name' => 'Press',
            'user_id' => '1'
        ]);
        WeightedExercise::create([
            'name' => 'Bench Presse',
            'user_id' => '1'
        ]);
        WeightedExercise::create([
            'name' => 'Bench Presser',
            'user_id' => '1'
        ]);
        WeightedExercise::create([
            'name' => 'Bench Pressssss',
            'user_id' => '1'
        ]);
        WeightedExercise::create([
            'name' => 'Bench Press1',
            'user_id' => '1'
        ]);
    }
}
