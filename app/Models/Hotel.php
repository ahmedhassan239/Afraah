<?php

namespace App\Models;

// use App\Models\Hotel;
use App\Models\Comment\Comment;
use App\Models\Comment\Comments;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name','description','phone','package','package','city_id','category_id','gallery',
        'banner','alt','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image', 'status','feature'
    ];

    public $translatable =[
        'name','slug','description','package','gallery','hall','og_title',
        'banner','alt','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image',
        'service_name','category_name','city_name','country_name','service_name','city_name','country_name',
        'category_slug','service_banner_alt','service_thumb_alt','service_banner_alt',
        'service_seo_title','service_seo_keywords','service_seo_robots','service_seo_description','service_facebook_description',
        'service_facebook_image','service_twitter_title','service_twitter_description','service_twitter_image','offer_details'
        ,'location'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
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
    public function likes()
    {
        return $this->hasMany(\App\Models\like\Hotel::class,'article_id');
    }

//    public function comments()
//    {
//        return $this->hasMany(HotelComments::class);
//    }

    public function comments()
    {
        return $this->morphMany(\App\Models\Comment\Comment::class, 'commentable');
    }
    public function inquiries(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(\App\Models\Inquiry\Inquiry::class, 'inquirable');
    }







}
