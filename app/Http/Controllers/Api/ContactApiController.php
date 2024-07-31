<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Car;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactUs;
use App\Notifications\NewUser;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactApiController extends Controller
{

    public function contact(Request $request){

        $this->validation($request);

         $contact = Contact::create($request->all());
        //===============================  Notification Admin That New Contact
        // get super admin user
        $admin = User::Find(1);
        $admin->notify(new ContactUs($contact));
        //================================
         return response()->json(['message'=> 'Thanks For Contact Us']);

    }

    //=====================  validation ========================
    private  function validation(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5|max:20',
            'email'=>'required|email',
            'phone'=>'required|digits_between:11,20',
            'message'=>'required|min:10,max:255'
        ]);
        if($validator->fails()){
            throw new HttpResponseException(response()->json($validator->errors()->messages(), 422));
        }
    }

}
