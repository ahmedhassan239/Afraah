<?php

namespace App\Http\Controllers\Api\Like;

use App\Http\Controllers\Controller;
use App\Http\Traits\LikeTrait;
use App\Models\like\RingJewellery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function auth;

class RingJewelleryLikeApiController extends Controller
{
    // init like trait
    use LikeTrait {
        LikeTrait::__construct as private __likeConstruct;
    }

    public function __construct(RingJewellery $model) {
        auth()->setDefaultDriver('api');
        // Pass model to trait
        $this->__likeConstruct($model,'ringJewellery');
    }

       // like or dislike
        public function insert(Request $request)
        {
           return $this->likeMethod($request);
        }

     // show liked article
    public function showUserProfileLikes($user_id,$lang): JsonResponse{
          return $this->userProfileLikes($user_id,$lang);
    }
}
