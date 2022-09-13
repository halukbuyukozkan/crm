<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 1,
                'name' => 'Yemek',
                'type_id' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'id' => 2,
                'name' => 'Yakıt',
                'type_id' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'id' => 3,
                'name' => 'Konaklama',
                'type_id' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'id' => 4,
                'name' => 'Diğer',
                'type_id' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}