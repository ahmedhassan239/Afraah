<?php

use App\Http\Controllers\Api\Inquiry\{
    BarberShopInquiriesController, BeautyCenterInquiriesController, BoatInquiriesController,
    CarInquiriesController, DjInquiriesController, GardenClubInquiriesController,
    HairDresserInquiriesController, HoneyMoonInquiriesController, HotelInquiriesController,
    LimousineInquiriesController, MakeupArtistInquiriesController, MenSuitInquiriesController,
    MotorcycleInquiriesController, OpenBuffetInquiriesController, PhotographerInquiriesController,
    ResturantInquiriesController, RingJewelleryInquiriesController, VideographyInquiriesController,
    WeddingCakeInquiriesController, WeddingCardInquiriesController, WeddingDressInquiriesController,
    WeddingFlowerInquiriesController, WeddingPalaceInquiriesController, WeddingPlanningInquiriesController,
};

/* inquiries */
Route::post('hotel-inquiry',[HotelInquiriesController::class, 'insert']);
Route::post('barber-shop-inquiry',[BarberShopInquiriesController::class, 'insert']);
Route::post('beauty-center-inquiry',[BeautyCenterInquiriesController::class, 'insert']);
Route::post('car-inquiry',[CarInquiriesController::class, 'insert']);
Route::post('dj-inquiry',[DjInquiriesController::class, 'insert']);
Route::post('hair-dresser-inquiry',[HairDresserInquiriesController::class, 'insert']);
Route::post('men-suit-inquiry',[MenSuitInquiriesController::class, 'insert']);
Route::post('honey-moon-inquiry',[HoneyMoonInquiriesController::class, 'insert']);
Route::post('limousine-inquiry',[LimousineInquiriesController::class, 'insert']);
Route::post('motorcycle-inquiry',[MotorcycleInquiriesController::class, 'insert']);
Route::post('open-buffet-inquiry',[OpenBuffetInquiriesController::class, 'insert']);
Route::post('photographer-inquiry',[PhotographerInquiriesController::class, 'insert']);
Route::post('videography-inquiry',[VideographyInquiriesController::class, 'insert']);
Route::post('wedding-cake-inquiry',[WeddingCakeInquiriesController::class, 'insert']);
Route::post('wedding-card-inquiry',[WeddingCardInquiriesController::class, 'insert']);
Route::post('wedding-dress-inquiry',[WeddingDressInquiriesController::class, 'insert']);
Route::post('wedding-flower-inquiry',[WeddingFlowerInquiriesController::class, 'insert']);
Route::post('wedding-palace-inquiry',[WeddingPalaceInquiriesController::class, 'insert']);
Route::post('wedding-planning-inquiry',[WeddingPlanningInquiriesController::class, 'insert']);
Route::post('ring-jewellery-inquiry',[RingJewelleryInquiriesController::class, 'insert']);
Route::post('restaurant-inquiry',[ResturantInquiriesController::class, 'insert']);
Route::post('garden-club-inquiry',[GardenClubInquiriesController::class, 'insert']);
Route::post('boat-inquiry',[BoatInquiriesController::class, 'insert']);
Route::post('makeup-artist-inquiry',[MakeupArtistInquiriesController::class, 'insert']);




