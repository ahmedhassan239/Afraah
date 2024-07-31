<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use App\Notifications\NewUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailVerificationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
      * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function showRegistrationForm()
    {
        $countries= Country::get();
        $categories=Category::get();
        return view('auth.register',compact('countries','categories'));
    }

    public function cities(Request $request )
    {
        $data = City::where('country_id',$request->id)->pluck('name','id');
        return response()->json($data);
    }

    public function services(Request $request)
    {
        $data=Service::where('category_id',$request->id)->pluck('name','id');
        return response()->json($data);
    }

    /** ======================================= OLD function register ====================
    public function ___register2(Request $request)
    {

        $rules=[
            "name"=>'required|string|max:100',
            "arabic_name"=>'required|string|max:100',
            "gender"=>'required',
            "email"=>['required', 'string', 'email', 'max:255','unique:users,email'],
            "phone"=>'required|min:11|numeric',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country'=>['required'],
            'city'=>['required'],
            'service'=>['required']
        ];
        $code=Str::random(40);
        $request->validate($rules);
        $data=$request->except('_token','password_confirmation');
        if($request->password == $request->password_confirmation ){
           $user= User::create([
                        'name' => $data['name'],
                        'english_name' => $data['name'],
                        'gender' => $data['gender'],
                        'arabic_name' => $data['arabic_name'],
                        'phone'=>$data['phone'],
                        'email' => $data['email'],
                        'country_id'=>$data['country'],
                        'city_id'=>$data['city'],
                        'service_id'=>$data['service'],
                        'password' => Hash::make($data['password']),
                        'verification_code'=>Str::random(40)
                    ]);
//            Mail::send('emails.auth.email_verification',$user->toArray(),
//            function($message){
//                $message->to('donnamikhail1@gmail.com')
//                ->subject('Email Verification');
//            });
            // Mail::to($request->email)->send(new EmailVerificationMail($user));
            $user_id=User::orderBy('created_at','desc')->first()->id;
            DB::table('role_user')->insert(
                [
                    'role_id' => 1,
                    'user_id' => $user_id
                ]
            );
            // Alert::success('Success', 'Mail Sent Successfully');
            return redirect()->back()->with('Success','Registration Has Been Done Successfully , Please Check Your Mail To Verify Your Email ');

        }else{
            return redirect()->back()->with('Error','Something Went Wrong , Please Try Again ');
        }
    }
    */

    //=============================================== New Register ==============================

    // create new model
    public function register(Request $request)
    {
        $this->validateRegister($request);
        try {
            $request->merge(["password" => bcrypt($request->password)]); // hash password
            $user = User::create($request->all());
            $user->assignRole(1);
            $this->newRegisterNotification($user);
            return redirect(route('nova.login'));
        //    return redirect()->back()->with('Success','Registration Has Been Done Successfully , Please Check Your Mail To Verify Your Email ');
        }catch (\Exception $e){
            return redirect()->back()->with('Error','Something Went Wrong , Please Try Again ');
        }
        //=============================================================================
    }

    protected function newRegisterNotification($user){
        $admin = User::whereHas('roles', function($q){
            $q->where('slug', 'super-global-admin');
        })->first();
        if($admin)
            $admin->notify(new NewUser($user));
    }

    protected function validateRegister($request)
    {
        return $this->validate($request,[
            "name"=>'required|string|min:4|max:100',
            "arabic_name"=>'required|string|min:4|max:100',
            "gender"=>'required',
            "email"=>'required|string|email|max:255|unique:users,email',
            "phone"=>'required|digits_between:11,20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'country_id'=>'required|exists:countries,id',
            'city_id'=>'required|exists:cities,id',
            'service_id'=>'required|exists:services,id',
            'category_id'=>'required|exists:categories,id'
        ]);
    }


    //=============================================== End New Register ===============================

    public function verify_email($verification_code)
    {
        $user=User::where('verification_code',$verification_code)->first();
        if(!$user){
            return redirect()->route('register');
        }else{
            if($user->email_verified_at){
                return redirect()->route('register');
            }else{
                $user->update([
                    'email_verified_at'=>\Carbon\Carbon::now()
                ]);
                return redirect('/sitebackend/login');
            }
        }
    }
}
