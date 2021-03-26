<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'name' => 'user',
            'type'=>'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'type'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
