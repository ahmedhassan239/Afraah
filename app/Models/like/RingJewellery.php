<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RingJewellery extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'ring_jewellery_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['ring_jewellery_name','ring_jewellery_slug','ring_jewellery_description','ring_jewellery_thumb_alt','ring_jewellery_thumb'];

    public function ringJewellery(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\RingsJewellery::class,'article_id');
    }
}
