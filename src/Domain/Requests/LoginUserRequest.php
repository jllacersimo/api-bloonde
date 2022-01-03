<?php

namespace Src\Domain\Requests;

use App\ServiceRequest;

class LoginUserRequest extends ServiceRequest
{
    protected $fields = [
        'email',
        'password',
    ];
}
