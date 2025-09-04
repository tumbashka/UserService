<?php

namespace App\Http\Requests;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use OpenApi\Attributes as OA;

#[
    OA\Schema(
        properties: [
            new OA\Property(property: 'email', description: 'Email', type: 'string', example: 'test@mail.ru'),
            new OA\Property(property: 'password', description: 'Password', type: 'string', example: '12345Password!'),
            new OA\Property(property: 'first_name', description: 'First name', type: 'string', example: 'FirstName'),
            new OA\Property(property: 'middle_name', description: 'Middle name', type: 'string', example: 'MiddleName'),
            new OA\Property(property: 'last_name', description: 'Last name', type: 'string', example: 'LastName'),
            new OA\Property(property: 'phone', description: 'Phone number', type: 'string', example: '+7-987-654-32-10'),
            new OA\Property(property: 'role', description: 'Role id', type: 'integer', example: '2'),
        ],
    )]
class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'password' => ['nullable', Password::defaults()],
            'first_name' => ['nullable', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['nullable', Rule::enum(Roles::class)],
        ];
    }
}
