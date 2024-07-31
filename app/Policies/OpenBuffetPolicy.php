<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class OpenBuffetPolicy
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
        return (admin($user) || super_global_admin($user));

//        if ($user->id) {
//            return Gate::any(['View-OpenBuffet', 'Manage-OpenBuffet'], $user);
//        }
    }


    public function view($user,$openBuffet)
    {

        return (admin($user) || super_global_admin($user));

//        if ($user->id == $openBuffet->user_id) {
//            return $user->can(['View-OpenBuffet','Manage-OpenBuffet'],$openBuffet);
//        }
    }

    public function create($user)
    {
        return (admin($user) || super_global_admin($user));

        //  return $user->can('Manage-OpenBuffet');
    }

    public function update($user,$openBuffet)
    {

        return (admin($user) || super_global_admin($user));

//        return $user->id === $openBuffet->user_id
//            ? Response::allow()
//            : Response::deny('You do not own this post.');
    }


    public function delete($user, $openBuffet)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-OpenBuffet', $openBuffet);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
