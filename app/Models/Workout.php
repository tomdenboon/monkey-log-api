<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{   
    use HasFactory;

    public function workoutable()
    {
        return $this->morphTo();
    }

    public function exerciseGroups(){
        return $this->hasMany(ExerciseGroup::class);
    }

    public function clone(){
        $newWorkout = $this->replicate();
        $newWorkout->save();
        forEach($this->exerciseGroups as $exerciseGroup){
            $newExerciseGroup = $newWorkout->exerciseGroups()->create($exerciseGroup->toArray());
            forEach($exerciseGroup->weightedExercises as $weightedExercise){
                $newExerciseGroup->weightedExercises()->create($weightedExercise->toArray());
            }

        }
        return $newWorkout;
    }

    protected $fillable = [
        'name',
    ];
}
