<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\RingsJewellery;
use App\Http\Controllers\Controller;
use App\Models\City;

class RingsJewelleryApiController extends Controller
{
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    public function getRingsCities($country_id, $service_id)
    {
        $query = City::select('cities.id', 'cities.name as city_name', 'cities.slug as city_slug');
        $query->leftJoin('rings_jewelleries', 'rings_jewelleries.city_id', '=', 'cities.id');
        $query->leftJoin('services', 'rings_jewelleries.service_id', '=', 'services.id');
        if (is_numeric($service_id)) {
            $query->where('rings_jewelleries.service_id', $service_id);
        } else {
            $query->whereRaw("(services.slug like '%" . $service_id . "%')");
        }

        $query->leftJoin('countries', 'rings_jewelleries.country_id', '=', 'countries.id');
        if (is_numeric($country_id)) {
            $query->where('rings_jewelleries.country_id', $country_id);
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
            'data' => [
                'cities' => $cities,
            ]
        ], '200');
    }

    public function getRings($category_id, $service_id, $country_id, $city_id, $lang)
    {
        $query = RingsJewellery::where('status', 1)->with('category')
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
            $query->where('ring_jewellery_likes.user_id', '=', auth()->id());
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

    public function getDestinationRings($country_id, $lang)
    {
        $query = RingsJewellery::where('status',1)->with('category','service','city');
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
        });
        $query->with(['likes'=>function($query){
        $query->where('ring_jewellery_likes.user_id', '=', auth()->id());
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

    public function getFeaturedRings($country_id, $lang)
    {
        $query = RingsJewellery::where('status',1)->where('feature','1')->with('category','service','city');
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id)->where('status',1);
        });
        $query->with(['likes'=>function($query){
        $query->where('ring_jewellery_likes.user_id', '=', auth()->id());
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

    public function getSingleRing($ring_id, $lang)
    {
        app()->setLocale($lang);
        $query = RingsJewellery::select(
            'rings_jewelleries.*',
            'services.id as service_id',
            'services.name as service_name',
            'services.slug as service_slug',
            'categories.id as category_id',
            'categories.name as category_name',
            'categories.slug as category_slug',
            'cities.id as city_id',
            'cities.name as city_name',
            'cities.slug as city_slug',
            'countries.id as country_id',
            'countries.name as country_name',
            'countries.slug as country_slug'
        );
        $query->leftJoin('countries', 'rings_jewelleries.country_id', '=', 'countries.id');
        $query->leftJoin('cities', 'rings_jewelleries.city_id', '=', 'cities.id');

        $query->leftJoin('services', 'rings_jewelleries.service_id', '=', 'services.id');
        $query->leftJoin('categories', 'rings_jewelleries.category_id', '=', 'categories.id');
        if (is_numeric($ring_id)) {
            $query->where('rings_jewelleries.id', $ring_id);
        } else {
            $query->whereRaw("(rings_jewelleries.slug like '%" . $ring_id . "%')");
        }
        $query->where('rings_jewelleries.status', 1);
        $rings_jewelleries = $query->get();
        $data = array();
        foreach ($rings_jewelleries as $item) {
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
            $location = $item->location;
            $seo_title = $item->seo_title;
            $seo_keywords = $item->seo_keywords;
            $seo_robots = $item->seo_robots;
            $seo_description = $item->seo_description;
            $facebook_description = $item->facebook_description;
            $facebook_image = $item->facebook_image;
            $twitter_title = $item->twitter_title;
            $twitter_description = $item->twitter_description;
            $twitter_image = $item->twitter_image;
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
                    'country' => [
                        'id' => $country_id,
                        'name' => $country_name,
                        'slug' => $country_slug,
                    ],
                    'city' => [
                        'id' => $city_id,
                        'name' => $city_name,
                        'slug' => $city_slug,
                    ],
                    'category' => [
                        'id' => $category_id,
                        'name' => $category_name,
                        'slug' => $category_slug,
                    ],
                    'service' => [
                        'id' => $service_id,
                        'name' => $service_name,
                        'slug' => $service_slug,
                    ],
                    'id' => $id,
                    'name' => $name,
                    'slug' => $slug,
                    'phone' => $phone,
                    'email' => $email,
                    'description' => $description,
                    'user_id' => $user_id,
                    'gallery' => $gallery,
                    'banner' => $banner,
                    'alt' => $alt,
                    'thumb' => $thumb,
                    'thumb_alt' => $thumb_alt,
                    'location' => $location,
                    'seo' => [
                        'title' => $seo_title,
                        'keywords' => $seo_keywords,
                        'robots' => $seo_robots,
                        'description' => $seo_description,
                        'facebook_description' => $facebook_description,
                        'facebook_image' => $facebook_image,
                        'facebook_title'=>$item->og_title,
                        'twitter_title' => $twitter_title,
                        'twitter_description' => $twitter_description,
                        'twitter_image' => $twitter_image,
                    ],
                ];
            } else {
                $data[] = [];
            }
        }
        return response()->json([
            'data' => $data
        ], '200');
    }
}
