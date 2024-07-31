<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OpenBuffet extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'open_buffet_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['open_buffet_name','open_buffet_slug','open_buffet_description','open_buffet_thumb_alt','open_buffet_thumb'];

    public function openBuffet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\OpenBuffet::class,'article_id');
    }
}
