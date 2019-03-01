<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        		'name'=>'factsnepal',
        		'created_at'=> \Carbon\Carbon::now(),
        		'email'=>'factsnepal@gmail.com',
        		'password'=> bcrypt('factsnepal@gmail.com'),
        		'contact_no'=>'9801234567',
        		'type'=>'1',
        		'status'=>'1',
        		'device'=>'3A:w3:hj"90',
        		'visitor'=>'203.345.90',
        	]);
    }
}
