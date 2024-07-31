<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HoneyMoon extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'honey_moon_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['honey-moon_name','honey-moon_slug','honey-moon_description','honey-moon_thumb_alt','honey-moon_thumb'];

    public function honeyMoon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\HoneyMoon::class,'article_id');
    }
}
