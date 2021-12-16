<?php

namespace App\Http\Controllers\Api;

use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = auth()->user()->exercises()->orderBy('name', 'ASC')->get();
        return ExerciseResource::collection($exercises);
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
        $exercise = auth()->user()->exercises()->create($request->all())->refresh();
        return new ExerciseResource($exercise);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $exercise = auth()->user()->exercises()->findOrFail($id);
       return new ExerciseResource($exercise);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $exercise = auth()->user()->exercises()->findOrFail($id);
        $exercise->update([
            'name' => $request->name
        ]);
        return new ExerciseResource($exercise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exercise::find($id)->delete();
    }
}
