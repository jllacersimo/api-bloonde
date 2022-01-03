<?php

namespace Src\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {

        if ($this->resource) {
            return [
                'id' => (int) $this->getId(),
                'name' =>  (string) $this->getName(),
                'surname' =>  (string) $this->getSurname(),
                'email' =>  (string) $this->getUser()->getEmail(),
                'profile' =>  (int) $this->getUser()->getProfileId() == 1 ? 'ADMIN' : 'CUSTOMER',
                'hobbies' => $this->getHobbies()->map(function ($hobbie) {
                    return [
                        'id' => $hobbie->getHobbie()->getId(),
                        'name' => $hobbie->getHobbie()->getName(),
                    ];
                })
            ];
        }


    }
}
