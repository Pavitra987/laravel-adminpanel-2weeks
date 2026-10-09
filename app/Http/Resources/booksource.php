<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class booksource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'author' => $this->author,
            'description' => $this->description,
             'images' => $this->images->map(function ($image) {
    return asset('storage/' . $image->image);
}),
            'id'=>$this->id,
        ];
    }
}
