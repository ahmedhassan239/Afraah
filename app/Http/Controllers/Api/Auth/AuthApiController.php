<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    use AuthMainProcess;

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'user' => $this->userField()
        ]);

    }

    public function userProfile(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
                'data' => $this->userField()
            ]
        );
    }

    public function userProfileUpdate(Request $request)
    {
        // $request->user();
        if ($this->validation($request)->fails()){
            return response()->json($this->validation($request)->messages(), 422);
        }
         $request->user()->update($request->all());
        return response()->json([
            'message' => 'User successfully updated',
             'data' => $this->userField(),
        ], 200);


    }

    public function userUpdatePhoto(Request $request){

        $validate = Validator::make($request->all(),[
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:1024',
        ]);
        if($validate->fails()){
            return response()->json($validate->messages(), 422);
        }
        $photo = uploadPhoto($request->photo ,'users',$request->user()->photo ?? null);

        $user = User::find($request->user()->id);
        $user->photo = $photo;

        $user->save();
        return $this->userProfile();
    }

    protected function validation($request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'name' => 'sometimes|string|max:100|min:4',
            'arabic_name' => 'sometimes|string|min:4|max:100',
            'phone' => 'digits_between:11,20|unique:users,phone,'.$request->user()->id,
          //  'type' => 'string|max:100',
            'email' => 'unique:users,email,'.$request->user()->id,
        ]);
    }



}

