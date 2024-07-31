<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Country;
use App\Models\BarberShop;
use App\Models\WeddingPalace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name','slug', 
    ];
    public $translatable = [
        'name','city_name','country_name'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function barber_shops()
    {
        return $this->belongsToMany(BarberShop::class);
    }
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
    public function boats()
    {
        return $this->belongsToMany(Boat::class);
    }
    public function wedding_palaces()
    {
        return $this->belongsToMany(WeddingPalace::class);
    }
}
