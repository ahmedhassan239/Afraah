<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;

trait AuthMainProcess
{

    protected function userField(){
        return  User::where('id',auth()->guard('api')->user()->id)->get([
            'id','name','arabic_name','phone','email','gender','photo'])->map(function ($val){
            return [
                'id'=>$val->id,
                'name'=>$val->name,
                'arabic_name'=>$val->arabic_name,
                'phone'=>$val->phone,
                'email'=>$val->email,
                'photo'=>$val->userPhoto,
                'gender'=>$val->gender,
            ];
        });
    }

}
