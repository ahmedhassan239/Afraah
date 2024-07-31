<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class BoatPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
       //  $user = auth()->user();
    }

    public function viewAny($user)
    {
        if ($user->id) {
            return Gate::any(['View-Boat', 'Manage-Boat'], $user);
        }

    }

    public function view($user,$Boat)
    {
        if ($user->is_admin == 0){
            if ($user->id == $Boat->user_id) {
                return $user->can(['View-Boat','Manage-Boat'],$Boat);
            }
        }else{
            return $user->can('Manage-Boat');
        }
    }

    public function create($user)
    {
        return $user->can('Manage-Boat');
    }

    public function update($user,$Boat)
    {
        if ($user->is_admin == 0){
            return $user->id === $Boat->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
        }else{
            return $user->can('Manage-Boat', $Boat);
        }

    }

    public function delete($user, $Boat)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Boat', $Boat);
        }
//        return $user->id === $Boat->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
