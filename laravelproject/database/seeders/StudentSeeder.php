<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i <= 20; $i++)
         DB::table('students')->insert([
             "name" => Str::random(20),
             "email" => Str::random(20) ."@gmail.com",
         ]);
    }
}
