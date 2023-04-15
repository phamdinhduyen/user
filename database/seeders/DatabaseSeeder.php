<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\PostSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
    }
}