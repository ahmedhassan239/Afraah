<?php

use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomizedUser;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\HoneyMoonApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('nova.login');
});

// Registration Routes...
Route::get('/sitebackend/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register',[RegisterController::class, 'register'])->name('user-regist');
//Route::get('getCity',[RegisterController::class, 'getCity'])->name('getCity');
Route::get('cities',[RegisterController::class, 'cities'])->name('cities');
Route::get('services',[RegisterController::class, 'services'])->name('services');

//
//Route::get('api/country/{country}', function($country_id) {
//    $country =  Country::find($country_id);
//    return $country->city->map(function($city) {
//        return [ 'value' => $city->id, 'display' => $city->name];
//    });
//})->middleware(['nova']);
//
//Route::get('api/category/{category}', function($category_id) {
//    $category =  Category::find($category_id);
//    return $category->service->map(function($service) {
//        return [ 'value' => $service->id, 'display' => $service->name ];
//    });
//})->middleware(['nova']);


Route::get('/auth/verify-email/{verification_code}',[RegisterController::class, 'verify_email'])->name('verify_email');


