<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'adm',
            'email'=>'adm@mail.com',
            'role_id'=>'1',
            'password'=>Hash::make('12345678'),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'name'=>'author',
            'email'=>'author@mail.com',
            'role_id'=>'2',
            'password'=>Hash::make('12345678'),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'name'=>'user',
            'email'=>'user@mail.com',
            'role_id'=>'3',
            'password'=>Hash::make('12345678'),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
