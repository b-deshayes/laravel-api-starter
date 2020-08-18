<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    /**
     * Deactivate auto-incrementing on model
     *
     * @return bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Set the identifier key as string according to uuid type
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }

    /**
     * Hydrate the identifier key with an unique uuid on boot
     *
     * @return void
     */
    protected static function bootUsesUuid(): void
    {
        static::creating(static function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
