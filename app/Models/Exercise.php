<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function exerciseGroups(){
        return $this->hasMany(ExerciseGroup::class);
    }

    protected $fillable = [
        'name',
        'user_id',
    ];
}
