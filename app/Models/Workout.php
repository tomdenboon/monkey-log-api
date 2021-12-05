<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function toNewTemplate(){
        return DB::transaction(function() {
            $user_id = $this->workoutable->user->id;
            $newTemplate = Template::create([
                'user_id' => $user_id,
            ]);
            $newWorkout = $this->replicate();
            $newWorkout->name = $newWorkout->name.' Copy';
            $newWorkout = $newTemplate->workout()->create($newWorkout->toArray());
            forEach($this->exerciseGroups as $exerciseGroup){
                $newExerciseGroup = $newWorkout->exerciseGroups()->create($exerciseGroup->toArray());
                forEach($exerciseGroup->weightedExercises as $weightedExercise){
                    $newExerciseGroup->weightedExercises()->create($weightedExercise->toArray());
                }

            }
            return $newTemplate;
        });
    }

    protected $fillable = [
        'name',
    ];
}
