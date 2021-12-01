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
            'id' => $this->id,
            'exercise_group_id' => $this->exercise_group_id,
            'reps' => $this->reps !== null ? $this->reps : '',
            'weight' => $this->weight !== null ? $this->weight : '',
            'order' => $this->order,
            'is_lifted' => $this->is_lifted,
        ];
    }
}