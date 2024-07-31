<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'id'=>'1',
                'name' => 'New User',
                'slug' => 'new-user',
            ],
            [
                'id'=>'2',
                'name' => 'Super Global Admin',
                'slug' => 'super-global-admin',
            ],
            [
                'id'=>'3',
                'name' => 'Hotel Vendor',
                'slug' => 'hotel-vendor',
            ],
            [
                'id'=>'4',
                'name' => 'Restaurant Vendor',
                'slug' => 'restaurant-vendor',
            ],
            [
                'id'=>'5',
                'name' => 'Wedding Palace Vendor',
                'slug' => 'wedding-palace-vendor',
            ],
            [
                'id'=>'6',
                'name' => 'Garden & Club Vendor',
                'slug' => 'garden-club-vendor',
            ],
            [
                'id'=>'7',
                'name' => 'Wedding Card Vendor',
                'slug' => 'wedding-card-vendor',
            ],
            [
                'id'=>'8',
                'name' => 'Videography Vendor',
                'slug' => 'videography-vendor',
            ],
            [
                'id'=>'9',
                'name' => 'Photographer Vendor',
                'slug' => 'photographer-vendor',
            ],
            [
                'id'=>'10',
                'name' => 'Dj Vendor',
                'slug' => 'dj-vendor',
            ],
            [
                'id'=>'11',
                'name' => 'Hair Dresser Vendor',
                'slug' => 'hair-dresser-vendor',
            ],
            [
                'id'=>'12',
                'name' => 'Beauty Center Vendor',
                'slug' => 'beauty-center-vendor',
            ],
            [
                'id'=>'13',
                'name' => 'Barber Shop Vendor',
                'slug' => 'barber-shop-vendor',
            ],
            [
                'id'=>'14',
                'name' => 'Wedding Dress Vendor',
                'slug' => 'wedding-dress-vendor',
            ],
            [
                'id'=>'15',
                'name' => 'Men suit Vendor',
                'slug' => 'men-suit-vendor',
            ],
            [
                'id'=>'16',
                'name' => 'Car Vendor',
                'slug' => 'car-vendor',
            ],
            [
                'id'=>'17',
                'name' => 'Limousines Vendor',
                'slug' => 'limousine-vendor',
            ],
            [
                'id'=>'18',
                'name' => 'Motorcycle Vendor',
                'slug' => 'motorcycle-vendor',
            ],
            [
                'id'=>'19',
                'name' => 'City Vendor',
                'slug' => 'city',
            ],
            [
                'id'=>'20',
                'name' => 'Country Vendor',
                'slug' => 'country',
            ],
            [
                'id'=>'21',
                'name' => 'Category Vendor',
                'slug' => 'category',
            ],
            [
                'id'=>'22',
                'name' => 'Service Vendor',
                'slug' => 'service',
            ],

        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
