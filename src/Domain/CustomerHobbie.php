<?php

namespace Src\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Infrastructure\Factories\CustomerHobbieFactory;

class CustomerHobbie extends Model
{
    use HasFactory;

    protected $table = 'customers_hobbies';
    protected $primaryKey = 'id';


    protected $fillable = [
        'customer_id',
        'hobbie_id',
    ];


    public function getId()
    {
        return $this->id;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function getHobbieId()
    {
        return $this->hobbie_id;
    }


    protected static function factory()
    {
        return CustomerHobbieFactory::new();
    }


    //Relations

    public function getHobbie()
    {
        return $this->hobbie;
    }

    public function hobbie()
    {
        return $this->belongsTo(Hobbie::class,  'hobbie_id', 'id' );
    }

}
