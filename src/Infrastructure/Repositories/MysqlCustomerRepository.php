<?php

namespace Src\Infrastructure\Repositories;

use Src\Domain\Contracts\CustomerRepository;
use Src\Domain\Customer;

class MysqlCustomerRepository implements CustomerRepository
{

    public function findById(int $customer_id) : Customer
    {
        return Customer::where('id', $customer_id)
            ->first();
    }

    public function findAll()
    {
        return Customer::with('user', 'hobbies')
            ->paginate(5);
    }

}
