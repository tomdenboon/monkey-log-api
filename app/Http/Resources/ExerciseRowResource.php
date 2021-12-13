<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseRowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->exerciseGroup->exercise->exerciseType->type == "App\Models\WeightedExercise") {
            return  [
                'id' => $this->id,
                'exercise_group_id' => $this->exercise_group_id,
                'is_lifted' => $this->is_lifted,
                'order' => $this->order,
                'reps' => $this->exercisable->reps,
                'weight' => $this->exercisable->weight,
                'rpe' => $this->exercisable->rpe,
            ];
        } else if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\WeightTimeExercise") {
            return  [
                'id' => $this->id,
                'exercise_group_id' => $this->exercise_group_id,
                'is_lifted' => $this->is_lifted,
                'order' => $this->order,
                'weight' => $this->exercisable->weight,
                'time' => $this->exercisable->time,
            ];
        } else if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\BasicExercise") {
            return  [
                'id' => $this->id,
                'exercise_group_id' => $this->exercise_group_id,
                'is_lifted' => $this->is_lifted,
                'order' => $this->order,
                'reps' => $this->exercisable->reps,
            ];
        } else if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\TimeExercise") {
            return  [
                'id' => $this->id,
                'exercise_group_id' => $this->exercise_group_id,
                'is_lifted' => $this->is_lifted,
                'order' => $this->order,
                'time' => $this->exercisable->time,
            ];
        }
    }
}

