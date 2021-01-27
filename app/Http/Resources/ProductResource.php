<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'Product Id' => $this->id,
            'Product name' => $this->name,
            'Product Price' => $this->price,
            'Product Details' => $this->details,
        ];
    }
}
