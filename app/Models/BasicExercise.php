<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicExercise extends Model
{
    use HasFactory;

    public function ExerciseRow(){
        return $this->morphOne(ExerciseRow::class, 'exercisable');
    }

    protected $fillable = [
        'reps',
    ];
}
