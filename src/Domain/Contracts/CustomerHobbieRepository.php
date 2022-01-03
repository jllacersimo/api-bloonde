<?php

namespace Src\Domain\Contracts;

use Illuminate\Support\Collection;
use Src\Domain\CustomerHobbie;


interface CustomerHobbieRepository
{
    public function create(CustomerHobbie $customerHobbie) : CustomerHobbie;

    public function update(CustomerHobbie $customerHobbie) : CustomerHobbie;

    public function getHobbiesByCustomerId(int $customer_id) : Collection;

    public function delete(int $customer_id, int $hobbie_id);


}
