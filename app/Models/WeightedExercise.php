<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightedExercise extends Model
{
    use HasFactory;

    public function exerciseRow(){
        return $this->belongsTo(ExerciseRow::class, 'exercise_row_id');
    }

    protected $fillable = [
        'exercise_row_id',
        'reps',
        'weight',
        'rpe',
    ];
}
