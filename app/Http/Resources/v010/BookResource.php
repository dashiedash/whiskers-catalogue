<?php

namespace App\Http\Resources\v010;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'authorLastName' => $this->author_last_name,
            'authorFirstName' => $this->author_first_name,
            'publishYear' => $this->publish_year,
            'genre' => $this->genre,
            'publisher' => $this->genre,
            'publishCity' => $this->publish_city,
            'publishState' => $this->publish_state,
            'publishCountry' => $this->publish_country,
            'description' => $this->description,
            'stock' => $this->stock,
            'isbn' => $this->isbn,
            'price' => $this->price
        ];
    }
}
