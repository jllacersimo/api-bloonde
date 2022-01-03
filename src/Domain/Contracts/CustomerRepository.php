<?php

namespace Src\Domain\Contracts;

use Illuminate\Support\Collection;
use Src\Domain\Customer;


interface CustomerRepository
{

    public function findById(int $customer_id) : Customer;

    public function findAll();

}
