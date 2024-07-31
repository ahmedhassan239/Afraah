<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class WeddingCakePolicy
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
            return Gate::any(['View-WeddingCake','Manage-WeddingCake'], $user);
        }


    }


    public function view($user,$weddingCake)
    {
        if ($user->is_admin == 0){
            if ($user->id == $weddingCake->user_id) {
                return $user->can(['View-WeddingCake','Manage-WeddingCake'],$weddingCake);
            }
        }else{
            return $user->can('Manage-WeddingCake');
        }
    }

    public function create($weddingCake)
    {
        return $weddingCake->can('Manage-WeddingCake');
    }

    public function update($user,$weddingCake)
    {
        if ($user->is_admin == 0){
            return $user->id === $weddingCake->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
        }else{
            return $user->can('Manage-WeddingCake', $weddingCake);
        }
    }


    public function delete($user, $weddingCake)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-WeddingCake', $weddingCake);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
