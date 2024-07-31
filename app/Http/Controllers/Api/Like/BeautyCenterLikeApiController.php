<?php

namespace App\Http\Controllers\Api\Like;

use App\Http\Controllers\Controller;
use App\Http\Traits\LikeTrait;
use App\Models\like\BeautyCenter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function auth;

class BeautyCenterLikeApiController extends Controller
{
    // init like trait
    use LikeTrait {
        LikeTrait::__construct as private __likeConstruct;
    }

    public function __construct(BeautyCenter $model) {
        auth()->setDefaultDriver('api');
        // Pass model to trait
        $this->__likeConstruct($model,'beautyCenter');
    }

       // like or dislike
        public function insert(Request $request)
        {
           return $this->likeMethod($request);
        }

}