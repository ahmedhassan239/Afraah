<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray($request)
    {
        return
        [
          'user_name'=>$this->user->name,
          'comment' =>$this->comment,
          'rate' =>$this->rate,
          'status'=>$this->status,
          'created_at'=> $this->commentTime($this->created_at,$this->updated_at)
        ];
    }


    public function commentTime($created_at,$updated_at){

       return  $updated_at ? $updated_at->diffForHumans() : $created_at->diffForHumans();

    }
}
