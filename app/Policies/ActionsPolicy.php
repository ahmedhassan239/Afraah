<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ActionsPolicy
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
        return super_global_admin($user);
//        return Gate::any(['View-Actions'], $action);
//        return Gate::any(['View-Actions', 'Manage-Actions'], $user);
    }

    public function view($user, $action)
    {
        return super_global_admin($user);
//        return $user->can('View-Actions',$user,$action);
    }


}
