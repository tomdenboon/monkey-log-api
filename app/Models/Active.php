<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Active extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workout(){
        return $this->morphOne(Workout::class, 'workoutable');
    }

    public function complete(){
        return DB::transaction(function() {
            $user_id = $this->user->id;
            $newComplete = Complete::create([
                'user_id' => $user_id,
                'started_at' => $this->started_at,
                'completed_at' => Carbon::now(),
            ]);
            $this->workout->workoutable()->associate($newComplete)->save();
            $this->workout->deleteIncompleteExercises();
            $this->delete();
            return $newComplete;
        });
    }

    
    protected $fillable = [
        'user_id',
        'started_at',
    ];
}
