<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutExerciseGroup extends Model
{
    use HasFactory;

    public function weightedExercise(){
        return $this->belongsTo(User::class, 'weighted_exercise_id');
    }

    public function workout(){
        return $this->belongsTo(Workout::class, 'workout_id');
    }

    public function workoutWeightedExercises(){
        return $this->hasMany(WorkoutWeightedExercises::class);
    }

    protected $fillable = [
        'workout_id',
        'weighted_exercise_id',
        'name',
        'order',
    ];
}
