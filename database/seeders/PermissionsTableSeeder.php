<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-13 12:36:06',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'Ödeme Talebi Kabul Etme',
                'order' => 4,
                'updated_at' => '2022-09-21 14:05:52',
            ),
            1 => 
            array (
                'created_at' => '2022-09-21 13:24:29',
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'Genel Görev Atama',
                'order' => 2,
                'updated_at' => '2022-09-22 11:41:21',
            ),
            2 => 
            array (
                'created_at' => '2022-09-21 14:05:38',
                'guard_name' => 'web',
                'id' => 5,
                'name' => 'Sistem Yönetimi',
                'order' => 1,
                'updated_at' => '2022-09-21 14:05:49',
            ),
            3 => 
            array (
                'created_at' => '2022-09-22 11:52:35',
                'guard_name' => 'web',
                'id' => 7,
                'name' => 'Görevde Değişiklik Yapma',
                'order' => 3,
                'updated_at' => '2022-09-22 11:52:35',
            ),
            4 => 
            array (
                'created_at' => '2022-10-03 12:27:55',
                'guard_name' => 'web',
                'id' => 8,
                'name' => 'İş Yönetimi',
                'order' => 6,
                'updated_at' => '2022-10-06 10:04:21',
            ),
            5 => 
            array (
                'created_at' => '2022-10-06 10:04:05',
                'guard_name' => 'web',
                'id' => 9,
                'name' => 'Ödeme Gerçekleştirme',
                'order' => 5,
                'updated_at' => '2022-10-06 10:04:17',
            ),
            6 => 
            array (
                'created_at' => '2022-10-06 10:04:05',
                'guard_name' => 'web',
                'id' => 10,
                'name' => 'Yetkili Ödeme Talep Kabul Etme',
                'order' => 6,
                'updated_at' => '2022-10-06 10:04:17',
            ),
            7 => 
            array (
                'created_at' => '2022-10-18 15:16:34',
                'guard_name' => 'web',
                'id' => 12,
                'name' => 'Muhasebe Ödeme Gerçekleştirme',
                'order' => 7,
                'updated_at' => '2022-10-18 15:16:34',
            ),
            8 => 
            array (
                'created_at' => '2022-10-25 15:41:50',
                'guard_name' => 'web',
                'id' => 13,
                'name' => 'İzin Yönetimi',
                'order' => 8,
                'updated_at' => '2022-10-25 15:41:50',
            ),
            9 => 
            array (
                'created_at' => '2022-10-27 20:06:02',
                'guard_name' => 'web',
                'id' => 14,
                'name' => 'Dosya Yönetimi',
                'order' => 9,
                'updated_at' => '2022-10-27 20:06:02',
            ),
            10 => 
            array (
                'created_at' => '2022-11-19 22:17:39',
                'guard_name' => 'web',
                'id' => 15,
                'name' => 'Satın Alma',
                'order' => 10,
                'updated_at' => '2022-11-19 22:17:39',
            ),
        ));
        
        
    }
}