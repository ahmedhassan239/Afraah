<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Photographer extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'photographer_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['photographer_name','photographer_slug','photographer_description','photographer_thumb_alt','photographer_thumb'];

    public function photographer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Photographer::class,'article_id');
    }
}
