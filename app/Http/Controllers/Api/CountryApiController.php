<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryApiController extends Controller
{
    //
    public function getCountriesData($lang)
    {
        app()->setLocale($lang);
        $countries=Country::get();
        $data=array();
        foreach($countries as $item){
            $id=$item->id;
            $name=$item->name;
            $slug=$item->slug;
            if(isset($data)){
                $data[]=[
                    'id'=>$id,
                    'name'=>$name,
                    'slug'=>$slug,
                ];

            }else{
                $data[]=[
                    'id'=>null,
                    'name'=>null,
                    'slug'=>null,
                ];
            }

        }
          return response()->json([
                       'data'=>$data
                   ],'200');
    }
}
