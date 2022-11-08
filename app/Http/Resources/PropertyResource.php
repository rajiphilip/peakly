<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'property_name' =>  $this->property_name,
            'description' => $this->description,
            'unit_price' => $this->unit_price,
            'total_no_of_units' =>  $this->total_no_of_units,
            'available_units' =>  $this->available_units,
            'units_sold' =>  $this->units_sold,
            'brochure' =>  asset('storage/' . $this->brochure),
            'image' => asset('storage/' . $this->image),
            'user_id' => $this->user_id,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'id' => $this->id
        ];
    }
}
