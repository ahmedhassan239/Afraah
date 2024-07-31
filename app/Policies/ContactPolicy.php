<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class ContactPolicy
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
        return $user->id == 1;

    }

    public function view($user,$contact)
    {
        return $user->id == 1;



    }

    public function create($user)
    {
        return false;
    }

    public function update($user,$contact)
    {
        return false;

    }

    public function delete($user, $contact)
    {

        return super_global_admin($user);

    }
}
