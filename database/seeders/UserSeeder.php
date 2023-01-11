<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0888000123',
            'address' => 'jl.sigma',
            'birthdate' => '2002-04-26',
            'roleId' => '1',
            'itsDelete' => '1',
            'password' => Hash::make('admin123'),
        ]);
    }
}
