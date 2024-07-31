<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 1,
                'user_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 1,
                'user_id' => 79,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 1,
                'user_id' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => '2021-10-26 13:38:21',
                'updated_at' => '2021-10-26 13:38:21',
            ),
            5 => 
            array (
                'role_id' => 3,
                'user_id' => 2,
                'created_at' => '2021-10-28 09:43:55',
                'updated_at' => '2021-10-28 09:43:55',
            ),
            6 => 
            array (
                'role_id' => 16,
                'user_id' => 3,
                'created_at' => '2021-10-31 06:35:50',
                'updated_at' => '2021-10-31 06:35:50',
            ),
            7 => 
            array (
                'role_id' => 29,
                'user_id' => 76,
                'created_at' => '2022-03-14 20:13:49',
                'updated_at' => '2022-03-14 20:13:49',
            ),
            8 => 
            array (
                'role_id' => 29,
                'user_id' => 77,
                'created_at' => '2022-03-20 14:29:56',
                'updated_at' => '2022-03-20 14:29:56',
            ),
            9 => 
            array (
                'role_id' => 29,
                'user_id' => 78,
                'created_at' => '2022-03-22 17:29:25',
                'updated_at' => '2022-03-22 17:29:25',
            ),
            10 => 
            array (
                'role_id' => 29,
                'user_id' => 81,
                'created_at' => '2022-04-25 17:43:32',
                'updated_at' => '2022-04-25 17:43:32',
            ),
        ));
        
        
    }
}