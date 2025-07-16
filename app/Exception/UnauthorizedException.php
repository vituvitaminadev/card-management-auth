<?php

namespace App\Exception;

use App\Enum\ExceptionMessageCodeEnum;
use Swoole\Http\Status;

class UnauthorizedException extends AbstractException
{
    public function __construct()
    {
        $code = Status::UNAUTHORIZED;
        $message = ExceptionMessageCodeEnum::UNAUTHORIZED;
        parent::__construct($message, $code);
    }
}
