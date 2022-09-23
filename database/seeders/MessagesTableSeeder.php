<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('messages')->delete();
        
        \DB::table('messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'message' => 'Merhaba arkadaşlar yeni sistem kullanıma açıldı, katkılarınızı bekliyoruz',
                'created_at' => '2022-09-19 09:15:41',
                'updated_at' => '2022-09-19 09:15:41',
            ),
            1 => 
            array (
                'id' => 2,
                'message' => 'Fırsatların ortaya çıkmasını beklemeden fırsatları yaratan bir kültüre sahibiz.',
                'created_at' => '2022-09-19 09:16:11',
                'updated_at' => '2022-09-19 09:16:11',
            ),
        ));
        
        
    }
}