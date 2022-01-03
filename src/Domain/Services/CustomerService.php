<?php

namespace Src\Domain\Services;



use Src\Domain\Contracts\CustomerRepository;
use Src\Domain\Contracts\UserRepository;



class CustomerService
{

    /** @var CustomerRepository */
    private $customerRepository;

    /** @var UserRepository */
    private $userRepository;


    public function __construct(
        CustomerRepository $customerRepository,
        UserRepository $userRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->userRepository = $userRepository;
    }


    public function findAll()
    {
        return  $this->customerRepository->findAll();
    }


}
