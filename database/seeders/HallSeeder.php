<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('halls')->insert([
            'title' => 'Hall 1'
        ]);
        DB::table('halls')->insert([
            'title' => 'Hall 2'
        ]);
        DB::table('halls')->insert([
            'title' => 'Hall 3'
        ]);
    }
}
