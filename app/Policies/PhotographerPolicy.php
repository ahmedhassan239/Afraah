<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PhotographerPolicy
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
        return Gate::any(['View-Photographer','Manage-Photographer'], $user);
    }

    public function view($user, $photographer)
    {
        return $user->can(['View-Photographer','Manage-Photographer'],$photographer);
    }

    public function create($user)
    {
        return $user->can('Manage-Photographer');
    }

    public function update($user,$photographer)
    {
        return $user->can('Manage-Photographer', $photographer);
    }


    public function delete($user, $photographer)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Photographer', $photographer);
        }
    }
}
