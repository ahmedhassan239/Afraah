<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Dj extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'dj_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['dj_name','dj_slug','dj_description','dj_thumb_alt','dj_thumb'];

    public function dj()
    {
        return $this->belongsTo(\App\Models\Dj::class,'article_id');
    }
}
