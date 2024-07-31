<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function userProfile(): \Illuminate\Http\JsonResponse
    {
        return response()->json(auth('sanctum')->user());
    }

    protected function createNewTokenForUpdate($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    public function UploadPhoto($image,$folder)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img/'.$folder),$imageName);
        return $imageName;
    }

    public function userProfileUpdate(Request $request)
    {
        $user_id =Auth::user()->id;
        $rules=[
            "name"=>'string|max:100',
            "arabic_name"=>'string|max:100',
            "phone"=>'string|max:100',
            "type"=>'string|max:100',
            'email' => 'string|email|max:100',
            "photo"=>'image|mimes:png,jpg,jpeg|max:1024',
        ];
        $request->validate($rules);
        $data=$request->except('_token','_method');
        if($request->has('photo')){
            $imageName= $this->UploadPhoto($request->photo , 'users');
            $data=$request->except('photo','_token','_method');
            $data['photo']=$imageName;
        }
        $user_update = User::where('id', $user_id)->update($data);
        $data['name']=isset($request->name) ? $request->name : Auth::user()->name;
        $data['arabic_name']=isset($request->arabic_name) ? $request->arabic_name : Auth::user()->arabic_name;
        $data['is_admin']=isset($request->is_admin) ? $request->is_admin : Auth::user()->is_admin;
        $data['phone']=isset($request->phone) ? $request->phone : Auth::user()->phone;
        $data['photo']=isset($request->photo) ? asset('img/users/'.$data['photo']) :asset('img/users/'.Auth::user()->photo) ;
        $data['type']=isset($request->type) ? $request->type : Auth::user()->type;
        $data['country_id']=isset($request->country_id) ? $request->country_id : Auth::user()->country_id;
        $data['city_id']=isset($request->city_id) ? $request->city_id : Auth::user()->city_id;
        $data['category_id']=isset($request->category_id) ? $request->category_id : Auth::user()->category_id;
        $data['service_id']=isset($request->service_id) ? $request->service_id : Auth::user()->service_id;
        $data['email']=isset($request->email) ? $request->email : Auth::user()->email;
        $data['gender']=isset($request->gender) ? $request->gender : Auth::user()->gender;
        return response()->json([
            'message' => 'User successfully updated',
            'user' =>$this->createNewTokenForUpdate($data),
        ], 201);
    }

    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'gender'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;
        if($request->password == $request->confirm_password){
            $user_id=User::orderBy('created_at','desc')->first()->id;
            DB::table('role_user')->insert(
                [
                    'role_id' => 1,
                    'user_id' => $user_id

                ]
            );
        }

        return $this->sendResponse($success, 'User created successfully.');
    }

}
