<?php

namespace App\Http\Resources;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'color' => $this->color,
            'condition' => $this->condition,
            'price' => $this->price,
            'discount' => $this->discount,
            'sold' => $this->sold,
            'tag' => new TagResource($this->whenLoaded('tag')),
        ];
    }
}
