<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HairDresser extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'hairdresser_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['hairdresser_name','hairdresser_slug','hairdresser_description','hairdresser_thumb_alt','hairdresser_thumb'];

    public function hairDresser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\HairDresser::class,'article_id');
    }
}
