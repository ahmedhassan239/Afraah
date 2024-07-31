<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class HoneyMoonPolicy
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
        if ($user->id) {
            return Gate::any(['View-HoneyMoon', 'Manage-HoneyMoon'], $user);
        }
    }


    public function view($user,$honeyMoon)
    {
        if ($user->id == $honeyMoon->user_id) {
            return $user->can(['View-HoneyMoon','Manage-HoneyMoon'],$honeyMoon);
        }
    }

    public function create($user)
    {
        return $user->can('Manage-HoneyMoon');
    }

    public function update($user,$honeyMoon)
    {
        return $user->id === $honeyMoon->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }


    public function delete($user, $honeyMoon)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-HoneyMoon', $honeyMoon);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
