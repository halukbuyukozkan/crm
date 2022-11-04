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
                'model_id' => 1,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 13,
            ),
            4 => 
            array (
                'model_id' => 1,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 14,
            ),
            5 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 1,
            ),
            6 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 3,
            ),
            7 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 7,
            ),
            8 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 13,
            ),
            9 => 
            array (
                'model_id' => 5,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 14,
            ),
            10 => 
            array (
                'model_id' => 9,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 9,
            ),
            11 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 1,
            ),
            12 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 3,
            ),
            13 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 7,
            ),
            14 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 12,
            ),
            15 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 13,
            ),
            16 => 
            array (
                'model_id' => 11,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 14,
            ),
            17 => 
            array (
                'model_id' => 15,
                'model_type' => 'App\\Models\\User',
                'permission_id' => 10,
            ),
        ));
        
        
    }
}