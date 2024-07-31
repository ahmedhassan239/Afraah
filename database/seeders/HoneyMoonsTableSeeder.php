<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HoneyMoonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('honey_moons')->delete();
        
        \DB::table('honey_moons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"ar":"test","en":null}',
                'slug' => '{"ar":"test","en":null}',
                'phone' => '{"ar":"011111124578"}',
                'email' => 'test@test.com',
                'price' => NULL,
                'description' => '{"ar":"<p>test tes ttesttestt estt esttestte sttes t<\\/p>","en":null}',
                'user_id' => 1,
                'service_id' => 20,
                'city_id' => 1,
                'country_id' => 1,
                'category_id' => 7,
                'gallery' => '{"ar":[]}',
                'banner' => '{"ar":"\\u0647\\u064a\\u0644\\u062a\\u0648\\u06463.jpg"}',
                'alt' => '{"ar":"test","en":null}',
                'thumb' => '{"ar":"beauty\\/alondra-spa.jpg"}',
                'thumb_alt' => '{"ar":"test","en":null}',
                'location' => 'egypt',
                'location_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55266.118740932856!2d31.24724485!3d30.033058599999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f5d3de58f21%3A0xbcfc4ab6cea87369!2sCity%20Of%20The%20Dead%20Cairo%20Egypt!5e0!3m2!1sar!2seg!4v1650354474833!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'seo_title' => '{"en":null}',
                'seo_keywords' => '{"en":null}',
                'seo_robots' => '{"en":null}',
                'seo_description' => '{"en":null}',
                'facebook_description' => '{"en":null}',
                'facebook_image' => '{"ar":null}',
                'twitter_title' => '{"en":null}',
                'twitter_description' => '{"en":null}',
                'twitter_image' => '{"ar":null}',
                'status' => 1,
                'feature' => 1,
                'has_offer' => 1,
                'offer_percentage' => NULL,
                'created_at' => '2022-04-19 14:51:06',
                'updated_at' => '2022-04-19 16:41:33',
            ),
        ));
        
        
    }
}