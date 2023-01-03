<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        DB::table('categoryProduct')->insert([
            'nameCategory' => 'Laptop',
        ]);

        DB::table('categoryProduct')->insert([
            'nameCategory' => 'HT',
        ]);
        DB::table('categoryProduct')->insert([
            'nameCategory' => 'iPad',
        ]);
        DB::table('categoryProduct')->insert([
            'nameCategory' => 'Camera',
        ]);
        DB::table('categoryProduct')->insert([
            'nameCategory' => 'Proyektor',
        ]);
    }
}
