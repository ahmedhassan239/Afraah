<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class CategoryPolicy
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
        return Gate::any(['View-Category','Manage-Category'], $user);
    }

    public function view($user, $category)
    {
        return $user->can(['View-Category','Manage-Category'],$category);
    }

    public function create($user)
    {
        return $user->can('Manage-Category');
    }

    public function update($user,$category)
    {
        return $user->can('Manage-Category', $category);
    }


    public function delete($user, $category)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Category', $category);
        }

    }
}
