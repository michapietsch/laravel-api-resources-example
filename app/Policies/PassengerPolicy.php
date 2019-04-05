<?php

namespace App\Policies;

use App\User;
use App\Passenger;
use Illuminate\Auth\Access\HandlesAuthorization;

class PassengerPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        /**
         * TODO: Restrict access e.g. to certain user roles
         */
        return true;
    }
}
