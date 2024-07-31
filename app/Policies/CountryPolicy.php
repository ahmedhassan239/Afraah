<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class CountryPolicy
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
        return $user->can(['View-Country','Manage-Country']);
    }

    public function view($user, $country)
    {
        return $user->can(['View-Country','Manage-Country'],$country);
    }

    public function create($user)
    {
        return $user->can('Manage-Country');
    }

    public function update($user,$country)
    {
        return $user->can('Manage-Country', $country);
    }


    public function delete($user, $country)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Country', $country);
        }

    }
}
