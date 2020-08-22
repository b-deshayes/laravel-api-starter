<?php

namespace App\Enums;

abstract class Permission extends Enum
{
    public const CREATE_SETTING = 'create.setting';
    public const EDIT_SETTING = 'edit.setting';
    public const VIEW_SETTING = 'view.setting';
    public const VIEW_ALL_SETTINGS = 'view.all.setting';
}
