<?php

namespace Tests\Feature;

use Src\Domain\Customer;
use Src\Domain\CustomerHobbie;
use Src\Domain\Hobbie;
use Src\Domain\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


/*
class CustomerResourceTest extends TestCase
{
   use RefreshDatabase;


   //** @test */
/*
public function test_resource_list_customers()
{
   $user = User::factory()->create([
       'profile_id' => 1
   ]);

   $user2 = User::factory()->create([
       'profile_id' => 2
   ]);

   $user3 = User::factory()->create([
       'profile_id' => 2
   ]);

   $manolo = Customer::factory()->create([
       'name' => 'Manolo',
       'user_id' => $user->getId()
   ]);

   $cristobal = Customer::factory()->create([
       'name' => 'Cristobal',
       'user_id' => $user2->getId()
   ]);

   $pepe = Customer::factory()->create([
       'name' => 'Pepe',
       'user_id' => $user3->getId()
   ]);


   $deporte = Hobbie::factory()->create([
       'name' => 'deporte'
   ]);

   $cine = Hobbie::factory()->create([
       'name' => 'cine'
   ]);

   $teatro = Hobbie::factory()->create([
       'name' => 'cine'
   ]);

   $cristobalDeporte = CustomerHobbie::factory()->create([
      'customer_id' =>  $cristobal->getId(),
       'hobbie_id' => $deporte->getId()
   ]);

   $cristobalCine = CustomerHobbie::factory()->create([
       'customer_id' =>  $cristobal->getId(),
       'hobbie_id' => $cine->getId()
   ]);

   $pepeTeatro = CustomerHobbie::factory()->create([
       'customer_id' =>  $pepe->getId(),
       'hobbie_id' => $teatro->getId()
   ]);

   $this->withoutExceptionHandling();

   $response = $this->json('GET', "api/customer/list")
       ->assertStatus(200)
       ->assertExactJson([
           'data' => [
               [
                   'id' => (int) $manolo->getId(),
                   'name' =>  (string) $manolo->getName(),
                   'surname' =>  (string) $manolo->getSurname(),
                   'email' =>  (string) $user->getEmail(),
                   'profile' =>  (string) 'ADMIN',
                   'hobbies' => [

                   ]
               ],
               [
                   'id' => (int) $cristobal->getId(),
                   'name' =>  (string) $cristobal->getName(),
                   'surname' =>  (string) $cristobal->getSurname(),
                   'email' =>  (string) $user2->getEmail(),
                   'profile' =>  (string) 'CUSTOMER',
                   'hobbies' => [
                       [
                           'id' => $deporte->getId(),
                           'name' => $deporte->getName(),
                       ],
                       [
                           'id' => $cine->getId(),
                           'name' => $cine->getName(),
                       ],

                   ]
               ],
               [
                   'id' => (int) $pepe->getId(),
                   'name' =>  (string) $pepe->getName(),
                   'surname' =>  (string) $pepe->getSurname(),
                   'email' =>  (string) $user3->getEmail(),
                   'profile' =>  (string) 'CUSTOMER',
                   'hobbies' => [
                       [
                           'id' => $teatro->getId(),
                           'name' => $teatro->getName(),
                       ]
                   ]
               ]
           ]
       ]);;

}




}
 */
