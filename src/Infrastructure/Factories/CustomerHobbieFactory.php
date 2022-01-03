<?php

namespace Src\Infrastructure\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Domain\Customer;
use Src\Domain\CustomerHobbie;
use Src\Domain\Hobbie;

class CustomerHobbieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerHobbie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random()->first()->getId(),
            'hobbie_id' => Hobbie::all()->random()->first()->getId(),
        ];
    }
}
