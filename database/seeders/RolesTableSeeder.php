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
                'created_at' => '2022-09-12 17:26:41',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'Başkan',
                'order' => 1,
                'updated_at' => '2022-09-12 17:28:53',
            ),
            1 => 
            array (
                'created_at' => '2022-09-12 17:29:24',
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'Yönetim Kurulu Üyesi',
                'order' => 2,
                'updated_at' => '2022-09-12 17:29:24',
            ),
            2 => 
            array (
                'created_at' => '2022-09-12 17:43:40',
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'Genel Müdür',
                'order' => 3,
                'updated_at' => '2022-09-12 17:43:40',
            ),
            3 => 
            array (
                'created_at' => '2022-09-12 18:29:36',
                'guard_name' => 'web',
                'id' => 4,
                'name' => 'Satış Direktörü',
                'order' => 4,
                'updated_at' => '2022-09-12 18:29:36',
            ),
            4 => 
            array (
                'created_at' => '2022-09-12 18:37:37',
                'guard_name' => 'web',
                'id' => 8,
                'name' => 'Mali ve İdari İşler Müdürü',
                'order' => 6,
                'updated_at' => '2022-09-12 18:37:37',
            ),
            5 => 
            array (
                'created_at' => '2022-09-12 18:38:19',
                'guard_name' => 'web',
                'id' => 9,
                'name' => 'Muhasebe Yöneticisi',
                'order' => 7,
                'updated_at' => '2022-09-12 18:38:19',
            ),
            6 => 
            array (
                'created_at' => '2022-09-12 18:39:37',
                'guard_name' => 'web',
                'id' => 10,
                'name' => 'Muhasebe Uzmanı',
                'order' => 8,
                'updated_at' => '2022-09-12 18:39:37',
            ),
            7 => 
            array (
                'created_at' => '2022-09-12 18:41:04',
                'guard_name' => 'web',
                'id' => 11,
                'name' => 'İdari İşler Sorumlusu',
                'order' => 9,
                'updated_at' => '2022-09-12 18:41:04',
            ),
            8 => 
            array (
                'created_at' => '2022-09-12 18:41:56',
                'guard_name' => 'web',
                'id' => 12,
                'name' => 'Tasarım',
                'order' => 10,
                'updated_at' => '2022-09-12 18:41:56',
            ),
            9 => 
            array (
                'created_at' => '2022-09-12 18:42:24',
                'guard_name' => 'web',
                'id' => 13,
                'name' => 'WGS Müdür',
                'order' => 5,
                'updated_at' => '2022-09-12 18:44:26',
            ),
        ));
        
        
    }
}