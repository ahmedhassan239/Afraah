<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class MakeupArtistPolicy
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
    public function viewAny($user): bool
    {
        return Gate::any(['View-MakeupArtist','Manage-MakeupArtist'], $user);
    }

    public function view($user, $makeupArtist)
    {
        return $user->can(['View-MakeupArtist','Manage-MakeupArtist'],$makeupArtist);
    }

    public function create($user)
    {
        return $user->can('Manage-MakeupArtist');
    }

    public function update($user,$makeupArtist)
    {
        return $user->can('Manage-MakeupArtist', $makeupArtist);
    }


    public function delete($user, $makeupArtist)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-MakeupArtist', $makeupArtist);
        }
    }
}
