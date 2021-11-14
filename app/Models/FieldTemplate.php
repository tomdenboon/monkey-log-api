<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldTemplate extends Model
{
    use HasFactory;

    public function exerciseTemplate(){
        return $this->belongsTo(ExerciseTemplate::class, 'exercise_template_id');
    }

    public function fieldType(){
        return $this->belongsTo(FieldType::class, 'field_type_id');
    }

    protected $fillable = [
        'field_type_id',
        'exercise_template_id',
        'name',
        'order',
    ];
}
