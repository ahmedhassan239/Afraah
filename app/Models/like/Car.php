<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Car extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'car_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['car_name','car_slug','car_description','car_thumb_alt','car_thumb'];

    public function car()
    {
        return $this->belongsTo(\App\Models\Car::class,'article_id');
    }
}
