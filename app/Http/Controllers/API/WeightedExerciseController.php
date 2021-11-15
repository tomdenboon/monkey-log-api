<?php

namespace App\Http\Controllers\Api;

use App\Models\WeightedExercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WeightedExerciseResource;

class WeightedExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weighted_exercises = auth()->user()->weightedExercises()->get();
        return WeightedExerciseResource::collection($weighted_exercises);
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
    public function store(Request $request)
    {
        $weighted_exercise = auth()->user()->weightedExercises()->create($request->all())->refresh();
        return new WeightedExerciseResource($weighted_exercise);
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
    public function update(Request $request, WeightedExercise $weightedExercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeightedExercise  $weightedExercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeightedExercise $weightedExercise)
    {
        //
    }
}
