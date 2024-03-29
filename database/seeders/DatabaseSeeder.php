<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert([
            'email' => 'admin@example.com',
            'password' => Hash::make('adminadmin'),
            'password_check_status' => 'good'
        ]);

        DB::table('users')->updateOrInsert([
            'email' => 'user@example.com',
            'password' => Hash::make('useruser'),
            'password_check_status' => 'good'
        ]);

        for ($i = 0; $i < 10; $i++)
            DB::table('users')->updateOrInsert([
                'email' => Str::random(10) . '@example.com',
                'password' => Hash::make(Str::random(random_int(8, 25))),
                'password_check_status' => 'good'
            ]);
    }
}
