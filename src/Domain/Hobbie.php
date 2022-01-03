<?php

namespace Src\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Infrastructure\Factories\HobbieFactory;

class Hobbie extends Model
{
    use HasFactory;

    protected $table = 'hobbies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    protected static function factory()
    {
        return HobbieFactory::new();
    }

}
