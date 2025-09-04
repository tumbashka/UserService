<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    properties: [
        new OA\Property(property: 'id', description: 'User ID', type: 'integer', example: 1),
        new OA\Property(property: 'email', description: 'User email', type: 'string'),
        new OA\Property(property: 'first_name', description: 'User first name', type: 'string'),
        new OA\Property(property: 'middle_name', description: 'User middle name', type: 'string'),
        new OA\Property(property: 'last_name', description: 'User last name', type: 'string'),
        new OA\Property(property: 'phone', description: 'Phone', type: 'string'),
        new OA\Property(
            property: 'role',
            ref: '#/components/schemas/RoleResource',
            description: 'User role'
        ),
    ],
)]
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'role' => RoleResource::make($this->role),
        ];
    }
}
