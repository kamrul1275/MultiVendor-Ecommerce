<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([


// admin
[
   'name'=>'admin',
   'email'=>'admin@gmail.com',
   'password'=>Hash::make('12345678'),
   'role'=>'admin',
   'status'=>'active',
],


// vendor
[
   'name'=>'vendor',
   'email'=>'vendor@gmail.com',
   'password'=>Hash::make('12345678'),
   'role'=>'vendor',
   'status'=>'active',
],





// vendor
[
   'name'=>'user',
   'email'=>'user@gmail.com',
   'password'=>Hash::make('12345678'),
   'role'=>'user',
   'status'=>'active',
],




       ]);



    }
}
