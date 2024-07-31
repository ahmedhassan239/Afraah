<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function app;
use function asset;
use function auth;
use function response;

trait LikeTrait
{
    private $model, $relation;
    // initial model
    public function __construct(Model $model,string $relation)
    {
        $this->model = $model;
       $this->relation = $relation;
    }
        // like function
    public function likeMethod(Request $request)
    {
        if(auth()->user()) {
                if ($request->like_type == 1){
                    $result =$this->model->updateOrCreate(
                        ['article_id' => $request->article_id,
                            'user_id' => $request->user()->id,
                            'service_id' => $request->service_id,
                            'category_id' => $request->category_id],
                        ['like_type' => $request->like_type]
                    );
                   // return response()->json('success',200);
                }
                else{
                    // dislike method
                    $result = $this->model->where('article_id', $request->article_id)
                        ->where('user_id', $request->user()->id)
                        ->where('service_id', $request->service_id)
                        ->where('category_id', $request->category_id)
                        ->delete();
                  //  return response()->json(['disliked'=>$result]);
                }
        }
        else{
            return response()->json('Not Authorized','401');
        }
    }

      // show user profile likes
    // show liked article
    public function showUserProfileLikes($lang): JsonResponse{
        return $this->userProfileLikes($lang);
    }

       // get profile likes
    public function userProfileLikes($lang): JsonResponse{
        if(auth()->user()){
            app()->setLocale($lang);
            try {
                // get user profile like query
                $query = $this->model->where('user_id',auth()->id())->with($this->relation,function ($query){
                    $query->select('id','name','slug','description','thumb','thumb_alt');
                });
                $model = $query->get();
            }
            catch (\Exception $e){
                return response()->json($e->getMessage());
            }
             // filter query
            $data=$model->map(function ($item){
               return [
                   'id'=>$item[$this->relation]->id ??null,
                   'name'=> $item[$this->relation]->name ?? null,
                   'slug'=>$item[$this->relation]->slug ?? null,
                   'description'=>$item[$this->relation]->description ?? null,
                   'thumb' =>asset('storage/' .($item[$this->relation]->thumb??null)),
                   'thumb_alt'=>$item[$this->relation]->thumb_alt ?? null,
               ];
            });
            // return response
            return response()->json([
                'data'=>$data,
            ],'200');
        }else{
            return response()->json('Not Authorized','401');
        }
    }




}
