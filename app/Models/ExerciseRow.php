<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseRow extends Model
{
    use HasFactory;

    public function exercisable()
    {
        return $this->morphTo();
    }

    public function exerciseGroup(){
        return $this->belongsTo(ExerciseGroup::class, 'exercise_group_id');
    }

    public function isBasicExercise(){

    }

    protected $fillable = [
        'exercise_group_id',
        'order',
        'is_lifted',
    ];
}
