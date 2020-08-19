<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * RoleRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    /**
     * Return the default role of the application.
     *
     * @return Role
     */
    public function findDefault(): Role
    {
        return $this->model
            ->where('name', '=', config('permission.default.role_name', 'user'))
            ->firstOrFail();
    }
}
