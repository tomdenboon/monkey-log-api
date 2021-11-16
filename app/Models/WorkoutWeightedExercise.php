<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutWeightedExercise extends Model
{
    use HasFactory;

    public function workoutExerciseGroup(){
        return $this->belongsTo(WorkoutExerciseGroup::class, 'workout_exercise_group_id');
    }

    protected $fillable = [
        'reps',
        'weight',
        'one_rm',
        'rpe',
        'notes',
        'order',
        'is_lifted',
    ];
}
