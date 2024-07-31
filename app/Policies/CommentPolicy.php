<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class CommentPolicy
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
        return super_global_admin($user);

    }

    public function view($user,$comment)
    {
        return super_global_admin($user);



    }

    public function create($user)
    {
        return false;
    }

    public function update($user,$comment)
    {
        return super_global_admin($user);
    }

    public function delete($user, $comment)
    {

        return super_global_admin($user);

    }
}
