<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => '{"ar":"Hedda Burns","en":null}',
                'slug' => '{"ar":"Consequat Non est","en":null}',
                'overview' => NULL,
                'description' => '{"ar":"<p>knknknk<\\/p>","en":null}',
                'country_id' => 1,
                'banner' => '{"ar":"\\u0631\\u0648\\u064a\\u0627\\u0644-\\u0643\\u0645\\u0628\\u0646\\u0633\\u0643\\u064a2.jpg"}',
                'thumb_alt' => '{"en":null}',
                'alt' => '{"en":null}',
                'thumb' => '{"ar":"\\u0630\\u0627-\\u0628\\u064a\\u0646\\u0643.jpg"}',
                'gallery' => '[{"layout":"wysiwyg","key":"uGtYCWDjmjyz5hft","attributes":{"image":"\\u062e\\u0628\\u064a\\u0631\\u0629-\\u0627\\u0644\\u0645\\u0643\\u064a\\u0627\\u062c-\\u0645\\u0647\\u0627-\\u064a\\u0648\\u0633\\u06415.jpg"}}]',
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
                'created_at' => '2022-04-22 13:05:17',
                'updated_at' => '2022-04-22 13:05:17',
            ),
        ));
        
        
    }
}