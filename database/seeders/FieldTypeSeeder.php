<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_type')->insert([
            'name' => 'Weight',
        ]);
        DB::table('field_type')->insert([
            'name' => 'Reps',
        ]);
        DB::table('field_type')->insert([
            'name' => 'RPE',
        ]);
    }
}
