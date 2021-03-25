<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'answer' => 'Yes',
            'created_at' => date('Y-m-d h:i"s'),
            'updated_at' => date('Y-m-d h:i"s'),
        ]);
        DB::table('answers')->insert([
            'answer' => 'No',
            'created_at' => date('Y-m-d h:i"s'),
            'updated_at' => date('Y-m-d h:i"s'),
        ]);
        DB::table('answers')->insert([
            'answer' => 'May be',
            'created_at' => date('Y-m-d h:i"s'),
            'updated_at' => date('Y-m-d h:i"s'),
        ]);
        DB::table('answers')->insert([
            'answer' => 'True',
            'created_at' => date('Y-m-d h:i"s'),
            'updated_at' => date('Y-m-d h:i"s'),
        ]);
        DB::table('answers')->insert([
            'answer' => 'False',
            'created_at' => date('Y-m-d h:i"s'),
            'updated_at' => date('Y-m-d h:i"s'),
        ]);

    }
}
