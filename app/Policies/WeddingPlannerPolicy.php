<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class WeddingPlannerPolicy
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
            return Gate::any(['View-WeddingPlanner', 'Manage-WeddingPlanner'], $user);
        }
    }


    public function view($user,$weddingPlanner)
    {
        return $user->can(['View-WeddingPlanner','Manage-WeddingPlanner'],$weddingPlanner);

//        if ($user->id == $weddingPlanner->user_id) {
//            return $user->can(['View-WeddingPlanner','Manage-WeddingPlanner'],$weddingPlanner);
//        }
    }

    public function create($user)
    {
        return $user->can('Manage-WeddingPlanner');
    }

    public function update($user,$weddingPlanner)
    {
        return $user->can('Manage-WeddingPlanner', $weddingPlanner);

//        return $user->id === $weddingPlanner->user_id
//            ? Response::allow()
//            : Response::deny('You do not own this post.');
    }


    public function delete($user, $weddingPlanner)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-WeddingPlanner', $weddingPlanner);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
