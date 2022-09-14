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
                'name' => 'Ödeme Talebi Kabul etme',
                'order' => 1,
                'updated_at' => '2022-09-13 12:36:06',
            ),
        ));
        
        
    }
}