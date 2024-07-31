<?php


use Illuminate\Support\Facades\File;


 /* return  true  ====>  admin */

use App\Nova\Actions\ChangeFeature;
use App\Nova\Actions\ChangeStatus;

if(!function_exists('admin')){
    function admin($user)
    {
        return $user->is_admin == 1;
    }
}

 /**  return  true  ====>  super_global_admin **/
if(!function_exists('super_global_admin')) {
    function super_global_admin($user)
    {
        return $user->is_admin == 2;
    }
}

if(!function_exists('checkUser')){
    function checkUser()
    {
        return auth()->user()->is_admin == 3;
    }
}
/** return ChangeStatus and ChangeFeature for admin and super admin  **/

if(!function_exists('get_action')){
    function get_action($user): array
    {
        if (admin($user) || super_global_admin($user)){
            return [
                new ChangeStatus,
                new ChangeFeature,
            ];
        }else{
            return [];
        }
    }
}

/** ============ upload photo ========================= **/
if(!function_exists('uploadPhoto')){
    function uploadPhoto($image,$folder,$userPhoto = null): string
    {

        if ($userPhoto!=null && file_exists(public_path('img/'.$folder.'/'.$userPhoto))) {
           File::delete('img/'.$folder.'/' .$userPhoto);
        }
            $imageName = time() . '.' .$image->extension();
            $image->move(public_path('img/'.$folder),$imageName);
            return $imageName;

    }

}


if(!function_exists('responseJson')){


    function successResponse($data,$status): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'status' => $status,
        ]);
    }
    function errorResponse($data,$status): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error' => $data,
            'status' => $status,
        ]);
    }

}




