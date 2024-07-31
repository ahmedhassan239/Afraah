<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityApiController extends Controller
{
    //
    public function getCountryCities($country_id,$lang)
    {
        # code...
        app()->setLocale($lang);
        $query=City::select('cities.id as city_id','cities.name as city_name','cities.slug as city_slug',
                                'countries.id as country_id','countries.name as country_name',
                                'countries.slug as country_slug');
        $query->leftJoin('countries','cities.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('cities.country_id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $cities = $query->get();
        // return $cities;
        $data=array();
        foreach($cities as $item){
            $city_id=$item->city_id;
            $city_name=$item->city_name;
            $city_slug=$item->city_slug;
            $country_id=$item->country_id;
            $country_name=$item->country_name;
            $country_slug=$item->country_slug;
            if(isset($data)){
                $data[]=[
                    'city'=>[
                        'id'=>$city_id,
                        'name'=>$city_name,
                        'slug'=>$city_slug,
                    ],
                    'country'=>[
                        'id'=>$country_id,
                        'name'=>$country_name,
                        'slug'=>$country_slug,
                    ],
                ];
            }else{
                $data[]=[
                    'city'=>[
                        'id'=>null,
                        'name'=>null,
                        'slug'=>null,
                    ],
                    'country'=>[
                        'id'=>null,
                        'name'=>null,
                        'slug'=>null,
                    ],
                ];
            }
        }

        return response()->json([
            'data'=>$data
        ],'200');
    }
}
