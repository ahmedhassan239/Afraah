<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class CityPolicy
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
        return Gate::any(['View-City','Manage-City'], $user);
    }

    public function view($user, $city)
    {
        return $user->can(['View-City','Manage-City'],$city);
    }

    public function create($user)
    {
        return $user->can('Manage-City');
    }

    public function update($user,$city)
    {
        return $user->can('Manage-City', $city);
    }


    public function delete($user, $city)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-City', $city);
        }
    }
}
