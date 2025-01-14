<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 1,
                'name' => '{"en":"Hotels","ar":"\\u0627\\u0644\\u0641\\u0646\\u0627\\u062f\\u0642"}',
                'slug' => 'hotels',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'wedding/hotel.jpg',
                'banner' => 'postslider-3-150x150.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 2,
                'status' => 1,
                'seo_title' => '{"ar":"\\u0627\\u0644\\u0641\\u0646\\u0627\\u062f\\u0642","en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 1,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-04-27 15:51:26',
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 1,
                'name' => '{"en":"Wedding Cars","ar":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0632\\u0641\\u0627\\u0641"}',
                'slug' => 'wedding-cars',
                'thumb_alt' => '{"ar":"dsavvsa","en":null}',
                'thumb' => 'cars/wedding-car.jpg',
                'banner' => 'cars/wedding-car1.jpg',
                'banner_alt' => '{"ar":"vdvds","en":null}',
                'category_id' => 3,
                'status' => 1,
                'seo_title' => '{"ar":"Doloribus tempora ad","en":null}',
                'seo_keywords' => '{"ar":"Maiores vero aute od","en":null}',
                'seo_robots' => '{"ar":"Quaerat laborum Nec","en":null}',
                'seo_description' => '{"ar":"Non dolores dolore n","en":null}',
                'facebook_description' => '{"ar":"Quia quo ea at at id","en":null}',
                'facebook_image' => '{"ar":"Voluptate qui vel au"}',
                'twitter_title' => '{"ar":"Eos ut sit officia d","en":null}',
                'twitter_description' => '{"ar":"Voluptas architecto","en":null}',
                'twitter_image' => '{"ar":"Ea in mollit et cons"}',
                'sort_order' => 2,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-04-21 15:41:51',
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 1,
                'name' => '{"en":"Wedding Dresses","ar":"\\u0641\\u0633\\u0627\\u062a\\u064a\\u0646 \\u0632\\u0641\\u0627\\u0641"}',
                'slug' => 'wedding-dresses',
                'thumb_alt' => '{"ar":"\\u0641\\u0633\\u0627\\u062a\\u064a\\u0646 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'thumb' => 'blogs 3.png',
                'banner' => 'blogs 1.png',
                'banner_alt' => '{"ar":"\\u0641\\u0633\\u0627\\u062a\\u064a\\u0646 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'category_id' => 4,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 3,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-04-27 16:19:33',
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 1,
                'name' => '{"en":"Videography","ar":"\\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u0631 \\u0628\\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648"}',
                'slug' => 'videographers',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'single-img-02.jpg',
                'banner' => 'single-img-02.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 5,
                'status' => 0,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 4,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-04-21 17:26:26',
            ),
            4 => 
            array (
                'id' => 8,
                'country_id' => 1,
                'name' => '{"en":"Garden & Clubs","ar":"\\u0627\\u0644\\u062d\\u062f\\u0627\\u0626\\u0642 \\u0648\\u0627\\u0644\\u0646\\u0648\\u0627\\u062f\\u064a"}',
                'slug' => 'garden-clubs',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'wedding/garden1.jpg',
                'banner' => 'wedding/garden.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 2,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 8,
                'created_at' => NULL,
                'updated_at' => '2022-04-27 15:52:56',
            ),
            5 => 
            array (
                'id' => 9,
                'country_id' => 1,
                'name' => '{"en":"Barber Shop","ar":"\\u0635\\u0627\\u0644\\u0648\\u0646 \\u062d\\u0644\\u0627\\u0642\\u0647"}',
                'slug' => 'barber-shops',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'beauty/mensaslon.jpg',
                'banner' => 'beauty/mensaslon1.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 1,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 10,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:30:01',
            ),
            6 => 
            array (
                'id' => 10,
                'country_id' => 1,
                'name' => '{"en":"Restaurants","ar":"\\u0627\\u0644\\u0645\\u0637\\u0627\\u0639\\u0645"}',
                'slug' => 'restaurants',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'thumb_FiFKj3xE9pqhndV0QqpSHGZIQ.jpg',
                'banner' => 'thumb_jykspqafdydsgstljaiozuhac.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 2,
                'status' => 0,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 11,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:30:01',
            ),
            7 => 
            array (
                'id' => 11,
                'country_id' => 1,
                'name' => '{"en":"Wedding Palaces","ar":"\\u0642\\u0635\\u0648\\u0631 \\u0627\\u0644\\u0627\\u0641\\u0631\\u0627\\u062d"}',
                'slug' => 'wedding-palaces',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'wedding/ballroom.jpg',
                'banner' => 'wedding/ballroon.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 2,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 12,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:30:01',
            ),
            8 => 
            array (
                'id' => 12,
                'country_id' => 1,
                'name' => '{"en":"Limousines","ar":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0644\\u064a\\u0645\\u0648\\u0632\\u064a\\u0646"}',
                'slug' => 'limousines',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'car.png',
                'banner' => 'chrysler-limousine-placeholder.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 3,
                'status' => 0,
                'seo_title' => '{"ar":"Recusandae Voluptat","en":null}',
                'seo_keywords' => '{"ar":"Aut ut temporibus co","en":null}',
                'seo_robots' => '{"ar":"Vel ea blanditiis ob","en":null}',
                'seo_description' => '{"ar":"Obcaecati voluptatem","en":null}',
                'facebook_description' => '{"ar":"Expedita omnis dolor","en":null}',
                'facebook_image' => '{"ar":"Reiciendis laudantiu"}',
                'twitter_title' => '{"ar":"Consectetur cupidita","en":null}',
                'twitter_description' => '{"ar":"Vel sit ea quibusda","en":null}',
                'twitter_image' => '{"ar":"Perferendis voluptas"}',
                'sort_order' => 13,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            9 => 
            array (
                'id' => 13,
                'country_id' => 1,
                'name' => '{"en":"Motorcycle","ar":"\\u0645\\u0648\\u062a\\u0633\\u064a\\u0643\\u0644\\u0627\\u062a \\u0632\\u0641\\u0627\\u0641"}',
                'slug' => 'motorcycles',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'cars/wedding-motorcycle.jpg',
                'banner' => 'cars/wedding-motorcycle.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 3,
                'status' => 0,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 14,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            10 => 
            array (
                'id' => 14,
                'country_id' => 1,
                'name' => '{"en":"Men Suit","ar":"\\u0628\\u062f\\u0644 \\u0632\\u0641\\u0627\\u0641"}',
                'slug' => 'men-suits',
                'thumb_alt' => '{"ar":"\\u0628\\u062f\\u0644 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'thumb' => 'bdl-zfaf/مروان-استايل.jpg',
                'banner' => 'bdl-zfaf/مروان-استايل.jpg',
                'banner_alt' => '{"ar":"\\u0628\\u062f\\u0644 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'category_id' => 4,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 15,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            11 => 
            array (
                'id' => 15,
                'country_id' => 1,
                'name' => '{"en":"Beauty Centers","ar":"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u062a\\u062c\\u0645\\u064a\\u0644"}',
                'slug' => 'beauty-centers',
                'thumb_alt' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u062a\\u062c\\u0645\\u064a\\u0644","en":null}',
                'thumb' => 'wedding/spaa.jpg',
                'banner' => 'wedding/spaa.jpg',
                'banner_alt' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u062a\\u062c\\u0645\\u064a\\u0644","en":null}',
                'category_id' => 1,
                'status' => 1,
                'seo_title' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u062a\\u062c\\u0645\\u064a\\u0644","en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u062a\\u062c\\u0645\\u064a\\u0644","en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 16,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            12 => 
            array (
                'id' => 16,
                'country_id' => 1,
                'name' => '{"en":"Hair Dressers","ar":"\\u0645\\u0635\\u0641\\u0641\\u064a \\u0627\\u0644\\u0634\\u0639\\u0631"}',
                'slug' => 'hair-dressers',
                'thumb_alt' => '{"ar":"hair","en":null}',
                'thumb' => 'hair.jpg',
                'banner' => 'hair.jpg',
                'banner_alt' => '{"ar":"hair","en":null}',
                'category_id' => 1,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 17,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            13 => 
            array (
                'id' => 17,
                'country_id' => 1,
                'name' => '{"en":"Djs","ar":"\\u062f\\u064a \\u062c\\u064a"}',
                'slug' => 'djs',
                'thumb_alt' => '{"ar":"\\u062f\\u064a \\u062c\\u064a","en":null}',
                'thumb' => 'wedding/dj.jpg',
                'banner' => 'wedding/dj.jpg',
                'banner_alt' => '{"ar":"\\u062f\\u064a \\u062c\\u064a","en":null}',
                'category_id' => 5,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 18,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            14 => 
            array (
                'id' => 18,
                'country_id' => 1,
                'name' => '{"en":"Photographers","ar":"\\u0627\\u0644\\u0645\\u0635\\u0648\\u0631\\u064a\\u0646"}',
                'slug' => 'photographers',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'photographers/photographer2.png',
                'banner' => 'photographers/photographer1.png',
                'banner_alt' => '{"en":null}',
                'category_id' => 5,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 19,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            15 => 
            array (
                'id' => 19,
                'country_id' => 1,
                'name' => '{"en":"Wedding Cards","ar":"\\u0628\\u0637\\u0627\\u0642\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641"}',
                'slug' => 'wedding-cards',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'wedding planner/cards.jpg',
                'banner' => 'wedding planner/cards1.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 7,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 20,
                'created_at' => NULL,
                'updated_at' => '2022-05-12 19:29:10',
            ),
            16 => 
            array (
                'id' => 20,
                'country_id' => 1,
                'name' => '{"ar":"\\u0634\\u0647\\u0631 \\u0627\\u0644\\u0639\\u0633\\u0644","en":"Honey Moons"}',
                'slug' => 'honey-moons',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'thumb_KbeA1XIis1gRu9WkBAFY7V7D9.jpg',
                'banner' => 'thumb_CwuwVNtgROMmRnxxiQXO6ncl6.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 7,
                'status' => 0,
                'seo_title' => '{"ar":"A cillum distinctio","en":null}',
                'seo_keywords' => '{"ar":"Corrupti placeat a","en":null}',
                'seo_robots' => '{"ar":"Ullamco incidunt vo","en":null}',
                'seo_description' => '{"ar":"Necessitatibus volup","en":null}',
                'facebook_description' => '{"ar":"Reprehenderit cupidi","en":null}',
                'facebook_image' => '{"ar":"Facere alias dolore"}',
                'twitter_title' => '{"ar":"Sed elit recusandae","en":null}',
                'twitter_description' => '{"ar":"Esse qui sed conseq","en":null}',
                'twitter_image' => '{"ar":"Itaque repellendus"}',
                'sort_order' => 21,
                'created_at' => '2021-11-09 11:20:22',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            17 => 
            array (
                'id' => 21,
                'country_id' => 1,
                'name' => '{"ar":"\\u0632\\u0647\\u0648\\u0631 \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641","en":"Wedding Flowers"}',
                'slug' => 'wedding-flowers',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'wedding planner/flowers1.jpeg',
                'banner' => 'wedding planner/flowers.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 7,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 22,
                'created_at' => '2021-11-15 21:24:46',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            18 => 
            array (
                'id' => 22,
                'country_id' => 1,
                'name' => '{"ar":"\\u0645\\u062e\\u0637\\u0637\\u064a \\u062d\\u0641\\u0644\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641","en":"Wedding Planners"}',
                'slug' => 'wedding-planners',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'wedding planner/planner.jpg',
                'banner' => 'wedding/garden.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 7,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 23,
                'created_at' => '2021-11-15 21:25:48',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            19 => 
            array (
                'id' => 23,
                'country_id' => 1,
                'name' => '{"en":"Open Buffets","ar":"\\u0628\\u0648\\u0641\\u064a\\u0647 \\u0645\\u0641\\u062a\\u0648\\u062d"}',
                'slug' => 'open-buffets',
                'thumb_alt' => '{"ar":"\\u0628\\u0648\\u0641\\u064a\\u0647 \\u0645\\u0641\\u062a\\u0648\\u062d","en":null}',
                'thumb' => 'food/openbuffet.jpg',
                'banner' => 'food/openbuffet1.jpg',
                'banner_alt' => '{"ar":"\\u0628\\u0648\\u0641\\u064a\\u0647 \\u0645\\u0641\\u062a\\u0648\\u062d","en":null}',
                'category_id' => 6,
                'status' => 1,
                'seo_title' => '{"ar":"\\u0628\\u0648\\u0641\\u064a\\u0647 \\u0645\\u0641\\u062a\\u0648\\u062d","en":null}',
                'seo_keywords' => '{"ar":"\\u0637\\u0639\\u0627\\u0645,\\u0627\\u0644\\u0645\\u0637\\u0627\\u0639\\u0645,\\u0627\\u0641\\u0631\\u0627\\u062d","en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"ar":"\\u0646\\u0642\\u062f\\u0645 \\u062a\\u0634\\u0643\\u064a\\u0644\\u0629 \\u0648\\u0627\\u0633\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0634\\u0647\\u0649 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062f\\u062c\\u0627\\u062c \\u0648\\u0627\\u0644\\u0644\\u062d\\u0648\\u0645 \\u0648\\u0627\\u0644\\u0645\\u0623\\u0643\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0628\\u062d\\u0631\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0637\\u0628\\u0648\\u062e\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0642\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629 \\u0648\\u0646\\u0630\\u0643\\u0631 \\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u062f\\u062c\\u0627\\u062c \\u0627\\u0644\\u0645\\u062c\\u0647\\u0632\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0641\\u062d\\u0645 \\u0645\\u0639 \\u0627\\u0644\\u0627\\u0631\\u0632 \\u0648\\u0627\\u0644\\u062e\\u0636\\u0627\\u0631\\u060c \\u0645\\u0636\\u063a\\u0648\\u0637 \\u0644\\u062d\\u0645 \\u0627\\u0644\\u063a\\u0646\\u0645\\u060c \\u0633\\u062e\\u0627\\u0646\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u062d\\u0627\\u0634\\u064a \\u0648\\u0627\\u0644\\u0644\\u062d\\u0648\\u0645 \\u0648\\u0627\\u0644\\u062f\\u062c\\u0627\\u062c\\u060c \\u0627\\u0644\\u0645\\u0623\\u0643\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0628\\u062d\\u0631\\u064a\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0631\\u0648\\u0628\\u064a\\u0627\\u0646 \\u0648\\u0627\\u0644\\u062c\\u0645\\u0628\\u0631\\u064a \\u0648\\u0627\\u0644\\u0633\\u0644\\u0645\\u0648\\u0646\\u060c \\u0648\\u062c\\u0628\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u062f\\u064a \\u0648\\u0627\\u0644\\u0630 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0648\\u064a \\u0627\\u0644\\u0645\\u0634\\u0643\\u0644\\u0629 .","en":null}',
                'facebook_description' => '{"ar":"\\u0646\\u0642\\u062f\\u0645 \\u062a\\u0634\\u0643\\u064a\\u0644\\u0629 \\u0648\\u0627\\u0633\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0634\\u0647\\u0649 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062f\\u062c\\u0627\\u062c \\u0648\\u0627\\u0644\\u0644\\u062d\\u0648\\u0645 \\u0648\\u0627\\u0644\\u0645\\u0623\\u0643\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0628\\u062d\\u0631\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0637\\u0628\\u0648\\u062e\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0642\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629 \\u0648\\u0646\\u0630\\u0643\\u0631 \\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u062f\\u062c\\u0627\\u062c \\u0627\\u0644\\u0645\\u062c\\u0647\\u0632\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0641\\u062d\\u0645 \\u0645\\u0639 \\u0627\\u0644\\u0627\\u0631\\u0632 \\u0648\\u0627\\u0644\\u062e\\u0636\\u0627\\u0631\\u060c \\u0645\\u0636\\u063a\\u0648\\u0637 \\u0644\\u062d\\u0645 \\u0627\\u0644\\u063a\\u0646\\u0645\\u060c \\u0633\\u062e\\u0627\\u0646\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u062d\\u0627\\u0634\\u064a \\u0648\\u0627\\u0644\\u0644\\u062d\\u0648\\u0645 \\u0648\\u0627\\u0644\\u062f\\u062c\\u0627\\u062c\\u060c \\u0627\\u0644\\u0645\\u0623\\u0643\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0628\\u062d\\u0631\\u064a\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0631\\u0648\\u0628\\u064a\\u0627\\u0646 \\u0648\\u0627\\u0644\\u062c\\u0645\\u0628\\u0631\\u064a \\u0648\\u0627\\u0644\\u0633\\u0644\\u0645\\u0648\\u0646\\u060c \\u0648\\u062c\\u0628\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u062f\\u064a \\u0648\\u0627\\u0644\\u0630 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0648\\u064a \\u0627\\u0644\\u0645\\u0634\\u0643\\u0644\\u0629 .","en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0628\\u0648\\u0641\\u064a\\u0647 \\u0645\\u0641\\u062a\\u0648\\u062d","en":null}',
                'twitter_description' => '{"ar":"\\u0646\\u0642\\u062f\\u0645 \\u062a\\u0634\\u0643\\u064a\\u0644\\u0629 \\u0648\\u0627\\u0633\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0634\\u0647\\u0649 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062f\\u062c\\u0627\\u062c \\u0648\\u0627\\u0644\\u0644\\u062d\\u0648\\u0645 \\u0648\\u0627\\u0644\\u0645\\u0623\\u0643\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0628\\u062d\\u0631\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0637\\u0628\\u0648\\u062e\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0642\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629 \\u0648\\u0646\\u0630\\u0643\\u0631 \\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u062f\\u062c\\u0627\\u062c \\u0627\\u0644\\u0645\\u062c\\u0647\\u0632\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0641\\u062d\\u0645 \\u0645\\u0639 \\u0627\\u0644\\u0627\\u0631\\u0632 \\u0648\\u0627\\u0644\\u062e\\u0636\\u0627\\u0631\\u060c \\u0645\\u0636\\u063a\\u0648\\u0637 \\u0644\\u062d\\u0645 \\u0627\\u0644\\u063a\\u0646\\u0645\\u060c \\u0633\\u062e\\u0627\\u0646\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u062d\\u0627\\u0634\\u064a \\u0648\\u0627\\u0644\\u0644\\u062d\\u0648\\u0645 \\u0648\\u0627\\u0644\\u062f\\u062c\\u0627\\u062c\\u060c \\u0627\\u0644\\u0645\\u0623\\u0643\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0628\\u062d\\u0631\\u064a\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0631\\u0648\\u0628\\u064a\\u0627\\u0646 \\u0648\\u0627\\u0644\\u062c\\u0645\\u0628\\u0631\\u064a \\u0648\\u0627\\u0644\\u0633\\u0644\\u0645\\u0648\\u0646\\u060c \\u0648\\u062c\\u0628\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u062f\\u064a \\u0648\\u0627\\u0644\\u0630 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0648\\u064a \\u0627\\u0644\\u0645\\u0634\\u0643\\u0644\\u0629 .","en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 24,
                'created_at' => '2021-11-15 21:26:37',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            20 => 
            array (
                'id' => 24,
                'country_id' => 1,
                'name' => '{"ar":"\\u0643\\u064a\\u0643\\u0647 \\u0632\\u0641\\u0627\\u0641","en":"Wedding Cakes"}',
                'slug' => 'wedding-cakes',
                'thumb_alt' => '{"ar":"\\u0643\\u064a\\u0643\\u0647 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'thumb' => 'weddingcakes1.jpg',
                'banner' => 'weddingcakes1.jpg',
                'banner_alt' => '{"ar":"\\u0643\\u064a\\u0643\\u0647 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'category_id' => 6,
                'status' => 1,
                'seo_title' => '{"ar":"\\u0643\\u064a\\u0643\\u0647 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0643\\u064a\\u0643\\u0647 \\u0632\\u0641\\u0627\\u0641","en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 25,
                'created_at' => '2021-11-15 21:28:07',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            21 => 
            array (
                'id' => 25,
                'country_id' => 1,
                'name' => '{"en":"Rings Jewelleries","ar":"\\u062e\\u0648\\u0627\\u062a\\u0645 \\u0632\\u0641\\u0627\\u0641"}',
                'slug' => 'rings-jewelleries',
                'thumb_alt' => '{"en":null}',
                'thumb' => 'rings/Atta6.jpg',
                'banner' => 'rings/slider-image4.jpg',
                'banner_alt' => '{"en":null}',
                'category_id' => 4,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 26,
                'created_at' => '2021-11-15 21:29:49',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            22 => 
            array (
                'id' => 26,
                'country_id' => 1,
                'name' => '{"ar":"\\u0627\\u0644\\u0645\\u0631\\u0627\\u0643\\u0628"}',
                'slug' => 'boats',
                'thumb_alt' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0628","en":null}',
                'thumb' => 'wedding/boats.jpg',
                'banner' => 'wedding/boats.jpg',
                'banner_alt' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0628","en":null}',
                'category_id' => 2,
                'status' => 1,
                'seo_title' => '{"ar":"\\u0627\\u0644\\u0645\\u0631\\u0627\\u0643\\u0628","en":null}',
                'seo_keywords' => '{"ar":"\\u0627\\u0644\\u0645\\u0631\\u0627\\u0643\\u0628\\u060c\\u0645\\u0631\\u0627\\u0643\\u0628 \\u0644\\u062d\\u0641\\u0644\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641\\u060c\\u0628\\u0648\\u0627\\u062e\\u0631 \\u0646\\u064a\\u0644\\u064a\\u0629 \\u0644\\u062d\\u0641\\u0644\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0628 \\u0646\\u064a\\u0644\\u064a\\u0629 \\u0631\\u0627\\u0626\\u0639\\u0629 \\u0644\\u062d\\u0641\\u0644\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641 \\u0648\\u0627\\u0644\\u062e\\u0637\\u0648\\u0628\\u0629","en":null}',
                'facebook_description' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0628 \\u0646\\u064a\\u0644\\u064a\\u0629 \\u0631\\u0627\\u0626\\u0639\\u0629 \\u0644\\u062d\\u0641\\u0644\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641 \\u0648\\u0627\\u0644\\u062e\\u0637\\u0648\\u0628\\u0629","en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0628","en":null}',
                'twitter_description' => '{"ar":"\\u0645\\u0631\\u0627\\u0643\\u0628 \\u0646\\u064a\\u0644\\u064a\\u0629 \\u0631\\u0627\\u0626\\u0639\\u0629 \\u0644\\u062d\\u0641\\u0644\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641 \\u0648\\u0627\\u0644\\u062e\\u0637\\u0648\\u0628\\u0629","en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 27,
                'created_at' => '2022-04-07 20:35:45',
                'updated_at' => '2022-05-12 19:29:10',
            ),
            23 => 
            array (
                'id' => 27,
                'country_id' => 1,
                'name' => '{"ar":"\\u062e\\u0628\\u0631\\u0627\\u0621 \\u0627\\u0644\\u062a\\u062c\\u0645\\u064a\\u0644","en":"Makeup Artists"}',
                'slug' => 'makeup-artists',
                'thumb_alt' => '{"ar":"\\u062e\\u0628\\u0631\\u0627\\u0621 \\u0627\\u0644\\u062a\\u062c\\u0645\\u064a\\u0644","en":null}',
                'thumb' => 'wedding/makeupartist.jpg',
                'banner' => 'wedding/makeupartist.jpg',
                'banner_alt' => '{"ar":"\\u062e\\u0628\\u0631\\u0627\\u0621 \\u0627\\u0644\\u062a\\u062c\\u0645\\u064a\\u0644","en":null}',
                'category_id' => 1,
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'sort_order' => 9,
                'created_at' => '2022-04-18 09:08:02',
                'updated_at' => '2022-05-12 19:30:01',
            ),
        ));
        
        
    }
}