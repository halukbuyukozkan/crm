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
                'permission_id' => 13,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 14,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            6 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            7 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            8 => 
            array (
                'permission_id' => 13,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            9 => 
            array (
                'permission_id' => 14,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            10 => 
            array (
                'permission_id' => 15,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            11 => 
            array (
                'permission_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 9,
            ),
            12 => 
            array (
                'permission_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            13 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            14 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            15 => 
            array (
                'permission_id' => 12,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            16 => 
            array (
                'permission_id' => 13,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            17 => 
            array (
                'permission_id' => 14,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            18 => 
            array (
                'permission_id' => 15,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            19 => 
            array (
                'permission_id' => 16,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            20 => 
            array (
                'permission_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 15,
            ),
            21 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            22 => 
            array (
                'permission_id' => 5,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            23 => 
            array (
                'permission_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            24 => 
            array (
                'permission_id' => 13,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            25 => 
            array (
                'permission_id' => 14,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
        ));
        
        
    }
}