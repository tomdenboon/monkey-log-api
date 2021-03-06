<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Template extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workout(){
        return $this->morphOne(Workout::class, 'workoutable');
    }

    public function toActive(){
        return DB::transaction(function() {
            $user_id = $this->user->id;
            if($this->user->active){
                $this->user->active->workout->delete();
                $this->user->active->delete();
            }
            $newActive = Active::create([
                'user_id' => $user_id,
                'started_at' => Carbon::now(),
            ]);
            $newWorkout = $this->workout->clone();
            $newWorkout->workoutable()->associate($newActive);
            $newWorkout->save(); 
            return $newActive;
        });
    }

    protected $fillable = [
        'user_id',
    ];
}
