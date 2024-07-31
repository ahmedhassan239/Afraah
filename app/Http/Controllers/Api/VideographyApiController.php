<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videography;
use Illuminate\Http\Request;

class VideographyApiController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api');
    }

    public function getAllVideographies($category_id,$service_id,$country_id,$city_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query=Videography::select('videographies.*',
            'services.id as service_id','services.name as service_name','services.slug as service_slug',
            'categories.id as category_id','categories.name as category_name','categories.slug as category_slug',
            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
            'countries.id as country_id','countries.name as country_name',
            'countries.slug as country_slug',
            'services.seo_title as service_seo_title','services.seo_keywords as service_seo_keywords',
            'services.seo_robots as services_seo_robots','services.seo_description as services_seo_description',
            'services.facebook_description as services_facebook_description','services.facebook_image as services_facebook_image',
            'services.twitter_title as services_twitter_title','services.twitter_description as services_twitter_description',
            'services.twitter_image as services_twitter_image',
            'videography_likes.like_type as videography_like_type'

        );
        $query->leftJoin('countries','videographies.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('videographies.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }

        $query->leftJoin('videography_likes', function ($join){
            $join->on( 'videographies.id', '=', 'videography_likes.article_id');
            $join->where( 'videography_likes.user_id', '=', auth()->id());
        });

        $query->leftJoin('cities','videographies.city_id','=','cities.id');
        if (is_numeric($city_id)) {
            $query->where('videographies.city_id', $city_id);
        } else {
            $query->whereRaw("(cities.slug like '%" . $city_id . "%')") ;
        }

        $query->leftJoin('categories','videographies.category_id','=','categories.id');
        if (is_numeric($category_id)) {
            $query->where('videographies.category_id', $category_id);
        } else {
            $query->whereRaw("(categories.slug like '%" . $category_id . "%')");
        }

        $query->leftJoin('services','videographies.service_id','=','services.id');
        if (is_numeric($service_id)) {
            $query->where('videographies.service_id', $service_id);
        } else {
            $query->whereRaw("(services.slug like '%" . $service_id . "%')");
        }
        $query->where('videographies.status',1);


        return $this->extracted($query, $country_id);
    }

    public function getDestinationVideographies($country_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query=Videography::select('videographies.*',
            'services.id as service_id','services.name as service_name','services.slug as service_slug',
            'services.seo_title as service_seo_title','services.seo_keywords as service_seo_keywords',
            'services.seo_robots as service_seo_robots','services.seo_description as service_seo_description',
            'services.facebook_description as service_facebook_description','services.facebook_image as service_facebook_image',
            'services.twitter_title as service_twitter_title','services.twitter_description as service_twitter_description',
            'services.twitter_image as service_twitter_image','services.banner as service_banner',
            'services.banner_alt as service_banner_alt',
            'categories.id as category_id' , 'categories.name as category_name',
            'categories.slug as category_slug',
            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
            'countries.id as country_id','countries.name as country_name',
            'countries.slug as country_slug',
            'videography_likes.like_type as videography_like_type'

        );
        $query->leftJoin('countries','videographies.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('videographies.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->leftJoin('videography_likes', function ($join){
            $join->on( 'videographies.id', '=', 'videography_likes.article_id');
            $join->where( 'videography_likes.user_id', '=', auth()->id());
        });
        $query->leftJoin('services','videographies.service_id','=','services.id');
        $query->leftJoin('categories','videographies.category_id','=','categories.id');
        $query->leftJoin('cities','videographies.city_id','=','cities.id');

        $query->where('videographies.status',1);

        return $this->extracted($query, $country_id);
    }

    public function getFeaturedVideographies($country_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query=Videography::select('videographies.*',
            'services.id as service_id','services.name as service_name','services.slug as service_slug',
            'categories.id as category_id' , 'categories.name as category_name',
            'categories.slug as category_slug',
            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
            'countries.id as country_id','countries.name as country_name',
            'countries.slug as country_slug',
            'videography_likes.like_type as videography_like_type'

        );
        $query->leftJoin('countries','videographies.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('videographies.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->leftJoin('videography_likes', function ($join){
            $join->on( 'videographies.id', '=', 'videography_likes.article_id');
            $join->where( 'videography_likes.user_id', '=', auth()->id());
        });

        $query->leftJoin('cities','videographies.city_id','=','cities.id');


        $query->leftJoin('categories','videographies.category_id','=','categories.id');


        $query->leftJoin('services','videographies.service_id','=','services.id');

        $query->where('videographies.status',1);
        $query->where('videographies.feature',1);

        return $this->extracted($query, $country_id);
    }


    public function getSingleVideography($videographer_id,$lang)
    {
        app()->setLocale($lang);
        $query=Videography::select('videographies.*',
                            'services.id as service_id','services.name as service_name','services.slug as service_slug',
                            'categories.id as category_id' , 'categories.name as category_name',
                            'categories.slug as category_slug',
                            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
                                'countries.id as country_id','countries.name as country_name',
                                'countries.slug as country_slug'
                        );
        $query->leftJoin('countries','videographies.country_id','=','countries.id');
        $query->leftJoin('cities','videographies.city_id','=','cities.id');

        $query->leftJoin('services','videographies.service_id','=','services.id');
        $query->leftJoin('categories','videographies.category_id','=','categories.id');
        if (is_numeric($videographer_id)) {
            $query->where('videographies.id', $videographer_id);
        } else {
            $query->whereRaw("(videographies.slug like '%" . $videographer_id . "%')");
        }
        $query->where('videographies.status',1);

        $videographies = $query->get();

        // return $barber_shops;
        $data=array();
        foreach($videographies as $item){
            $id=$item->id;
            $name=$item->name;
            $slug=$item->slug;
            $email=$item->email;
            $phone=$item->phone;
            $description=$item->description;
            $user_id=$item->user_id;
            $service_id=$item->service_id;
            $country_id=$item->country_id;
            $city_id=$item->city_id;
            $category_id=$item->category_id;
            $service_name=$item->service_name;
            $service_slug=$item->service_slug;
            $category_name=$item->category_name;
            $category_slug=$item->category_slug;
            $city_name=$item->city_name;
            $city_slug=$item->city_slug;
            $country_name=$item->country_name;
            $country_slug=$item->country_slug;
            $banner = asset('storage/'.$item->banner);
            $alt=$item->alt;
            $thumb = asset('storage/'.$item->thumb);
            $thumb_alt=$item->thumb_alt;
            $location=$item->location;
            $seo_title=$item->seo_title;
            $seo_keywords=$item->seo_keywords;
            $seo_robots=$item->seo_robots;
            $seo_description=$item->seo_description;
            $facebook_description=$item->facebook_description;
            $facebook_image=$item->facebook_image;
            $twitter_title=$item->twitter_title;
            $twitter_description=$item->twitter_description;
            $twitter_image=$item->twitter_image;
            $gallery=array();
            $package=array();

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
            if (is_array($item->package)) {
                $y=1;
                foreach ($item->package as $key) {
                    $package[]=[
                        'id'=>$y,
                        'package name'=>$key['attributes']['package_name'],
                        'package image'=>asset('storage/'.$key['attributes']['package_image']),
                        'package description'=>$key['attributes']['description'],
                        'package price'=>$key['attributes']['package_price'],

                    ];
                    $x++;
                }
            }
            if(isset($data)){
                $data[]=[
                    'id'=>$id,
                    'name'=>$name,
                    'slug'=>$slug,
                    'phone'=>$phone,
                    'email'=>$email,
                    'description'=>$description,
                    'user_id'=>$user_id,
                    'service_id'=>$service_id,
                    'service_name'=>$service_name,
                    'service_slug'=>$service_slug,
                    'country_id'=>$country_id,
                    'country_name'=>$country_name,
                    'country_slug'=>$country_slug,
                    'city_id'=>$city_id,
                    'city_name'=>$city_name,
                    'city_slug'=>$city_slug,
                    'category_id'=>$category_id,
                    'category_name'=>$category_name,
                    'category_slug'=>$category_slug,
                    'gallery'=>$gallery,
                    'package'=>$package,
                    'banner' =>$banner,
                    'alt'=>$alt,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                    'location'=>$location,
                    'seo_title'=>$seo_title,
                    'seo_keywords'=>$seo_keywords,
                    'seo_robots'=>$seo_robots,
                    'seo_description'=>$seo_description,
                    'facebook_description'=>$facebook_description,
                    'facebook_image'=>$facebook_image,
                    'twitter_title'=>$twitter_title,
                    'twitter_description'=>$twitter_description,
                    'twitter_image'=>$twitter_image,
                ];
            }else{
                $data[]=[];
            }
        }
        return response()->json([
            'data'=>$data
        ],'200');
    }


    /**
     * @param $query
     * @param $country_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function extracted($query, $country_id): \Illuminate\Http\JsonResponse
    {
        $videographies= $query->get();
        $seo = array();
        $general_data = array();
        $data = array();
        foreach ($videographies as $item) {
            $id = $item->id;
            $name = $item->name;
            $slug = $item->slug;
            $email = $item->email;
            $phone = $item->phone;
            $description = $item->description;
            $user_id = $item->user_id;
            $service_id = $item->service_id;
            $country_id = $item->country_id;
            $city_id = $item->city_id;
            $category_id = $item->category_id;
            $service_name = $item->service_name;
            $service_slug = $item->service_slug;
            $service_banner = $item->service_banner ? asset('storage/' . $item->service_banner) :null;
            $category_name = $item->category_name;
            $category_slug = $item->category_slug;
            $city_name = $item->city_name;
            $city_slug = $item->city_slug;
            $country_name = $item->country_name;
            $country_slug = $item->country_slug;
            $banner = asset('storage/' . $item->banner);
            $alt = $item->alt;
            $thumb = asset('storage/' . $item->thumb);
            $thumb_alt = $item->thumb_alt;
            $seo_title = $item->service_seo_title;
            $seo_keywords = $item->service_seo_keywords;
            $seo_robots = $item->services_seo_robots;
            $seo_description = $item->services_seo_description;
            $facebook_description = $item->services_facebook_description;
            $facebook_image = $item->services_facebook_image;
            $twitter_title = $item->services_twitter_title;
            $twitter_description = $item->services_twitter_description;
            $twitter_image = $item->services_twitter_image;
            $like_type= ($item->videography_like_type)?$item->videography_like_type:0;

            $gallery = array();
            if (is_array($item->gallery)) {
                $x = 1;
                foreach ($item->gallery as $key) {
                    $gallery[] = [
                        'id' => $x,
                        'image' => asset('storage/' . $key['attributes']['image']),
                    ];
                    $x++;
                }
            }
            if (isset($data)) {
                $data[] = [
                    'id' => $id,
                    'name' => $name,
                    'slug' => $slug,
                    'phone' => $phone,
                    'email' => $email,
                    'description' => $description,
                    'user_id' => $user_id,
//                    'gallery'=>$gallery,
                    'banner' => $banner,
                    'alt' => $alt,
                    'thumb' => $thumb,
                    'thumb_alt' => $thumb_alt,
                    'like_type'=>$like_type

                ];
            } else {
                $data[] = [];
            }
            $seo = [
                'seo_title' => $seo_title,
                'seo_keywords' => $seo_keywords,
                'seo_robots' => $seo_robots,
                'seo_description' => $seo_description,
                'facebook_description' => $facebook_description,
                'facebook_image' => $facebook_image,
                'twitter_title' => $twitter_title,
                'twitter_description' => $twitter_description,
                'twitter_image' => $twitter_image,
            ];
            $general_data = [
                'category_id' => $category_id,
                'category_name' => $category_name,
                'category_slug' => $category_slug,
                'service_id' => $service_id,
                'service_name' => $service_name,
                'service_slug' => $service_slug,
                'service_banner' => $service_banner,
                'service_banner_alt' => $alt,
                'country_id' => $country_id,
                'country_name' => $country_name,
                'country_slug' => $country_slug,
                'city_id' => $city_id,
                'city_name' => $city_name,
                'city_slug' => $city_slug,
            ];
        }
        return response()->json([
            'general_data' => $general_data,
            'seo_data' => $seo,
            'data' => $data,
        ], '200');
    }

}
