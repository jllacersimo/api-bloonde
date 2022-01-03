<?php

namespace Src\Infrastructure\Repositories;


use Src\Domain\Contracts\CustomerHobbieRepository;
use Src\Domain\CustomerHobbie;
use Illuminate\Support\Collection;


class MysqlCustomerHobbieRepository implements CustomerHobbieRepository
{

    public function create(CustomerHobbie $model) : CustomerHobbie
    {
        $model->save();
        return $model;
    }

    public function getHobbiesByCustomerId(int $customer_id) : Collection
    {
        return CustomerHobbie::with('hobbie')
            ->where('customer_id', $customer_id)
            ->get();
    }

    public function update(CustomerHobbie $model) : CustomerHobbie
    {
        $model->update();
        return $model;
    }

    public function delete(int $customer_id, int $hobbie_id)
    {
        CustomerHobbie::where('hobbie_id', $hobbie_id)
            ->where('customer_id', $customer_id)
            ->delete();
    }
}
