<?php
use App\Http\Controllers\Api\Comment\{
    BarberShopCommentsController,BeautyCenterCommentsController,
    BoatCommentsController, CarCommentsController, DjCommentsController,
    GardenClubCommentsController, HairDresserCommentsController, HoneyMoonCommentsController,
    HotelCommentsController, LimousineCommentsController, MakeupArtistCommentsController,
    MenSuitCommentsController, MotorcycleCommentsController, OpenBuffetCommentsController,
    PhotographerCommentsController, ResturantCommentsController, RingJewelleryCommentsController,
    VideographyCommentsController, WeddingCakeCommentsController, WeddingCardCommentsController,
    WeddingDressCommentsController, WeddingFlowerCommentsController, WeddingPalaceCommentsController, WeddingPlanningCommentsController,
};


Route::post('hotel-comment',[HotelCommentsController::class, 'insert']);
Route::get('show-hotel-comment/{model_id}',[HotelCommentsController::class, 'show']);

Route::post('barber-shop-comment',[BarberShopCommentsController::class, 'insert']);
Route::get('show-barber-shop-comment/{model_id}',[BarberShopCommentsController::class, 'show']);

Route::post('beauty-center-comment',[BeautyCenterCommentsController::class, 'insert']);
Route::get('show-beauty-center-comment/{model_id}',[BeautyCenterCommentsController::class, 'show']);

Route::post('car-comment',[CarCommentsController::class, 'insert']);
Route::get('show-car-comment/{model_id}',[CarCommentsController::class, 'show']);

Route::post('dj-comment',[DjCommentsController::class, 'insert']);
Route::get('show-dj-comment/{model_id}',[DjCommentsController::class, 'show']);

Route::post('hair-dresser-comment',[HairDresserCommentsController::class, 'insert']);
Route::get('show-hair-dresser-comment/{model_id}',[HairDresserCommentsController::class, 'show']);

Route::post('men-suit-comment',[MenSuitCommentsController::class, 'insert']);
Route::get('show-men-suit-comment/{model_id}',[MenSuitCommentsController::class, 'show']);

Route::post('honey-moon-comment',[HoneyMoonCommentsController::class, 'insert']);
Route::get('show-honey-moon-comment/{model_id}',[HoneyMoonCommentsController::class, 'show']);

Route::post('limousine-comment',[LimousineCommentsController::class, 'insert']);
Route::get('show-limousine-comment/{model_id}',[LimousineCommentsController::class, 'show']);

Route::post('motorcycle-comment',[MotorcycleCommentsController::class, 'insert']);
Route::get('show-motorcycle-comment/{model_id}',[MotorcycleCommentsController::class, 'show']);

Route::post('open-buffet-comment',[OpenBuffetCommentsController::class, 'insert']);
Route::get('show-open-buffet-comment/{model_id}',[OpenBuffetCommentsController::class, 'show']);

Route::post('photographer-comment',[PhotographerCommentsController::class, 'insert']);
Route::get('show-photographer-comment/{model_id}',[PhotographerCommentsController::class, 'show']);

Route::post('videography-comment',[VideographyCommentsController::class, 'insert']);
Route::get('show-videography-comment/{model_id}',[VideographyCommentsController::class, 'show']);

Route::post('wedding-cake-comment',[WeddingCakeCommentsController::class, 'insert']);
Route::get('show-wedding-cake-comment/{model_id}',[WeddingCakeCommentsController::class, 'show']);

Route::post('wedding-card-comment',[WeddingCardCommentsController::class, 'insert']);
Route::get('show-wedding-card-comment/{model_id}',[WeddingCardCommentsController::class, 'show']);

Route::post('wedding-dress-comment',[WeddingDressCommentsController::class, 'insert']);
Route::get('show-wedding-dress-comment/{model_id}',[WeddingDressCommentsController::class, 'show']);

Route::post('wedding-flower-comment',[WeddingFlowerCommentsController::class, 'insert']);
Route::get('show-wedding-flower-comment/{model_id}',[WeddingFlowerCommentsController::class, 'show']);

Route::post('wedding-palace-comment',[WeddingPalaceCommentsController::class, 'insert']);
Route::get('show-wedding-palace-comment/{model_id}',[WeddingPalaceCommentsController::class, 'show']);

Route::post('wedding-planning-comment',[WeddingPlanningCommentsController::class, 'insert']);
Route::get('show-wedding-planning-comment/{model_id}',[WeddingPlanningCommentsController::class, 'show']);

Route::post('ring-jewellery-comment',[RingJewelleryCommentsController::class, 'insert']);
Route::get('show-ring-jewellery-comment/{model_id}',[RingJewelleryCommentsController::class, 'show']);

Route::post('restaurant-comment',[ResturantCommentsController::class, 'insert']);
Route::get('show-restaurant-comment/{model_id}',[ResturantCommentsController::class, 'show']);

Route::post('garden-club-comment',[GardenClubCommentsController::class, 'insert']);
Route::get('show-garden-club-comment/{model_id}',[GardenClubCommentsController::class, 'show']);

Route::post('boat-comment',[BoatCommentsController::class, 'insert']);
Route::get('show-boat-comment/{model_id}',[BoatCommentsController::class, 'show']);

Route::post('makeup-artist-comment',[MakeupArtistCommentsController::class, 'insert']);
Route::get('show-makeup-artist-comment/{model_id}',[MakeupArtistCommentsController::class, 'show']);
