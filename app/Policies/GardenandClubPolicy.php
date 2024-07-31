<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class GardenandClubPolicy
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
        return Gate::any(['View-Garden&Clubs','Manage-Garden&Clubs'], $user);
    }

    public function view($user, $gardenAndClub)
    {
        return $user->can(['View-Garden&Clubs','Manage-Garden&Clubs'],$user,$gardenAndClub);
    }

    public function create($user)
    {
        return $user->can('Manage-Garden&Clubs');
    }

    public function update($user,$gardenAndClub)
    {
        return $user->can('Manage-Garden&Clubs', $gardenAndClub);
    }


    public function delete($user, $gardenAndClub)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Garden&Clubs', $gardenAndClub);
        }
    }
}
