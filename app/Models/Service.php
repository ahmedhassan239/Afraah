<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Category;
use App\Models\BarberShop;
use App\Models\WeddingPalace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Service extends Model implements Sortable
{

    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];




    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name','slug','category_id', 'status', 'sort_order'
    ];
    public $translatable = [
        'name','service_name','category_name','seo_title','seo_keywords','seo_robots','seo_description','og_title',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image','thumb_alt'
        ,'banner_alt','category_slug','category_description','category_banner_alt','category_seo_title','category_seo_keywords',
        'category_seo_robots','category_seo_description','category_facebook_description','category_facebook_image','category_twitter_title',
        'category_twitter_description','category_twitter_image','service_thumb_alt','country_name'

    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->where('status',1);
    }
    public function barber_shops()
    {
        return $this->hasMany(BarberShop::class);
    }
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
    public function boats()
    {
        return $this->hasMany(Boat::class);
    }
    public function wedding_palaces()
    {
        return $this->hasMany(WeddingPalace::class);
    }
}
