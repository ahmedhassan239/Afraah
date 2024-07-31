<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name','description','feature','status','code','style','city_id','category_id','gallery','car_rental_showroom_name',
        'car_rental_showroom_location','car_rental_showroom_email','car_rental_showroom_number',
        'banner','alt','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image','status','feature'
    ];

    public $translatable =[
        'name','slug','style','description','phone','gallery','hall','car_rental_showroom_name',
        'car_rental_showroom_location','service_banner_alt','og_title',
        'banner','alt','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image',
        'description','car_rental_showroom_location','service_name','category_name','city_name','country_name',
        'service_seo_title','service_seo_keywords','services_seo_robots','services_seo_description','services_facebook_description',
        'services_facebook_image','services_twitter_title','services_twitter_description','services_twitter_image','category_slug'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
//        return DB::table('countries')->where('id',Auth::user()->country_id)->pluck('id','name');
//        return Country::where('id',Auth::user()->country_id)->get();
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function Service()
    {
        return $this->belongsTo(Service::class)->where('status',1);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class)->where('status',1);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\like\Car::class,'article_id');
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
