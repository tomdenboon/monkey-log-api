<?php

namespace App\Http\Controllers\Api;

use App\Models\ExerciseGroup;
use App\Models\WeightedExercise;
use App\Models\BasicExercise;
use App\Http\Resources\ExerciseGroupResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExerciseGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($workout_id)
    {
        $exercise_groups = ExerciseGroup::where('workout_id', $workout_id)->get();
        return ExerciseGroupResource::collection($exercise_groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $workout_id)
    {
        $group = ExerciseGroup::create([
            'workout_id' => $workout_id,
            'exercise_id' => $request->exercise_id,
            'order' => $request->order,
        ]);  
        $is_lifted = 0;
        if($group->workout->workoutable_type == 'App\Models\Complete'){
            $is_lifted = 1;
        }

        $exercise_row = $group->exerciseRows()->create([
            'order' => 1,
            'is_lifted' => $is_lifted,
        ]);
        $exercise_row->exercisable()->create([]);
        return new ExerciseGroupResource($group);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseGroup  $exerciseGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ExerciseGroup $exerciseGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExerciseGroup  $exerciseGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ExerciseGroup $exerciseGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExerciseGroup  $exerciseGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExerciseGroup $exerciseGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseGroup  $exerciseGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExerciseGroup::find($id)->delete();
    }
}
