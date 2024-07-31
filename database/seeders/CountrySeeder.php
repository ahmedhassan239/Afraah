<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $countries = [
            [
                'name' => 'Egypt',
                'slug' => 'egypt',
            ],
            [
                'name' => 'Saudi Arabia',
                'slug' => 'saudi-arabia',
            ],
            [
                'name' => 'Qatar',
                'slug' => 'qatar',
            ],
            [
                'name' => 'UAE',
                'slug' => 'uae',
            ]
        ];

        foreach ($countries as $key => $value) {
            Country::create($value);
        }
    }
}
