<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class MenSuitPolicy
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
        return Gate::any(['View-MenSuit','Manage-MenSuit'], $user);
    }

    public function view($user, $menSuit)
    {
        return $user->can(['View-MenSuit','Manage-MenSuit'],$menSuit);
    }

    public function create($user)
    {
        return $user->can('Manage-MenSuit');
    }

    public function update($user,$menSuit)
    {
        return $user->can('Manage-MenSuit', $menSuit);
    }


    public function delete($user, $menSuit)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-MenSuit', $menSuit);
        }
    }
}
