<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 1,
                'name' => '{"en":"Health & Beauty","ar":"\\u0627\\u0644\\u0635\\u062d\\u0629 \\u0648\\u0627\\u0644\\u062c\\u0645\\u0627\\u0644"}',
                'slug' => '{"ar":"health-beauty","en":null}',
                'description' => '{"en":null}',
                'banner_alt' => '{"ar":"\\u0627\\u0644\\u0635\\u062d\\u0629 \\u0648\\u0627\\u0644\\u062c\\u0645\\u0627\\u0644","en":null}',
                'banner' => 'beauty1.jpg',
                'thumb_alt' => '{"ar":"\\u0627\\u0644\\u0635\\u062d\\u0629 \\u0648\\u0627\\u0644\\u062c\\u0645\\u0627\\u0644","en":null}',
                'thumb' => '{"en":"slider-mainbg-02.jpg","ar":"Ramez Hosny Beauty Salon4.jpg"}',
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'facebook_image' => '{"ar":null}',
                'sort_order' => 2,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-05-12 19:13:27',
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 1,
                'name' => '{"en":"Wedding Halls","ar":"\\u0642\\u0627\\u0639\\u0627\\u062a \\u0627\\u0644\\u0623\\u0641\\u0631\\u0627\\u062d"}',
                'slug' => '{"ar":"wedding-halls","en":null}',
                'description' => '{"en":null}',
                'banner_alt' => '{"ar":"wedding","en":null}',
                'banner' => 'wedding/ballroon.jpg',
                'thumb_alt' => '{"ar":"wedding","en":null}',
                'thumb' => '{"en":"postslider-1.jpg","ar":"wedding-palace\\/weddingplace.jpg"}',
                'status' => 1,
                'seo_title' => '{"ar":"Molestias veniam et","en":null}',
                'seo_keywords' => '{"ar":"Possimus vitae comm","en":null}',
                'seo_robots' => '{"ar":"Dolor corporis possi","en":null}',
                'seo_description' => '{"ar":"Ad amet labore reru","en":null}',
                'facebook_description' => '{"ar":"Reiciendis nisi minu","en":null}',
                'twitter_title' => '{"ar":"Repudiandae exceptur","en":null}',
                'twitter_description' => '{"ar":"Impedit dicta porro","en":null}',
                'twitter_image' => '{"ar":"Omnis earum in qui t"}',
                'facebook_image' => '{"ar":"Vel non nihil volupt"}',
                'sort_order' => 3,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-05-12 19:13:27',
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 1,
                'name' => '{"en":"Car Rental","ar":"\\u062a\\u0623\\u062c\\u064a\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0629"}',
                'slug' => '{"ar":"car-rental","en":null}',
                'description' => '{"ar":"<p>\\u0627\\u064a\\u062c\\u0627\\u0631 \\u0627\\u062d\\u062f\\u062b \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641<\\/p>","en":null}',
                'banner_alt' => '{"ar":"\\u062a\\u0623\\u062c\\u064a\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0629","en":null}',
                'banner' => 'cars/wedding-car.jpg',
                'thumb_alt' => '{"ar":"\\u062a\\u0623\\u062c\\u064a\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0629","en":null}',
                'thumb' => '{"en":"car.png","ar":"cars\\/\\u062a\\u0627\\u062c\\u064a\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0629 copy.jpg"}',
                'status' => 1,
                'seo_title' => '{"ar":"\\u062a\\u0623\\u062c\\u064a\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0629","en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"ar":"\\u0627\\u064a\\u062c\\u0627\\u0631 \\u0627\\u062d\\u062f\\u062b \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'facebook_description' => '{"ar":"\\u0627\\u064a\\u062c\\u0627\\u0631 \\u0627\\u062d\\u062f\\u062b \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'twitter_title' => '{"ar":"\\u062a\\u0623\\u062c\\u064a\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0629","en":null}',
                'twitter_description' => '{"ar":"\\u0627\\u064a\\u062c\\u0627\\u0631 \\u0627\\u062d\\u062f\\u062b \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'twitter_image' => '{"ar":null}',
                'facebook_image' => '{"ar":null}',
                'sort_order' => 7,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-05-12 18:59:04',
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 1,
                'name' => '{"en":"Fashion & Jewelleries","ar":"\\u0623\\u0632\\u064a\\u0627\\u0621 \\u0648 \\u062d\\u0644\\u064a"}',
                'slug' => '{"ar":"fashion-jewelleries","en":null}',
                'description' => '{"en":null}',
                'banner_alt' => '{"en":null}',
                'banner' => 'wedding/pagetitle-bg.jpg',
                'thumb_alt' => '{"en":null}',
                'thumb' => '{"en":"single-img-08.jpg","ar":"dresses\\/wedding.jpg"}',
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'facebook_image' => '{"ar":null}',
                'sort_order' => 1,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-05-12 19:13:27',
            ),
            4 => 
            array (
                'id' => 5,
                'country_id' => 1,
                'name' => '{"en":"Media","ar":"\\u0645\\u064a\\u062f\\u064a\\u0627"}',
                'slug' => '{"ar":"media","en":null}',
                'description' => '{"ar":"<p>\\u0627\\u0641\\u0636\\u0644 \\u062e\\u0628\\u0631\\u0627\\u0621 \\u062a\\u0635\\u0648\\u064a\\u0631 \\u0627\\u0641\\u0631\\u0627\\u062d \\u0645\\u0635\\u0631 \\u0647\\u0646\\u0627<\\/p>","en":null}',
                'banner_alt' => '{"ar":"photographer","en":null}',
                'banner' => 'photographers/photographer1.png',
                'thumb_alt' => '{"ar":"photographer","en":null}',
                'thumb' => '{"en":"slider-mainbg-03.jpg","ar":"wedding\\/media.jpg"}',
                'status' => 1,
                'seo_title' => '{"ar":"\\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u0631 \\u0627\\u0644\\u0641\\u0648\\u062a\\u0648\\u063a\\u0631\\u0627\\u0641\\u064a \\u0648\\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648","en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"ar":"\\u0627\\u0641\\u0636\\u0644 \\u062e\\u0628\\u0631\\u0627\\u0621 \\u062a\\u0635\\u0648\\u064a\\u0631 \\u0627\\u0641\\u0631\\u0627\\u062d \\u0645\\u0635\\u0631 \\u0647\\u0646\\u0627","en":null}',
                'facebook_description' => '{"ar":"\\u0627\\u0641\\u0636\\u0644 \\u062e\\u0628\\u0631\\u0627\\u0621 \\u062a\\u0635\\u0648\\u064a\\u0631 \\u0627\\u0641\\u0631\\u0627\\u062d \\u0645\\u0635\\u0631 \\u0647\\u0646\\u0627","en":null}',
                'twitter_title' => '{"ar":"\\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u0631 \\u0627\\u0644\\u0641\\u0648\\u062a\\u0648\\u063a\\u0631\\u0627\\u0641\\u064a \\u0648\\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648","en":null}',
                'twitter_description' => '{"ar":"\\u0627\\u0641\\u0636\\u0644 \\u062e\\u0628\\u0631\\u0627\\u0621 \\u062a\\u0635\\u0648\\u064a\\u0631 \\u0627\\u0641\\u0631\\u0627\\u062d \\u0645\\u0635\\u0631 \\u0647\\u0646\\u0627","en":null}',
                'twitter_image' => '{"ar":null}',
                'facebook_image' => '{"ar":null}',
                'sort_order' => 6,
                'created_at' => '2021-10-14 09:33:18',
                'updated_at' => '2022-05-12 18:59:04',
            ),
            5 => 
            array (
                'id' => 6,
                'country_id' => 1,
                'name' => '{"ar":"\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0639\\u0627\\u0645","en":"Catering"}',
                'slug' => '{"ar":"catering","en":null}',
                'description' => '{"ar":"<p>\\u0647\\u0644 \\u0642\\u0631\\u0631\\u062a \\u0645\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u0637\\u0639\\u0627\\u0645 \\u0627\\u0644\\u0630\\u064a \\u0633\\u062a\\u0642\\u062f\\u0645\\u0647 \\u0644\\u0644\\u0645\\u0639\\u0627\\u0632\\u064a\\u0645 \\u0641\\u064a \\u0644\\u064a\\u0644\\u0629 \\u0641\\u0631\\u062d\\u0643\\u060c \\u0647\\u0644 \\u0627\\u0637\\u0644\\u0639\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0636\\u064a\\u0627\\u0641\\u0629 \\u0648\\u0627\\u0644\\u062d\\u0644\\u0648\\u064a\\u0627\\u062a \\u0648\\u0627\\u0644\\u0639\\u0635\\u0627\\u0626\\u0631 \\u0627\\u0644\\u0645\\u0645\\u0643\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645\\u0647\\u0627 \\u0639\\u0644\\u0649 \\u0637\\u0627\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u0641\\u0631\\u062d \\u0641\\u064a \\u0645\\u0635\\u0631\\u060c Afraah.com&nbsp;\\u0633\\u064a\\u0648\\u0641\\u0631 \\u0644\\u0643 \\u0642\\u0627\\u0626\\u0645\\u0629 \\u0628\\u0627\\u0644\\u0645\\u0639 \\u0627\\u0633\\u0645\\u0627\\u0621 \\u0645\\u062a\\u0639\\u0647\\u062f\\u064a \\u0636\\u064a\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0627\\u0641\\u0631\\u0627\\u062d \\u0641\\u064a \\u0645\\u0635\\u0631\\u060c\\u0627\\u0641\\u0636\\u0644 \\u0627\\u0644\\u0645\\u0637\\u0627\\u0628\\u062e \\u0648\\u0627\\u0644\\u0645\\u0637\\u0627\\u0639\\u0645 \\u0627\\u0644\\u062a\\u064a \\u062a\\u0642\\u062f\\u0645 \\u062e\\u062f\\u0645\\u0629 \\u0644\\u0627\\u0626\\u062d\\u0629 \\u0637\\u0639\\u0627\\u0645 \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641 \\u0641\\u064a \\u0645\\u0635\\u0631<\\/p>","en":null}',
                'banner_alt' => '{"ar":"\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0639\\u0627\\u0645","en":null}',
                'banner' => 'wedding.jpg',
                'thumb_alt' => '{"ar":"\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0639\\u0627\\u0645","en":null}',
                'thumb' => '{"ar":"wedding.jpg"}',
                'status' => 1,
                'seo_title' => '{"ar":"Explicabo Quo labor","en":null}',
                'seo_keywords' => '{"ar":"Magna cum nulla in c","en":null}',
                'seo_robots' => '{"ar":"Veniam hic occaecat","en":null}',
                'seo_description' => '{"ar":"Ut eaque sit corpor","en":null}',
                'facebook_description' => '{"ar":"Sit corrupti aliqui","en":null}',
                'twitter_title' => '{"ar":"Aliquid quae laborum","en":null}',
                'twitter_description' => '{"ar":"Modi voluptate ducim","en":null}',
                'twitter_image' => '{"ar":"Fugiat ullam corpori"}',
                'facebook_image' => '{"ar":"Non natus et et volu"}',
                'sort_order' => 5,
                'created_at' => '2021-11-09 11:05:04',
                'updated_at' => '2022-05-12 19:12:00',
            ),
            6 => 
            array (
                'id' => 7,
                'country_id' => 1,
                'name' => '{"en":"Wedding Planning","ar":"\\u062a\\u062d\\u0636\\u064a\\u0631 \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641"}',
                'slug' => '{"ar":"wedding-planning","en":"wedding-planning"}',
                'description' => '{"en":null}',
                'banner_alt' => '{"en":null}',
                'banner' => 'wedding/garden.jpg',
                'thumb_alt' => '{"en":null}',
                'thumb' => '{"ar":"wedding planner\\/planner.jpg"}',
                'status' => 1,
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'facebook_image' => '{"ar":null}',
                'sort_order' => 4,
                'created_at' => '2021-11-15 18:58:15',
                'updated_at' => '2022-05-12 19:12:00',
            ),
        ));
        
        
    }
}