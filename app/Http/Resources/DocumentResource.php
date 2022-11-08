<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' =>  $this->id,
            'title' => $this->title,
            'user_id' => $this->user_id,
            'document' => asset('storage/' . $this->document),
            'document_type' => $this->document_type,
            'image' => asset('storage/' . $this->image)
        ];
    }
}
