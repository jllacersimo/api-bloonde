<?php

namespace Src\Application\Controllers;


use App\Http\Controllers\Controller;
use Src\Application\Request\StoreHobbieHttpRequest;
use Src\Application\Request\UpdateHobbieHttpRequest;
use Src\Application\Resources\HobbieResource;
use Src\Domain\Requests\StoreHobbieRequest;
use Src\Domain\Requests\UpdateHobbieRequest;
use Src\Domain\Services\HobbieService;


class HobbieController extends Controller
{
    private $hobbieService;

    public function __construct(
        HobbieService $hobbieService
    ) {
        $this->hobbieService = $hobbieService;
    }


    public function show(int $customer_id)
    {
        $hobbies = $this->hobbieService->getHobbiesByCustomerId($customer_id);
        return $this->makeCollectionResponse(HobbieResource::collection($hobbies));
    }

    public function store(StoreHobbieHttpRequest $request, int $customer_id)
    {
        $hobbies = $this->hobbieService->create(new StoreHobbieRequest($request->toArray()), $customer_id);
        return $this->makeCollectionResponse(HobbieResource::collection($hobbies), 201);
    }

    public function update(UpdateHobbieHttpRequest $request, int $customer_id)
    {
        $hobbies = $this->hobbieService->update(new UpdateHobbieRequest($request->toArray()), $customer_id);
        return $this->makeCollectionResponse(HobbieResource::collection($hobbies));
    }

    public function delete(int $customer_id, int $hobbie_id)
    {
        $hobbies = $this->hobbieService->delete($customer_id, $hobbie_id);
        return $this->makeCollectionResponse(HobbieResource::collection($hobbies));
    }


}
