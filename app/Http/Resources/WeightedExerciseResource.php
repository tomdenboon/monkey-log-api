<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeightedExerciseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'name' => $this->name,
            'reps_is_visible' => $this->reps_is_visible,
            'weight_is_visible' => $this->weight_is_visible,
            'one_rm_is_visible' => $this->one_rm_is_visible,
            'rpe_is_visible' => $this->rpe_is_visible,
            'notes_is_visible' => $this->notes_is_visible,
        ];
    }
}

