<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
          [
            'name' => 'Md Mursalin Dowla',
            'username' => 'admin1',
            'email'=> 'mursalin@gmail.com',
            'phone' =>'+8801997244042',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make("12345678"),
            
          ],
        );
    }
}
