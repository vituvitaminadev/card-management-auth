<?php
declare(strict_types=1);

namespace App\Grpc\Service;

use App\Grpc\Interface\AuthServiceInterface;
use Hyperf\GrpcServer\Annotation\GrpcService;
use Hyperf\Logger\LoggerFactory;
use Psr\Log\LoggerInterface;

#[GrpcService(name: 'auth.AuthService', 'server': 'grpc')]
class AuthService implements AuthServiceInterface
{
    private LoggerInterface $logger;

    public function __construct(
        private AuthenticationService $authenticationService,
        private JwtService $jwtService,
        private UserService $userService,
        LoggerFactory $loggerFactory
    )
    {
        $this->logger = $loggerFactory->get('auth-grpc');
    }

    public function login(LoginRequest $request): LoginResponse
    {
        $this->logger->info("Login attempt for: {$request->getEmail()}");
    }

    public function register(RegisterRequest $request): RegisterResponse
    {
    }

    public function refreshToken(RefreshTokenRequest $request): RefreshTokenResponse
    {
    }

    public function logout(LogoutRequest $request): LogoutResponse
    {
    }
}
