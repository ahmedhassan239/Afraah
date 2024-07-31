<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Template extends Model
{
    use HasFactory;
    use HasTranslations;
    public $table = "templates";

    protected $fillable = [
        'name', 'slug', 'description', 'destination_id', 'banner',
        'thumb_alt','alt', 'thumb', 'seo_title', 'seo_keywords', 'seo_robots',
        'seo_description', 'facebook_description', 'facebook_image', 'twitter_title',
        'twitter_description', 'twitter_image','og_title'
    ];


    public $translatable =[
        'name', 'slug','description', 'banner',
        'thumb_alt', 'alt', 'thumb', 'seo_title', 'seo_keywords', 'seo_robots',
        'seo_description', 'facebook_description', 'facebook_image', 'twitter_title',
        'twitter_description', 'twitter_image','og_title'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
