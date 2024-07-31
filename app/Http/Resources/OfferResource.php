<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
           'id'=>$this->id,
           'name'=>$this->name,
           'slug'=>$this->slug,
           'description'=>$this->description,
           'offer_details'=>$this->offer_details,
           'thumb' =>asset('storage/'.$this->thumb),
           'thumb_alt'=>$this->thumb_alt,
           'price'=>$this->price,
           'discount'=>$this->discount,
           'offer_percentage'=>$this->offer_percentage,
           'service_slug'=>$this->Service->slug ?? null,
           'category_slug'=>$this->Category->slug ?? null,
            'rate'=> $this->getRate($this->comments),

       ];
    }


    private function getRate($comments){
        $count_rate = $comments->count();
       $star = $comments->avg('rate');
       return ['count_rate'=>$count_rate, 'star'=>$star ?? 0];
    }
}
