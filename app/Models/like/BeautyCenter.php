<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BeautyCenter extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'beauty_center_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['beauty_center_name','beauty_center_slug','beauty_center_description','beauty_center_thumb_alt','beauty_center_thumb'];


    public function beautyCenter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\BeautyCenter::class,'article_id');
    }
}
