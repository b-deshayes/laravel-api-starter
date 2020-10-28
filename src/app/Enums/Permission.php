<?php

namespace App\Enums;

abstract class Permission extends Enum
{
    // public const CREATE_SETTING = 'create.setting';
    public const EDIT_SETTING = 'edit.setting';
    public const VIEW_SETTING = 'view.setting';
    public const VIEW_ALL_SETTINGS = 'view.all.setting';

    public const CREATE_ROLE = 'create.role';
    public const EDIT_ROLE = 'edit.role';
    public const VIEW_ROLE = 'view.role';
    public const VIEW_ALL_ROLE = 'view.all.role';

    public const CREATE_PERMISSION = 'create.permission';
    public const EDIT_PERMISSION = 'edit.permission';
    public const VIEW_PERMISSION = 'view.permission';
    public const VIEW_ALL_PERMISSION = 'view.all.permission';
}
