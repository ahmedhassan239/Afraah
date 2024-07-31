<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResource;
use App\Models\BarberShop;
use App\Models\BeautyCenter;
use App\Models\Blog;
use App\Models\Boat;
use App\Models\Car;
use App\Models\Category;
use App\Models\Dj;
use App\Models\GardenAndClub;
use App\Models\HairDresser;
use App\Models\HoneyMoon;
use App\Models\Hotel;
use App\Models\Limousine;
use App\Models\MakeupArtist;
use App\Models\MenSuit;
use App\Models\Motorcycle;
use App\Models\OpenBuffet;
use App\Models\Photographer;
use App\Models\Resturant;
use App\Models\RingsJewellery;
use App\Models\Service;
use App\Models\Videography;
use App\Models\WeddingCake;
use App\Models\WeddingCard;
use App\Models\WeddingDress;
use App\Models\WeddingFlower;
use App\Models\WeddingPalace;
use App\Models\WeddingPlanning;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchApiController extends Controller
{

    public function __construct() {
        auth()->setDefaultDriver('api');
    }

    //===================================================== search ======================== \\
    public function search(Request $request,$lang){

        $this->validation($request);

        app()->setLocale($lang);
        // init model
        $models = [
            new BarberShop(),
            new BeautyCenter(),
            new Boat(),
            new Car(),
            new Dj(),
            new GardenAndClub(),
            new HairDresser(),
            new HoneyMoon(),
            new Hotel(),
            new Limousine(),
            new MenSuit(),
            new Motorcycle(),
            new OpenBuffet(),
            new Photographer(),
            new Resturant(),
            new RingsJewellery(),
            new Videography(),
            new WeddingCake(),
            new WeddingCard(),
            new WeddingDress(),
            new WeddingFlower(),
            new WeddingPalace(),
            new WeddingPlanning(),
            new MakeupArtist(),
            new Blog(),
//            new Service(),
//            new Category(),

        ];
        // call search function
        return $this->prepareSearch($models,$request->search,$lang);
    }

    //public function search(Request $request){

    /*
     * name
     * slug
     * description
     * price
     * country
     * city
     * service_id  Service
     * country_id  country
     * category_id Category
     */
    protected  function prepareSearch(array $models, $search,$lang): \Illuminate\Http\JsonResponse
    {
        $data = collect();
        // looping for model instance
        foreach ($models as $model) try {
            // all modules  like %  search %
            $modules = $model->where('status',1)
                    ->where(function ($query) use ($search, $lang){
                     $query->where('name->'.$lang,'like','%'.$search.'%')
                        ->orWhere('slug->'.$lang,'like','%'.$search.'%');
                    })->get()->take(15);

            // check if exists data
            if($modules->count() > 0){
                // return data  collections and grouping by service slug
                $data[] = SearchResource::collection($modules)->groupBy('Service.slug')->all();
            }
            $newDate = array();

            foreach ($data as $item){
                foreach ($item as $key => $val){
                    $newDate [] = [str_replace('-','_',$key)=>$val];
                }
            }
        }
        catch (\Exception $e){
            return response()->json($e->getMessage(),'401');
        }

        return response()->json([
            'data'=>$newDate
        ],'200');

    }


    //=====================  validation ========================
    private  function validation(Request $request){
        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);
        if($validator->fails()){
            throw new HttpResponseException(response()->json($validator->errors()->messages(), 422));
        }
    }

}
