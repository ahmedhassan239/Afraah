<?php

namespace App\Http\Traits;

//use App\Exceptions\GeneralException;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

trait MainAuth
{

    // create new model
    public function newUser($request)
    {
            if ($this->validateRegister($request)->fails()) {
                return response()->json($this->validateRegister($request)->messages(), 422);
            }
            $request->merge(["password" => bcrypt($request->password)]); // hash password

            $user = User::create($request->all());
            $user->assignRole(1);

            $this->newRegisterNotification($user);

            //================================
            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user,
            ], 201);
    }


    protected function newRegisterNotification($user){
        $admin = User::whereHas('roles', function($q){
            $q->where('slug', 'super-global-admin');
        })->first();
        if($admin)
        $admin->notify(new NewUser($user));
    }




    // login to system
    public function loginToSystem($request)
    {
        if($this->validateLogin($request)->fails()){
            return response()->json($this->validateLogin($request)->errors(), 422);
        }
        else {
            $token = Auth::attempt($this->loginCredentials($request));

            if(!$token)
            return response()->json(['error' => 'Invalid User Or Password'], 401);

            return $this->responseInfo($token);
        }
    }

    // logout from system
    protected function logoutSystem($request): \Illuminate\Http\JsonResponse
    {
        // get token from header
        $token = $request->header('api_token');
        throw_if(!$token,GeneralException::class,'must type token');
        // remove token -- logout
        JWTAuth::setToken($token)->invalidate();
        return responseJson('200','successfully logout');
    }

    protected function validateLogin($request): \Illuminate\Contracts\Validation\Validator
    {
       return Validator::make($this->loginCredentials($request), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }

    protected function loginCredentials(Request $request): array
    {
        return $request->only('email', 'password');
    }

    protected function responseInfo($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => Auth::user()
        ]);
    }



    protected function validateRegister($request): \Illuminate\Contracts\Validation\Validator
    {
       return Validator::make($request->all(),[
           'name' => 'required|string|between:2,100',
           'email' => 'required|email|max:100|unique:users,email',
           'password' => 'required|confirmed|min:6',
           'gender'=>'required',
           "phone"=>'required|numeric|min:11|unique:users,phone',
        ]);
    }

}
