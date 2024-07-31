<?php

namespace App\Models\Inquiry;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Spatie\Translatable\HasTranslations;


class Inquiry extends Model
{
    use HasFactory;
    protected $table = 'inquiries';
    protected $fillable = ['name','phone','email','wedding_date','message','user_id'];

    protected $casts = [
      'wedding_date'=>'datetime'
    ];

//    public $translatable =[
//       'slug'];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function inquirable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
