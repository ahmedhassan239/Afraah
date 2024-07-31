<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
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
//           'phone' => $this->phone,
//           'email' => $this->email,
           'description'=>$this->description,
//           'user_id'=>$this->user_id,
//           'gallery'=> $this->getGallery($this->gallery),
//           'banner' => asset('storage/' . $this->banner),
//           'alt'=>$this->alt,
           'thumb' =>asset('storage/'.$this->thumb),
           'thumb_alt'=>$this->thumb_alt,
            'country_id'=>$this->country->id,
            'country_name'=>$this->country->name,
            'country_slug'=>$this->country->slug,
            'category_slug'=>$this->Category->slug ?? null,
            'service_slug'=>$this->Service->slug ?? null,
         // 'like_type'=> $this->getLikeType($this->likes)??0,
       ];
    }




    private function getLikeType($likes){
        if(auth()->user()) {
            return $likes->where('user_id', auth()->user()->id)->count();
        }
        else{
            return 0;
        }
    }




    // get path for galleries
//    private function getGallery($item){
//         $gallery = array();
//        if (is_array($item)) {
//            $x = 1;
//            foreach ($item as $key) {
//                $gallery[] = [
//                    'id' => $x,
//                    'image' => asset('storage/' . $key['attributes']['image']),
//                ];
//                $x++;
//            }
//        }
//        return $gallery;
//    }


}


