<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //public function run1()
    //{
        // \App\Models\User::factory(10)->create();
    //}
     public function run()
    {
        DB::table("users")->insert([
            'First_Name' => Str::random(10),
            'Last_Name' => Str::random(10),
            'Phone_Number' => random_int(0000000000, 9999999999)::random(12),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'Bio' => Str::random(10),
            'Location' => Str::random(10),
            'Image' => Str::random(10),

        ]);
    }
}
