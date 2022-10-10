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
                'permission_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            4 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            5 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            6 => 
            array (
                'permission_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 9,
            ),
            7 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            8 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            9 => 
            array (
                'permission_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 15,
            ),
            10 => 
            array (
                'permission_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 15,
            ),
        ));
        
        
    }
}