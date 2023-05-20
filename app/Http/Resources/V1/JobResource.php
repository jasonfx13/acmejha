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
//
//        foreach ($steps as $step) {
//            foreach($hazards as $hazard) {
//                if($step['id'] == $hazard['step_id']) {
//                    $step['hazards'][] = $hazard;
//
//                    foreach($safeguards as $safeguard) {
//                        $hazard['safeguards'][] = $safeguard;
////                        if($hazard['id'] == $safeguard['hazard_id']) {
//////                            $hazard['safeguards'][] = $safeguard;
////                            $hazard['safeguards'][] = $safeguard;
////                        }
//                    }
//                }
//            }
//        }
//
//
//
//
//
//
////        $steps = [
////            'data' => StepResource::collection($this->whenLoaded('steps')),
////            'hazards' => [
////                'data' => HazardResource::collection($this->whenLoaded('hazards')),
////                'safeguards' => SafeguardResource::collection($this->whenLoaded('safeguards'))
////            ]
////        ];
        return [
            'id' => $this->id,
            'title' => $this->title,
            'createdBy' => $this->created_by,
            'dateEntered' => $this->created_at,
            'steps' => $steps,
            'hazards' => $hazards,
            'safeguards' => $safeguards
        ];
    }
}
