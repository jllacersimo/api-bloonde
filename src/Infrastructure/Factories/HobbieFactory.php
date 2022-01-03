<?php

namespace Src\Infrastructure\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Domain\Hobbie;


class HobbieFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hobbie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10)
        ];
    }
}
