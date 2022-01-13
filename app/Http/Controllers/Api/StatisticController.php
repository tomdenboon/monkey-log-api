<?php

namespace App\Http\Controllers\Api;

use App\Models\WeightedExercise;
use App\Models\BasicExercise;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class StatisticController extends Controller
{
    public function general()
    {
        $reps = WeightedExercise::whereHas('exerciseRow.exerciseGroup.exercise.user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->sum('reps');
        $reps += BasicExercise::whereHas('exerciseRow.exerciseGroup.exercise.user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->sum('reps');
        $volume = WeightedExercise::whereHas('exerciseRow.exerciseGroup.exercise.user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->sum(DB::raw('reps * weight'));
        $completes = auth()->user()->completes;
        $time = 0;
        foreach ($completes as $complete) {
            $time += strToTime($complete->completed_at) * 1000 - strToTime($complete->started_at) * 1000;
        }
        return ['total_time' => $time, 'total_workouts' => $completes->count(), 'total_reps' => $reps, 'total_volume' => $volume];
    }
}
