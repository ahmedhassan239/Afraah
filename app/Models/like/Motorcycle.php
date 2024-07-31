<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Motorcycle extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'motorcycle_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['motorcycle_name','motorcycle_slug','motorcycle_description','motorcycle_thumb_alt','motorcycle_thumb'];

    public function motorcycle(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Motorcycle::class,'article_id');
    }
}
