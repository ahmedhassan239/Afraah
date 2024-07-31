<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InquiryPolicy
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

    public function view($user,$inquiry)
    {
        return super_global_admin($user);



    }

    public function create($user)
    {
        return false;
    }

    public function update($user,$inquiry)
    {
        return false;
    }

    public function delete($user, $inquiry)
    {

        return super_global_admin($user);

    }
}
