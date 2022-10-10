<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Yönetim',
                'created_at' => '2022-09-21 10:33:43',
                'updated_at' => '2022-09-21 10:33:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Satış Departmanı',
                'created_at' => '2022-09-21 10:34:34',
                'updated_at' => '2022-09-21 10:34:34',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mali ve İdari İşler',
                'created_at' => '2022-10-10 10:14:27',
                'updated_at' => '2022-10-10 10:14:27',
            ),
        ));
        
        
    }
}