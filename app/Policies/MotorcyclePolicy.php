<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class MotorcyclePolicy
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
        return Gate::any(['View-Motorcycle','Manage-Motorcycle'], $user);
    }

    public function view($user, $motorcycle)
    {
        return $user->can(['View-Motorcycle','Manage-Motorcycle'],$motorcycle);
    }

    public function create($user)
    {
        return $user->can('Manage-Motorcycle');
    }

    public function update($user,$motorcycle)
    {
        return $user->can('Manage-Motorcycle', $motorcycle);
    }


    public function delete($user, $motorcycle)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-Motorcycle', $motorcycle);
        }
    }
}
