<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title','alt','small_text','country_name'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
