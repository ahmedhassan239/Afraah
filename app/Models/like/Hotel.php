<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hotel extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'hotel_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['hotel_name','hotel_slug','hotel_description','hotel_thumb_alt','hotel_thumb'];

    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class,'article_id');
    }
}
