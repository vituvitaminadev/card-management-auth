<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\User\UserIndexRequest;
use App\Request\User\UserRetrieveRequest;
use App\Service\UserService;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use App\Resource\UserResource;

class UserController
{
    public function __construct(protected readonly UserService $userService) {}

    public function index(UserIndexRequest $request): PsrResponseInterface
    {
        $users = $this->userService->index();

        return UserResource::collection($users)->toResponse();
    }

    public function retrieve()
    {
    }
}