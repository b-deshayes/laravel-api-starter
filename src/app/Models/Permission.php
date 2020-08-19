<?php

namespace App\Models;

use App\Traits\UsesUuid;

/**
 * Class Permission
 *
 * @property string name
 *
 * @package App\Models
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    use UsesUuid;
}
