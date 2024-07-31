<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class WeddingDressPolicy
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
        return Gate::any(['View-WeddingDress','Manage-WeddingDress'], $user);
    }

    public function view($user, $weddingDress)
    {
        return $user->can(['View-WeddingDress','Manage-WeddingDress'],$weddingDress);
    }

    public function create($user)
    {
        return $user->can('Manage-WeddingDress');
    }

    public function update($user,$weddingDress)
    {
        return $user->can('Manage-WeddingDress', $weddingDress);
    }


    public function delete($user, $weddingDress)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-WeddingDress', $weddingDress);
        }
    }
}
