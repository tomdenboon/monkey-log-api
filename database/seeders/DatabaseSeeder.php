<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Complete;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\ExerciseGroup;
use App\Models\ExerciseRow;
use App\Models\WeightedExercise;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ExerciseTypeSeeder::class,
        ]);
        $user = User::factory()->has(
            Exercise::factory()->count(10)
        )->has(
            Complete::factory()->count(100)->has(
                Workout::factory()->has(
                    ExerciseGroup::factory()->count(6)->has(
                        ExerciseRow::factory()->count(5)->has(
                            WeightedExercise::factory(), 'exercisable'
                        )
                    )
                )
            )
        )->create([
            'name' => 'Tom den Boon',
            'email' => 'tomdenboon@hotmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
