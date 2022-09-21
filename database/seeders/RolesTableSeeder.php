<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Başkan',
                'guard_name' => 'web',
                'order' => 1,
                'created_at' => '2022-09-12 17:26:41',
                'updated_at' => '2022-09-12 17:28:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Yönetim Kurulu Üyesi',
                'guard_name' => 'web',
                'order' => 2,
                'created_at' => '2022-09-12 17:29:24',
                'updated_at' => '2022-09-12 17:29:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Genel Müdür',
                'guard_name' => 'web',
                'order' => 3,
                'created_at' => '2022-09-12 17:43:40',
                'updated_at' => '2022-09-12 17:43:40',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Satış Direktörü',
                'guard_name' => 'web',
                'order' => 4,
                'created_at' => '2022-09-12 18:29:36',
                'updated_at' => '2022-09-12 18:29:36',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Mali ve İdari İşler Müdürü',
                'guard_name' => 'web',
                'order' => 8,
                'created_at' => '2022-09-12 18:37:37',
                'updated_at' => '2022-09-21 13:20:18',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Muhasebe Yöneticisi',
                'guard_name' => 'web',
                'order' => 9,
                'created_at' => '2022-09-12 18:38:19',
                'updated_at' => '2022-09-21 13:20:12',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'Muhasebe Uzmanı',
                'guard_name' => 'web',
                'order' => 10,
                'created_at' => '2022-09-12 18:39:37',
                'updated_at' => '2022-09-21 13:20:07',
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'İdari İşler Sorumlusu',
                'guard_name' => 'web',
                'order' => 11,
                'created_at' => '2022-09-12 18:41:04',
                'updated_at' => '2022-09-21 13:20:02',
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'Tasarım',
                'guard_name' => 'web',
                'order' => 12,
                'created_at' => '2022-09-12 18:41:56',
                'updated_at' => '2022-09-21 13:19:57',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'WGS Müdür',
                'guard_name' => 'web',
                'order' => 7,
                'created_at' => '2022-09-12 18:42:24',
                'updated_at' => '2022-09-21 13:20:22',
            ),
            10 => 
            array (
                'id' => 14,
                'name' => 'Satış Çalışanı',
                'guard_name' => 'web',
                'order' => 5,
                'created_at' => '2022-09-21 13:20:40',
                'updated_at' => '2022-09-21 13:20:46',
            ),
        ));
        
        
    }
}