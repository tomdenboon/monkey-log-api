<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workout(){
        return $this->morphOne(Workout::class, 'workoutable');
    }

    protected $fillable = [
        'user_id',
        'started_at',
        'completed_at',
    ];
}
