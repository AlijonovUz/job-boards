<?php

namespace App\Policies;

use App\Models\User;

class MailPolicy
{
    public function create(User $user): bool
    {
        return $user->role === "admin";
    }
}
