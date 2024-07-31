<?php

namespace App\Http\Controllers\Api;

use App\Models\GlobalSeo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GlobalSeoController extends Controller
{
    //
    public function getAllGlobalSeo($country_id,$lang)
    {
        app()->setLocale($lang);
        $query=GlobalSeo::select('global_seo_settings.*','countries.name as country_name');
        $query->leftJoin('countries','global_seo_settings.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('countries.id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $globalSeo = $query->get();
        $social_seo = array();
        foreach ($globalSeo as $row) {
            $id = $row->id;
            $seo_title = $row->seo_title;
            $seo_keywords = $row->seo_keywords;
            $seo_robots = $row->seo_robots;
            $seo_description = $row->seo_description;
            $facebook_description = $row->facebook_description;
            $facebook_image = $row->facebook_image;
            $twitter_title = $row->twitter_title;
            $twitter_description = $row->twitter_description;
            $twitter_image = $row->twitter_image;
            $revisit_after = $row->revisit_after;
            $canonical_url = $row->canonical_url;
            $yahoo_key = $row->yahoo_key;
            $yandex_verification = $row->yandex_verification;
            $microsoft_validate = $row->microsoft_validate;
            $facebook_page_id = $row->facebook_page_id;
            $author = $row->author;
            $pingback_url = $row->pingback_url;
            $alexa_code = $row->alexa_code;
            $facebook_advert_pixel_tag = $row->facebook_advert_pixel_tag;
            $google_site_verification = $row->google_site_verification;
            $google_tag_manager_header = $row->google_tag_manager_header;
            $google_tag_manager_body = $row->google_tag_manager_body;
            $google_analytics = $row->google_analytics;
            $live_chat_tag = $row->live_chat_tag;
            $footer_script = $row->footer_script;
            $facebook_site_name = $row->facebook_site_name;
            $facebook_admins = $row->facebook_admins;
            $twitter_site = $row->twitter_site;
            $twitter_card = $row->twitter_card;
            if (isset($social_seo)) {
                $social_seo[] = [
                    'id' => $id,
                    'title' => $seo_title,
                    'keywords' => $seo_keywords,
                    'robots' => $seo_robots,
                    'description' => $seo_description,
                    'facebook_title' => $seo_title,
                    'facebook_description' => $facebook_description,
                    'facebook_image' => $facebook_image,
                    'twitter_title' => $twitter_title,
                    'twitter_description' => $twitter_description,
                    'twitter_image' => $twitter_image,
                    'revisit_after' => $revisit_after,
                    // 'canonical_url' => $canonical_url,
                    'yahoo_key' => $yahoo_key,
                    'yandex_verification' => $yandex_verification,
                    'microsoft_validate' => $microsoft_validate,
                    'facebook_page_id' => $facebook_page_id,
                    'author' => $author,
                    'pingback_url' => $pingback_url,
                    'alexa_code' => $alexa_code,
                    'facebook_advert_pixel_tag' => $facebook_advert_pixel_tag,
                    'google_site_verification' => $google_site_verification,
                    'google_tag_manager_header' => $google_tag_manager_header,
                    'google_tag_manager_body' => $google_tag_manager_body,
                    'google_analytics' => $google_analytics,
                    'live_chat_tag' => $live_chat_tag,
                    'footer_script' => $footer_script,
                    'facebook_site_name' => $facebook_site_name,
                    'facebook_admins' => $facebook_admins,
                    'twitter_site' => $twitter_site,
                    'twitter_card' => $twitter_card,
                    'seo_schema' => '',
                    'og_type' => '',
                    'og_title' => '',
                ];
            } else {
                $social_seo[] = [
                    'id' => null,
                    'title' => null,
                    'keywords' => null,
                    'robots' => null,
                    'description' => null,
                    'facebook_description' => null,
                    'facebook_image' => null,
                    'twitter_title' => null,
                    'twitter_description' => null,
                    'twitter_image' => null,
                    'revisit_after' => null,
                    'canonical_url' => null,
                    'yahoo_key' => null,
                    'yandex_verification' => null,
                    'microsoft_validate' => null,
                    'facebook_page_id' => null,
                    'author' => null,
                    'pingback_url' => null,
                    'alexa_code' => null,
                    'facebook_advert_pixel_tag' => null,
                    'google_site_verification' => null,
                    'google_tag_manager_header' => null,
                    'google_tag_manager_body' => null,
                    'google_analytics' => null,
                    'live_chat_tag' => null,
                    'footer_script' => null,
                    'facebook_site_name' => null,
                    'facebook_admins' => null,
                    'twitter_site' => null,
                    'twitter_card' => null,
                    'seo_schema' => '',
                ];
            }
        }
        return response()->json([
            'data' => $social_seo
        ],200);
    }
}
