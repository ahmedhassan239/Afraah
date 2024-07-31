<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class AccessUserPolicy
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
        return Gate::any(['Access-Users'], $user);
    }

    public function view($user, $accessUser)
    {
        return $user->can(['Access-Users'],$accessUser);
    }

    public function create($user)
    {
        return $user->can('Access-Users');
    }

    public function update($user,$accessUser)
    {
        return $user->can('Access-Users', $accessUser);
    }


    public function delete($user, $accessUser)
    {
        return $user->can('Manage-Users', $accessUser);
    }
}
