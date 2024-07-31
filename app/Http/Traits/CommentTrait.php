<?php

namespace App\Http\Traits;

use App\Http\Resources\CommentResource;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function app;
use function asset;
use function auth;
use function response;

trait CommentTrait
{
    private $model;
    // initial model
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    //====================  comment function ==================

    /**
     * @throws \Throwable
     */
    public function comment(Request $request){
        // validation
        $this->validation($request);

        if(auth()->user()){
            // get id for Model
            $model = $this->model->find($request->model_id);
            // throw exception if not found $record
            throw_if(!$model,new HttpResponseException(response()->json('No Found Model', 404)));
            // create or edit comment and rating
            $result = $model->comments()->updateOrCreate(
            ['user_id' => $request->user_id],
            ['comment' => $request->comment,'rate' => $request->rate]
            );
            //===============================  Notification Admin That New Contact
            // get super admin user
            $admin = User::Find(1);
            $admin->notify(new CommentNotification($result,$model->name));
            //================================
            return response()->json('Successfully created','200');
        }else{
            return response()->json('Not Authorized','401');
        }
    }

    //==================== show Comments ========================

    /**
     * @throws \Throwable
     */
    public function showComments($model_id){
        // check id model is exists or not
        $model = $this->model->find($model_id);
        // throw exception if not found $record
        throw_if(!$model,new HttpResponseException(response()->json('No Found Model', 404)));
        // get model comments
        $model_comment = $model->comments()->where('status',1)->get();
        // get model comments collection
        $data = CommentResource::collection($model_comment);
        // return response
        return response()->json([
            'data'=>$data,
        ],'200');
    }

    //=====================  validation ========================
    private  function validation(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'model_id' => 'required',
            'rate' => 'required',
            'comment'=>'required'
        ]);
        if($validator->fails()){
            throw new HttpResponseException(response()->json($validator->errors()->messages(), 422));
        }
    }

}
