<?php

namespace App\Enums;

use ReflectionClass;

abstract class Enum
{
    /**
     * Get all key of the current enum class
     *
     * @return array
     */
    public static function getKeys(): array
    {
        $class = new ReflectionClass(static::class);
        return array_keys($class->getConstants());
    }
}
