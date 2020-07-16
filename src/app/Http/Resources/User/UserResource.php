<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at
        ];

        // TODO: Find a better way to do it, maybe policy or gate ?
        // if this is me, add my personal info
        if (auth('api')->user() !== null && auth('api')->user()->id === $this->id) {
            $data['email'] = $this->email;
        }

        return $data;
    }
}
