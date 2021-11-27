<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightedExercise extends Model
{
    use HasFactory;

    public function exerciseGroup(){
        return $this->belongsTo(ExerciseGroup::class, 'exercise_group_id');
    }

    protected $fillable = [
        'exercise_group_id',
        'reps',
        'weight',
        'one_rm',
        'rpe',
        'order',
        'is_lifted',
    ];
}
