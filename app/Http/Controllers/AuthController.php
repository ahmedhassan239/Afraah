<?php

namespace App\Http\Controllers;

use App\Http\Traits\MainAuth;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */

    use MainAuth;
    public function __construct() {
        auth()->setDefaultDriver('api');
        $this->middleware('auth:api', ['except' => ['login', 'register','userProfileUpdate']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user=User::where('email',$request->email)->first();
        // return $user;
//        if($user->email_verified_at){
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            if (! $token = auth()->attempt($validator->validated())) {
                return response()->json(['error' => 'Invalid User Or Password'], 401);
            }
            // dd($this->createNewToken($token));
            return $this->createNewToken($token);
//        }else{
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
            'gender'=>'required',
            "phone"=>'required|numeric|min:11|unique:users',
        ]);


        if($validator->fails()){
            throw new HttpResponseException(response()->json($validator->errors()->messages(), 422));
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        if($request->password == $request->password_confirmation){
            $user_id=User::orderBy('created_at','desc')->first()->id;
            DB::table('role_user')->insert(
                [
                    'role_id' => 1,
                    'user_id' => $user_id

                ]

            );

            //=============================  Notification Admin That New User Registered
              // get super admin user
             $admin = User::Find(1);
             $admin->notify(new NewUser($user));
            //================================

        }
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): \Illuminate\Http\JsonResponse
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data'=>auth()->user(),
                'user_photo'=>asset('img/users/'.auth()->user()->photo)
        ]
        );
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
//             'expires_in' => auth()->factory()->getTTL() * 60,
            // 'expires_in' =>  auth('api')->factory()->getTTL() * 60,//auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    protected function createNewTokenForUpdate($token){
        return response()->json([
            'access_token' => $token,
//            'token_type' => 'bearer',
        ]);
    }

    public function UploadPhoto($image,$folder): string
    {
        $imageName = time() . '.' .$image->extension();
        $image->move(public_path('img/'.$folder),$imageName);
        return $imageName;
    }

    public function userProfileUpdate(Request $request)
    {
        $user_id =[Auth::user()->id];
        $rules=[
            "name"=>'string|max:100',
            "arabic_name"=>'string|max:100',
            "phone"=>'unique:users,phone',$user_id,
            "type"=>'string|max:100',
            'email' => 'unique:users,email',$user_id,
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
//        dd($data['photo']);
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

}
