<?php

namespace Src\Infrastructure\Repositories;

use Src\Domain\Contracts\HobbieRepository;
use Src\Domain\Hobbie;


class MysqlHobbieRepository implements HobbieRepository
{

    public function findById(int $hobbie_id) : Hobbie
    {
        return Hobbie::where('id', $hobbie_id)
                ->first();
    }

    public function create(Hobbie $model) : Hobbie
    {
        $model->save();
        return $model;
    }



}
