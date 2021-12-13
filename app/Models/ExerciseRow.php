<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseRow extends Model
{
    use HasFactory;


    public function exerciseGroup(){
        return $this->belongsTo(ExerciseGroup::class, 'exercise_group_id');
    }

    public function exercisable()
    {
        if($this->exerciseGroup->exercise->exercise_type == "App\Models\BasicExercise"){
            return $this->hasOne(BasicExercise::class);
        }
        if($this->exerciseGroup->exercise->exercise_type == "App\Models\WeightedExercise"){
            return $this->hasOne(WeightedExercise::class);
        }
    }

    function delete()
    {
        $this->exercisable()->delete(); 
        parent::delete();
    }

    protected $fillable = [
        'exercise_group_id',
        'order',
        'is_lifted',
    ];
}
