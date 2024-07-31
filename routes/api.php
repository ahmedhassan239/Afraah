<?php
use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Auth\RegisterApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CityApiController;
use App\Http\Controllers\Api\CountryApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\OfferApiController;
use App\Http\Controllers\Api\Search\SearchApiController;
use App\Http\Controllers\Api\TemplateController;
use App\Models\Template;
//use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Api\AuthController;
#################### Start jwt authentication routes ####################################


Route::prefix('auth')->group(function (){

      /**  ================ login and register ========================  */
    Route::post('/login', [LoginApiController::class, 'login']);
    Route::post('/register', [RegisterApiController::class, 'register']);

    /**    ===============  deal with authenticate users    ============ */
    Route::middleware('auth:api')
        ->group(function(){
        Route::post('/logout', [AuthApiController::class, 'logout']);
        Route::post('/refresh', [AuthApiController::class, 'refresh']);
        Route::post('/user-profile-update', [AuthApiController::class, 'userProfileUpdate']);
        Route::post('/user-photo-update', [AuthApiController::class, 'userUpdatePhoto']);
        Route::get('/user-profile', [AuthApiController::class, 'userProfile']);
    });
});


/*========================== countries ===================*/
Route::get('countries/{lang}',[CountryApiController::class, 'getCountriesData']);

/*========================== cities    ==================*/
Route::get('{country_id}/cities/{lang}',[CityApiController::class, 'getCountryCities']);

/*========================= categories  =================*/
Route::get('categories/{country_id}/{lang}',[CategoryApiController ::class, 'getCountryCategories']);
Route::get('category/{category_id}/{lang}',[CategoryApiController ::class, 'getSingleCategory']);
/*======================== services    ===================*/

Route::get('services/{category_id}/{country_id}/{lang}',[ServiceApiController::class, 'getCategoryServices']);

/*======================= Services with Category name  ===*/
Route::get('category/service/{country_id}/{lang}',[CategoryApiController::class,'getCategoryWithService']);


/*========================== likes ======================*/
require_once __DIR__ .'/process/likes.php';

/*========================== comments ===================*/
require_once __DIR__ .'/process/comments.php';

/*========================== inquiries ================= */
require_once __DIR__.'/process/inquiries.php';

/*========================= All Modules ================*/
require_once __DIR__.'/process/modules.php';


/*========================= All Offers  ===============*/
Route::get('offers/{country_id}/{lang}',[OfferApiController::class,'getOffers']);

/*========================= Contact Us  ===============*/
Route::post('contact-us',[ContactApiController::class,'contact']);

/*========================= General Search =============== */
Route::get('search/{lang}',[SearchApiController::class,'search']);
/*========================= General Search =============== */
Route::get('template/{country_id}/{id}/{lang}',[TemplateController::class,'getSingleTemplate']);



