<?php

namespace Src\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HobbieResource extends JsonResource
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
        return [
            'id' =>  (int) $this->getHobbieId(),
            'name' =>  (string) $this->getHobbie()->getName(),
        ];
    }
}
