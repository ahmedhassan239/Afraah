<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WeddingCake extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'wedding_cake_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['wedding_cake_name','wedding_cake_slug','wedding_cake_description','wedding_cake_thumb_alt','wedding_cake_thumb'];

    public function weddingCake(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WeddingCake::class,'article_id');
    }
}
