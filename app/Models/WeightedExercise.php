<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightedExercise extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected $fillable = [
        'name',
        'user_id',
        'reps_is_visible',
        'weight_is_visible',
        'one_rm_is_visible',
        'rpe_is_visible',
        'notes_is_visible',
    ];
}
