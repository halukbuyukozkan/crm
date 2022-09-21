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
                'department_id' => 1,
                'name' => 'Haluk Büyüközkan',
                'phone' => '+905069745835',
                'email' => 'halukbuyukozkan@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 500,
                'password' => '$2y$10$YMQK4yJ0x/P6C1xf/kCdKOrqp7ZliBwJfNE1ZXV5enFm3a1.0jcUi',
                'remember_token' => NULL,
                'created_at' => '2022-09-07 09:02:57',
                'updated_at' => '2022-09-21 08:34:10',
            ),
            1 => 
            array (
                'id' => 2,
                'department_id' => 1,
                'name' => 'Berfin',
                'phone' => '+905069745835',
                'email' => 'berfinertugrul@hotmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 500,
                'password' => '$2y$10$z6s2B5lS5sGo115FBCXeP.j2SbU571rgVGcde8PQfwYBMKrgCrr3u',
                'remember_token' => NULL,
                'created_at' => '2022-09-07 09:06:57',
                'updated_at' => '2022-09-07 09:06:57',
            ),
            2 => 
            array (
                'id' => 3,
                'department_id' => 2,
                'name' => 'user',
                'phone' => '05069756735',
                'email' => 'user@a.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => NULL,
                'password' => '$2y$10$SegylufYe9RzevQEv7Yt/uwQfVuT.sAIfYZvd9U/9Rxla0chaqx5.',
                'remember_token' => NULL,
                'created_at' => '2022-09-19 09:14:48',
                'updated_at' => '2022-09-19 09:14:48',
            ),
            3 => 
            array (
                'id' => 4,
                'department_id' => 2,
                'name' => 'Fatih Gezer',
                'phone' => '05068758635',
                'email' => 'fatihgezer@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => NULL,
                'password' => '$2y$10$68DGoFVcR5lC4MQifK2Y9O1nk18ioFSuFdS481.2GO3WwYcIxLpsq',
                'remember_token' => NULL,
                'created_at' => '2022-09-21 08:33:12',
                'updated_at' => '2022-09-21 08:33:12',
            ),
            4 => 
            array (
                'id' => 5,
                'department_id' => 2,
                'name' => 'Bilgin Öztürk',
                'phone' => '05067893425',
                'email' => 'bilginozturk@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => NULL,
                'password' => '$2y$10$l5JFs91a7JqW4mDVtTB/seX00xSPiUwNs.602y2IqZLSh7i5tWYI6',
                'remember_token' => NULL,
                'created_at' => '2022-09-21 08:51:55',
                'updated_at' => '2022-09-21 08:51:55',
            ),
        ));
        
        
    }
}