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
            forEach($exerciseGroup->exerciseRows as $exerciseRow){
                $newExerciseRow = $newExerciseGroup->exerciseRow()->create($exerciseRow->toArray());
                $newExerciseRow->exercisable()->create($exerciseRow->exercisable->toArray());
            }
        }
        return $newWorkout;
    }

    public function deleteIncompleteExercises(){
        forEach($this->exerciseGroups as $exerciseGroup){
            forEach($exerciseGroup->exerciseRows as $exerciseRow){
                if(!$exerciseRow->is_lifted){
                    $exerciseRow->delete();
                }
            }
            $exerciseGroup->refresh();
            if($exerciseGroup->exerciseRows->count() == 0){
                $exerciseGroup->delete();
            }
        }
    }

    protected $fillable = [
        'name',
    ];
}
