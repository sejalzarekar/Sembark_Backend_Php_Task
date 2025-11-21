<?php

namespace App\Policies;

use App\Models\ShortUrl;
use App\Models\User;

class ShortUrlPolicy
{
    public function create(User $user)
    {
        // SuperAdmin cannot create short url 
        if ($user->role->name === 'SuperAdmin') {
            return false;
        }

        // Admin & Member can create short url 
        return in_array($user->role->name, ['Admin', 'Member']);
    }

    public function viewAny(User $user)
    {
        // SuperAdmin sees ALL short url's
        if ($user->role->name === 'SuperAdmin') {
            return true;
        }

        return true; 
    }

    public function view(User $user, ShortUrl $shortUrl)
    {
        // SuperAdmin sees all url's
        if ($user->role->name === 'SuperAdmin') {
            return true;
        }

        // Admin sees Urls only from THEIR company
        if ($user->role->name === 'Admin') {
            return $shortUrl->company_id === $user->company_id;
        }

        // Member sees ONLY URLs created by THEM
        if ($user->role->name === 'Member') {
            return $shortUrl->created_by === $user->id;
        }

        return false;
    }
}
