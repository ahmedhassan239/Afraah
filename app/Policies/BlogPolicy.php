<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Actions\Action;

class BlogPolicy
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

        return Gate::any(['View-Blog','Manage-Blog'], $user);
    }

    public function view($user)
    {
        return $user->can('Manage-Blog');
    }

    public function create($user)
    {
        return $user->can('Manage-Blog');
    }

    public function update($user,$BlogSite)
    {
        return $user->can('Manage-Blog', $BlogSite);
    }


    public function delete($user, $BlogSite)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Blog', $BlogSite);
        }
    }
}
