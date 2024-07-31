<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DjsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('djs')->delete();
        
        \DB::table('djs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"ar":"Seth Glass","en":null}',
                'slug' => '{"ar":"Et laudantium dicta","en":null}',
                'price' => 0,
                'description' => '{"ar":"<p style=\\"text-align:right\\">\\u062a\\u0623\\u062c\\u064a\\u0631 \\u062f\\u064a \\u062c\\u064a \\u0644\\u0644\\u0627\\u0641\\u0631\\u0627\\u062d \\u0648\\u0627\\u0644\\u0645\\u0646\\u0627\\u0633\\u0628\\u0627\\u062a \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062e\\u062a\\u0644\\u0641\\u0629<\\/p>","en":null}',
                'phone' => '{"ar":"89"}',
                'email' => 'pocecu@mailinator.com',
                'package' => NULL,
                'user_id' => 1,
                'service_id' => 17,
                'city_id' => 1,
                'category_id' => 5,
                'country_id' => 1,
                'gallery' => '{"ar":[]}',
                'banner' => '{"ar":null}',
                'alt' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'thumb' => '{"ar":null}',
                'thumb_alt' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'location' => NULL,
                'location_url' => NULL,
                'seo_title' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'seo_keywords' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'facebook_description' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'twitter_description' => '{"ar":"\\u0628\\u064a\\u0628\\u0648 \\u0627\\u0644 \\u062f\\u064a \\u062c\\u064a","en":null}',
                'twitter_image' => '{"ar":null}',
                'status' => 1,
                'feature' => 1,
                'has_offer' => 0,
                'offer_percentage' => NULL,
                'created_at' => '2022-02-08 19:56:54',
                'updated_at' => '2022-05-11 22:35:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'slug' => '{"ar":"high-sound-studio","en":null}',
                'price' => 0,
            'description' => '{"ar":"<p style=\\"text-align:right\\">\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648 &quot;HIGH&quot; \\u0644\\u0643\\u0627\\u0641\\u0629 \\u0645\\u0647\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0648\\u0633\\u064a\\u0642\\u064a\\u0629 (\\u062a\\u0633\\u062c\\u064a\\u0644 - \\u062a\\u0648\\u0632\\u064a\\u0639 - \\u062a\\u0644\\u062d\\u064a\\u0646 - \\u0643\\u0648\\u0631\\u0633\\u0627\\u062a \\u0645\\u0648\\u0633\\u064a\\u0642\\u064a\\u0629 - \\u0639\\u0632\\u0641 ..) \\u0628\\u0627\\u0639\\u0644\\u0649 \\u0627\\u062f\\u0627\\u0621 \\u0645\\u0645\\u0643\\u0646 ..<\\/p>","en":null}',
                'phone' => '{"ar":"1272489840"}',
                'email' => NULL,
                'package' => NULL,
                'user_id' => 78,
                'service_id' => 17,
                'city_id' => 1,
                'category_id' => 5,
                'country_id' => 1,
                'gallery' => '{"ar":[{"layout":"wysiwyg","key":"Ttm3MNg1kOUHHmuM","attributes":{"image":"Dj\\/\\u0647\\u0627\\u064a-\\u0633\\u0627\\u0648\\u0646\\u062f.jpg"}},{"layout":"wysiwyg","key":"YLCRXZ1glNEWxv4F","attributes":{"image":"Dj\\/\\u0647\\u0627\\u064a-\\u0633\\u0627\\u0648\\u0646\\u062f1.jpg"}}]}',
                'banner' => '{"ar":"Dj\\/\\u0647\\u0627\\u064a-\\u0633\\u0627\\u0648\\u0646\\u062f1.jpg"}',
                'alt' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'thumb' => '{"ar":"Dj\\/\\u0647\\u0627\\u064a-\\u0633\\u0627\\u0648\\u0646\\u062f.jpg"}',
                'thumb_alt' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'location' => 'ش على بك النجار اول شبرا',
                'location_url' => NULL,
                'seo_title' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'seo_keywords' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'facebook_description' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'twitter_description' => '{"ar":"\\u0647\\u0627\\u064a \\u0633\\u0627\\u0648\\u0646\\u062f \\u0627\\u0633\\u062a\\u0648\\u062f\\u064a\\u0648","en":null}',
                'twitter_image' => '{"ar":null}',
                'status' => 1,
                'feature' => 0,
                'has_offer' => 0,
                'offer_percentage' => NULL,
                'created_at' => '2022-05-11 23:06:43',
                'updated_at' => '2022-05-12 04:59:16',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"ar":"\\u0623\\u0643\\u0644\\u0627\\u062f\\u064a\\u0648\\u0633","en":null}',
                'slug' => '{"ar":"Akladios","en":null}',
                'price' => NULL,
                'description' => '{"en":null}',
                'phone' => '{"ar":null}',
                'email' => 'Dina.akladios@gmail.com',
                'package' => NULL,
                'user_id' => 77,
                'service_id' => 17,
                'city_id' => 1,
                'category_id' => 5,
                'country_id' => 1,
                'gallery' => '{"ar":[{"layout":"wysiwyg","key":"eIVVKZ7aGiCQWmUx","attributes":{"image":"dj\\/akladios1.jpg"}},{"layout":"wysiwyg","key":"nQ8XbhBrLTlW4tpS","attributes":{"image":"dj\\/akladios.jpg"}}]}',
                'banner' => '{"ar":"dj\\/akladios.jpg"}',
                'alt' => '{"ar":"\\u0623\\u0643\\u0644\\u0627\\u062f\\u064a\\u0648\\u0633","en":null}',
                'thumb' => '{"ar":"dj\\/akladios.jpg"}',
                'thumb_alt' => '{"ar":"\\u0623\\u0643\\u0644\\u0627\\u062f\\u064a\\u0648\\u0633","en":null}',
                'location' => NULL,
                'location_url' => NULL,
                'seo_title' => '{"ar":"\\u0623\\u0643\\u0644\\u0627\\u062f\\u064a\\u0648\\u0633","en":null}',
                'seo_keywords' => '{"ar":"\\u0623\\u0643\\u0644\\u0627\\u062f\\u064a\\u0648\\u0633","en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"ar":"\\u0623\\u0643\\u0644\\u0627\\u062f\\u064a\\u0648\\u0633","en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'status' => 1,
                'feature' => 0,
                'has_offer' => 0,
                'offer_percentage' => NULL,
                'created_at' => '2022-05-16 16:57:35',
                'updated_at' => '2022-05-16 16:57:35',
            ),
        ));
        
        
    }
}