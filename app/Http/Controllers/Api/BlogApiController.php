<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api');
    }

    public function getDestinationBlogs($country_id,$lang) 
    {
        app()->setLocale($lang);
        $query=Blog::select('blogs.*',
                                'countries.id as country_id','countries.name as country_name',
                                'countries.slug as country_slug',
                        );
        $query->leftJoin('countries','blogs.country_id','=','countries.id');

        if (is_numeric($country_id)) {
            $query->where('blogs.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }

        $query->where('blogs.status',1);
        return $this->extracted($query);

    }

    public function getFeaturedBlogs($country_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query=Blog::select('blogs.*',
            'countries.id as country_id','countries.name as country_name',
            'countries.slug as country_slug',
        );
        $query->leftJoin('countries','blogs.country_id','=','countries.id');

        if (is_numeric($country_id)) {
            $query->where('blogs.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }

        $query->where('blogs.status',1);
        $query->where('blogs.feature',1);
        return  $this->extracted($query);

    }

    public function getSingleBlog($id)
    {
        $query = Blog::where(function ($query) use($id){
            if(is_numeric($id)){
                $query->where('id',$id);
            }else{
                $query->where('slug->ar', $id);
            }
        }) ->with('country')->where('status',1)
            ->get();

        $blog= $query->map(function ($val){
            return[
                'id'=>$val->id,
                'name'=>$val->name,
                'slug'=>$val->slug,
//                    'overview'=>$overview,
                'description'=>$val->description,
                'country'=>[
                    'id'=>$val->country->id,
                    'name'=>$val->country->name,
                    'slug'=>$val->country->slug,
                ],

//                'gallery'=>$val->gallery,
                'gallery'=>asset('storage/'.$val->gallery),
                'banner' => asset('storage/'.$val->banner) ,
                'alt'=>$val->alt,
                'thumb' => asset('storage/'.$val->thumb),
                'thumb_alt'=>$val->thumb_alt,
                'created_at'=>Carbon::createFromFormat('Y-m-d H:i:s', $val->created_at)->format('d/m/Y'),
                'related_blogs'=>$val->related_blogs_list,
                'seo'=>[
                    'title'=>$val->seo_title,
                    'keywords'=>$val->seo_keywords,
                    'robots'=>$val->seo_robots,
                    'description'=>$val->seo_description,
                    'facebook_title'=>$val->og_title,
                    'facebook_description'=>$val->facebook_description,
                    'facebook_image'=>$val->facebook_image,
                    'twitter_title'=>$val->twitter_title,
                    'twitter_description'=>$val->twitter_description,
                    'twitter_image'=>$val->twitter_image,
                    'seo_schema'=>$val->seo_schema,
                ]
            ];
        });


        return response()->json([
            'data'=>$blog
        ],'200');
    }


    public function extracted($query): \Illuminate\Http\JsonResponse
    {
        $blogs = $query->inRandomOrder()->get();
        $master=array();
        $seo = array();
        $country = array();
        foreach($blogs as $item){
            $blog_id=$item->id;
            $blog_name=$item->name;
            $blog_slug=$item->slug;
            $overview=$item->overview;
            $blog_description=$item->description;
            $country_id=$item->country_id;
            $country_name=$item->country_name;
            $country_slug=$item->country_slug;
            $created_at = $item->created_at;
            $banner = asset('storage/'.$item->banner);
            $thumb = asset('storage/'.$item->thumb);
            $thumb_alt=$item->thumb_alt;
            $alt= $item->service_banner_alt;
            $seo_title =$item->seo_title;
            $seo_keywords =$item->seo_keywords;
            $seo_robots=$item->seo_robots;
            $seo_description=$item->seo_description;
            $facebook_description=$item->facebook_description;
            $facebook_title=$item->og_title;
            $seo_schema=$item->seo_schema;
            $facebook_image=$item->facebook_image;
            $twitter_title=$item->twitter_title;
            $twitter_description=$item->twitter_description;
            $twitter_image=$item->twitter_image;
            $gallery=array();
            if (is_array($item->gallery)) {
                $x=1;
                foreach ($item->gallery as $key) {
                    $gallery[]=[
                        'id'=>$x,
                        'image'=>asset('storage/'.$key['attributes']['image']),
                    ];
                    $x++;
                }
            }
            if(isset($master)){
                $master[]=[
                    'id'=>$blog_id,
                    'name'=>$blog_name,
                    'slug'=>$blog_slug,
                    'overview'=>$overview,
                    'description'=>$blog_description,
                    'gallery'=>$gallery,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                    'created_at'=>Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('d/m/Y'),
                ];
            }else{
                $master[]=[];
            }
            // $seo=[
            //     'title'=>$seo_title,
            //     'keywords'=>$seo_keywords,
            //     'robots'=>$seo_robots,
            //     'description'=>$seo_description,
            //     'facebook_title'=>$facebook_title,
            //     'facebook_description'=>$facebook_description,
            //     'facebook_image'=>$facebook_image,
            //     'twitter_title'=>$twitter_title,
            //     'twitter_description'=>$twitter_description,
            //     'twitter_image'=>$twitter_image,
            //     'seo_schema'=>$seo_schema,
            // ];
            $country = [
                'id'=>$country_id,
                'name'=>$country_name,
                'slug'=>$country_slug,
                'banner'=>$banner,
                'alt'=>$alt,
            ];
        }
        return response()->json([

            'data'=>[
                'country'=>$country,
                'blogs'=>$master,
                // 'seo' => $seo,
            ],
        ],'200');
    }
}
