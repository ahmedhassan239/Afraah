<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class LimousinePolicy
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
        return Gate::any(['View-Limousine','Manage-Limousine'], $user);
    }

    public function view($user, $limousine)
    {
        return $user->can(['View-Limousine','Manage-Limousine'],$limousine);
    }

    public function create($user)
    {
        return $user->can('Manage-Limousine');
    }

    public function update($user,$limousine)
    {
        return $user->can('Manage-Limousine', $limousine);
    }


    public function delete($user, $limousine)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Limousine', $limousine);
        }
    }
}
