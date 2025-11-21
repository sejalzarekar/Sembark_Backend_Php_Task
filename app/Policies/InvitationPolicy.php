<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Invitation;

class InvitationPolicy
{
     
    public function create(User $user)
    {
        // Members cannot invite
        if ($user->role->name === 'Member') {
            return false;
        }

        // SuperAdmin Can invite Admins into new companies
        if ($user->role->name === 'SuperAdmin') {
            return true; 
        }

        // Admin CAN invite Admins or Members ONLY for their own company
        if ($user->role->name === 'Admin') {
            return true;
        }

        return false;
    }
}
