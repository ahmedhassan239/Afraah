<?php

namespace App\Http\Controllers\Api\Comment;

use App\Http\Controllers\Controller;
use App\Http\Traits\CommentTrait;
use App\Models\RingsJewellery;
use Illuminate\Http\Request;
use function auth;

class RingJewelleryCommentsController extends Controller
{
    // init comment trait
    use CommentTrait {
        CommentTrait::__construct as private __commentConstruct;
    }

    public function __construct(RingsJewellery $model)
    {
        auth()->setDefaultDriver('api');
        // pass  model
        $this->__commentConstruct($model);
    }

    public function insert(Request $request)
    {

        return $this->comment($request);
    }


    public function show($model_id)
    {
        return $this->showComments($model_id);
    }
}
