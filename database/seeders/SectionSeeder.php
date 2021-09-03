<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'title' => 'Laser-Matter Interaction'
        ]);
        DB::table('sections')->insert([
            'title' => 'Laser Systems and Materials'
        ]);
        DB::table('sections')->insert([
            'title' => 'Biophotonics'
        ]);
    }
}
