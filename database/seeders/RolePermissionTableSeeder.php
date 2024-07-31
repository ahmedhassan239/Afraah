<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permission')->delete();
        
        \DB::table('role_permission')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'viewNova',
                'created_at' => '2021-11-07 21:18:13',
                'updated_at' => '2021-11-07 21:18:13',
            ),
            1 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'assignRoles',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            2 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'canBeGivenAccess',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            3 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-BarberShop',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            4 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-BeautyCenter',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            5 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Blog',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            6 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Boat',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            7 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Car',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            8 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Category',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            9 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-City',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            10 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Country',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            11 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Dj',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            12 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Garden&Clubs',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            13 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-GlobalSeo',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            14 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-HairDresser',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            15 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-HoneyMoon',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            16 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Hotel',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            17 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Limousine',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            18 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-MakeupArtist',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            19 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-MenSuit',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            20 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Motorcycle',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            21 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-OpenBuffet',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            22 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Photographer',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            23 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Restaurant',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            24 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-RingsJewellery',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            25 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Service',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            26 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Slider',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            27 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Videography',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            28 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-Wedding-Palaces',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            29 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-WeddingCake',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            30 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-WeddingCard',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            31 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-WeddingDress',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            32 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-WeddingFlower',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            33 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'Manage-WeddingPlanner',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            34 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'manageRoles',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            35 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'manageUsers',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            36 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-BarberShop',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            37 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-BeautyCenter',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            38 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Blog',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            39 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Boat',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            40 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Car',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            41 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Category',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            42 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-City',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            43 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Country',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            44 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Dj',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            45 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Garden&Clubs',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            46 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-GlobalSeo',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            47 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-HairDresser',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            48 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-HoneyMoon',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            49 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Hotel',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            50 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Limousine',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            51 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-MakeupArtist',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            52 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-MenSuit',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            53 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Motorcycle',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            54 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-OpenBuffet',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            55 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Photographer',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            56 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Restaurant',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            57 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-RingsJewellery',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            58 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Service',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            59 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Slider',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            60 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Videography',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            61 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-Wedding-Palaces',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            62 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-WeddingCake',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            63 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-WeddingCard',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            64 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-WeddingDress',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            65 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-WeddingFlower',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            66 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'View-WeddingPlanner',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            67 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'viewNova',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            68 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'viewRoles',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            69 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'viewUsers',
                'created_at' => '2022-04-27 16:41:32',
                'updated_at' => '2022-04-27 16:41:32',
            ),
            70 => 
            array (
                'role_id' => 3,
                'permission_slug' => 'Manage-Hotel',
                'created_at' => '2021-10-28 12:05:45',
                'updated_at' => '2021-10-28 12:05:45',
            ),
            71 => 
            array (
                'role_id' => 3,
                'permission_slug' => 'manageUsers',
                'created_at' => '2021-10-28 12:05:45',
                'updated_at' => '2021-10-28 12:05:45',
            ),
            72 => 
            array (
                'role_id' => 3,
                'permission_slug' => 'View-Hotel',
                'created_at' => '2021-10-28 12:05:45',
                'updated_at' => '2021-10-28 12:05:45',
            ),
            73 => 
            array (
                'role_id' => 3,
                'permission_slug' => 'viewUsers',
                'created_at' => '2021-10-28 12:05:45',
                'updated_at' => '2021-10-28 12:05:45',
            ),
            74 => 
            array (
                'role_id' => 4,
                'permission_slug' => 'Manage-Restaurant',
                'created_at' => '2021-10-26 13:41:57',
                'updated_at' => '2021-10-26 13:41:57',
            ),
            75 => 
            array (
                'role_id' => 4,
                'permission_slug' => 'View-Restaurant',
                'created_at' => '2021-10-26 13:41:57',
                'updated_at' => '2021-10-26 13:41:57',
            ),
            76 => 
            array (
                'role_id' => 5,
                'permission_slug' => 'Manage-Wedding-Palaces',
                'created_at' => '2021-10-26 13:43:07',
                'updated_at' => '2021-10-26 13:43:07',
            ),
            77 => 
            array (
                'role_id' => 5,
                'permission_slug' => 'View-Wedding-Palaces',
                'created_at' => '2021-10-26 13:43:07',
                'updated_at' => '2021-10-26 13:43:07',
            ),
            78 => 
            array (
                'role_id' => 6,
                'permission_slug' => 'Manage-Garden&Clubs',
                'created_at' => '2021-10-26 13:44:23',
                'updated_at' => '2021-10-26 13:44:23',
            ),
            79 => 
            array (
                'role_id' => 6,
                'permission_slug' => 'View-Garden&Clubs',
                'created_at' => '2021-10-26 13:44:23',
                'updated_at' => '2021-10-26 13:44:23',
            ),
            80 => 
            array (
                'role_id' => 7,
                'permission_slug' => 'Manage-WeddingCard',
                'created_at' => '2021-10-26 13:46:22',
                'updated_at' => '2021-10-26 13:46:22',
            ),
            81 => 
            array (
                'role_id' => 7,
                'permission_slug' => 'View-WeddingCard',
                'created_at' => '2021-10-26 13:46:22',
                'updated_at' => '2021-10-26 13:46:22',
            ),
            82 => 
            array (
                'role_id' => 8,
                'permission_slug' => 'Manage-Videography',
                'created_at' => '2021-10-26 13:56:59',
                'updated_at' => '2021-10-26 13:56:59',
            ),
            83 => 
            array (
                'role_id' => 8,
                'permission_slug' => 'View-Videography',
                'created_at' => '2021-10-26 13:56:59',
                'updated_at' => '2021-10-26 13:56:59',
            ),
            84 => 
            array (
                'role_id' => 9,
                'permission_slug' => 'Manage-Photographer',
                'created_at' => '2021-10-26 13:57:24',
                'updated_at' => '2021-10-26 13:57:24',
            ),
            85 => 
            array (
                'role_id' => 9,
                'permission_slug' => 'View-Photographer',
                'created_at' => '2021-10-26 13:57:24',
                'updated_at' => '2021-10-26 13:57:24',
            ),
            86 => 
            array (
                'role_id' => 10,
                'permission_slug' => 'Manage-Dj',
                'created_at' => '2021-10-26 14:00:25',
                'updated_at' => '2021-10-26 14:00:25',
            ),
            87 => 
            array (
                'role_id' => 10,
                'permission_slug' => 'View-Dj',
                'created_at' => '2021-10-26 14:00:25',
                'updated_at' => '2021-10-26 14:00:25',
            ),
            88 => 
            array (
                'role_id' => 11,
                'permission_slug' => 'Manage-HairDresser',
                'created_at' => '2021-10-26 14:00:44',
                'updated_at' => '2021-10-26 14:00:44',
            ),
            89 => 
            array (
                'role_id' => 11,
                'permission_slug' => 'View-HairDresser',
                'created_at' => '2021-10-26 14:00:44',
                'updated_at' => '2021-10-26 14:00:44',
            ),
            90 => 
            array (
                'role_id' => 12,
                'permission_slug' => 'Manage-BeautyCenter',
                'created_at' => '2021-10-26 14:19:15',
                'updated_at' => '2021-10-26 14:19:15',
            ),
            91 => 
            array (
                'role_id' => 12,
                'permission_slug' => 'View-BeautyCenter',
                'created_at' => '2021-10-26 14:19:15',
                'updated_at' => '2021-10-26 14:19:15',
            ),
            92 => 
            array (
                'role_id' => 13,
                'permission_slug' => 'Manage-BarberShop',
                'created_at' => '2021-10-26 14:21:43',
                'updated_at' => '2021-10-26 14:21:43',
            ),
            93 => 
            array (
                'role_id' => 13,
                'permission_slug' => 'View-BarberShop',
                'created_at' => '2021-10-26 14:21:43',
                'updated_at' => '2021-10-26 14:21:43',
            ),
            94 => 
            array (
                'role_id' => 14,
                'permission_slug' => 'Manage-WeddingDress',
                'created_at' => '2021-10-26 14:22:19',
                'updated_at' => '2021-10-26 14:22:19',
            ),
            95 => 
            array (
                'role_id' => 14,
                'permission_slug' => 'View-WeddingDress',
                'created_at' => '2021-10-26 14:22:19',
                'updated_at' => '2021-10-26 14:22:19',
            ),
            96 => 
            array (
                'role_id' => 15,
                'permission_slug' => 'Manage-MenSuit',
                'created_at' => '2021-10-26 14:23:24',
                'updated_at' => '2021-10-26 14:23:24',
            ),
            97 => 
            array (
                'role_id' => 15,
                'permission_slug' => 'View-MenSuit',
                'created_at' => '2021-10-26 14:23:24',
                'updated_at' => '2021-10-26 14:23:24',
            ),
            98 => 
            array (
                'role_id' => 16,
                'permission_slug' => 'Manage-Car',
                'created_at' => '2021-11-02 16:08:22',
                'updated_at' => '2021-11-02 16:08:22',
            ),
            99 => 
            array (
                'role_id' => 16,
                'permission_slug' => 'manageUsers',
                'created_at' => '2021-11-02 16:08:22',
                'updated_at' => '2021-11-02 16:08:22',
            ),
            100 => 
            array (
                'role_id' => 16,
                'permission_slug' => 'View-Car',
                'created_at' => '2021-11-02 16:08:22',
                'updated_at' => '2021-11-02 16:08:22',
            ),
            101 => 
            array (
                'role_id' => 16,
                'permission_slug' => 'viewUsers',
                'created_at' => '2021-11-02 16:08:22',
                'updated_at' => '2021-11-02 16:08:22',
            ),
            102 => 
            array (
                'role_id' => 17,
                'permission_slug' => 'Manage-Limousine',
                'created_at' => '2021-10-26 14:29:06',
                'updated_at' => '2021-10-26 14:29:06',
            ),
            103 => 
            array (
                'role_id' => 17,
                'permission_slug' => 'View-Limousine',
                'created_at' => '2021-10-26 14:29:06',
                'updated_at' => '2021-10-26 14:29:06',
            ),
            104 => 
            array (
                'role_id' => 18,
                'permission_slug' => 'Manage-Motorcycle',
                'created_at' => '2021-10-26 14:29:25',
                'updated_at' => '2021-10-26 14:29:25',
            ),
            105 => 
            array (
                'role_id' => 18,
                'permission_slug' => 'View-Motorcycle',
                'created_at' => '2021-10-26 14:29:25',
                'updated_at' => '2021-10-26 14:29:25',
            ),
            106 => 
            array (
                'role_id' => 19,
                'permission_slug' => 'Manage-City',
                'created_at' => '2021-10-26 14:33:27',
                'updated_at' => '2021-10-26 14:33:27',
            ),
            107 => 
            array (
                'role_id' => 19,
                'permission_slug' => 'View-City',
                'created_at' => '2021-10-26 14:33:27',
                'updated_at' => '2021-10-26 14:33:27',
            ),
            108 => 
            array (
                'role_id' => 20,
                'permission_slug' => 'Manage-Country',
                'created_at' => '2021-10-26 14:33:14',
                'updated_at' => '2021-10-26 14:33:14',
            ),
            109 => 
            array (
                'role_id' => 20,
                'permission_slug' => 'View-Country',
                'created_at' => '2021-10-26 14:33:14',
                'updated_at' => '2021-10-26 14:33:14',
            ),
            110 => 
            array (
                'role_id' => 21,
                'permission_slug' => 'Manage-Category',
                'created_at' => '2021-10-26 14:33:01',
                'updated_at' => '2021-10-26 14:33:01',
            ),
            111 => 
            array (
                'role_id' => 21,
                'permission_slug' => 'View-Category',
                'created_at' => '2021-10-26 14:33:01',
                'updated_at' => '2021-10-26 14:33:01',
            ),
            112 => 
            array (
                'role_id' => 22,
                'permission_slug' => 'Manage-Service',
                'created_at' => '2021-10-26 14:34:33',
                'updated_at' => '2021-10-26 14:34:33',
            ),
            113 => 
            array (
                'role_id' => 22,
                'permission_slug' => 'View-Service',
                'created_at' => '2021-10-26 14:34:33',
                'updated_at' => '2021-10-26 14:34:33',
            ),
            114 => 
            array (
                'role_id' => 23,
                'permission_slug' => 'Manage-HoneyMoon',
                'created_at' => '2021-11-14 09:21:55',
                'updated_at' => '2021-11-14 09:21:55',
            ),
            115 => 
            array (
                'role_id' => 23,
                'permission_slug' => 'View-HoneyMoon',
                'created_at' => '2021-11-14 09:21:55',
                'updated_at' => '2021-11-14 09:21:55',
            ),
            116 => 
            array (
                'role_id' => 24,
                'permission_slug' => 'Manage-WeddingFlower',
                'created_at' => '2021-11-14 09:22:57',
                'updated_at' => '2021-11-14 09:22:57',
            ),
            117 => 
            array (
                'role_id' => 24,
                'permission_slug' => 'View-WeddingFlower',
                'created_at' => '2021-11-14 09:22:57',
                'updated_at' => '2021-11-14 09:22:57',
            ),
            118 => 
            array (
                'role_id' => 25,
                'permission_slug' => 'Manage-WeddingPlanner',
                'created_at' => '2021-11-14 09:24:05',
                'updated_at' => '2021-11-14 09:24:05',
            ),
            119 => 
            array (
                'role_id' => 25,
                'permission_slug' => 'View-WeddingPlanner',
                'created_at' => '2021-11-14 09:24:05',
                'updated_at' => '2021-11-14 09:24:05',
            ),
            120 => 
            array (
                'role_id' => 26,
                'permission_slug' => 'Manage-OpenBuffet',
                'created_at' => '2021-11-14 09:24:47',
                'updated_at' => '2021-11-14 09:24:47',
            ),
            121 => 
            array (
                'role_id' => 26,
                'permission_slug' => 'View-OpenBuffet',
                'created_at' => '2021-11-14 09:24:47',
                'updated_at' => '2021-11-14 09:24:47',
            ),
            122 => 
            array (
                'role_id' => 27,
                'permission_slug' => 'Manage-WeddingCake',
                'created_at' => '2021-11-14 09:25:19',
                'updated_at' => '2021-11-14 09:25:19',
            ),
            123 => 
            array (
                'role_id' => 27,
                'permission_slug' => 'View-WeddingCake',
                'created_at' => '2021-11-14 09:25:19',
                'updated_at' => '2021-11-14 09:25:19',
            ),
            124 => 
            array (
                'role_id' => 28,
                'permission_slug' => 'Manage-RingsJewellery',
                'created_at' => '2021-11-14 09:29:04',
                'updated_at' => '2021-11-14 09:29:04',
            ),
            125 => 
            array (
                'role_id' => 28,
                'permission_slug' => 'View-RingsJewellery',
                'created_at' => '2021-11-14 09:29:04',
                'updated_at' => '2021-11-14 09:29:04',
            ),
            126 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-BarberShop',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            127 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-BeautyCenter',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            128 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Blog',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            129 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Boat',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            130 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Car',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            131 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Category',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            132 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-City',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            133 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Country',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            134 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Dj',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            135 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Garden&Clubs',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            136 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-GlobalSeo',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            137 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-HairDresser',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            138 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-HoneyMoon',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            139 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Hotel',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            140 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Limousine',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            141 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-MakeupArtist',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            142 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-MenSuit',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            143 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Motorcycle',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            144 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-OpenBuffet',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            145 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Photographer',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            146 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Restaurant',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            147 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-RingsJewellery',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            148 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Service',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            149 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Slider',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            150 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Videography',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            151 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-Wedding-Palaces',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            152 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-WeddingCake',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            153 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-WeddingCard',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            154 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-WeddingDress',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            155 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-WeddingFlower',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            156 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'Manage-WeddingPlanner',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            157 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-BarberShop',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            158 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-BeautyCenter',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            159 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Blog',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            160 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Boat',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            161 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Car',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            162 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Category',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            163 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-City',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            164 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Country',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            165 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Dj',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            166 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Garden&Clubs',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            167 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-GlobalSeo',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            168 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-HairDresser',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            169 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-HoneyMoon',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            170 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Hotel',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            171 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Limousine',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            172 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-MakeupArtist',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            173 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-MenSuit',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            174 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Motorcycle',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            175 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-OpenBuffet',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            176 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Photographer',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            177 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Restaurant',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            178 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-RingsJewellery',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            179 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Service',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            180 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Slider',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            181 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Videography',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            182 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-Wedding-Palaces',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            183 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-WeddingCake',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            184 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-WeddingCard',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            185 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-WeddingDress',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            186 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-WeddingFlower',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            187 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'View-WeddingPlanner',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            188 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'viewNova',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
            189 => 
            array (
                'role_id' => 29,
                'permission_slug' => 'viewUsers',
                'created_at' => '2022-05-12 18:03:37',
                'updated_at' => '2022-05-12 18:03:37',
            ),
        ));
        
        
    }
}