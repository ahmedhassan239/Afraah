<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Boat;
use App\Models\City;
use Illuminate\Http\Request;

class BoatApiController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api');
    }
    public function getBoatsCities($country_id,$service_id){
        $query = City::select('cities.id','cities.name as city_name','cities.slug as city_slug');
        $query->leftJoin('boats','boats.city_id','=','cities.id');
        $query->leftJoin('services','boats.service_id','=','services.id');
        if (is_numeric($service_id)) {
            $query->where('boats.service_id', $service_id);
        } else {
            $query->whereRaw("(services.slug like '%" . $service_id . "%')");
        }

        $query->leftJoin('countries','boats.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('boats.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
       $query->groupBy('id');
       $query = $query->get();
       $cities = $query->map(function ($value) {
        return [
            
                'id' => $value->id,
                'name' => $value->city_name,
                'slug' => $value->city_slug,
            ];
        });
        return response()->json([
            'data'=>[
                'cities' => $cities,
            ]
        ], '200');
    }

    public function getAllBoats($category_id,$service_id,$country_id,$city_id,$lang)
    {
        $query = Boat::where('status', 1)->with('category')
            ->whereHas('category', function ($x) use ($category_id) {
                return $x->where('id', $category_id)->orWhere('slug->ar', $category_id)->where('status', 1);
            });
        $query->with('service')->whereHas('service', function ($x) use ($service_id) {
            return $x->where('id', $service_id)->orWhere('slug', $service_id)->where('status', 1);
        });
        $query->with('country')->whereHas('country', function ($x) use ($country_id) {
            return $x->where('id', $country_id)->orWhere('slug', $country_id)->where('status', 1);
        });
        $query->with('city')->whereHas('city', function ($x) use ($city_id) {
            return $x->where('id', $city_id)->orWhere('slug', $city_id)->where('status', 1);
        });
        $query->with(['likes' => function ($query) {
            $query->where('boat_likes.user_id', '=', auth()->id());
        }]);

        $query = $query->paginate(12);

        $items = $query->map(function ($value) {
            return [
                'category' => [
                    'id' => $value->category->id,
                    'name' => $value->category->name,
                    'slug' => $value->category->slug,
                ],
                'service' => [
                    'id' => $value->service->id,
                    'name' => $value->service->name,
                    'slug' => $value->service->slug,
                ],
                'country' => [
                    'id' => $value->country->id,
                    'name' => $value->country->name,
                    'slug' => $value->country->slug,
                ],
                'city' => [
                    'id' => $value->city->id,
                    'name' => $value->city->name,
                    'slug' => $value->city->slug,
                ],

                'id' => $value->id,
                'name' => $value->name,
                'slug' => $value->slug,
                'overview' => $value->overview ?? '',
                'user_id' => $value->user_id,
                'thumb' => asset('storage/' . $value->thumb),
                'thumb_alt' => $value->thumb_alt,
                'has_offer' => $value->has_offer,
                'offer_percentage' => $value->offer_percentage ?? '',
                'like_type' => (count($value->likes) > 0) ? $value->likes[0]->like_type : 0,

            ];
        });
        $main[] = $query->map(function ($value) {
            return [
                'category' => [
                    'id' => $value->category->id,
                    'name' => $value->category->name,
                    'slug' => $value->category->slug,
                ],
                'service' => [
                    'id' => $value->service->id,
                    'name' => $value->service->name,
                    'slug' => $value->service->slug,
                ],
                'country' => [
                    'id' => $value->country->id,
                    'name' => $value->country->name,
                    'slug' => $value->country->slug,
                ],
                'city' => [
                    'id' => $value->city->id,
                    'name' => $value->city->name,
                    'slug' => $value->city->slug,
                ],
            ];
        })->unique();
        return response()->json([
            'data' => [
                'paginator' => [
                    'perPage' => $query->perPage(),
                    'currentPage' => $query->currentPage(),
                    'total' => $query->total(),
                    'lastPage' => $query->lastPage(),
                ],
                'main_details' => $main,
                'items' => $items,
            ]
        ], '200');
    }

    public function getDestinationBoats($country_id,$lang)
    {
        $query = Boat::where('status',1)->with('category','service','city');
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
        });

        $query->with(['likes'=>function($query){
        $query->where('boat_likes.user_id', '=', auth()->id());
        }]);    
        $query = $query->paginate(12);  

        $items = $query->map(function ($value) {
            return [
                'category' => [
                    'id' => $value->category->id,
                    'name' => $value->category->name,
                    'slug' => $value->category->slug,
                ],
                'service' => [
                    'id' => $value->service->id,
                    'name' => $value->service->name,
                    'slug' => $value->service->slug,
                ],
                'country' => [
                    'id' => $value->country->id,
                    'name' => $value->country->name,
                    'slug' => $value->country->slug,
                ],
                'city' => [
                    'id' => optional($value->city)->id,
                    'name' => optional($value->city)->name,
                    'slug' => optional($value->city)->slug,
                ],

                'id' => $value->id,
                'name' => $value->name,
                'slug' => $value->slug,
                'overview' => $value->overview,
                'user_id' => $value->user_id,
                'thumb' => asset('storage/' . $value->thumb),
                'thumb_alt' => $value->thumb_alt,
                'has_offer' => $value->has_offer,
                'offer_percentage' => $value->offer_percentage ?? '',
                'like_type'=>(count($value->likes) > 0) ? $value->likes[0]->like_type : 0 ,
            ];
       
        });

        $main[] = $query->map(function ($value) {
            return [
                'category' => [
                    'name' => $value->category->name,
                    'slug' => $value->category->slug,
                ],
                'service' => [
                    'name' => $value->service->name,
                    'slug' => $value->service->slug,
                ],
                'country' => [
                    'name' => $value->country->name,
                    'slug' => $value->country->slug,
                ],
                'city' => [
                    'name' => optional($value->city)->name,
                    'slug' => optional($value->city)->slug,
                ],
            ];
        })->first();  
        
        $banner = $query->map(function ($value) {
            return [
                'banner' => asset('storage/' . $value->service->banner),
                'banner_alt' => $value->service->alt ?? '',
            ];
        })->unique();            
        $seo = $query->map(function ($value) {
            return [
                'title' => $value->service->seo_title,
                'keywords' => $value->service->seo_keywords,
                'robots' => $value->service->seo_robots,
                'description' => $value->service->seo_description,
                'facebook_description' => $value->service->facebook_description,
                'twitter_title' => $value->service->twitter_title,
                'twitter_description' => $value->service->twitter_description,
                'facebook_title'=>$value->service->og_title,
                'twitter_image'=>asset('storage/' . $value->service->twitter_image),
                'facebook_image'=>asset('storage/' . $value->service->facebook_image),
            ];
        })->unique();
        return response()->json([
            'data'=>[
                'paginator' => [
                    'perPage' => $query->perPage(),
                    'currentPage' => $query->currentPage(),
                    'total' => $query->total(),
                    'lastPage' => $query->lastPage(),
                ],
                'main_details' => $main,
                'banner'=>$banner,
                'seo'=>$seo,
                'items' => $items,
                
            ]
        ], '200');
    }

    public function getFeaturedBoats($country_id,$lang)
    {
        $query = Boat::where('status',1)->where('feature','1')->with('category','service','city');
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
        });
        $query->with(['likes'=>function($query){
        $query->where('boat_likes.user_id', '=', auth()->id());
        }]);    
        $query = $query->get();

        $items = $query->map(function ($value) {
            return [
                'category' => [
                    'id' => $value->category->id,
                    'name' => $value->category->name,
                    'slug' => $value->category->slug,
                ],
                'service' => [
                    'id' => $value->service->id,
                    'name' => $value->service->name,
                    'slug' => $value->service->slug,
                ],
                'country' => [
                    'id' => $value->country->id,
                    'name' => $value->country->name,
                    'slug' => $value->country->slug,
                ],
                'city' => [
                    'id' => $value->city->id,
                    'name' => $value->city->name,
                    'slug' => $value->city->slug,
                ],

                'id' => $value->id,
                'name' => $value->name,
                'slug' => $value->slug,
                'overview' => $value->overview,
                'user_id' => $value->user_id,
                'thumb' => asset('storage/' . $value->thumb),
                'thumb_alt' => $value->thumb_alt,
                'has_offer' => $value->has_offer,
                'offer_percentage' => $value->offer_percentage ?? '',
                'like_type'=>(count($value->likes) > 0) ? $value->likes[0]->like_type : 0 ,
            ];
        });
        return response()->json([
            'data'=>[
                'items' => $items,
            ]
        ], '200');
    }

    public function getSingleBoat($boat_id,$lang)
    {
        app()->setLocale($lang);
        $query=Boat::select('boats.*',
                            'services.id as service_id','services.name as service_name','services.slug as service_slug',
                            'categories.id as category_id' , 'categories.name as category_name',
                            'categories.slug as category_slug',
                            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
                                'countries.id as country_id','countries.name as country_name',
                                'countries.slug as country_slug'
                        );
        $query->leftJoin('countries','boats.country_id','=','countries.id');
        $query->leftJoin('cities','boats.city_id','=','cities.id');

        $query->leftJoin('services','boats.service_id','=','services.id');
        $query->leftJoin('categories','boats.category_id','=','categories.id');
        if (is_numeric($boat_id)) {
            $query->where('boats.id', $boat_id);
        } else {
            $query->whereRaw("(boats.slug like '%" . $boat_id . "%')");
        }
        $query->where('boats.status',1);


        $boats = $query->get();

        // return $barber_shops;
        $data=array();
        foreach($boats as $item){
            $boat_id=$item->id;
            $boat_name=$item->name;
            $boat_slug=$item->slug;
            $boat_email=$item->email;
            $boat_phone=$item->phone;
            $boat_description=$item->description;
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
            $location = $item->location;
            $location_url =$item->location_url;
            $seo_title=$item->seo_title;
            $seo_keywords=$item->seo_keywords;
            $seo_robots=$item->seo_robots;
            $seo_description=$item->seo_description;
            $facebook_title=$item->og_title;
            $facebook_description=$item->facebook_description;
            $facebook_image=$item->facebook_image;
            $twitter_title=$item->twitter_title;
            $twitter_description=$item->twitter_description;
            $twitter_image=$item->twitter_image;
            $seo_schema=$item->seo_schema;
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
                    'id'=>$boat_id,
                    'name'=>$boat_name,
                    'slug'=>$boat_slug,
                    'phone'=>$boat_phone,
                    'email'=>$boat_email,
                    'description'=>$boat_description,
                    'user_id'=>$user_id,
                    'service'=>[
                        'id'=>$service_id,
                        'name'=>$service_name,
                        'slug'=>$service_slug,
                    ],
                    'country'=>[
                        'id'=>$country_id,
                        'name'=>$country_name,
                        'slug'=>$country_slug,
                    ],
                    'city'=>[
                        'id'=>$city_id,
                        'name'=>$city_name,
                        'slug'=>$city_slug,
                    ],
                    'category'=>[
                        'id'=>$category_id,
                        'name'=>$category_name,
                        'slug'=>$category_slug,
                    ],
                    'gallery'=>$gallery,
                    'banner' =>$banner,
                    'alt'=>$alt,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                    'location_description'=>$location,
                    'location_url'=>$location_url,
                    'seo'=>[
                        'title'=>$seo_title,
                        'keywords'=>$seo_keywords,
                        'robots'=>$seo_robots,
                        'description'=>$seo_description,
                        'facebook_title'=>$facebook_title,
                        'facebook_description'=>$facebook_description,
                        'facebook_image'=>$facebook_image,
                        'twitter_title'=>$twitter_title,
                        'twitter_description'=>$twitter_description,
                        'twitter_image'>$twitter_image,
                        'seo_schema'>$seo_schema,
                        ]
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
