<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseGroup extends Model
{
    use HasFactory;

    public function exercise(){
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function workout(){
        return $this->belongsTo(Workout::class, 'workout_id');
    }

    public function exerciseRows(){
        return $this->hasMany(ExerciseRow::class);
    }

    protected $fillable = [
        'workout_id',
        'exercise_id',
        'order',
    ];
}
