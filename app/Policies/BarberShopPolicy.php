<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class BarberShopPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function viewAny($user)
    {
        return Gate::any(['View-BarberShop','Manage-BarberShop'], $user);
    }

    public function view($user, $barberShop)
    {
        return $user->can(['View-BarberShop','Manage-BarberShop'],$barberShop);
    }

    public function create($user)
    {
        return $user->can('Manage-BarberShop');
    }

    public function update($user,$barberShop)
    {
        return $user->can('Manage-BarberShop', $barberShop);
    }


    public function delete($user, $barberShop)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-BarberShop', $barberShop);
        }
    }
}
