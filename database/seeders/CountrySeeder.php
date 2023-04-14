<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countrys')->insert([
            'name' => 'Viet Nam',
        ]);

        DB::table('countrys')->insert([
            'name' => 'Trung quoc',
        ]);
    }
}