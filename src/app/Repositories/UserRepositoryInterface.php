<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * Assign the default role application according to configuration to the user passed as parameter.
     *
     * @param User $user
     *
     * @return User
     */
    public function assignDefaultRole(User $user): User;
}
