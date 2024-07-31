<?php

namespace App\Models;

use App\Models\Hotel;

use App\Models\WeddingPalace;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $fillable = ['name','slug'];
    public $translatable = [
        'name','service_name','category_name','seo_title','seo_keywords','seo_robots','seo_description','og_title',
        'facebook_description','facebook_image','twitter_title','twitter_description','twitter_image'
    ];


    public function city()
    {
        return $this->hasMany(City::class);
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
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function wedding_palaces()
    {
        return $this->hasMany(WeddingPalace::class);
    }
}
