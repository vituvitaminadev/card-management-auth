<?php

declare(strict_types=1);

namespace App\Request;

use App\Enum\UserTypeEnum;
use App\Exception\UnauthorizedException;
use App\Model\User;
use Hyperf\Context\Context;
use Hyperf\Validation\Request\FormRequest;
use App\Service\AuthService;

class BaseRequest extends FormRequest
{
    protected bool $onlyAdmin = false;

    protected function authorize(): bool
    {
        $this->prepareForValidation();
        $token = Context::get(AuthService::CONTEXT_KEY);

        if ($token->type !== UserTypeEnum::ADMIN && $this->onlyAdmin) {
            throw new UnauthorizedException();
        }

        return true;
    }

    public function getUser(): User
    {
        $token = Context::get(AuthService::CONTEXT_KEY);

        return User::find($token->sub);
    }
}