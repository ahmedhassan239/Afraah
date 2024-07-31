<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WeddingPlanning extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'wedding_planning_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['wedding_planning_name','wedding_planning_slug','wedding_planning_description','wedding_planning_thumb_alt','wedding_planning_thumb'];

    public function weddingPlanning(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WeddingPlanning::class,'article_id');
    }
}
