<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        self::withoutWrapping();
        return [
            'name' => $this->name,
            'stock' => $this->stock,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
            'product_detail' => $this->detail
        ];
    }
}
