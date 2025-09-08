<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    properties: [
        new OA\Property(property: 'id', description: 'Role ID', type: 'integer', example: 1),
        new OA\Property(property: 'name', description: 'Role name', type: 'string', example: 'Admin'),
    ],
)]
class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->value,
            'name' => $this->name,
        ];
    }
}
