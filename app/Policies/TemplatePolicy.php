<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;


class TemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function viewAny($user)
    {
        if ($user->id) {
            return Gate::any(['View-Template', 'Manage-Template'], $user);
        }
    }


    public function view($user,$template)
    {
        if ($user->is_admin == 0){
            if ($user->id == $template->user_id) {
                return $user->can(['View-Template','Manage-Template'],$template);
            }
        }else{
            return $user->can('Manage-Template');
        }
    }

    public function create($user)
    {
        return $user->can('Manage-Template');
    }

    public function update($user,$template)
    {
        if ($user->is_admin == 0){
            return $user->id === $template->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
        }else{
            return $user->can('Manage-Template', $template);
        }

    }


    public function delete($user, $template)
    {
        if (admin($user) || super_global_admin($user)) {
             return $user->can('Manage-Template', $template);
        }
//        return $user->id === $hotel->user_id
//        ? Response::allow()
//        : Response::deny('You do not own this post.');
    }
}
