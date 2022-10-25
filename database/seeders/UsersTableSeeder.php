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
                'balance' => 0,
                'dayoff' => NULL,
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
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$z6s2B5lS5sGo115FBCXeP.j2SbU571rgVGcde8PQfwYBMKrgCrr3u',
                'remember_token' => NULL,
                'created_at' => '2022-09-07 09:06:57',
                'updated_at' => '2022-09-07 09:06:57',
            ),
            2 => 
            array (
                'id' => 3,
                'department_id' => 1,
                'name' => 'user',
                'phone' => '05069756735',
                'email' => 'user@a.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
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
                'balance' => 0,
                'dayoff' => NULL,
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
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$l5JFs91a7JqW4mDVtTB/seX00xSPiUwNs.602y2IqZLSh7i5tWYI6',
                'remember_token' => NULL,
                'created_at' => '2022-09-21 08:51:55',
                'updated_at' => '2022-10-10 12:58:13',
            ),
            5 => 
            array (
                'id' => 7,
                'department_id' => 2,
                'name' => 'Recep Gürkan Elbir',
                'phone' => '05768763546',
                'email' => 'gurkanelbir@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$v9bqzR2Tu.Y.Tkcn.9hkheCrFh7nOhZKRq3DfdFgsjT4.ievfzg3K',
                'remember_token' => NULL,
                'created_at' => '2022-09-21 14:01:29',
                'updated_at' => '2022-09-21 14:01:29',
            ),
            6 => 
            array (
                'id' => 8,
                'department_id' => 2,
                'name' => 'Eren Görmez',
                'phone' => '05069756735',
                'email' => 'erengormez@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$OGeyhvIvpl1tKuWqXEwrx.IoUDChRiTO7KJ3Fcg2MiwMl3DOXZzP2',
                'remember_token' => NULL,
                'created_at' => '2022-09-21 14:02:33',
                'updated_at' => '2022-10-10 13:04:08',
            ),
            7 => 
            array (
                'id' => 9,
                'department_id' => 1,
                'name' => 'Didem Uysal',
                'phone' => '+905069685835',
                'email' => 'didemuysal@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$HLNO7ifSzKocqvzM4OoOBurVArH/KRbdvnbLk.1OCXRWVpEgcS1bC',
                'remember_token' => NULL,
                'created_at' => '2022-09-23 18:03:46',
                'updated_at' => '2022-09-23 18:03:46',
            ),
            8 => 
            array (
                'id' => 11,
                'department_id' => 3,
                'name' => 'Serhat Keleş',
                'phone' => NULL,
                'email' => 'serhatkeles@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => '2022-05-21 00:00:00',
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$P5z4pGOKvRFl1ogUaXZAIOfulKXGkSwHnG5s392s5dN/hbSZzA8cK',
                'remember_token' => NULL,
                'created_at' => '2022-10-10 10:16:05',
                'updated_at' => '2022-10-10 10:45:22',
            ),
            9 => 
            array (
                'id' => 12,
                'department_id' => 3,
                'name' => 'Neşe Sezer',
                'phone' => NULL,
                'email' => 'nesesezer@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$Bp4Pvw8pbejPmH.RMaIA.erp9zelg.t2q6qZenyRpx5a6nfla8IZm',
                'remember_token' => NULL,
                'created_at' => '2022-10-10 10:51:08',
                'updated_at' => '2022-10-10 10:51:08',
            ),
            10 => 
            array (
                'id' => 13,
                'department_id' => 3,
                'name' => 'Sacide Çetin',
                'phone' => NULL,
                'email' => 'sacidecetin@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$N5WbJ3sB/Y7WZ7wB9fa84OEWMXSWiNCN71tHSLJNSVSabs55fauVy',
                'remember_token' => NULL,
                'created_at' => '2022-10-10 11:01:32',
                'updated_at' => '2022-10-10 11:01:32',
            ),
            11 => 
            array (
                'id' => 14,
                'department_id' => 3,
                'name' => 'Emrullah Kadıoğlu',
                'phone' => NULL,
                'email' => 'emrullahkadioglu@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$ub5xCrD/2.LCP13rUITh6Opf9E9QAwWPHcQxmMzrEANPUUNjHFNee',
                'remember_token' => NULL,
                'created_at' => '2022-10-10 11:02:41',
                'updated_at' => '2022-10-10 11:02:41',
            ),
            12 => 
            array (
                'id' => 15,
                'department_id' => 1,
                'name' => 'Ersin Sancak',
                'phone' => NULL,
                'email' => 'ersinsancak@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$GGeaVE8T4hvbhWdpbFu1AeIxC4P1qIv26lvqLEjEa3aLlKc9DPO3G',
                'remember_token' => NULL,
                'created_at' => '2022-10-10 11:08:27',
                'updated_at' => '2022-10-10 11:08:27',
            ),
            13 => 
            array (
                'id' => 16,
                'department_id' => 1,
                'name' => 'Ali Gürel',
                'phone' => NULL,
                'email' => 'aligurel20@gmail.com',
                'email_verified_at' => NULL,
                'birthdate' => NULL,
                'balance' => 0,
                'dayoff' => NULL,
                'password' => '$2y$10$de4G3d3/pzHY8N.uVmvBdOml7Deai/CVNmthNpeMpQIrV7yJUAWei',
                'remember_token' => NULL,
                'created_at' => '2022-10-14 14:49:59',
                'updated_at' => '2022-10-14 14:49:59',
            ),
        ));
        
        
    }
}