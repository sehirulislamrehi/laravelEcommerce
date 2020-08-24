<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
           "id" => $this->id,
           'product_id' => $this->product->id,
           "product_name" => $this->product->title,
           'product_image' =>$this->product->images[0]->image,
        ];
    }
}
