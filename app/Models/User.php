<?php

namespace App\Models;

use App\Enums\Roles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'role',
    ];

    protected function casts(): array
    {
        return [
            'role' => Roles::class,
        ];
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: function ($value, array $attributes) {
                return $attributes['first_name'] . ' ' . $attributes['middle_name'] . ' ' . $attributes['last_name'];
            }
        );
    }
}
