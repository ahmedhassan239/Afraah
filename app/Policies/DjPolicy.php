<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class DjPolicy
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
        return Gate::any(['View-Dj','Manage-Dj'], $user);
    }

    public function view($user, $dj)
    {
        return $user->can(['View-Dj','Manage-Dj'],$dj);
    }

    public function create($user)
    {
        return $user->can('Manage-Dj');
    }

    public function update($user,$dj)
    {
        return $user->can('Manage-Dj', $dj);
    }

    public function delete($user, $dj)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Dj', $dj);
        }
    }
}
