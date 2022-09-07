<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Haluk',
                'email' => 'halukbuyukozkan@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YMQK4yJ0x/P6C1xf/kCdKOrqp7ZliBwJfNE1ZXV5enFm3a1.0jcUi',
                'remember_token' => NULL,
                'created_at' => '2022-09-07 09:02:57',
                'updated_at' => '2022-09-07 09:02:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Berfin',
                'email' => 'berfinertugrul@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$z6s2B5lS5sGo115FBCXeP.j2SbU571rgVGcde8PQfwYBMKrgCrr3u',
                'remember_token' => NULL,
                'created_at' => '2022-09-07 09:06:57',
                'updated_at' => '2022-09-07 09:06:57',
            ),
        ));
        
        
    }
}