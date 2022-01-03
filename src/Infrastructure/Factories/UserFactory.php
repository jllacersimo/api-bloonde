<?php

namespace Src\Infrastructure\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Src\Domain\User;


class UserFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => (string) Hash::make("Jose_1234"),
            'status_id' => $this->faker->numerify('#'),
            'profile_id' => $this->faker->randomElement(['1', '2'])
        ];
    }

}
