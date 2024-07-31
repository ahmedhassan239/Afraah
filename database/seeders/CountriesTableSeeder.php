<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Egypt","ar":"\\u0645\\u0635\\u0631"}',
                'slug' => 'egypt',
                'created_at' => '2021-10-31 15:16:04',
                'updated_at' => '2021-11-15 21:37:54',
            ),
        ));
        
        
    }
}