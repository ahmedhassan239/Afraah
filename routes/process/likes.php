<?php

use App\Http\Controllers\Api\Like\{
    BarberShopLikeApiController,BeautyCenterLikeApiController,
    BoatLikeApiController, CarLikeApiController, DjLikeApiController,
    GardenClubLikeApiController, HairDresserLikeApiController, HoneyMoonLikeApiController,
    HotelLikeApiController, LimousineLikeApiController,
    MakeupArtistLikeApiController, MenSuitLikeApiController,
    MotorcycleLikeApiController, OpenBuffetLikeApiController,
    PhotographerLikeApiController, ResturantLikeApiController,
    VideographyLikeApiController, WeddingCakeLikeApiController,
    WeddingCardLikeApiController, WeddingDressLikeApiController,
    WeddingFlowerLikeApiController, WeddingPalaceLikeApiController,
};

/*Likes*/
Route::post('hotel-like',[HotelLikeApiController::class, 'insert']);
Route::get('hotel-profile-likes/{lang}',[HotelLikeApiController::class, 'showUserProfileLikes']);

Route::post('barber-shop-like',[BarberShopLikeApiController::class, 'insert']);
Route::get('barber-shop-profile-likes/{lang}',[BarberShopLikeApiController::class, 'showUserProfileLikes']);

Route::post('beauty-center-like',[BeautyCenterLikeApiController::class, 'insert']);
Route::get('beauty-center-profile-likes/{lang}',[BeautyCenterLikeApiController::class, 'showUserProfileLikes']);

Route::post('car-like',[CarLikeApiController::class, 'insert']);
Route::get('car-profile-likes/{lang}',[CarLikeApiController::class, 'showUserProfileLikes']);

Route::post('dj-like',[DjLikeApiController::class, 'insert']);
Route::get('dj-profile-likes/{lang}',[DjLikeApiController::class, 'showUserProfileLikes']);

Route::post('garden-club-like',[GardenClubLikeApiController::class, 'insert']);
Route::get('garden-club-profile-likes/{lang}',[GardenClubLikeApiController::class, 'showUserProfileLikes']);

Route::post('hairdresser-like',[HairDresserLikeApiController::class, 'insert']);
Route::get('hairdresser-profile-likes/{lang}',[HairDresserLikeApiController::class, 'showUserProfileLikes']);

Route::post('men-suit-like',[MenSuitLikeApiController::class, 'insert']);
Route::get('men-suit-profile-likes/{lang}',[MenSuitLikeApiController::class, 'showUserProfileLikes']);

Route::post('honey-moon-like',[HoneyMoonLikeApiController::class, 'insert']);
Route::get('honey-moon-profile-likes/{lang}',[HoneyMoonLikeApiController::class, 'showUserProfileLikes']);

Route::post('limousine-like',[LimousineLikeApiController::class, 'insert']);
Route::get('limousine-profile-likes/{lang}',[LimousineLikeApiController::class, 'showUserProfileLikes']);


Route::post('motorcycle-like',[MotorcycleLikeApiController::class, 'insert']);
Route::get('motorcycle-profile-likes/{lang}',[MotorcycleLikeApiController::class, 'showUserProfileLikes']);

Route::post('open-buffet-like',[OpenBuffetLikeApiController::class, 'insert']);
Route::get('open-buffet-profile-likes/{lang}',[OpenBuffetLikeApiController::class, 'showUserProfileLikes']);

Route::post('photographer-like',[PhotographerLikeApiController::class, 'insert']);
Route::get('photographer-profile-likes/{lang}',[PhotographerLikeApiController::class, 'showUserProfileLikes']);

Route::post('videography-like',[VideographyLikeApiController::class, 'insert']);
Route::get('videography-profile-likes/{lang}',[VideographyLikeApiController::class, 'showUserProfileLikes']);

Route::post('wedding-cake-like',[WeddingCakeLikeApiController::class, 'insert']);
Route::get('wedding-cake-profile-likes/{lang}',[WeddingCakeLikeApiController::class, 'showUserProfileLikes']);

Route::post('wedding-card-like',[WeddingCardLikeApiController::class, 'insert']);
Route::get('wedding-card-profile-likes/{lang}',[WeddingCardLikeApiController::class, 'showUserProfileLikes']);

Route::post('wedding-dress-like',[WeddingDressLikeApiController::class, 'insert']);
Route::get('wedding-dress-profile-likes/{lang}',[WeddingDressLikeApiController::class, 'showUserProfileLikes']);

Route::post('wedding-flower-like',[WeddingFlowerLikeApiController::class, 'insert']);
Route::get('wedding-flower-profile-likes/{lang}',[WeddingFlowerLikeApiController::class, 'showUserProfileLikes']);

Route::post('wedding-palace-like',[WeddingPalaceLikeApiController::class, 'insert']);
Route::get('wedding-palace-profile-likes/{lang}',[WeddingPalaceLikeApiController::class, 'showUserProfileLikes']);

Route::post('wedding-planning-like',[WeddingPalaceLikeApiController::class, 'insert']);
Route::get('wedding-planning-profile-likes/{lang}',[WeddingPalaceLikeApiController::class, 'showUserProfileLikes']);

Route::post('ring-jewellery-like',[WeddingPalaceLikeApiController::class, 'insert']);
Route::get('ring-jewellery-profile-likes/{lang}',[WeddingPalaceLikeApiController::class, 'showUserProfileLikes']);

Route::post('restaurant-like',[ResturantLikeApiController::class, 'insert']);
Route::get('restaurant-profile-likes/{lang}',[ResturantLikeApiController::class, 'showUserProfileLikes']);


Route::post('boat-like',[BoatLikeApiController::class, 'insert']);
Route::get('boat-profile-likes/{lang}',[BoatLikeApiController::class, 'showUserProfileLikes']);

Route::post('makeup-artist-like',[MakeupArtistLikeApiController::class, 'insert']);
Route::get('makeup-artist-profile-likes/{lang}',[MakeupArtistLikeApiController::class, 'showUserProfileLikes']);

/*Comments*/
