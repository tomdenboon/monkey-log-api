<?php

namespace App\Http\Controllers\Api;

use App\Models\Workout;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkoutResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkoutController extends Controller
{
    public function create()
    {
        //
    }

    public function show($id)
    {   
        return new WorkoutResource(Workout::findOrFail($id));
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
        $workout = Workout::findOrFail($id);
        $workout->workoutable->delete();
        $workout->delete();
    }
}
