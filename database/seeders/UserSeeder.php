<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Facker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 5; $i++) :
	    	$faker = Facker::create();
	        DB::table('users')->insert([
	        	'name' => $faker->name,
	        	'email' => $faker->email,
	        	'password' => Hash::make('qwerty')
	        ]);
    	endfor;
    }
}
