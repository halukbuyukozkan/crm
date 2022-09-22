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
                'id' => 1,
                'name' => 'Ödeme Talebi Kabul etme',
                'guard_name' => 'web',
                'order' => 4,
                'created_at' => '2022-09-13 12:36:06',
                'updated_at' => '2022-09-21 14:05:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Satış Görev Atama',
                'guard_name' => 'web',
                'order' => 6,
                'created_at' => '2022-09-21 13:17:03',
                'updated_at' => '2022-09-22 11:41:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Genel Görev Atama',
                'guard_name' => 'web',
                'order' => 2,
                'created_at' => '2022-09-21 13:24:29',
                'updated_at' => '2022-09-22 11:41:21',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Sistem Yönetimi',
                'guard_name' => 'web',
                'order' => 1,
                'created_at' => '2022-09-21 14:05:38',
                'updated_at' => '2022-09-21 14:05:49',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Muhasebe Görev Atama',
                'guard_name' => 'web',
                'order' => 5,
                'created_at' => '2022-09-21 18:49:50',
                'updated_at' => '2022-09-21 18:49:50',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Görevde Değişiklik Yapma',
                'guard_name' => 'web',
                'order' => 3,
                'created_at' => '2022-09-22 11:52:35',
                'updated_at' => '2022-09-22 11:52:35',
            ),
        ));
        
        
    }
}