<?php

namespace App\Policies;

use App\Models\Hotel;
use App\Models\User;
use App\Nova\Metrics\Count;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class HotelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $user = Auth::user();
    }

    public function viewAny($user)
    {
        if ($user->id) {
            return Gate::any(['View-Hotel', 'Manage-Hotel'], $user);
        }
    }


    public function view($user,$hotel)
    {
        if ($user->is_admin == 0){
            if ($user->id == $hotel->user_id) {
                return $user->can(['View-Hotel','Manage-Hotel'],$hotel);
            }
        }else{
            return $user->can('Manage-Hotel');
        }
    }

    public function create($user)
    {
        return $user->can('Manage-Hotel');
    }

    public function update($user,$hotel)
    {
        if ($user->is_admin == 0){
            return $user->id === $hotel->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
        }else{
            return $user->can('Manage-Hotel', $hotel);
        }

    }


    public function delete($user, $hotel)
    {
        if (admin($user) || super_global_admin($user)) {
             return $user->can('Manage-Hotel', $hotel);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }

}
