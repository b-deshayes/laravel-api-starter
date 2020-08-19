<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * UserRepository constructor.
     *
     * @param User $model
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(User $model, RoleRepositoryInterface $roleRepository)
    {
        parent::__construct($model);
        $this->roleRepository = $roleRepository;
    }

    /**
     * Assign the default role application according to configuration to the user passed as parameter.
     *
     * @param User $user
     *
     * @return User
     */
    public function assignDefaultRole(User $user): User
    {
        $role = $this->roleRepository->findDefault();
        return $user->assignRole([$role]);
    }
}
