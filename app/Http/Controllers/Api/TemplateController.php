<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function getSingleTemplate($country_id,$id)
    {
        $query = Template::where(function ($query) use ($id) {
            if (is_numeric($id)) {
                $query->where('id', $id);
            } else {
                $query->where('slug->ar', $id);
            }
        });
        $query->with('country')->whereHas('country',function ($x) use($country_id){
            return $x->where('id',$country_id)->orWhere('slug',$country_id);
        });
        $query = $query->get();
        $template = $query->map(function ($val) {
            return [
                'country' => [
                    'id' => $val->country->id,
                    'name' => $val->country->name,
                    'slug' => $val->country->slug,
                ],
                'id' => $val->id,
                'name' => $val->name,
                'slug' => $val->slug,
                'description' => $val->description,
                'banner' => asset('storage/' . $val->banner),
                'alt' => $val->alt,
                'seo' => [
                    'title' => $val->seo_title,
                    'keywords' => $val->seo_keywords,
                    'robots' => $val->seo_robots,
                    'description' => $val->seo_description,
                    'facebook_title' => $val->og_title,
                    'facebook_description' => $val->facebook_description,
                    'facebook_image' => $val->facebook_image,
                    'twitter_title' => $val->twitter_title,
                    'twitter_description' => $val->twitter_description,
                    'twitter_image' => $val->twitter_image,
                    'seo_schema' => $val->seo_schema,
                ]
            ];
        });

        return response()->json([
            'data' => $template
        ], '200');
    }
}
