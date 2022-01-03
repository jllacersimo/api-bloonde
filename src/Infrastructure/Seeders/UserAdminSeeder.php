<?php

namespace Src\Infrastructure\Seeders;

use Illuminate\Database\Seeder;
use Src\Domain\Customer;
use Src\Domain\User;


class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'jllacersimo@gmail.com',
            'profile_id' => 1
        ]);

        $customer = Customer::factory()->create([
            'user_id' => $user->getId(),
            'name' => 'Jose',
            'surname' => 'Llacer'
        ]);
    }
}
