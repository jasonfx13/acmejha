<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JobCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
//        return [
//            'id' => $this->id,
//            'title' => $this->title,
//            'description' => $this->description,
//            'createdBy' => $this->created_by,
//            'dateEntered' => $this->created_at
//        ];
    }
}
