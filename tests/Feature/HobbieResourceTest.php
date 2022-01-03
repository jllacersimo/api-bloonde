<?php

namespace Tests\Feature;


use Laravel\Passport\Passport;
use Src\Application\Request\StoreHobbieHttpRequest;
use Src\Application\Request\UpdateHobbieHttpRequest;
use Src\Domain\Customer;
use Src\Domain\CustomerHobbie;
use Src\Domain\Hobbie;
use Src\Domain\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class HobbieResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_resource_admin_store_hobbies()
    {
        $user = User::factory()->create([
            'profile_id' => 1
        ]);

        Passport::actingAs(
            $user
        );


        $customer = Customer::factory()->create([
            'user_id' => $user->getId()
        ]);

        $deporte = Hobbie::factory()->create([
            'name' => 'deporte'
        ]);

        $cine = Hobbie::factory()->create([
            'name' => 'cine'
        ]);

        $request = new StoreHobbieHttpRequest([
            'hobbies' => [
                [
                    'hobbie_id' => $deporte->getId(),
                ],
                [
                    'hobbie_id' => $cine->getId(),
                ]

            ]
        ]);


        $response = $this->json('POST', "api/customer/{$customer->getId()}/create-hobbie", $request->toArray())
            ->assertStatus(201)
            ->assertExactJson([
                'data' => [
                    [
                        'id' => (int) $deporte->getId(),
                        'name' =>  (string) $deporte->getName(),
                    ],
                    [
                        'id' => (int) $cine->getId(),
                        'name' => (string) $cine->getName(),
                    ]
                ]
            ]);;

        $this->assertDatabaseHas(
            'customers_hobbies',
            [
                'customer_id' => $customer->getId(),
                'hobbie_id' => $deporte->getId(),
            ]
        );

        $this->assertDatabaseHas(
            'customers_hobbies',
            [
                'customer_id' => $customer->getId(),
                'hobbie_id' => $cine->getId(),
            ]
        );
    }

    /** @test */
    public function test_resource_list_hobbies_pepito()
    {
        $user = User::factory()->create();

        $user2 = User::factory()->create();

        Passport::actingAs(
            $user
        );

        $manolo = Customer::factory()->create([
            'user_id' => $user->getId(),
            'name' => 'Manolo'
        ]);

        $pepito = Customer::factory()->create([
            'user_id' => $user2->getId(),
            'name' => 'Pepito'
        ]);

        $cine = Hobbie::factory()->create([
           'name' => 'cine'
        ]);

        $teatro =  Hobbie::factory()->create([
           'name' => 'teatro'
        ]);

        $deporte =  Hobbie::factory()->create([
           'name' => 'deporte'
        ]);

        $manoloCine = CustomerHobbie::factory()->create([
            'customer_id' => $manolo->getId(),
            'hobbie_id' => $cine->getId()
        ]);

        $pepitoTeatro = CustomerHobbie::factory()->create([
            'customer_id' => $pepito->getId(),
            'hobbie_id' => $teatro->getId()
        ]);

        $pepitoDeporte = CustomerHobbie::factory()->create([
            'customer_id' => $pepito->getId(),
            'hobbie_id' => $deporte->getId()
        ]);


       $response = $this->json('GET', "api/customer/{$pepito->getId()}/show-hobbies")
           ->assertStatus(200)
           ->assertExactJson([
               'data' => [
                   [
                       'id' => (int) $teatro->getId(),
                       'name' =>  (string) $teatro->getName(),
                   ],
                   [
                       'id' => (int) $deporte->getId(),
                       'name' => (string) $deporte->getName(),
                   ]
                ]
           ]);
    }

    /** @test */
    public function test_resource_admin_update_hobbies_customer()
    {
        $user = User::factory()->create([
            'profile_id' => 1
        ]);

        $user2 = User::factory()->create([
            'profile_id' => 2
        ]);

        Passport::actingAs(
            $user
        );

        $customer = Customer::factory()->create([
            'user_id' => $user->getId()
        ]);

        $customer2 = Customer::factory()->create([
            'user_id' => $user2->getId()
        ]);

        $teatro = Hobbie::factory()->create([
            'name' => 'teatro'
        ]);

        $cine = Hobbie::factory()->create([
            'name' => 'cine'
        ]);

        $deporte = Hobbie::factory()->create([
            'name' => 'deporte'
        ]);

        $yoga=  Hobbie::factory()->create([
            'name' => 'yoga'
        ]);

        $customerCine = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $cine->getId()
        ]);

        $customerDeporte = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $deporte->getId()
        ]);

        $request = new UpdateHobbieHttpRequest([
            'hobbies' => [
                [
                    'hobbie_id' => $yoga->getId(),
                ],
                [
                    'hobbie_id' => $teatro->getId(),
                ]
            ]
        ]);

        $response = $this->json('PUT', "api/customer/{$customer2->getId()}/update-hobbie", $request->toArray())
            ->assertStatus(200)
            ->assertExactJson([
                'data' => [
                    [
                        'id' => (int) $cine->getId(),
                        'name' =>  (string) $cine->getName(),
                    ],
                    [
                        'id' => (int) $deporte->getId(),
                        'name' =>  (string) $deporte->getName(),
                    ],
                    [
                        'id' => (int) $yoga->getId(),
                        'name' =>  (string) $yoga->getName(),
                    ],
                    [
                        'id' => (int) $teatro->getId(),
                        'name' => (string) $teatro->getName(),
                    ]
                ]
            ]);
    }

    /** @test */
    public function test_resource_admin_delete_hobbie_customer()
    {
        $user = User::factory()->create([
            'profile_id' => 1
        ]);

        $user2 = User::factory()->create([
            'profile_id' => 2
        ]);

        Passport::actingAs(
            $user
        );

        $customer = Customer::factory()->create([
            'user_id' => $user->getId()
        ]);

        $customer2 = Customer::factory()->create([
            'user_id' => $user2->getId()
        ]);

        $teatro = Hobbie::factory()->create([
            'name' => 'teatro'
        ]);

        $cine = Hobbie::factory()->create([
            'name' => 'cine'
        ]);

        $deporte = Hobbie::factory()->create([
            'name' => 'deporte'
        ]);


        $customer2Cine = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $cine->getId()
        ]);

        $customer2Deporte = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $deporte->getId()
        ]);

        $customer2Teatro = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $teatro->getId()
        ]);


        $response = $this->json('DELETE', "api/customer/{$customer2->getId()}/delete-hobbie/{$teatro->getId()}")
            ->assertStatus(200)
            ->assertExactJson([
                'data' => [
                    [
                        'id' => (int) $cine->getId(),
                        'name' =>  (string) $cine->getName(),
                    ],
                    [
                        'id' => (int) $deporte->getId(),
                        'name' =>  (string) $deporte->getName(),
                    ]
                ]
            ]);
    }

    /** @test */
    public function test_throw_exception_when_customer_delete_hobbie_other_customer()
    {
        $user = User::factory()->create([
            'profile_id' => 2
        ]);

        $user2 = User::factory()->create([
            'profile_id' => 2
        ]);

        Passport::actingAs(
            $user
        );

        $customer = Customer::factory()->create([
            'user_id' => $user->getId()
        ]);

        $customer2 = Customer::factory()->create([
            'user_id' => $user2->getId()
        ]);

        $teatro = Hobbie::factory()->create([
            'name' => 'teatro'
        ]);

        $cine = Hobbie::factory()->create([
            'name' => 'cine'
        ]);

        $deporte = Hobbie::factory()->create([
            'name' => 'deporte'
        ]);


        $customer2Cine = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $cine->getId()
        ]);

        $customer2Deporte = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $deporte->getId()
        ]);

        $customer2Teatro = CustomerHobbie::factory()->create([
            'customer_id' => $customer2->getId(),
            'hobbie_id' => $teatro->getId()
        ]);


        $response = $this->json('DELETE', "api/customer/{$customer2->getId()}/delete-hobbie/{$teatro->getId()}")
            ->assertStatus(401);
    }


}
