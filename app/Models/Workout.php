<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{   
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function exerciseGroups(){
        return $this->hasMany(ExerciseGroup::class);
    }

    public function replicateWorkout(){
        $newWorkout = $this->replicate();
        $newWorkout->name = $newWorkout->name.' Copy';
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
        'is_template',
        'user_id'
    ];
}
