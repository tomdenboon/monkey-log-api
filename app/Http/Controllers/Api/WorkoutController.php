<?php

namespace App\Http\Controllers\Api;

use App\Models\Workout;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkoutResource;
use App\Http\Resources\FullWorkoutResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workouts = auth()->user()->workouts()->get(); 
        return WorkoutResource::collection($workouts);
    }

    public function templateIndex()
    {
        $workouts = auth()->user()->workouts()->where('is_template', true)->get();
        return FullWorkoutResource::collection($workouts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $workout = auth()->user()->workouts()->create($request->all());
        return new WorkoutResource($workout);
    }

    public function clone($id)
    {

        $workout = Workout::findOrFail($id);
        $newWorkout = $workout->replicateWorkout();
        return new FullWorkoutResource($newWorkout);
    }

    public function show($id)
    {   
        return new FullWorkoutResource(Workout::findOrFail($id));
    }

    public function edit(Workout $workout)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $workout = Workout::find($id);
        $workout->update($request->all());
        return new WorkoutResource($workout);
    }

    public function destroy($id)
    {
        Workout::find($id)->delete();
    }
}
