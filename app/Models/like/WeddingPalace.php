<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WeddingPalace extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'wedding_palace_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['wedding_palace_name','wedding_palace_slug','wedding_palace_description','wedding_palace_thumb_alt','wedding_palace_thumb'];

    public function weddingPalace(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WeddingPalace::class,'article_id');
    }
}
