<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Restaurant extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'restaurant_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['restaurant_name','restaurant_slug','restaurant_description','restaurant_thumb_alt','restaurant_thumb'];

    public function restaurant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Resturant::class,'article_id');
    }}
