<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Controller\AuthController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GlobalMiddleware;
use Hyperf\HttpServer\Router\Router;
use Hyperf\Validation\Middleware\ValidationMiddleware;

Router::addGroup('/auth', function () {
    Router::post('/login', [AuthController::class, 'signIn']);
    Router::post('/register', [AuthController::class, 'signUp']);
}, [
    'middleware' => [
        GlobalMiddleware::class,
        ValidationMiddleware::class
    ]
]);

Router::addGroup('/user', function () {
    Router::get('/', [UserController::class, 'index']);
    Router::get('/{id:\d+}', [UserController::class, 'retrieve']);
}, [
    'middleware' => [
        AuthMiddleware::class,
        ValidationMiddleware::class
    ]
]);
