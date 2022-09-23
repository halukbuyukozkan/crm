<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('information')->delete();
        
        \DB::table('information')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'Cennet mağazasında günlük ciro rekoru kırıldı. Bütün arkadaşları tebrik ediyoruz.',
                'created_at' => '2022-09-19 09:16:35',
                'updated_at' => '2022-09-19 09:16:35',
            ),
        ));
        
        
    }
}