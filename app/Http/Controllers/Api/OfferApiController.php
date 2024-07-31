<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\BarberShop;
use App\Models\BeautyCenter;
use App\Models\Boat;
use App\Models\Car;
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
use App\Models\Videography;
use App\Models\WeddingCake;
use App\Models\WeddingCard;
use App\Models\WeddingDress;
use App\Models\WeddingFlower;
use App\Models\WeddingPalace;
use App\Models\WeddingPlanning;
use Illuminate\Http\Request;

class OfferApiController extends Controller
{

    //===================================================== getOffers ======================== \\
    public function getOffers($country_id,$lang){
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

        ];
        // call function to  get all offer
      return $this->offer($models,$country_id);
    }


    //================= get modules offers  [status = 1; has_off = 1  ] ===============\\
    protected  function offer(array $models, $country_id): \Illuminate\Http\JsonResponse
    {

        $data = collect();
        // looping for model instance
        foreach ($models as $model) try {
            // query to  get all offer with country slug and service slug
            $modules = $model->where(['status'=>1,'has_offer'=>1])
                ->whereHas('country',function ($query) use ($country_id){
                return $query->where('countries.id',$country_id);})
                ->get();
            // check if exists data
            if($modules->count() > 0){
                // return data  collections and grouping by service slug
                $data[] = OfferResource::collection($modules)->groupBy('Service.slug')->all();
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

}
