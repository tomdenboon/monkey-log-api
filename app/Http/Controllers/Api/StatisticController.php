<?php

namespace App\Http\Controllers\Api;

use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;

class StatisticController extends Controller
{
    public function general(){
        $totalReps = 0;
        $completes = auth()->user()->completes;
        forEach($completes as $complete){
            $workout = $complete->workout;
            forEach($workout->exerciseGroups as $exerciseGroup){
                forEach($exerciseGroup->exerciseRows as $exerciseRow){
                    $totalReps += $exerciseRow->getReps();
                }
            }
        }
        return $totalReps;
    }
}