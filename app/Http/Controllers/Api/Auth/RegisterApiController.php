<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterApiController extends Controller
{

    // create new model
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($this->validateRegister($request)->fails()) {
            return response()->json($this->validateRegister($request)->messages(), 422);
        }
        $request->merge(["password" => bcrypt($request->password)]); // hash password
        $request->merge(['is_admin'=>0]);
        $user = User::create($request->all());
       // $user->assignRole(1);

        $this->newRegisterNotification($user);

        //================================
        return response()->json([
            'message' => 'User successfully registered',
        ], 200);
    }

    protected function newRegisterNotification($user){
        $admin = User::whereHas('roles', function($q){
            $q->where('slug', 'super-global-admin');
        })->first();
        if($admin)
            $admin->notify(new NewUser($user));
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
