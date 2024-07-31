<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Cairo","ar":"\\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0647"}',
                'slug' => 'cairo',
                'country_id' => 1,
                'created_at' => '2021-10-31 15:16:04',
                'updated_at' => '2021-11-15 21:35:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Alexandria","ar":"\\u0627\\u0644\\u0623\\u0633\\u0643\\u0646\\u062f\\u0631\\u064a\\u0647"}',
                'slug' => 'alexandria',
                'country_id' => 1,
                'created_at' => '2021-10-31 15:16:04',
                'updated_at' => '2021-11-15 21:35:56',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => '{"ar":"\\u0627\\u0644\\u062c\\u0648\\u0646\\u0629"}',
                'slug' => 'elgona',
                'country_id' => 1,
                'created_at' => '2021-11-16 21:03:49',
                'updated_at' => '2021-11-16 21:03:49',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => '{"ar":"\\u0634\\u0631\\u0645 \\u0627\\u0644\\u0634\\u064a\\u062e"}',
                'slug' => 'sharm-el-sheikh',
                'country_id' => 1,
                'created_at' => '2022-03-17 16:19:41',
                'updated_at' => '2022-03-17 16:19:41',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => '{"ar":"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0629"}',
                'slug' => 'mansoura',
                'country_id' => 1,
                'created_at' => '2022-03-28 16:10:19',
                'updated_at' => '2022-03-28 16:10:19',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => '{"ar":"\\u0627\\u0644\\u0627\\u0633\\u0645\\u0627\\u0639\\u064a\\u0644\\u064a\\u0647"}',
                'slug' => 'ismaelia',
                'country_id' => 1,
                'created_at' => '2022-03-29 17:55:59',
                'updated_at' => '2022-03-29 17:55:59',
            ),
        ));
        
        
    }
}