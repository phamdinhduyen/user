<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     
     */
    
    public function run()
    {
        // function RandomName() {
        //     $keys = array_merge(range('a', 'z'));
        //     shuffle($keys);
        //     $randomString = implode('', array_slice($keys, 0, 10));
        //     while(strlen($randomString) < 10) {
        //         shuffle($keys);
        //         $randomString .= implode('', array_slice($keys, 0, 10 - strlen($randomString)));
        //     }
        //     return $randomString;
        // }
        $faker = Factory::create();
        $hash = $faker->unique()->password();


       for($i = 1; $i <= 10; $i++){
            DB::table('users')->insert([
                'fullname' =>  $faker->name,
                'name' =>  $faker->name,
                'email' =>  $faker->email,
                'email_verified_at' => now(),
                'password' =>  Hash::make(11111),
                'group_id' => 1,
                'status' => 0,
                'country_id' => 1,
                // 'created_at'=> now()
            ]);
        }
    }
}