<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'img' => $this->img,
            'new' => $this->new,
            'discount' => $this->discount,
            'old_price' => $this->old_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'like_item' => $this->like_item,
            'remain' => $this->remain,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}