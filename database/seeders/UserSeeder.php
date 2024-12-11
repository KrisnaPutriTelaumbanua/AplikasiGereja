<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => 'superadminkrisna@gmail.com',
            'password' => Hash::make('superadminkrisna@gmail.com')
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'adminputri@gmail.com',
            'password' => Hash::make('adminputri@gmail.com')
         ]);
    }
}
