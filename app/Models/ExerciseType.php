<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    use HasFactory;

    public function exercises(){
        return $this->hasMany(Exercise::class);
    }

    protected $fillable = [
        'type',
        'name',
    ];
}
