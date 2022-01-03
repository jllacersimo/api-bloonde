<?php

namespace Src\Domain\Requests;

use App\ServiceRequest;

class StoreHobbieRequest extends ServiceRequest
{
    protected $fields = [
        'hobbies',
    ];
}
