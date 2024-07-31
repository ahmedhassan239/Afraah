<?php
use App\Http\Controllers\Api\{
    BarberShopApiController,BeautyCenterApiController,BlogApiController,BoatApiController,
    CarApiController,DjApiController,GardenClubApiController,GlobalSeoController,
    HairDresserApiController,HoneyMoonApiController,HotelApiController,LimousineApiController,
    MakeupArtistApiController,MenSuitApiController, MotorcycleApiController, OpenBuffetApiController,
    PhotographerApiController, RestaurantApiController, RingsJewelleryApiController, SliderController,
    VideographyApiController, WeddingCakeApiController, WeddingCardApiController, WeddingDressApiController,
    WeddingFlowerApiController, WeddingPalaceApiController, WeddingPlanningApiController,
};
use Illuminate\Support\Facades\Route;

/*cars*/
// api/cars/3/2/1/1
Route::get('wedding-cars/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[CarApiController::class, 'getCars']);
Route::get('wedding-cars/{country_id}/{lang}',[CarApiController::class, 'getAllDestinationCars']);
Route::get('wedding-cars/featured/{country_id}/{lang}',[CarApiController::class, 'getFeaturedCars']);
Route::get('single-wedding-car/{car_id}/{lang}',[CarApiController::class, 'getSingleCar']);
Route::get('wedding-cars-cities/{country_id}/{service_id}/{lang}',[CarApiController::class, 'getCarsCities']);
/*Limousines*/
Route::get('limousines/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[LimousineApiController ::class, 'getLimousines']);
Route::get('limousines/{country_id}/{lang}',[LimousineApiController::class, 'getDestinationLimousines']);
Route::get('limousines/featured/{country_id}/{lang}',[LimousineApiController::class,'getFeaturedLimousines']);
Route::get('single-limousine/{limousine_id}/{lang}',[LimousineApiController::class, 'getSingleLimousine']);

/*Motorcycle*/
Route::get('motorcycles/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[MotorcycleApiController::class, 'getMotorcycles']);
Route::get('motorcycles/{country_id}/{lang}',[MotorcycleApiController::class, 'getDestinationMotorcycles']);
Route::get('motorcycles/featured/{country_id}/{lang}',[MotorcycleApiController::class, 'getFeaturedMotorcycles']);
Route::get('single-motorcycle/{motor_id}/{lang}',[MotorcycleApiController::class, 'getSingleMotorcycle']);

/*MenSuit*/
//men-suit/4/5/1/1
Route::get('men-suits/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[MenSuitApiController::class, 'getMenSuits']);
Route::get('men-suits/{country_id}/{lang}',[MenSuitApiController::class, 'getDestinationMenSuits']);
Route::get('men-suits/featured/{country_id}/{lang}',[MenSuitApiController::class, 'getFeaturedMenSuits']);
Route::get('single-men-suit/{mensuit_id}/{lang}',[MenSuitApiController::class, 'getSingleMenSuit']);
Route::get('men-suits-cities/{country_id}/{service_id}/{lang}',[MenSuitApiController::class, 'getMenSuitsCities']);


/*Wedding-Dresses*/
//men-suit/4/3/1/1
Route::get('wedding-dresses/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[WeddingDressApiController::class,'getWeddingDresses']);
Route::get('wedding-dresses/{country_id}/{lang}',[WeddingDressApiController::class, 'getDestinationWeddingDresses']);
Route::get('wedding-dresses/featured/{country_id}/{lang}',[WeddingDressApiController::class,'getFeaturedWeddingDresses']);
Route::get('single-wedding-dress/{weddingdress_id}/{lang}',[WeddingDressApiController::class, 'getSingleWeddingDress']);
Route::get('wedding-dresses-cities/{country_id}/{service_id}/{lang}',[WeddingDressApiController::class, 'getWeddingDressesCities']);

/*Barber-shops*/
//barber-shops/1/6/1/1
Route::get('barber-shops/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[BarberShopApiController::class,'getAllBarberShops']);
Route::get('barber-shops/{country_id}/{lang}',[BarberShopApiController::class, 'getDestinationBarberShops']);
Route::get('barber-shops/featured/{country_id}/{lang}',[BarberShopApiController::class, 'getFeaturedBarberShops']);
Route::get('single-barber-shop/{barbershop_id}/{lang}',[BarberShopApiController::class, 'getSingleBarberShop']);
Route::get('barber-shops-cities/{country_id}/{service_id}/{lang}',[BarberShopApiController::class, 'getBarberShopsCities']);

/*beauty-center*/
//beauty-centers/1/7/1/1

Route::get('beauty-centers/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[BeautyCenterApiController::class, 'getAllBeautyCenters']);
Route::get('beauty-centers/{country_id}/{lang}',[BeautyCenterApiController::class, 'getDestinationBeautyCenters']);
Route::get('beauty-centers/featured/{country_id}/{lang}',[BeautyCenterApiController::class, 'getFeaturedBeautyCenters']);
Route::get('single-beauty-center/{beautycenter_id}/{lang}',[BeautyCenterApiController::class, 'getSingleBeautyCenter']);
Route::get('beauty-centers-cities/{country_id}/{service_id}/{lang}',[BeautyCenterApiController::class, 'getBeautyCentersCities']);




/*hair-dresser*/
//hair-dresser/1/8/1/1
Route::get('hair-dressers/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[HairDresserApiController::class, 'getAllHairDressers']);
Route::get('hair-dressers/{country_id}/{lang}',[HairDresserApiController::class, 'getDestinationHairDressers']);
Route::get('hair-dressers/featured/{country_id}/{lang}',[HairDresserApiController::class, 'getFeaturedHairDressers']);
Route::get('single-hair-dresser/{hairdresser_id}/{lang}',[HairDresserApiController::class, 'getSingleHairDresser']);
Route::get('hair-dressers-cities/{country_id}/{service_id}/{lang}',[HairDresserApiController::class, 'getHairDressersCities']);


/*Dj*/
//dj/5/9/1/1
Route::get('djs/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[DjApiController::class, 'getDjs']);
Route::get('djs/{country_id}/{lang}',[DjApiController::class, 'getDestinationDjs']);
Route::get('djs/featured/{country_id}/{lang}',[DjApiController::class, 'getFeaturedDjs']);
Route::get('single-dj/{dj_id}/{lang}',[DjApiController::class, 'getSingleDj']);
Route::get('djs-cities/{country_id}/{service_id}/{lang}',[DjApiController::class, 'getDjsCities']);

/*photographer*/
//photographer/5/10/1/1
Route::get('photographers/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[PhotographerApiController::class, 'getAllPhotographers']);
Route::get('photographers/{country_id}/{lang}',[PhotographerApiController::class, 'getDestinationPhotographers']);
Route::get('photographers/featured/{country_id}/{lang}',[PhotographerApiController::class, 'getFeaturedPhotographers']);
Route::get('single-photographer/{photographer_id}/{lang}',[PhotographerApiController::class, 'getSinglePhotographer']);
Route::get('photographers-cities/{country_id}/{service_id}/{lang}',[PhotographerApiController::class, 'getPhotographersCities']);

/*videography*/
//videography/5/4/1/1
Route::get('videographers/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[VideographyApiController::class, 'getAllVideographies']);
Route::get('videographers/{country_id}/{lang}',[VideographyApiController::class, 'getDestinationVideographies']);
Route::get('videographers/featured/{country_id}/{lang}',[VideographyApiController::class,'getFeaturedVideographies']);
Route::get('single-videographer/{videographer_id}/{lang}',[VideographyApiController::class, 'getSingleVideography']);


/*garden-club*/
//garden-club/2/8/1/1
Route::get('garden-clubs/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[GardenClubApiController ::class, 'getAllGardenClubs']);
Route::get('garden-clubs/{country_id}/{lang}',[GardenClubApiController::class, 'getDestinationGardenClubs']);
Route::get('garden-clubs-cities/{country_id}/{service_id}/{lang}',[GardenClubApiController::class, 'getGardenClubsCities']);
Route::get('garden-clubs/featured/{country_id}/{lang}',[GardenClubApiController::class,'getFeaturedGardenClubs']);
Route::get('single-garden-club/{gardenclub_id}/{lang}',[GardenClubApiController::class,'getSingleGardenClub']);

/*hotel*/

Route::get('hotels/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[HotelApiController::class, 'getAllHotels']);
//hotels in specific country
Route::get('hotels-cities/{country_id}/{service_id}/{lang}',[HotelApiController::class, 'getHotelsCities']);
Route::get('hotels/{country_id}/{lang}',[HotelApiController::class, 'getDestinationHotels']);
Route::get('hotels/featured/{country_id}/{lang}',[HotelApiController::class, 'getFeaturedHotels']);
Route::get('single-hotel/{hotel_id}/{lang}',[HotelApiController::class, 'getSingleHotel']);
Route::get('hall/{hotel_id}/{key}/{lang}',[HotelApiController::class, 'getSingleHall']);

/*restaurants*/

//restaurants/2/10/1/1
Route::get('restaurants/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[RestaurantApiController::class,'getAllRestaurants']);
Route::get('restaurants/{country_id}/{lang}',[RestaurantApiController::class,'getDestinationRestaurants']);
Route::get('restaurants/featured/{country_id}/{lang}',[RestaurantApiController::class,'getFeaturedRestaurants']);
Route::get('single-restaurant/{restaurant_id}/{lang}',[RestaurantApiController::class,'getSingleRestaurant']);
/*wedding-palace*/
//wedding-palace/2/11/1/1
Route::get('wedding-palaces/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[WeddingPalaceApiController::class,'getWeddingPalaces']);
Route::get('wedding-palaces/{country_id}/{lang}',[WeddingPalaceApiController::class,'getDestinationWeddingPalaces']);
Route::get('wedding-palaces-cities/{country_id}/{service_id}/{lang}',[WeddingPalaceApiController::class,'getWeddingPalacesCities']);
Route::get('wedding-palaces/featured/{country_id}/{lang}',[WeddingPalaceApiController::class,'getFeaturedWeddingPalaces']);
Route::get('single-wedding-palace/{wedding_palace_id}/{lang}',[WeddingPalaceApiController::class, 'getSingleWeddingPalace']);

//  Sliders
Route::get('sliders/{country_id}/{lang}',[SliderController::class,'getAllSliders']);

// GlobalSEO
Route::get('global-seo/{country_id}/{lang}',[GlobalSeoController::class, 'getAllGlobalSeo']);

//Rings
Route::get('rings-jewelleries/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[RingsJewelleryApiController::class, 'getRings']);
Route::get('rings-jewelleries/{country_id}/{lang}',[RingsJewelleryApiController::class,'getDestinationRings']);
Route::get('rings-jewelleries/featured/{country_id}/{lang}',[RingsJewelleryApiController::class,'getFeaturedRings']);
Route::get('single-ring-jewellery/{ring_id}/{lang}',[RingsJewelleryApiController::class, 'getSingleRing']);
Route::get('rings-jewelleries-cities/{country_id}/{service_id}/{lang}',[RingsJewelleryApiController::class, 'getRingsCities']);


//Honey Moons
Route::get('honey-moons/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[HoneyMoonApiController::class, 'getAllHoneyMoons']);
Route::get('honey-moons/{country_id}/{lang}',[HoneyMoonApiController::class, 'getDestinationHoneyMoons']);
Route::get('honey-moons/featured/{country_id}/{lang}',[HoneyMoonApiController::class, 'getFeaturedHoneyMoons']);
Route::get('single-honey-moon/{honeymoon_id}/{lang}',[HoneyMoonApiController::class, 'getSingleHoneyMoon']);

/*wedding-card*/
//WeddingCard/5/11/1/1
Route::get('wedding-cards/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[WeddingCardApiController ::class, 'getAllWeddingCards']);
Route::get('wedding-cards/{country_id}/{lang}',[WeddingCardApiController::class, 'getDestinationWeddingCards']);
Route::get('wedding-cards/featured/{country_id}/{lang}',[WeddingCardApiController::class,'getFeaturedWeddingCards']);
Route::get('single-wedding-card/{weddingcard_id}/{lang}',[WeddingCardApiController::class,'getSingleWeddingCard']);
Route::get('wedding-cards-cities/{country_id}/{service_id}/{lang}',[WeddingCardApiController::class, 'getWeddingCardsCities']);

/*Wedding Flowers*/
Route::get('wedding-flowers/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[WeddingFlowerApiController ::class, 'getAllWeddingFlowers']);
Route::get('wedding-flowers/{country_id}/{lang}',[WeddingFlowerApiController::class, 'getDestinationWeddingFlowers']);
Route::get('wedding-flowers/featured/{country_id}/{lang}',[WeddingFlowerApiController::class,'getFeaturedWeddingFlowers']);
Route::get('single-wedding-flower/{wedding_flower_id}/{lang}',[WeddingFlowerApiController::class,'getSingleWeddingFlower']);
Route::get('wedding-flowers-cities/{country_id}/{service_id}/{lang}',[WeddingFlowerApiController::class, 'getWeddingFlowersCities']);


/*Wedding Plannings*/
Route::get('wedding-planners/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[WeddingPlanningApiController ::class, 'getAllWeddingPlannings']);
Route::get('wedding-planners/{country_id}/{lang}',[WeddingPlanningApiController::class, 'getDestinationWeddingPlannings']);
Route::get('wedding-planners/featured/{country_id}/{lang}',[WeddingPlanningApiController::class,'getFeaturedWeddingPlannings']);
Route::get('single-wedding-planner/{wedding_planning_id}/{lang}',[WeddingPlanningApiController::class,'getSingleWeddingPlanning']);
Route::get('wedding-planners-cities/{country_id}/{service_id}/{lang}',[WeddingPlanningApiController::class, 'getWeddingWeddingPlannings']);



//Open Buffet
Route::get('open-buffets/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[OpenBuffetApiController ::class, 'getAllOpenBuffets']);
Route::get('open-buffets/{country_id}/{lang}',[OpenBuffetApiController::class, 'getDestinationOpenBuffets']);
Route::get('open-buffets/featured/{country_id}/{lang}',[OpenBuffetApiController::class,'getFeaturedOpenBuffets']);
Route::get('single-open-buffet/{open_buffet_id}/{lang}',[OpenBuffetApiController::class,'getSingleOpenBuffet']);
Route::get('open-buffets-cities/{country_id}/{service_id}/{lang}',[OpenBuffetApiController::class, 'getOpenBuffetsCities']);
// wedding-cakes
Route::get('wedding-cakes/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[WeddingCakeApiController ::class, 'getAllWeddingCakes']);
Route::get('wedding-cakes/{country_id}/{lang}',[WeddingCakeApiController::class, 'getDestinationWeddingCakes']);
Route::get('wedding-cakes/featured/{country_id}/{lang}',[WeddingCakeApiController::class,'getFeaturedWeddingCakes']);
Route::get('single-wedding-cake/{open_buffet_id}/{lang}',[WeddingCakeApiController::class,'getSingleWeddingCake']);
Route::get('wedding-cakes-cities/{country_id}/{service_id}/{lang}',[WeddingCakeApiController::class, 'getWeddingCakesCities']);


// Blogs
//Route::get('blogs/{country_id}/{lang}',[BlogApiController ::class, '']);
Route::get('blogs/{country_id}/{lang}',[BlogApiController::class, 'getDestinationBlogs']);
Route::get('blogs/featured/{country_id}/{lang}',[BlogApiController::class,'getFeaturedBlogs']);
Route::get('single-blog/{id}/{lang}',[BlogApiController::class,'getSingleBlog']);

/*Boat boats/2/28/1/1/ar */
Route::get('boats/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[BoatApiController ::class, 'getAllBoats']);
Route::get('boats/{country_id}/{lang}',[BoatApiController::class, 'getDestinationBoats']);
Route::get('boats-cities/{country_id}/{service_id}/{lang}',[BoatApiController::class, 'getBoatsCities']);
Route::get('boats/featured/{country_id}/{lang}',[BoatApiController::class,'getFeaturedBoats']);
Route::get('single-boat/{boat_id}/{lang}',[BoatApiController::class,'getSingleBoat']);

/* Makeup Artist*/

Route::get('makeup-artists/{category_id}/{service_id}/{country_id}/{city_id}/{lang}',[MakeupArtistApiController::class, 'getAllMakeupArtists']);
Route::get('makeup-artists/{country_id}/{lang}',[MakeupArtistApiController::class, 'getDestinationMakeupArtists']);
Route::get('makeup-artists/featured/{country_id}/{lang}',[MakeupArtistApiController::class, 'getFeaturedMakeupArtists']);
Route::get('single-makeup-artist/{makeup_artist_id}/{lang}',[MakeupArtistApiController::class, 'getSingleMakeupArtist']);
Route::get('makeup-artists-cities/{country_id}/{service_id}/{lang}',[MakeupArtistApiController::class, 'getMakeupArtistsCities']);

