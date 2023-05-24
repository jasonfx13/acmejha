<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HazardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
//        return [
//            'id' => $this->id,
//            'stepId' => $this->step_id,
//            'title' => $this->title,
//            'safeguards' => SafeguardResource::collection($this->safeguards)
//        ];
    }
}
