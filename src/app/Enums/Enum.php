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

    /**
     * Get all key/value pairs of current enum.
     *
     * @return array
     */
    public static function getAll(): array
    {
        $class = new ReflectionClass(static::class);
        return $class->getConstants();
    }
}
