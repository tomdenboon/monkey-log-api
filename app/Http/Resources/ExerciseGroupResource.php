<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseGroupResource extends JsonResource
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
            'workout_id' => $this->workout_id,
            'name' => $this->exercise->name,
            'type' => $this->exercise->exercise_type,
            'order' => $this->order,
            'sets' => $this->exerciseRows->count(),
            'exercise_rows' => ExerciseRowResource::collection($this->exerciseRows),
        ]; 
       
    }
}