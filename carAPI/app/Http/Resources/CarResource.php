<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Car;


class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($requst)
    {
        // return parent::toArray($request);
        return [
          'attributes' =>[
            'id' => $this->id,
            'colour'=> $this->colour,
            'price' => $this->price,
            'fuel' => $this->fuel,
            'transmission' => $this->transmission
          ]
      ];
    }
}
