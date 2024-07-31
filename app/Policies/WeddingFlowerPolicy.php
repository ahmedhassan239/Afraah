<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class WeddingFlowerPolicy
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
            return Gate::any(['View-WeddingFlower', 'Manage-WeddingFlower'], $user);
        }
    }


    public function view($user,$weddingFlowerPolicy)
    {
        return $user->can(['View-WeddingFlower','Manage-WeddingFlower'],$weddingFlowerPolicy);
//        if ($user->id == $weddingFlowerPolicy->user_id) {
//            return $user->can(['View-WeddingFlower','Manage-WeddingFlower'],$weddingFlowerPolicy);
//        }
    }

    public function create($user)
    {
        return $user->can('Manage-WeddingFlower');
    }

    public function update($user,$weddingFlowerPolicy)
    {


        if ($user->is_admin == 0) {
            return $user->id === $weddingFlowerPolicy->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
        }else{
            return $user->can('Manage-WeddingFlower');
        }


    }


    public function delete($user, $weddingFlowerPolicy)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-WeddingFlower', $weddingFlowerPolicy);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
