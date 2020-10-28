<?php

namespace App\Http\Resources\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $this->collection->transform(function (Role $role) {
            return (new RoleResource($role));
        });

        return [
            'data' => $this->collection,
        ];
    }
}
