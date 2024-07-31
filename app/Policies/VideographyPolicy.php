<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class VideographyPolicy
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
        return Gate::any(['View-Videography','Manage-Videography'], $user);
    }

    public function view($user, $videography)
    {
        return $user->can(['View-Videography','Manage-Videography'],$videography);
    }

    public function create($user)
    {
        return $user->can('Manage-Videography');
    }

    public function update($user,$videography)
    {
        return $user->can('Manage-Videography', $videography);
    }


    public function delete($user, $videography)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Videography', $videography);
        }
    }
}
