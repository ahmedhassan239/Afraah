<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GlobalSeoSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('global_seo_settings')->delete();
        
        \DB::table('global_seo_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 1,
                'seo_title' => '{"ar":"\\u0623\\u0641\\u0631\\u0627\\u062d , \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646\\u0635\\u0647 \\u0641\\u064a \\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a  \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'seo_keywords' => '{"ar":",\\u0623\\u0641\\u0631\\u0627\\u062d , \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646\\u0635\\u0647 \\u0641\\u064a \\u0645\\u0635\\u0631 \\u0648 \\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a  \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'seo_robots' => '{"ar":"index,follow","en":"noindex,nofollow"}',
                'seo_description' => '{"ar":",\\u0623\\u0641\\u0631\\u0627\\u062d , \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646\\u0635\\u0647 \\u0641\\u064a \\u0645\\u0635\\u0631 \\u0648 \\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a  \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'facebook_description' => '{"ar":"Qui optio proident","en":null}',
                'facebook_image' => '{"ar":"Commodi amet nemo d","en":null}',
                'twitter_title' => '{"ar":"Adipisicing eligendi","en":null}',
                'twitter_description' => '{"ar":"In proident excepte","en":null}',
                'twitter_image' => '{"ar":"Fugiat cum adipisci","en":null}',
                'revisit_after' => '{"ar":",\\u0623\\u0641\\u0631\\u0627\\u062d , \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646\\u0635\\u0647 \\u0641\\u064a \\u0645\\u0635\\u0631 \\u0648 \\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a  \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'canonical_url' => '{"ar":",\\u0623\\u0641\\u0631\\u0627\\u062d , \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646\\u0635\\u0647 \\u0641\\u064a \\u0645\\u0635\\u0631 \\u0648 \\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a  \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'yahoo_key' => '{"ar":"Illum ea sequi duci","en":null}',
                'yandex_verification' => '{"ar":"Error distinctio Ex","en":null}',
                'microsoft_validate' => '{"ar":"25-Aug-1985","en":null}',
                'facebook_page_id' => '{"ar":"Voluptatem accusanti","en":null}',
                'author' => '{"ar":",\\u0623\\u0641\\u0631\\u0627\\u062d , \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646\\u0635\\u0647 \\u0641\\u064a \\u0645\\u0635\\u0631 \\u0648 \\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a  \\u0644\\u0644\\u0632\\u0641\\u0627\\u0641","en":null}',
                'pingback_url' => '{"ar":"Est accusamus a vit","en":null}',
                'alexa_code' => '{"en":null}',
                'facebook_advert_pixel_tag' => '{"en":null}',
                'google_site_verification' => '{"ar":"Aut quis iste evenie","en":null}',
                'google_tag_manager_header' => '{"en":null}',
                'google_tag_manager_body' => '{"en":null}',
                'google_analytics' => '{"en":null}',
                'live_chat_tag' => '{"en":null}',
                'footer_script' => '{"en":null}',
                'facebook_site_name' => '{"ar":"Regan Walsh","en":null}',
                'facebook_admins' => '{"ar":"Qui est ea voluptas","en":null}',
                'twitter_site' => '{"ar":"Tempora voluptas fac","en":null}',
                'twitter_card' => '{"ar":"Amet cumque dolores","en":null}',
                'created_at' => '2021-12-01 18:40:17',
                'updated_at' => '2022-04-28 18:16:28',
            ),
        ));
        
        
    }
}