<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'Health & Beauty',
                'slug' => 'health_beauty',
            ],
            [
                'name' => 'Wedding Halls',
                'slug' => 'wedding_halls',
            ],
            [
                'name' => 'Car Rental',
                'slug' => 'car_rental',
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
            ],
            [
                'name' => 'Media',
                'slug' => 'media',
            ]
        ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
