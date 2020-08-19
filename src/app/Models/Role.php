<?php

namespace App\Models;

use App\Traits\UsesUuid;

class Role extends \Spatie\Permission\Models\Role
{
    use UsesUuid;
}
