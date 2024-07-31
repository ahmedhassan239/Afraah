<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class CarPolicy
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
        return Gate::any(['View-Car','Manage-Car'], $user);
    }

    public function view($user, $car)
    {
        return $user->can(['View-Car','Manage-Car'],$car);
    }

    public function create($user)
    {
        return $user->can('Manage-Car');
    }

    public function update($user,$car)
    {
        return $user->can('Manage-Car', $car);
    }


    public function delete($user, $car)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Car', $car);
        }
    }
}
