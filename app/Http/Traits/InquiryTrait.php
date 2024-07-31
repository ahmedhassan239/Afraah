<?php

namespace App\Http\Traits;

use App\Http\Resources\CommentResource;
use App\Models\User;
use App\Notifications\CommentNotification;
use App\Notifications\InquiryNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function app;
use function asset;
use function auth;
use function response;

trait InquiryTrait
{
    private $model;
    // initial model
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    //====================  inquiry function ==================

    /**
     * @throws \Throwable
     */
    public function inquiry(Request $request){
        // validation
        $this->validation($request);

        // if(auth()->user()){
            // get id for Model
            $model = $this->model->find($request->model_id);
            // throw exception if not found $record
            throw_if(!$model,new HttpResponseException(response()->json('No Found Model', 404)));

            // $request->merge(['user_id'=>$request->user()->id]);

            $result = $model->inquiries()->create(
                $request->except(['model_id']),
            );

            //===============================  Notification Admin That New Inquiry

            // get super admin user
            $admin = User::Find(1);
            $admin->notify(new InquiryNotification($result,$model->name));
            //================================
            return response()->json('Successfully created','200');
        // }else{
        //     return response()->json('Not Authorized','401');
        // }
    }


    //=====================  validation ========================
    private  function validation(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:4|max:20',
            'email'=>'required|email',
            'phone'=>'required|digits_between:11,20',
            'message'=>'required|min:10,max:255',
            'model_id' => 'required',
            'wedding_date'=>'required',
           // 'user_id'=>'required',
        ]);
        if($validator->fails()){
            throw new HttpResponseException(response()->json($validator->errors()->messages(), 422));
        }
    }

}
