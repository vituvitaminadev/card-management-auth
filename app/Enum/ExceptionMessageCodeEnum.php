<?php

namespace App\Enum;

enum ExceptionMessageCodeEnum: string
{
    case INVALID_CREDENTIALS = 'invalid_credentials';
    case UNAUTHORIZED = 'unauthorized';
    case USER_NOT_FOUND = 'user_not_found';
}
