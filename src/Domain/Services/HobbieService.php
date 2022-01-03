<?php

namespace Src\Domain\Services;


use Src\Domain\Contracts\CustomerHobbieRepository;
use Src\Domain\Contracts\HobbieRepository;
use Src\Domain\CustomerHobbie;
use Src\Domain\Requests\StoreHobbieRequest;
use Src\Domain\Requests\UpdateHobbieRequest;

class HobbieService
{

    /** @var CustomerHobbieRepository */
    private $customerHobbieRepository;

    /** @var HobbieRepository */
    private $hobbieRepository;


    public function __construct(
        CustomerHobbieRepository $customerHobbieRepository,
        HobbieRepository $hobbieRepository
    ) {
        $this->customerHobbieRepository = $customerHobbieRepository;
        $this->hobbieRepository = $hobbieRepository;
    }


    public function getHobbiesByCustomerId(int $customer_id)
    {
        return $this->customerHobbieRepository->getHobbiesByCustomerId($customer_id);
    }

    public function create(StoreHobbieRequest $request, int $customer_id)
    {

        $hobbiesCustomer = $this->customerHobbieRepository->getHobbiesByCustomerId($customer_id);

        if (count($hobbiesCustomer->toArray()) == 0) {
            foreach($request->hobbies as $hobbie)
            {
                $this->customerHobbieRepository->create(new CustomerHobbie([
                    'customer_id' => $customer_id,
                    'hobbie_id' => $hobbie['hobbie_id']
                ]));
            }
        }

        return $this->customerHobbieRepository->getHobbiesByCustomerId($customer_id);
    }

    public function update(UpdateHobbieRequest $request, int $customer_id)
    {
        $hobbiesCustomer = $this->customerHobbieRepository->getHobbiesByCustomerId($customer_id);

        $hobValues = [];
        foreach ($hobbiesCustomer as $hobbieCustomer) {
            array_push( $hobValues, $hobbieCustomer->getHobbieId());
        }

        foreach ($request->hobbies as $hobbie) {
            if(!in_array($hobbie['hobbie_id'], $hobValues)) {
                $this->customerHobbieRepository->create(new CustomerHobbie([
                    'customer_id' => $customer_id,
                    'hobbie_id' => $hobbie['hobbie_id']
                ]));
            }
        }

        return  $this->customerHobbieRepository->getHobbiesByCustomerId($customer_id);
    }

    public function delete(int $customer_id, int $hobbie_id)
    {
        $this->customerHobbieRepository->delete($customer_id, $hobbie_id);

        return $this->customerHobbieRepository->getHobbiesByCustomerId($customer_id);

    }
}
