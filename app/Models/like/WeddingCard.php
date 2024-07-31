<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WeddingCard extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'wedding_card_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['wedding_card_name','wedding_card_slug','wedding_card_description','wedding_card_thumb_alt','wedding_card_thumb'];

    public function weddingCard(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WeddingCard::class,'article_id');
    }
}
