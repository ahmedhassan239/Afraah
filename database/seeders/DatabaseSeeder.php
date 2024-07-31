<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Intl\Countries;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(CategorySeeder::class);
//        $this->call(CitySeeder::class);
//        $this->call(CountrySeeder::class);
//        $this->call(RolesSeeder::class);
//        $this->call(ServiceSeeder::class);
//        $this->call(ServicesTableSeeder::class);
//        $this->call(AccessesTableSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(CitiesTableSeeder::class);
//        $this->call(RolesTableSeeder::class);
//        $this->call(RoleUserTableSeeder::class);
//        $this->call(RolePermissionTableSeeder::class);
//        $this->call(SlidersTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(GlobalSeoSettingsTableSeeder::class);
        $this->call(BarberShopsTableSeeder::class);
        $this->call(BeautyCentersTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(BoatsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(DjsTableSeeder::class);
        $this->call(GardensClubsTableSeeder::class);
        $this->call(HairdressersTableSeeder::class);
        $this->call(HoneyMoonsTableSeeder::class);

        $this->call(HotelsTableSeeder::class);
    }
}
