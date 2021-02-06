<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'tech'
        ]);

        DB::table('categories')->insert([
            'name'=>'movies'
        ]);

        DB::table('categories')->insert([
            'name'=>'gaming'
        ]);

        DB::table('categories')->insert([
            'name'=>'food'
        ]);
    }
}
