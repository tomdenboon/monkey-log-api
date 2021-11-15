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
    }
}
