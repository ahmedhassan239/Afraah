<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ServicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function viewAny($user)
    {
        return Gate::any(['View-Service','Manage-Service'], $user);
    }

    public function view($user, $service)
    {
        return $user->can(['View-Service','Manage-Service'],$service);
    }

    public function create($user)
    {
        return $user->can('Manage-Service');
//        return $user->id == 1;
    }

    public function update($user,$service)
    {
        return $user->can('Manage-Service', $service);
//        return $user->id == 1;

    }


    public function delete($user, $hotel)
    {
//        if ($user->is_admin == 1) {
//            return $user->can('Manage-Service', $hotel);
//        }
        return super_global_admin($user);
    }
}
