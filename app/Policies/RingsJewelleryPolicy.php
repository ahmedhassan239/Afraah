<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class RingsJewelleryPolicy
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
            return Gate::any(['View-RingsJewellery', 'Manage-RingsJewellery'], $user);
        }
    }


    public function view($user,$ringsJewellery)
    {
        if ($user->id == $ringsJewellery->user_id) {
            return $user->can(['View-RingsJewellery','Manage-RingsJewellery'],$ringsJewellery);
        }
    }

    public function create($user)
    {
        return $user->can('Manage-RingsJewellery');
    }

    public function update($user,$ringsJewellery)
    {
        return $user->id === $ringsJewellery->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }


    public function delete($user, $ringsJewellery)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-RingsJewellery', $ringsJewellery);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
