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
        $exercisable = $this->exercisable->toArray();
        unset($exercisable["created_at"]);
        unset($exercisable["updated_at"]);
        unset($exercisable["exercise_row_id"]);
        unset($exercisable["id"]);
        return  [
            'id' => $this->id,
            'exercise_group_id' => $this->exercise_group_id,
            'is_lifted' => $this->is_lifted,
            'order' => $this->order,
            'exercisable' => $exercisable,
        ];
    }
}

