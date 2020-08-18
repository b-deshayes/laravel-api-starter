<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model;

    /**
     * @param array $columns
     *
     * @return Collection
     */
    public function all(array $columns): Collection;
}
