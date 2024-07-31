<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class WeddingCardPolicy
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
        return Gate::any(['View-WeddingCard','Manage-WeddingCard'], $user);
    }

    public function view($user, $weddingCard)
    {
        return $user->can(['View-WeddingCard'],$weddingCard);
    }

    public function create($user)
    {
        return $user->can('Manage-WeddingCard');
    }

    public function update($user,$weddingCard)
    {
        return $user->can('Manage-WeddingCard', $weddingCard);
    }


    public function delete($user, $weddingCard)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-WeddingCard', $weddingCard);
        }
    }
}
