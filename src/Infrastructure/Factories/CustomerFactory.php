<?php

namespace Src\Infrastructure\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Domain\Customer;
use Src\Domain\User;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->firstname(),
            'user_id' => User::all()->random()->first()->getId(),

        ];
    }
}
