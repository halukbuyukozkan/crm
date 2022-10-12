<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Devam ediyor',
                'is_completed' => 0,
                'created_at' => '2022-09-22 15:39:13',
                'updated_at' => '2022-09-22 15:39:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tamamlandı',
                'is_completed' => 1,
                'created_at' => '2022-09-22 15:39:13',
                'updated_at' => '2022-09-22 15:39:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Onaylandı',
                'is_completed' => 1,
                'created_at' => '2022-09-22 15:39:23',
                'updated_at' => '2022-09-22 15:39:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Revize Talebi',
                'is_completed' => 0,
                'created_at' => '2022-09-22 15:39:23',
                'updated_at' => '2022-09-22 15:39:23',
            ),
        ));
        
        
    }
}