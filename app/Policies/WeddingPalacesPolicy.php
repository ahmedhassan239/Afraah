<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class WeddingPalacesPolicy
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
        return Gate::any(['View-Wedding-Palaces','Manage-Wedding-Palaces'], $user);
    }

    public function view($user, $weddingPalaces)
    {
        return $user->can(['View-Wedding-Palaces','Manage-Wedding-Palaces'],$user,$weddingPalaces);
    }

    public function create($user)
    {
        return $user->can('Manage-Wedding-Palaces');
    }

    public function update($user,$weddingPalaces)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Wedding-Palaces', $weddingPalaces);
        }
    }

    public function delete($user, $weddingPalaces)
    {
        return $user->can('Manage-Wedding-Palaces', $weddingPalaces);
    }
}
