<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        $steps = StepResource::collection($this->whenLoaded('steps'));
        $hazards = HazardResource::collection($this->whenLoaded('hazards'));
        $safeguards = SafeguardResource::collection($this->whenLoaded('safeguards'));

        return [
            'id' => $this->id,
            'title' => $this->title,
            'createdBy' => $this->created_by,
            'dateEntered' => $this->created_at,
            'steps' => $steps
        ];
    }
}
