<?php

namespace App\Providers;

//use Illuminate\Auth\Access\Gate;
use App\Models\Action;
use App\Models\BarberShop;
use App\Models\BeautyCenter;
use App\Models\Blog;
use App\Models\Boat;
use App\Models\Car;
use App\Models\Category;
use App\Models\City;
use App\Models\Comment\Comment;
use App\Models\Contact;
use App\Models\Country;
use App\Models\GardenAndClub;
use App\Models\GlobalSeo;
use App\Models\HairDresser;
use App\Models\HoneyMoon;
use App\Models\Hotel;
use App\Models\Limousine;
use App\Models\MakeupArtist;
use App\Models\MenSuit;
use App\Models\Motorcycle;
use App\Models\OpenBuffet;
use App\Models\Photographer;
use App\Models\Resturant;
use App\Models\RingsJewellery;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Videography;
use App\Models\WeddingCake;
use App\Models\WeddingCard;
use App\Models\WeddingDress;
use App\Models\WeddingFlower;
use App\Models\WeddingPalace;
use App\Models\WeddingPlanning;
use App\Models\Template;
use App\Policies\AccessUserPolicy;
use App\Policies\ActionsPolicy;
use App\Policies\BarberShopPolicy;
use App\Policies\BeautyCenterPolicy;
use App\Policies\BlogPolicy;
use App\Policies\BoatPolicy;
use App\Policies\CarPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\ContactPolicy;
use App\Policies\CountryPolicy;
use App\Policies\GardenandClubPolicy;
use App\Policies\GlobalSeoPolicy;
use App\Policies\HairDresserPolicy;
use App\Policies\HoneyMoonPolicy;
use App\Policies\HotelPolicy;
use App\Policies\LimousinePolicy;
use App\Policies\MakeupArtistPolicy;
use App\Policies\MenSuitPolicy;
use App\Policies\MotorcyclePolicy;
use App\Policies\OpenBuffetPolicy;
use App\Policies\PhotographerPolicy;
use App\Policies\ResturantPolicy;
use App\Policies\ServicePolicy;
use App\Policies\SliderPolicy;
use App\Policies\VideographyPolicy;
use App\Policies\WeddingCakePolicy;
use App\Policies\WeddingCardPolicy;
use App\Policies\WeddingDressPolicy;
use App\Policies\WeddingFlowerPolicy;
use App\Policies\WeddingPalacesPolicy;
use App\Policies\WeddingPlannerPolicy;
use App\Policies\TemplatePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Silvanite\Brandenburg\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    protected $policies = [
            Hotel::class => HotelPolicy::class,
            Template::class => TemplatePolicy::class,
            WeddingPalace::class => WeddingPalacesPolicy::class,
//            Action::class => ActionsPolicy::class,
            Resturant::class=>ResturantPolicy::class,
            GardenAndClub::class=>GardenandClubPolicy::class,
            WeddingCard::class=>WeddingCardPolicy::class,
            Videography::class=>VideographyPolicy::class,
            Photographer::class=>PhotographerPolicy::class,
            Service::class=>ServicePolicy::class,
            Category::class=>CategoryPolicy::class,
            HairDresser::class=>HairDresserPolicy::class,
            BeautyCenter::class=>BeautyCenterPolicy::class,
            BarberShop::class=>BarberShopPolicy::class,
            WeddingDress::class=>WeddingDressPolicy::class,
            MenSuit::class=>MenSuitPolicy::class,
            Country::class=>CountryPolicy::class,
            City::class=>CountryPolicy::class,
            Motorcycle::class=>MotorcyclePolicy::class,
            Limousine::class=>LimousinePolicy::class,
            Car::class=>CarPolicy::class,
            GlobalSeo::class=>GlobalSeoPolicy::class,
            Slider::class=>SliderPolicy::class,
            HoneyMoon::class=>HoneyMoonPolicy::class,
            OpenBuffet::class=>OpenBuffetPolicy::class,
            RingsJewellery::class=>ResturantPolicy::class,
            WeddingCake::class=>WeddingCakePolicy::class,
            WeddingFlower::class=>WeddingFlowerPolicy::class,
            WeddingPlanning::class=>WeddingPlannerPolicy::class,
            Boat::class=>BoatPolicy::class,
            Blog::class => BlogPolicy::class,
            MakeupArtist::class=> MakeupArtistPolicy::class,
            Contact::class=>ContactPolicy::class,
            Comment::class=>CommentPolicy::class,
               // action event
            'Laravel\Nova\Actions\ActionEvent' => 'App\Policies\ActionsPolicy',

//            User::class=>AccessUserPolicy::class
    ];

    public function boot()
    {
        collect([
//            'Cannot-Access-Nova',
            'View-Hotel','Manage-Hotel',
            'View-Template','Manage-Template',
            'View-Wedding-Palaces','Manage-Wedding-Palaces',
            'View-Restaurant','Manage-Restaurant',
            'View-Garden&Clubs','Manage-Garden&Clubs',
            'View-WeddingCard','Manage-WeddingCard',
            'View-Videography','Manage-Videography',
            'View-Photographer','Manage-Photographer',
            'View-Dj','Manage-Dj',
            'View-Service','Manage-Service',
            'View-Category','Manage-Category',
            'View-HairDresser','Manage-HairDresser',
            'View-BeautyCenter','Manage-BeautyCenter',
            'View-BarberShop','Manage-BarberShop',
            'View-WeddingDress','Manage-WeddingDress',
            'View-MenSuit','Manage-MenSuit',
            'View-Country','Manage-Country',
            'View-City','Manage-City',
            'View-Motorcycle','Manage-Motorcycle',
            'View-Limousine','Manage-Limousine',
            'View-Car','Manage-Car',
            'View-GlobalSeo', 'Manage-GlobalSeo',
            'View-Slider', 'Manage-Slider',
            'View-HoneyMoon', 'Manage-HoneyMoon',
            'View-OpenBuffet', 'Manage-OpenBuffet',
            'View-RingsJewellery','Manage-RingsJewellery',
            'View-WeddingCake','Manage-WeddingCake',
            'View-WeddingFlower','Manage-WeddingFlower',
            'View-WeddingPlanner','Manage-WeddingPlanner',
            'View-Boat','Manage-Boat',
            'View-Blog','Manage-Blog',
            'View-MakeupArtist', 'Manage-MakeupArtist',
            //'View-Action','Manage-Action',

        ])->each(function ($permission) {
            Gate::define($permission, function ($user) use ($permission) {
                if ($this->nobodyHasAccess($permission)) {
                    return true;
                }
                return $user->hasRoleWithPermission($permission);
            });
        });

        $this->registerPolicies();
    }
}
