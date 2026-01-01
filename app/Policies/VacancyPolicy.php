<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;

class VacancyPolicy
{

    public function update(User $user, Vacancy $vacancy): bool
    {
        return $user->id === $vacancy->user_id;
    }

    public function delete(User $user, Vacancy $vacancy): bool
    {
        return $user->id === $vacancy->user_id;
    }

}
