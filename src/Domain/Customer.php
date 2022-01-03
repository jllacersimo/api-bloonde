<?php

namespace Src\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Infrastructure\Factories\CustomerFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id';


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getUserId()
    {
        return $this->user_id;
    }


    protected static function factory()
    {
        return CustomerFactory::new();
    }

    //Relations

    public function getUser()
    {
        return $this->user;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getHobbies()
    {
        return $this->hobbies;
    }

    public function hobbies()
    {
        return $this->hasMany(CustomerHobbie::class, 'customer_id', 'id');
    }
}
