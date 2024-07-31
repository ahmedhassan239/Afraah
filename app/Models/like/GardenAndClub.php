<?php

namespace App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GardenAndClub extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'garden_clubs_likes';
    protected $fillable = ['article_id','user_id','service_id','category_id','like_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $translatable =['gardens_club_name','gardens_club_slug','gardens_club_description','gardens_club_thumb_alt','gardens_club_thumb'];

    public function gardenClub(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\GardenAndClub::class,'article_id');
    }
}
