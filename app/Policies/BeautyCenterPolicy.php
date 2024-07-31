<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class BeautyCenterPolicy
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
    public function viewAny($user): bool
    {
        return Gate::any(['View-BeautyCenter','Manage-BeautyCenter'], $user);
    }

    public function view($user, $beautyCenter)
    {
        return $user->can(['View-BeautyCenter','Manage-BeautyCenter'],$beautyCenter);
    }

    public function create($user)
    {
        return $user->can('Manage-BeautyCenter');
    }

    public function update($user,$beautyCenter)
    {
        return $user->can('Manage-BeautyCenter', $beautyCenter);
    }


    public function delete($user, $beautyCenter)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-BeautyCenter', $beautyCenter);
        }
    }
}
