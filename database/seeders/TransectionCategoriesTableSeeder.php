<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransectionCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transection_categories')->delete();
        
        \DB::table('transection_categories')->insert(array (
            0 => 
            array (
                'created_at' => '2022-10-06 21:10:39',
                'id' => 1,
                'name' => 'Yakıt',
                'updated_at' => '2022-10-06 21:10:39',
            ),
            1 => 
            array (
                'created_at' => '2022-10-06 21:10:43',
                'id' => 2,
                'name' => 'Konaklama',
                'updated_at' => '2022-10-06 21:10:43',
            ),
            2 => 
            array (
                'created_at' => '2022-10-06 21:10:52',
                'id' => 3,
                'name' => 'Yemek',
                'updated_at' => '2022-10-06 21:10:52',
            ),
            3 => 
            array (
                'created_at' => '2022-10-06 21:10:56',
                'id' => 4,
                'name' => 'Diğer',
                'updated_at' => '2022-10-06 21:10:56',
            ),
        ));
        
        
    }
}