<?php

namespace App\Policies;

use App\User;
use App\Flight;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlightPolicy
{
    use HandlesAuthorization;

    public function viewTotalSeats(User $user)
    {
        /**
         * TODO: Restrict access e.g. to certain user roles
         */
        return true;
    }
}
