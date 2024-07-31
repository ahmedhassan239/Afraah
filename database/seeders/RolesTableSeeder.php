<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'new-user',
                'name' => 'New User',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'super-global-admin',
                'name' => 'Super Global Admin',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'hotel-vendor',
                'name' => 'Hotel Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'restaurant-vendor',
                'name' => 'Restaurant Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'wedding-palace-vendor',
                'name' => 'Wedding Palace Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'garden-club-vendor',
                'name' => 'Garden & Club Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'wedding-card-vendor',
                'name' => 'Wedding Card Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            7 => 
            array (
                'id' => 8,
                'slug' => 'videography-vendor',
                'name' => 'Videography Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            8 => 
            array (
                'id' => 9,
                'slug' => 'photographer-vendor',
                'name' => 'Photographer Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            9 => 
            array (
                'id' => 10,
                'slug' => 'dj-vendor',
                'name' => 'Dj Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            10 => 
            array (
                'id' => 11,
                'slug' => 'hair-dresser-vendor',
                'name' => 'Hair Dresser Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            11 => 
            array (
                'id' => 12,
                'slug' => 'beauty-center-vendor',
                'name' => 'Beauty Center Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            12 => 
            array (
                'id' => 13,
                'slug' => 'barber-shop-vendor',
                'name' => 'Barber Shop Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            13 => 
            array (
                'id' => 14,
                'slug' => 'wedding-dress-vendor',
                'name' => 'Wedding Dress Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            14 => 
            array (
                'id' => 15,
                'slug' => 'men-suit-vendor',
                'name' => 'Men suit Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            15 => 
            array (
                'id' => 16,
                'slug' => 'car-vendor',
                'name' => 'Car Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            16 => 
            array (
                'id' => 17,
                'slug' => 'limousine-vendor',
                'name' => 'Limousines Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            17 => 
            array (
                'id' => 18,
                'slug' => 'motorcycle-vendor',
                'name' => 'Motorcycle Vendor',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 13:36:34',
            ),
            18 => 
            array (
                'id' => 19,
                'slug' => 'city',
                'name' => 'City',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 14:33:27',
            ),
            19 => 
            array (
                'id' => 20,
                'slug' => 'country',
                'name' => 'Country',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 14:33:14',
            ),
            20 => 
            array (
                'id' => 21,
                'slug' => 'category',
                'name' => 'Category',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 14:33:01',
            ),
            21 => 
            array (
                'id' => 22,
                'slug' => 'service',
                'name' => 'Service',
                'created_at' => '2021-10-26 13:36:34',
                'updated_at' => '2021-10-26 14:34:33',
            ),
            22 => 
            array (
                'id' => 23,
                'slug' => 'honey-moons-vendor',
                'name' => 'Honey Moons Vendor',
                'created_at' => '2021-11-14 09:21:55',
                'updated_at' => '2021-11-14 09:21:55',
            ),
            23 => 
            array (
                'id' => 24,
                'slug' => 'wedding-flowers-vendor',
                'name' => 'Wedding Flowers Vendor',
                'created_at' => '2021-11-14 09:22:57',
                'updated_at' => '2021-11-14 09:22:57',
            ),
            24 => 
            array (
                'id' => 25,
                'slug' => 'wedding-planners-vendor',
                'name' => 'Wedding Planners Vendor',
                'created_at' => '2021-11-14 09:24:05',
                'updated_at' => '2021-11-14 09:24:05',
            ),
            25 => 
            array (
                'id' => 26,
                'slug' => 'open-buffets-vendor',
                'name' => 'Open Buffets Vendor',
                'created_at' => '2021-11-14 09:24:47',
                'updated_at' => '2021-11-14 09:24:47',
            ),
            26 => 
            array (
                'id' => 27,
                'slug' => 'wedding-cakes-vendor',
                'name' => 'Wedding Cakes Vendor',
                'created_at' => '2021-11-14 09:25:19',
                'updated_at' => '2021-11-14 09:25:19',
            ),
            27 => 
            array (
                'id' => 28,
                'slug' => 'rings-jewelleries',
                'name' => 'Rings Jewelleries',
                'created_at' => '2021-11-14 09:29:04',
                'updated_at' => '2021-11-14 09:29:04',
            ),
            28 => 
            array (
                'id' => 29,
                'slug' => 'editor',
                'name' => 'Editor',
                'created_at' => '2022-02-02 18:40:19',
                'updated_at' => '2022-02-02 18:40:19',
            ),
        ));
        
        
    }
}