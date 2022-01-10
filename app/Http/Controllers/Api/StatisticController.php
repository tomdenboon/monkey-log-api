<?php

namespace App\Http\Controllers\Api;

use App\Models\Exercise;
use App\Models\WeightedExercise;
use App\Models\Complete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;
use Carbon\Carbon;


class StatisticController extends Controller
{
    public function general(){
        $reps = WeightedExercise::whereHas('exerciseRow.exerciseGroup.exercise.user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->sum('reps');
        $volume = WeightedExercise::whereHas('exerciseRow.exerciseGroup.exercise.user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->sum(\DB::raw('reps * weight'));
        $completes = auth()->user()->completes;
        $time = 0;
        forEach($completes as $complete){
            $time += strToTime($complete->completed_at)*1000 - strToTime($complete->started_at)*1000;
        }
        return ['total_time' => $time, 'total_workouts' => $completes->count(), 'total_reps' => $reps, 'total_volume' => $volume];
     }
}