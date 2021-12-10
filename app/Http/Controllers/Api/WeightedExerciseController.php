<?php

namespace App\Http\Controllers\Api;

use App\Models\WeightedExercise;
use App\Http\Controllers\Controller;
use App\Http\Resources\WeightedExerciseResource;
use Illuminate\Http\Request;

class WeightedExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $exercise_group_id)
    {
        $weighted_exercise = WeightedExercise::create([
            'exercise_group_id' => $exercise_group_id,
            'reps' =>  $request->reps !== null ? $request->reps : 0,
            'weight' => $request->weight !== null ? $request->weight : 0,
            'order' => $request->order,
        ]);
        return new WeightedExerciseResource($weighted_exercise->refresh());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WeightedExercise  $weightedExercise
     * @return \Illuminate\Http\Response
     */
    public function show(WeightedExercise $weightedExercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WeightedExercise  $weightedExercise
     * @return \Illuminate\Http\Response
     */
    public function edit(WeightedExercise $weightedExercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WeightedExercise  $weightedExercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $weighted_exercise = WeightedExercise::find($id);
        $weighted_exercise->update($request->all());
        return new WeightedExerciseResource($weighted_exercise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeightedExercise  $weightedExercise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weighted_exercise = WeightedExercise::find($id)->delete();
    }
}
