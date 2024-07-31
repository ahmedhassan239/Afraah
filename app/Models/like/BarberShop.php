<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BarberShop extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'barber_shop_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['barber_name','barber_slug','barber_description','barber_thumb_alt','barber_thumb'];

    public function barberShop()
    {
        return $this->belongsTo(\App\Models\BarberShop::class,'article_id');
    }
}
