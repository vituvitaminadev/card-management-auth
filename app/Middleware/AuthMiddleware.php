<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Service\AuthService;
use Hyperf\Context\Context;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(protected readonly AuthService $authService) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $token = $request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $token);

        $decoded = $this->authService->decodeToken($token);

        Context::set(AuthService::CONTEXT_KEY, $decoded);

        return $handler->handle($request);
    }
}