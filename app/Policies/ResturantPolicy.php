<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ResturantPolicy
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
        return Gate::any(['View-Restaurant','Manage-Restaurant'], $user);
    }

    public function view($user, $restaurant)
    {
        return $user->can(['View-Restaurant','Manage-Restaurant'],$user,$restaurant);
    }

    public function create($user)
    {
        return $user->can('Manage-Restaurant');
    }

    public function update($user,$restaurant)
    {
        return $user->can('Manage-Restaurant', $restaurant);
    }


    public function delete($user, $restaurant)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Restaurant', $restaurant);
        }
    }
}
