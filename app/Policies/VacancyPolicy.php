<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;

class VacancyPolicy
{

    public function create(User $user): bool
    {
        return in_array($user->role, ['employer', 'admin'], true);
    }

    public function update(User $user, Vacancy $vacancy): bool
    {
        return $user->id === $vacancy->user_id;
    }

    public function delete(User $user, Vacancy $vacancy): bool
    {
        return $user->id === $vacancy->user_id;
    }

}
