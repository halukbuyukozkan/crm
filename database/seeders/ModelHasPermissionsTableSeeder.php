<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModelHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_permissions')->delete();
        
        \DB::table('model_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 5,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            4 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
        ));
        
        
    }
}