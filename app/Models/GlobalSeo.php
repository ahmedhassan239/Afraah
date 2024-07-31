<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GlobalSeo extends Model
{
    use HasTranslations ,HasFactory;
    public $table = "global_seo_settings";
    public $translatable =['seo_title', 'seo_keywords', 'seo_robots','seo_description','facebook_description',
                            'facebook_image', 'twitter_title', 'twitter_description', 'twitter_image',
                            'revisit_after', 'canonical_url', 'yahoo_key', 'yandex_verification',
                            'microsoft_validate', 'facebook_page_id', 'author', 'pingback_url',
                            'alexa_code', 'facebook_advert_pixel_tag','google_site_verification','og_title',
                            'google_tag_manager_header', 'google_tag_manager_body', 'google_analytics',
                            'live_chat_tag', 'footer_script', 'facebook_site_name', 'facebook_admins',
                            'twitter_site', 'twitter_card','country_name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
