<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use OpenApi\Attributes as OA;

class UserController extends Controller
{
    #[OA\Get(
        path: '/api/users',
        description: 'Show users',
        summary: 'Show users',
        tags: ['Users'],
        parameters: [
            new OA\Parameter(
                name: 'page',
                description: 'Page number for pagination',
                in: 'query',
                required: false,
                schema: new OA\Schema(type: 'integer', minimum: 1, example: 1)
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            type: 'array',
                            items: new OA\Items(ref: '#/components/schemas/UserResource')
                        ),
                        new OA\Property(
                            property: 'links',
                            properties: [
                                new OA\Property(property: 'first', type: 'string'),
                                new OA\Property(property: 'last', type: 'string'),
                                new OA\Property(property: 'prev', type: 'string', nullable: true),
                                new OA\Property(property: 'next', type: 'string', nullable: true),
                            ],
                            type: 'object'
                        ),
                        new OA\Property(
                            property: 'meta',
                            properties: [
                                new OA\Property(property: 'current_page', type: 'integer'),
                                new OA\Property(property: 'from', type: 'integer', nullable: true),
                                new OA\Property(property: 'last_page', type: 'integer'),
                                new OA\Property(property: 'per_page', type: 'integer'),
                                new OA\Property(property: 'to', type: 'integer', nullable: true),
                                new OA\Property(property: 'total', type: 'integer'),
                                new OA\Property(
                                    property: 'links',
                                    type: 'array',
                                    items: new OA\Items(
                                        properties: [
                                            new OA\Property(property: 'url', type: 'string', nullable: true),
                                            new OA\Property(property: 'label', type: 'string'),
                                            new OA\Property(property: 'active', type: 'boolean'),
                                        ],
                                        type: 'object'
                                    )
                                ),
                            ],
                            type: 'object'
                        ),
                    ],
                    type: 'object'
                )
            ),
        ]
    )]
    public function index()
    {
    }

    #[OA\Post(
        path: '/api/users',
        description: 'Store new user',
        summary: 'Store new user',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(ref: '#/components/schemas/StoreUserRequest')
            )
        ),
        tags: ['Users'],
        responses: [
            new OA\Response(
                response: 201,
                description: 'User added successfully',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            ref: '#/components/schemas/UserResource',
                            description: 'User data'
                        ),
                    ],
                ),
            ),
        ],
    )]
    public function store(StoreUserRequest $request)
    {
    }

    #[OA\Get(
        path: '/api/users/{user_id}',
        description: 'Show user with id {user_id}',
        summary: 'Show user',
        tags: ['Users'],
        parameters: [
            new OA\Parameter(
                name: 'user_id',
                description: 'User ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'User data',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            ref: '#/components/schemas/UserResource',
                            description: 'User data'
                        ),
                    ],
                ),
            ),
        ],
    )]
    public function show(User $user)
    {
    }

    #[OA\Put(
        path: '/api/users/{user_id}',
        description: 'Update user with id {user_id}',
        summary: 'Update user',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(ref: '#/components/schemas/UpdateUserRequest')
            )
        ),
        tags: ['Users'],
        parameters: [
            new OA\Parameter(
                name: 'user_id',
                description: 'User ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'User updated successfully',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'data',
                            ref: '#/components/schemas/UserResource',
                            description: 'User data'
                        ),
                    ],
                ),
            ),
        ],
    )]
    public function update(User $user, UpdateUserRequest $request)
    {
    }

    #[OA\Delete(
        path: '/api/users/{user_id}',
        description: 'Delete user with id {user_id}',
        summary: 'Delete user',
        tags: ['Users'],
        parameters: [
            new OA\Parameter(
                name: 'user_id',
                description: 'User ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'User deleted successfully',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'result',
                            description: 'User deleted successfully',
                            type: 'string',
                            example: 'success'
                        ),
                    ],
                ),
            ),
        ],
    )]
    public function destroy(User $user)
    {
    }
}
