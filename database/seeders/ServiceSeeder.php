<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $services = [
            [
                'name' => 'Hotels',
                'slug' => 'hotels',
                'category_id'=>'2'
            ],
            [
                'name' => 'Cars',
                'slug' => 'cars',
                'category_id'=>'3'
            ],
            [
                'name' => 'Wedding Dresses',
                'slug' => 'wedding_dresses',
                'category_id'=>'4'
            ],
            [
                'name' => 'Videography',
                'slug' => 'videography',
                'category_id'=>'5'
            ],
        ];

        foreach ($services as $key => $value) {
            Service::create($value);
        }
    }
}
