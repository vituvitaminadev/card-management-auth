<?php

declare(strict_types=1);

namespace App\Request\User;

use App\Model\User;
use App\Request\Abstract\ModelFormRequest;

class UserIndexRequest extends ModelFormRequest
{
    protected bool $onlyAdmin = true;

    protected function model(): string
    {
        return User::class;
    }

    public function rules(): array
    {
        return [];
    }
}