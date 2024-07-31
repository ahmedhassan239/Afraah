<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginApiController extends Controller
{

    use AuthMainProcess;

    // login to system
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        if($this->validateLogin($request)->fails()){
            return response()->json($this->validateLogin($request)->errors(), 422);
        }
        else {
            $token = Auth::guard('api')->attempt($this->loginCredentials($request));

            if(!$token)
                return response()->json(['error' => 'Invalid User Or Password'], 401);

            return $this->respondWithToken($token);
        }
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

    protected function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'user'=> $this->userField()
        ]);
    }
}
