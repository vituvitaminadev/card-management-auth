<?php
declare(strict_types=1);

namespace App\Grpc\Interface;

interface AuthServiceInterface
{
    public function login(LoginRequest $request): LoginResponse;
    public function register(RegisterRequest $request): RegisterResponse;
    public function refreshToken(RefreshTokenRequest $request): RefreshTokenResponse;
    public function logout(LogoutRequest $request): LogoutResponse;
}
