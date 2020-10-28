<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleIndexRequest;
use App\Http\Resources\Role\RoleCollection;
use App\Models\Role;

/**
 * @group Roles
 *
 * APIs for managing all application roles
 */
class RoleController extends Controller
{
    /**
     * Create a new SettingController instance.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * GET roles
     *
     * Get all information about roles
     *
     * @responseFile 200 responses/role/index.json
     * @responseFile 401 responses/common/401.unauthorized.json
     *
     * @authenticated
     *
     * @param RoleIndexRequest $request
     *
     * @return RoleCollection
     */
    public function index(RoleIndexRequest $request): RoleCollection
    {
        return new RoleCollection(Role::all());
    }
}
