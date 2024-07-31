<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use Spatie\Translatable\HasTranslations;

class BarberShop extends Model
{
    use HasTranslations ;

    //
    public $table = "barber_shops";

    protected $fillable = [
        'name','description','phone','package','package','city_id','category_id_id','gallery',
        'banner','alt','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image','status','feature'
    ];

    public $translatable =[
        'name','slug','description','package','gallery','og_title',
        'alt','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image'
        ,'service_name','category_name','city_name','country_name','service_seo_title','service_seo_keywords',
        'services_seo_robots','services_seo_description','services_facebook_description','category_slug',
        'services_facebook_image','services_twitter_title','services_twitter_description','services_twitter_image'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class)->where('status',1);
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->where('status',1);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\like\BarberShop::class,'article_id');
    }

    public function comments()
    {
        return $this->morphMany(\App\Models\Comment\Comment::class, 'commentable');
    }
    public function inquiries(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(\App\Models\Inquiry\Inquiry::class, 'inquirable');
    }

}
