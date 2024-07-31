<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cities = [
            [
                'name' => 'Cairo',
                'slug' => 'cairo',
                'country_id'=>'1'
            ],
            [
                'name' => 'Alexandria',
                'slug' => 'alexandria',
                'country_id'=>'1'
            ],
            [
                'name' => 'Riyadh',
                'slug' => 'riyadh',
                'country_id'=>'2'
            ],
            [
                'name' => 'Dubai',
                'slug' => 'dubai',
                'country_id'=>'4'
            ],
            [
                'name' => 'Abu Dhabi',
                'slug' => 'abu_dhabi',
                'country_id'=>'4'
            ],
            [
            'name' => 'Doha',
            'slug' => 'doha',
            'country_id'=>'3'
            ]
        ];

        foreach ($cities as $key => $value) {
            City::create($value);
        }

    }
}
