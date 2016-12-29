<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//user
            DB::table('users')->insert([
                    'name'=>'user111',
                    'email'=>'user111@gmail.com',
                    'password'=>bcrypt('123456'),
                    'role'=>'1',
                ]);

            DB::table('users')->insert([
                    'name'=>'user222',
                    'email'=>'user222@gmail.com',
                    'password'=>bcrypt('123456'),
                    'role'=>'1',
                ]);

//business            
            DB::table('users')->insert([
                'name'=>'business1',
                'email'=>'business1@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'2',
            ]);
            DB::table('users')->insert([
                'name'=>'business2',
                'email'=>'business2@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'2',
            ]);

        //admin
            DB::table('users')->insert([
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'3',
            ]);
            DB::table('users')->insert([
                    'name'=>'admin1',
                    'email'=>'admin1@gmail.com',
                    'password'=>bcrypt('123456'),
                    'role'=>'3',
                ]);

            DB::table('users')->insert([
                    'name'=>'admin2',
                    'email'=>'admin2@gmail.com',
                    'password'=>bcrypt('123456'),
                    'role'=>'3',
                ]);            
    } //end run
}
