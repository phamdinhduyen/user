<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
          for($i = 1; $i <= 10; $i++){
            DB::table('posts')->insert([
                'title' =>  $faker->name,
                'content' =>  $faker->text($maxNbChars = 200),
                'status' => 0,
                'user_id' => $faker -> randomDigit(),
                'created_at'=> now()
            ]);
        }
    }
}