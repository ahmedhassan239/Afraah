<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleApiController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api');
    }
    public function getMotorcycles($category_id,$service_id,$country_id,$city_id,$lang)
    {
        app()->setLocale($lang);
        $query=Motorcycle::select('motorcycles.*',
            'services.id as service_id','services.name as service_name','services.slug as service_slug',
            'services.seo_title as service_seo_title','services.seo_keywords as service_seo_keywords',
            'services.seo_robots as services_seo_robots','services.seo_description as services_seo_description',
            'services.facebook_description as services_facebook_description','services.facebook_image as services_facebook_image',
            'services.twitter_title as services_twitter_title','services.twitter_description as services_twitter_description',
            'services.twitter_image as services_twitter_image',
            'categories.id as category_id' , 'categories.name as category_name',
            'categories.slug as category_slug',
            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
            'countries.id as country_id','countries.name as country_name',
            'countries.slug as country_slug',
            'motorcycle_likes.like_type as motorcycle_like_type'

        );
        $query->leftJoin('countries','motorcycles.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('motorcycles.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->leftJoin('motorcycle_likes', function ($join){
            $join->on( 'motorcycles.id', '=', 'motorcycle_likes.article_id');
            $join->where( 'motorcycle_likes.user_id', '=', auth()->id());
        });
        $query->leftJoin('cities','motorcycles.city_id','=','cities.id');
        if (is_numeric($city_id)) {
            $query->where('motorcycles.city_id', $city_id);
        } else {
            $query->whereRaw("(cities.slug like '%" . $city_id . "%')") ;
        }

        $query->leftJoin('categories','motorcycles.category_id','=','categories.id');
        if (is_numeric($category_id)) {
            $query->where('motorcycles.category_id', $category_id);
        } else {
            $query->whereRaw("(categories.slug like '%" . $category_id . "%')");
        }

        $query->leftJoin('services','motorcycles.service_id','=','services.id');
        if (is_numeric($service_id)) {
            $query->where('motorcycles.service_id', $service_id);
        } else {
            $query->whereRaw("(services.slug like '%" . $service_id . "%')");
        }
        $query->where('motorcycles.status',1);

        $motorcycles = $query->get();
        $data=array();
        $seo = array();
        $general_data = array();
        foreach($motorcycles as $item){
            $motorcycle_id=$item->id;
            $motorcycle_name=$item->name;
            $motorcycle_slug=$item->slug;
            $motorcycle_code=$item->code;
            $motorcycle_style=$item->style;
            $motorcycle_description=$item->description;
            $user_id=$item->user_id;
            $motorcycle_rental_showroom_name=$item->car_rental_showroom_name;
            $motorcycle_rental_showroom_location=$item->car_rental_showroom_location;
            $motorcycle_rental_showroom_number=$item->car_rental_showroom_number;
            $motorcycle_rental_showroom_email=$item->car_rental_showroom_email;
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
            $seo_title=$item->seo_title;
            $seo_keywords=$item->seo_keywords;
            $seo_robots=$item->seo_robots;
            $seo_description=$item->seo_description;
            $facebook_description=$item->facebook_description;
            $facebook_image=$item->facebook_image;
            $twitter_title=$item->twitter_title;
            $twitter_description=$item->twitter_description;
            $twitter_image=$item->twitter_image;
            $like_type= ($item->motorcycle_like_type)?$item->motorcycle_like_type:0;

            if(isset($data)){
                $data[]=[
                    'id'=>$motorcycle_id,
                    'name'=>$motorcycle_name,
                    'slug'=>$motorcycle_slug,
                    'code'=>$motorcycle_code,
                    'style'=>$motorcycle_style,
                    'description'=>$motorcycle_description,
                    'user_id'=>$user_id,
                    'rental_showroom_name'=>$motorcycle_rental_showroom_name,
                    'rental_showroom_location'=>$motorcycle_rental_showroom_location,
                    'rental_showroom_number'=>$motorcycle_rental_showroom_number,
                    'rental_showroom_email'=>$motorcycle_rental_showroom_email,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                    'like_type'=>$like_type


                ];
            }else{
                $data[]=[];
            }
            $seo=[
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
            $general_data = [
                'category_id'=>$category_id,
                'category_name'=>$category_name,
                'category_slug'=>$category_slug,
                'service_id'=>$service_id,
                'service_name'=>$service_name,
                'service_slug'=>$service_slug,
                'service_banner' =>$banner,
                'service_banner_alt'=>$alt,
                'country_id'=>$country_id,
                'country_name'=>$country_name,
                'country_slug'=>$country_slug,
                'city_id'=>$city_id,
                'city_name'=>$city_name,
                'city_slug'=>$city_slug,
            ];

        }
        return response()->json([
            'general_data'=>$general_data,
            'seo_data' => $seo,
            'data'=>$data,
        ],'200');
    }

    public function getDestinationMotorcycles($country_id,$lang)
    {
        app()->setLocale($lang);
        $query=Motorcycle::select('motorcycles.*',
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
            'motorcycle_likes.like_type as motorcycle_like_type'

        );
        $query->leftJoin('countries','motorcycles.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('motorcycles.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->leftJoin('motorcycle_likes', function ($join){
            $join->on( 'motorcycles.id', '=', 'motorcycle_likes.article_id');
            $join->where( 'motorcycle_likes.user_id', '=', auth()->id());
        });
        $query->leftJoin('services','motorcycles.service_id','=','services.id');
        $query->leftJoin('categories','motorcycles.category_id','=','categories.id');
        $query->leftJoin('cities','motorcycles.city_id','=','cities.id');

        $query->where('motorcycles.status',1);
        $motorcycles = $query->get();
        $data=array();
        $seo = array();
        $general_data = array();
        foreach($motorcycles as $item){
            $motorcycle_id=$item->id;
            $motorcycle_name=$item->name;
            $motorcycle_slug=$item->slug;
            $motorcycle_description=$item->description;
            $user_id=$item->user_id;
            $motorcycle_code=$item->code;
            $motorcycle_style=$item->style;
            $motorcycle_rental_showroom_name=$item->car_rental_showroom_name;
            $motorcycle_rental_showroom_location=$item->car_rental_showroom_location;
            $motorcycle_rental_showroom_number=$item->car_rental_showroom_number;
            $motorcycle_rental_showroom_email=$item->car_rental_showroom_email;
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
            $banner = asset('storage/'.$item->service_banner);
            $thumb = asset('storage/'.$item->thumb);
            $thumb_alt=$item->thumb_alt;
            $alt= $item->service_banner_alt;
            $seo_title =$item->service_seo_title;
            $seo_keywords =$item->service_seo_keywords;
            $seo_robots=$item->service_seo_robots;
            $seo_description=$item->service_seo_description;
            $facebook_description=$item->service_facebook_description;
            $facebook_image=$item->service_facebook_image;
            $twitter_title=$item->service_twitter_title;
            $twitter_description=$item->service_twitter_description;
            $twitter_image=$item->service_twitter_image;
            $like_type= ($item->motorcycle_like_type)?$item->motorcycle_like_type:0;

            if(isset($data)){
                $data[]=[
                    'id'=>$motorcycle_id,
                    'name'=>$motorcycle_name,
                    'slug'=>$motorcycle_slug,
                    'description'=>$motorcycle_description,
                    'code'=>$motorcycle_code,
                    'style'=>$motorcycle_style,
                    'rental_showroom_name'=>$motorcycle_rental_showroom_name,
                    'rental_showroom_location'=>$motorcycle_rental_showroom_location,
                    'rental_showroom_number'=>$motorcycle_rental_showroom_number,
                    'rental_showroom_email'=>$motorcycle_rental_showroom_email,
                    'user_id'=>$user_id,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                    'like_type'=>$like_type


                ];
            }else{
                $data[]=[];
            }
            $seo=[
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
            $general_data = [
                'category_id'=>$category_id,
                'category_name'=>$category_name,
                'category_slug'=>$category_slug,
                'service_id'=>$service_id,
                'service_name'=>$service_name,
                'service_slug'=>$service_slug,
                'service_banner' =>$banner,
                'service_banner_alt'=>$alt,
                'country_id'=>$country_id,
                'country_name'=>$country_name,
                'country_slug'=>$country_slug,
                'city_id'=>$city_id,
                'city_name'=>$city_name,
                'city_slug'=>$city_slug,
            ];
        }
        return response()->json([
            'general_data'=>$general_data,
            'seo_data' => $seo,
            'data'=>$data,
        ],'200');

    }

    public function getFeaturedMotorcycles($country_id,$lang)
    {
        app()->setLocale($lang);
        $query=Motorcycle::select('motorcycles.*',
            'services.id as service_id','services.name as service_name','services.slug as service_slug',
            'services.seo_title as service_seo_title','services.seo_keywords as service_seo_keywords',
            'services.seo_robots as services_seo_robots','services.seo_description as services_seo_description',
            'services.facebook_description as services_facebook_description','services.facebook_image as services_facebook_image',
            'services.twitter_title as services_twitter_title','services.twitter_description as services_twitter_description',
            'services.twitter_image as services_twitter_image',
            'categories.id as category_id' , 'categories.name as category_name',
            'categories.slug as category_slug',
            'countries.id as country_id','countries.name as country_name',
            'countries.slug as country_slug',
            'cities.id as city_id','cities.name as city_name',
            'cities.slug as city_slug',
            'motorcycle_likes.like_type as motorcycle_like_type'

        );
        $query->leftJoin('countries','motorcycles.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('motorcycles.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->leftJoin('motorcycle_likes', function ($join){
            $join->on( 'motorcycles.id', '=', 'motorcycle_likes.article_id');
            $join->where( 'motorcycle_likes.user_id', '=', auth()->id());
        });
        $query->leftJoin('cities','motorcycles.city_id','=','cities.id');
        $query->leftJoin('categories','motorcycles.category_id','=','categories.id');
        $query->leftJoin('services','motorcycles.service_id','=','services.id');
        $query->where('motorcycles.status',1);
        $query->where('motorcycles.feature',1);
        $motorcycles = $query->get();
        $data=array();
        $general_data = array();
        foreach($motorcycles as $item){
            $motorcycle_id=$item->id;
            $motorcycle_name=$item->name;
            $motorcycle_slug=$item->slug;
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
            $like_type= ($item->motorcycle_like_type)?$item->motorcycle_like_type:0;


            if(isset($data)){
                $data[]=[
                    'id'=>$motorcycle_id,
                    'name'=>$motorcycle_name,
                    'slug'=>$motorcycle_slug,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                ];
            }else{
                $data[]=[];
            }
            $general_data = [
                'category_id'=>$category_id,
                'category_name'=>$category_name,
                'category_slug'=>$category_slug,
                'service_id'=>$service_id,
                'service_name'=>$service_name,
                'service_slug'=>$service_slug,
                'service_banner' =>$banner,
                'service_banner_alt'=>$alt,
                'country_id'=>$country_id,
                'country_name'=>$country_name,
                'country_slug'=>$country_slug,
                'city_id'=>$city_id,
                'city_name'=>$city_name,
                'city_slug'=>$city_slug,
                'like_type'=>$like_type

            ];
        }
        return response()->json([
            'general_data'=>$general_data,
            'data'=>$data,
        ],'200');

    }

    public function getSingleMotorcycle($motor_id,$lang)
    {
        app()->setLocale($lang);
        $query=Motorcycle::select('motorcycles.*',
                            'services.id as service_id','services.name as service_name','services.slug as service_slug',
                            'categories.id as category_id' , 'categories.name as category_name',
                            'categories.slug as category_slug',
                            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
                                'countries.id as country_id','countries.name as country_name',
                                'countries.slug as country_slug'
                        );
        $query->leftJoin('countries','motorcycles.country_id','=','countries.id');
        $query->leftJoin('cities','motorcycles.city_id','=','cities.id');

        $query->leftJoin('services','motorcycles.service_id','=','services.id');
        $query->leftJoin('categories','motorcycles.category_id','=','categories.id');
        if (is_numeric($motor_id)) {
            $query->where('motorcycles.id', $motor_id);
        } else {
            $query->whereRaw("(motorcycles.slug like '%" . $motor_id . "%')");
        }
        $query->where('motorcycles.status',1);

        $motorcycles = $query->get();

        // return $limousines;
        $data=array();
        foreach($motorcycles as $item){
            $motorcycle_id=$item->id;
            $motorcycle_name=$item->name;
            $motorcycle_slug=$item->slug;
            $motorcycle_code=$item->code;
            $motorcycle_style=$item->style;
            $motorcycle_description=$item->description;
            $user_id=$item->user_id;
            $motorcycle_rental_showroom_name=$item->car_rental_showroom_name;
            $motorcycle_rental_showroom_location=$item->car_rental_showroom_location;
            $motorcycle_rental_showroom_number=$item->car_rental_showroom_number;
            $motorcycle_rental_showroom_email=$item->car_rental_showroom_email;
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
            if(isset($data)){
                $data[]=[
                    'id'=>$motorcycle_id,
                    'name'=>$motorcycle_name,
                    'slug'=>$motorcycle_slug,
                    'code'=>$motorcycle_code,
                    'style'=>$motorcycle_style,
                    'description'=>$motorcycle_description,
                    'user_id'=>$user_id,
                    'rental_showroom_name'=>$motorcycle_rental_showroom_name,
                    'rental_showroom_location'=>$motorcycle_rental_showroom_location,
                    'rental_showroom_number'=>$motorcycle_rental_showroom_number,
                    'rental_showroom_email'=>$motorcycle_rental_showroom_email,
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
}
