<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Service;
use App\Models\BarberShop;
use App\Models\WeddingPalace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use Spatie\Translatable\HasTranslations;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Category extends Model implements Sortable
{


    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];


    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name','slug','status','sort_order'
    ];
    public $translatable = [
        'name','slug','thumb','thumb_alt','seo_title','seo_keywords','seo_robots','seo_description','og_title',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image','description',
        'banner_alt','country_name'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class)->where('status',1);
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
