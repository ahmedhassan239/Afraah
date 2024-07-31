<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Limousine extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'limousine_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['limousine_name','limousine_slug','limousine_description','limousine_thumb_alt','limousine_thumb'];

    public function limousine(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Limousine::class,'article_id');
    }
}
