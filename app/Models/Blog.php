<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory;

    use HasTranslations;
    public $table = "blogs";

    protected $fillable = [
        'name', 'slug', 'description', 'destination_id', 'banner',
        'thumb_alt','alt', 'thumb', 'seo_title', 'seo_keywords', 'seo_robots',
        'seo_description', 'facebook_description', 'facebook_image', 'twitter_title',
        'twitter_description', 'twitter_image','status','feature'
    ];


    public $translatable =[
        'name', 'slug','description', 'destination_id', 'banner','og_title',
        'thumb_alt', 'alt', 'thumb', 'seo_title', 'seo_keywords', 'seo_robots',
        'seo_description', 'facebook_description', 'facebook_image', 'twitter_title',
        'twitter_description', 'twitter_image','related_blogs_list','gallery_list'
    ];
    protected $casts =[
        'related_blogs_list'=> 'array',
        'gallery_list'=> 'array',
    ];
    /**
     * @var mixed
     */
    private $gallery;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function inquiries(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(\App\Models\Inquiry\Inquiry::class, 'inquirable');
    }

    public function getRelatedBlogsListAttribute(){
        if ($this->related_blogs != Null) {
                $related_blogs = Blog::whereIn('id',json_decode($this->related_blogs))->get();
                $related_blogs = $related_blogs->map(function ($value) {
                    return [
                        'id' => $value->id,
                        'name' => $value->name,
                        'slug' => $value->slug,
                        'description'=>$value->description,
                        'thumb_alt' => $value->thumb_alt,
                        'thumb' =>asset('storage/'.$value->thumb),
                        'created_at'=>Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y'),
                    ];
                });
            }else{
                $related_blogs = '';
            }
        return $related_blogs;
    }

    public function getGalleryListAttribute(){
//        dd($this->gallery);

        $gallery=array();
            if (is_array($this->gallery)|| is_object($this->gallery)) {
            $x=1;
                foreach ($this->gallery as $key) {
                    $gallery[]=[
                        'id'=>$x,
                        'image'=>asset('storage/'.$key['attributes']['image']),
                    ];
                    $x++;
                }
        }
        return $gallery;
    }
}
