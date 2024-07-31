<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class SliderPolicy
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
        if (admin($user)||super_global_admin($user)) {
            return Gate::any(['View-Slider', 'Manage-Slider'], $user);
        }
    }


    public function view($user,$slider)
    {
        if (admin($user)||super_global_admin($user)) {
            return $user->can(['View-Slider','Manage-Slider'],$slider);
        }
    }

    public function create($user)
    {
        return $user->can('Manage-Slider');
    }

    public function update($user,$slider)
    {
        return admin($user) || super_global_admin($user)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }


    public function delete($user, $slider)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Slider', $slider);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
