<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class GlobalSeoPolicy
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
            return Gate::any(['View-GlobalSeo', 'Manage-GlobalSeo'], $user);
        }
    }


    public function view($user,$globalSeo)
    {
//        if ($user->id == 1) {
            return $user->can(['View-GlobalSeo','Manage-GlobalSeo'],$globalSeo);
//        }
    }

    public function create($user)
    {
        return $user->can('Manage-GlobalSeo');
    }

    public function update($user,$globalSeo)
    {
//        return $user->id === 1
//            ? Response::allow()
//            : Response::deny('You do not own this post.');
        return $user->can('Manage-GlobalSeo', $globalSeo);

    }


    public function delete($user, $globalSeo)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-GlobalSeo', $globalSeo);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }



























































































}
