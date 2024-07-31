<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel;
use App\User;
use Illuminate\Http\Request;

class HotelApiController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api');
    }

    public function getHotelsCities($country_id,$service_id){
        $query = City::select('cities.id','cities.name as city_name','cities.slug as city_slug');
        $query->leftJoin('hotels','hotels.city_id','=','cities.id');
        $query->leftJoin('services','hotels.service_id','=','services.id');
        if (is_numeric($service_id)) {
            $query->where('hotels.service_id', $service_id);
        } else {
            $query->whereRaw("(services.slug like '%" . $service_id . "%')");
        }

        $query->leftJoin('countries','hotels.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('hotels.country_id', $country_id);
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
 
    public function getAllHotels($category_id, $service_id, $country_id, $city_id, $lang): \Illuminate\Http\JsonResponse
    {
        $query = Hotel::where('status',1)->with('category')
           ->whereHas('category',function ($x) use($category_id){
               return $x->where('id',$category_id)->orWhere('slug->ar',$category_id)->where('status',1);
           });
       $query->with('service')->whereHas('service',function ($x) use($service_id){
           return $x->where('id',$service_id)->orWhere('slug',$service_id)->where('status',1);
       });
       $query->with('country')->whereHas('country',function ($x) use($country_id){
           return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
       });
       $query->with('city')->whereHas('city',function ($x) use($city_id){
           return $x->where('id',$city_id)->orWhere('slug',$city_id)->where('status',1);
       });
       $query->with(['likes'=>function($query){
        $query->where('hotel_likes.user_id', '=', auth()->id());
       }]);

       $query = $query->paginate(12);
    
       $beauty_centers = $query->map(function ($value) {
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
                'description' => $value->description ?? '',
                'start_price' => $value->price ?? '',
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
            'data'=>[
                'paginator' => [
                    'perPage' => $query->perPage(),
                    'currentPage' => $query->currentPage(),
                    'total' => $query->total(),
                    'lastPage' => $query->lastPage(),
                ],
                'main_details' => $main,
                'items' => $beauty_centers,
            ]
        ], '200');
    }

    public function getDestinationHotels($country_id, $lang): \Illuminate\Http\JsonResponse
    {
        $query = Hotel::where('status',1)->with('category','service','city');
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
        });
        $query->with(['likes'=>function($query){
        $query->where('hotel_likes.user_id', '=', auth()->id());
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
                'overview' => $value->overview,
                'user_id' => $value->user_id,
                'description' => $value->description ?? '',
                'start_price' => $value->price ?? '',
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
                    'name' => $value->city->name,
                    'slug' => $value->city->slug,
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
                'seo_schema'=>$value->service->seo_schema,
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

    public function getFeaturedHotels($country_id, $lang): \Illuminate\Http\JsonResponse
    {
        $query = Hotel::where('status',1)->where('feature','1')->with('category','service','city');
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
        });
        $query->with(['likes'=>function($query){
        $query->where('hotel_likes.user_id', '=', auth()->id());
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
                'description' => $value->description ?? '',
                'start_price' => $value->price ?? '',
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

    public function getSingleHotel($hotel_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query=Hotel::select('hotels.*',
                            'services.id as service_id','services.name as service_name','services.slug as service_slug',
                            'categories.id as category_id' , 'categories.name as category_name',
                            'categories.slug as category_slug',
                            'cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
                                'countries.id as country_id','countries.name as country_name',
                                'countries.slug as country_slug'
                        );
        $query->leftJoin('countries','hotels.country_id','=','countries.id');
        $query->leftJoin('cities','hotels.city_id','=','cities.id');

        $query->leftJoin('services','hotels.service_id','=','services.id');
        $query->leftJoin('categories','hotels.category_id','=','categories.id');
        if (is_numeric($hotel_id)) {
            $query->where('hotels.id', $hotel_id);
        } else {
            $query->whereRaw("(hotels.slug like '%" . $hotel_id . "%')");
        }
        $query->where('hotels.status',1);
        $hotels = $query->get();


        $data=array();
        foreach($hotels as $item){
            $id=$item->id;
            $name=$item->name;
            $slug=$item->slug;
            $email=$item->email;
            $phone=$item->phone;
            $description=$item->description;
            $price = $item->price;
            $discount = $item->discount;
            $offer_details = $item->offer_details;
            $capacity = $item->capacity;
            $user_id=$item->user_id;
            $responsible_person = User::where('id',$user_id)->first()->name;
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
            $location =$item->location;
            $location_url = $item->location_url;
            $seo_title=$item->seo_title;
            $seo_keywords=$item->seo_keywords;
            $seo_robots=$item->seo_robots;
            $seo_description=$item->seo_description;
            $facebook_description=$item->facebook_description;
            $facebook_image=$item->facebook_image;
            $twitter_title=$item->twitter_title;
            $twitter_description=$item->twitter_description;
            $twitter_image=$item->twitter_image;
            $hall=array();
            $gallery=array();
//            dd($item->gallery);
            if (is_array($item->gallery)) {
                $x=1;
                foreach ($item->gallery as $key) {
                    if (array_key_exists('image',$key['attributes'])){
                        $image = asset('storage/'.$key['attributes']['image']);
                    }else{
                        $image = [];
                    }
                    if (array_key_exists('image_alt',$key['attributes'])){
                        $image_alt = $key['attributes']['image_alt'][$lang];
                    }else{
                        $image_alt = [];
                    }
                    $gallery[]=[
                        'id'=>$x,
                        'image'=>$image,
                        'image_alt'=>$image_alt,
                    ];
                    $x++;
                }
            }

            if (is_array($item->hall)) {
                $y=1;

                foreach ($item->hall as $key) {

                    $hall[]=[
                        'id'=>$y,
                        'key'=>$key['key'],
                        'hall_name'=>$key['attributes']['hall_name']['ar'],
                        'hall_slug'=>$key['attributes']['hall_slug'],
                        'hall_thumb'=>asset('storage/'.$key['attributes']['hall_thumb']),
                        'hall_thumb_alt'=>$key['attributes']['hall_thumb_alt'][$lang],
                        'hall_capacity'=>$key['attributes']['hall_capacity'],
                        'hall_price'=>$key['attributes']['hall_price'],
                    ];
                    $y++;
                }
            }
            if(isset($data)){
                $data[]=[
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
                    'service'=>[
                        'id'=>$service_id,
                        'name'=>$service_name,
                        'slug'=>$service_slug,
                    ],
                    
                    'id'=>$id,
                    'name'=>$name,
                    'slug'=>$slug,
                    'phone'=>$phone,
                    'email'=>$email,
                    'description'=>$description,
                    'price_starting_from'=>$price,
                    'discount'=>$discount,
                    'capacity'=>$capacity,
                    'offer_details'=>$offer_details,
                    'user_id'=>$user_id,
                    'responsible_person'=>$responsible_person,
                    'halls'=>$hall,
                    'gallery'=>$gallery,
                    'banner' =>$banner,
                    'alt'=>$alt,
                    'thumb' =>$thumb,
                    'thumb_alt'=>$thumb_alt,
                    'location'=>$location,
                    'location_url'=>$location_url,
                    'seo'=>[
                        'title'=>$seo_title,
                        'keywords'=>$seo_keywords,
                        'robots'=>$seo_robots,
                        'description'=>$seo_description,
                        'facebook_description'=>$facebook_description,
                        'facebook_image'=>$facebook_image,
                        'twitter_title'=>$twitter_title,
                        'twitter_description'=>$twitter_description,
                        'twitter_image'=>$twitter_image,
                        'facebook_title'=>'',
                        'seo_schema'=>'',
                    ]
                ];
            }else{
                $data[]=[];
            }
        }
//        dd($data[]);
        return response()->json([
            'data'=>$data
        ],'200');
    }

    public function getSingleHall($hotel_id,$key,$lang){
        app()->setLocale($lang);
        $query = Hotel::where('status',1);
        if (is_numeric($hotel_id)) {
            $query->where('hotels.id', $hotel_id);
        } else {
            $query->whereRaw("(hotels.slug like '%" . $hotel_id . "%')");
        }
        $halls = $query->first();
        foreach ($halls['hall'] as $hall){
            $x=array();
            $hall_gallery = array();
            $hall_key = $hall['key'];
            if ($hall_key == $key){
               $name = $hall['attributes']['hall_name'][$lang];
               $slug = $hall['attributes']['hall_slug'];
               $thumb =  asset('storage/'. $hall['attributes']['hall_thumb']);
               $thumb_alt =$hall['attributes']['hall_thumb_alt'][$lang];
               $banner =  asset('storage/'. $hall['attributes']['hall_banner']);
               $banner_alt =$hall['attributes']['hall_banner_alt'][$lang];
               $description =$hall['attributes']['description'][$lang];
               $hall_capacity =$hall['attributes']['hall_capacity'];
               $hall_price =$hall['attributes']['hall_price'];

                if(is_array($hall['attributes']['hall_images'])){
                    $z=1;
                    foreach($hall['attributes']['hall_images'] as $row){
                        if (array_key_exists('image',$row['attributes'])){
                            $image = asset('storage/'.$row['attributes']['image']);
                        }else{
                            $image = [];
                        }
                        if (array_key_exists('image_alt',$row['attributes'])){
                            $image_alt = $row['attributes']['image_alt'][$lang];
                        }else{
                            $image_alt = [];
                        }
                            $hall_gallery[]=[
                                'id'=>$z,
                                'image'=>$image,
                                'image_alt'=>$image_alt,
                            ];


                        $z++;
                    }
                }
                if (isset($x)){
                    $x[]=[
                        'hall_name'=>$name,
                        'hall_slug'=>$slug,
                        'hall_thumb'=>$thumb,
                        'hall_thumb_alt'=>$thumb_alt,
                        'hall_banner'=>$banner,
                        'hall_banner_alt'=> $banner_alt,
                        'hall_gallery'=> $hall_gallery,
                        'hall_description'=>$description,
                        'hall_capacity'=>$hall_capacity,
                        'hall_price'=>$hall_price,
                    ];
                }else{
                    $x[]=[];
                }

                return response()->json([
                    'data'=>$x
                ],'200');
            }

        }
    }
}
