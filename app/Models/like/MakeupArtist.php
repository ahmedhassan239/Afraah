<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MakeupArtist extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'makeup_artist_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['makeup_artist_name','makeup_artist_slug','makeup_artist_description','makeup_artist_thumb_alt','makeup_artist_thumb'];


    public function makeupArtist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MakeupArtist::class,'article_id');
    }
}
