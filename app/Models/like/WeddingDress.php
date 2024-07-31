<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WeddingDress extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'wedding_dress_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['wedding_dress_name','wedding_dress_slug','wedding_dress_description','wedding_dress_thumb_alt','wedding_dress_thumb'];

    public function weddingDress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WeddingDress::class,'article_id');
    }
}
