<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseRow extends Model
{
    use HasFactory;


    public function exerciseGroup()
    {
        return $this->belongsTo(ExerciseGroup::class, 'exercise_group_id');
    }

    public function exercisable()
    {
        if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\WeightedExercise") {
            return $this->hasOne(WeightedExercise::class);
        }
        if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\WeightTimeExercise") {
            return $this->hasOne(WeightTimeExercise::class);
        }
        if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\BasicExercise") {
            return $this->hasOne(BasicExercise::class);
        }
        if ($this->exerciseGroup->exercise->exerciseType->type == "App\Models\TimeExercise") {
            return $this->hasOne(TimeExercise::class);
        }
    }

    protected $fillable = [
        'exercise_group_id',
        'order',
        'is_lifted',
    ];
}
