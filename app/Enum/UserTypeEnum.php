<?php

namespace App\Enum;

use App\Trait\EnumTrait;

enum UserTypeEnum: string
{
    use EnumTrait;

    case COMMON = 'common';
    case ADMIN = 'admin';
}
