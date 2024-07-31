<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function getAllSliders($country_id,$lang)
    {
        app()->setLocale($lang);
        $query=Slider::select('sliders.*','countries.name as country_name');
        $query->leftJoin('countries','sliders.country_id','=','countries.id');
        if (is_numeric($country_id)) {
            $query->where('countries.id', $country_id);
        } else {
            $query->whereRaw("(countries.slug like '%" . $country_id . "%')");
        }
        $sliders = $query->get();
        $data= array();
        foreach($sliders as $slider){
            $id = $slider->id;
            $title = $slider->title;
            $alt = $slider->alt;
            $small_text = $slider->small_text;
            $image = asset('storage/'.$slider->image);
            $data[] = [
                'id'=>$id,
                'title'=>$title,
                'alt'=> $alt,
                'small_text'=>$small_text,
                'image' => $image
            ];
        }

        return response()->json([
            'data'=>$data
        ]);
    }

}
