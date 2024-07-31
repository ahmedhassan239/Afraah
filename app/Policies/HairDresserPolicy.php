<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class HairDresserPolicy
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
        return Gate::any(['View-HairDresser','Manage-HairDresser'], $user);
    }

    public function view($user, $hairDresser)
    {

        return $user->can(['View-HairDresser','Manage-HairDresser'],$hairDresser);
    }

    public function create($user)
    {
        return $user->can('Manage-HairDresser');
    }

    public function update($user,$hairDresser)
    {
        return $user->can('Manage-HairDresser', $hairDresser);
    }


    public function delete($user, $hairDresser)
    {
        if (admin($user) || super_global_admin($user)) {
            return $user->can('Manage-HairDresser', $hairDresser);
        }
    }
}
