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
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Pull up',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Chin up',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Squat',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Deadlift',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Overhead press',
            'user_id' => '1'
        ]);
    }
}
