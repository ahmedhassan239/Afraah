<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WeddingFlower extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'wedding_flower_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['wedding_flower_name','wedding_flower_slug','wedding_flower_description','wedding_flower_thumb_alt','wedding_flower_thumb'];

    public function weddingFlower(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WeddingFlower::class,'article_id');
    }
}
