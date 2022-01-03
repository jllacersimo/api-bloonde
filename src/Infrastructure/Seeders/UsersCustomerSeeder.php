<?php

namespace Src\Infrastructure\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Src\Domain\Customer;
use Src\Domain\CustomerHobbie;
use Src\Domain\User;


class UsersCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'alvarogarcia@gmail.com',
            'password' => (string) Hash::make("Alvaro_1234"),
            'profile_id' => 2
        ]);

        $customer = Customer::factory()->create([
            'user_id' => $user->getId(),
            'name' => 'Alvaro',
            'surname' => 'Garcia'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer->getId(),
            'hobbie_id' => 1
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer->getId(),
            'hobbie_id' => 2
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer->getId(),
            'hobbie_id' => 3
        ]);


        $user2 = User::factory()->create([
            'email' => 'alejandromartinez@gmail.com',
            'password' => (string) Hash::make("Alex_1234"),
            'profile_id' => 2
        ]);

        $customer2 = Customer::factory()->create([
            'user_id' => $user2->getId(),
            'name' => 'Alejandro',
            'surname' => 'Martinez'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => 3
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => 4
        ]);

        $user3 = User::factory()->create([
            'email' => 'manolobombo@gmail.com',
            'password' => (string) Hash::make("Manolo_1234"),
            'profile_id' => 2
        ]);

        $customer3 = Customer::factory()->create([
            'user_id' => $user3->getId(),
            'name' => 'Manolo',
            'surname' => 'Bombo'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer3->getId(),
            'hobbie_id' => 2
        ]);

        $user4 = User::factory()->create([
            'email' => 'pepitoflores@gmail.com',
            'password' => (string) Hash::make("Pepito_1234"),
            'profile_id' => 2
        ]);

        $customer4 = Customer::factory()->create([
            'user_id' => $user3->getId(),
            'name' => 'Pepito',
            'surname' => 'Flores'
        ]);

        $user5 = User::factory()->create([
            'email' => 'lewishamilton@mercedes.com',
            'password' => (string) Hash::make("Lewis_1234"),
            'profile_id' => 2
        ]);

        $customer5 = Customer::factory()->create([
            'user_id' => $user5->getId(),
            'name' => 'Lewis',
            'surname' => 'Hamilton'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer5->getId(),
            'hobbie_id' => 1
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer5->getId(),
            'hobbie_id' => 2
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer5->getId(),
            'hobbie_id' => 3
        ]);

        $user6 = User::factory()->create([
            'email' => 'carlossainz@ferrari.com',
            'password' => (string) Hash::make("Carlos_1234"),
            'profile_id' => 2
        ]);

        $customer6 = Customer::factory()->create([
            'user_id' => $user6->getId(),
            'name' => 'Carlos',
            'surname' => 'Sainz'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer6->getId(),
            'hobbie_id' => 2
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer6->getId(),
            'hobbie_id' => 3
        ]);

        $user7 = User::factory()->create([
            'email' => 'fernandoalonso@alpine.com',
            'password' => (string) Hash::make("Alonso_1234"),
            'profile_id' => 2
        ]);

        $customer7 = Customer::factory()->create([
            'user_id' => $user7->getId(),
            'name' => 'Fernando',
            'surname' => 'Alonso'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer7->getId(),
            'hobbie_id' => 4
        ]);

        $user8 = User::factory()->create([
            'email' => 'max@redbull.com',
            'password' => (string) Hash::make("Max_1234"),
            'profile_id' => 2
        ]);

        $customer8 = Customer::factory()->create([
            'user_id' => $user8->getId(),
            'name' => 'Max',
            'surname' => 'Verstappen'
        ]);

        $user9 = User::factory()->create([
            'email' => 'checoperez@redbull.com',
            'password' => (string) Hash::make("Checo_1234"),
            'profile_id' => 2
        ]);

        $customer9 = Customer::factory()->create([
            'user_id' => $user9->getId(),
            'name' => 'Checo',
            'surname' => 'Perez'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer9->getId(),
            'hobbie_id' => 4
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer9->getId(),
            'hobbie_id' => 3
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer9->getId(),
            'hobbie_id' => 1
        ]);

        $user10 = User::factory()->create([
            'email' => 'leclerc@ferrari.com',
            'password' => (string) Hash::make("Leclerc_1234"),
            'profile_id' => 2
        ]);

        $customer10 = Customer::factory()->create([
            'user_id' => $user10->getId(),
            'name' => 'Charles',
            'surname' => 'Leclerc'
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer10->getId(),
            'hobbie_id' => 3
        ]);

        CustomerHobbie::factory()->create([
            'customer_id' => $customer10->getId(),
            'hobbie_id' => 1
        ]);
    }
}
