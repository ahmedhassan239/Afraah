<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryApiController extends Controller
{
    //
    public function getCountryCategories($country_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query = Category::select('categories.*','countries.slug as country_slug','countries.name as country_name');
        $query->leftJoin('countries','categories.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('categories.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->where('status',1);
        $categories = $query->oldest('sort_order')->get();
        $data=array();

        foreach($categories as $item){
            $id=$item->id;
            $name=$item->name;
            $slug=$item->slug;
            $thumb = asset('storage/'.$item->thumb);
            $thumb_alt=$item->thumb_alt;
            if(isset($data)){
                $data[]=[
                    'id'=>$id,
                    'name'=>$name,
                    'slug'=>$slug,
                    'thumb'=>$thumb,
                    'thumb_alt'=>$thumb_alt,
                ];
            }else{
                $data[]=[
                ];
            }
        }
        if(isset($item->country_slug)){
            return response()->json([
                'country_data'=>[
                    'id'=>$country_id,
                    'slug'=>$item->country_slug,
                    'name'=>$item->country_name,
                ],
                'data'=>$data
            ],'200');
        }else{
            return response()->json([
                'country_data'=>[
                    'id'=>$country_id,
                   'slug'=>$item->country_slug,
                   'name'=>$item->country_slug,
                ],
                'data'=>$data
            ],'200');
        }

    }


    public function getCategoryWithService($country_id,$lang)
    {
        app()->setLocale($lang);

        $query = Category::select('categories.*');
        $query->leftJoin('countries','categories.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('categories.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $query->where('status',1);
        $query->with('service');
        $categories = $query->oldest('sort_order')->get();
        $data=array();
        foreach($categories as $item){
            $services=array();
            foreach($item->service as $row){
                $services[]=[
                    'name'=>$row->name,
                    'slug'=>$row->slug,
                    'thumb'=>asset('storage/'.$row->thumb),
                    'thumb_alt'=>$row->thumb_alt,
                ];
            }
            $data[]=[
                'category'=>[
                    'name'=>$item->name,
                    'slug'=>$item->slug,
                    'thumb'=>asset('storage/'.$item->thumb),
                    'thumb_alt'=>$item->thumb_alt,   
                ],
                'services'=>$services,
               

            ];
        }
        return response()->json([
            'data'=>$data
        ],'200');
    }

    function getSingleCategory($category_id,$lang): \Illuminate\Http\JsonResponse
    {
        app()->setLocale($lang);
        $query = Category::where('status',1);
        if (is_numeric($category_id)) {
            $query->where('categories.id', $category_id);
        } else {
            $query->whereRaw("(categories.slug like '%" . $category_id . "%')");
        }
        $category = $query->first();

        $data=array();

        $data[]=[
            'name'=>$category->name,
            'slug'=>$category->slug,
            'description'=>$category->description,
            'banner_alt'=>$category->banner_alt,
            'banner'=>asset('storage/'. $category->banner),
            
            'seo'=>[
                "title" => $category->seo_title,
                "keywords" => $category->seo_keywords,
                "robots" => $category->seo_robots,
                "description" =>$category->seo_description,
                "facebook_title" => $category->og_title,
                "facebook_description" => $category->facebook_description,
                "twitter_title" => $category->twitter_title,
                "twitter_description" => $category->twitter_description,
                "twitter_image" => $category->twitter_image,
                "facebook_image" => $category->facebook_image,
                "seo_schema" => $category->seo_schema,
            ]
            
        ];

        return response()->json([
            'data'=>$data
        ],'200');

    }

}
