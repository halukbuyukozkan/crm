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
                'model_id' => 1,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 3,
            ),
            1 => 
            array (
                'model_id' => 1,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 5,
            ),
            2 => 
            array (
                'model_id' => 1,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 7,
            ),
            3 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 1,
            ),
            4 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 3,
            ),
            5 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 7,
            ),
            6 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 13,
            ),
            7 => 
            array (
                'model_id' => 9,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 9,
            ),
            8 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 3,
            ),
            9 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 7,
            ),
            10 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 12,
            ),
            11 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 13,
            ),
            12 => 
            array (
                'model_id' => 15,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 10,
            ),
        ));
        
        
    }
}