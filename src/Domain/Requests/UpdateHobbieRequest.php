<?php

namespace Src\Domain\Requests;

use App\ServiceRequest;

class UpdateHobbieRequest extends ServiceRequest
{
    protected $fields = [
        'hobbies',
    ];
}
