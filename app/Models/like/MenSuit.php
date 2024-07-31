<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MenSuit extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'men_suit_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['men_suit_name','men_suit_slug','men_suit_description','men_suit_thumb_alt','men_suit_thumb'];

    public function mensuit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MenSuit::class,'article_id');
    }
}
