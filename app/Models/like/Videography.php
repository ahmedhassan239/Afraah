<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Videography extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'videography_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['videography_name','videography_slug','videography_description','videography_thumb_alt','videography_thumb'];

    public function videography(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Videography::class,'article_id');
    }
}
