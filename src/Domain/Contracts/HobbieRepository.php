<?php

namespace Src\Domain\Contracts;


use Src\Domain\Hobbie;


interface HobbieRepository
{

    public function findById(int $hobbie_id) : Hobbie;

    public function create(Hobbie $hobbie) : Hobbie;


}
