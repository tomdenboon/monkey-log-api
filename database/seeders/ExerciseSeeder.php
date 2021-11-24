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
            'name' => 'Press',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Bench Presse',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Bench Presser',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Bench Pressssss',
            'user_id' => '1'
        ]);
        Exercise::create([
            'name' => 'Bench Press1',
            'user_id' => '1'
        ]);
    }
}
