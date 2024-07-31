<?php

namespace App\Models\Comment;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Spatie\Translatable\HasTranslations;


class Comment extends Model
{
    use HasFactory;
//    use HasTranslations;
    protected $table = 'comments';
    protected $fillable = ['user_id','comment','status','rate'];
//    public $translatable =[
//       'slug'];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function commentable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
