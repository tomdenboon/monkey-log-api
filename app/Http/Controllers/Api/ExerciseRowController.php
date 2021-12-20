<?php

namespace App\Http\Controllers\Api;

use App\Models\ExerciseRow;
use App\Models\ExerciseGroup;
use App\Models\BasicExercise;
use App\Models\WeightedExercise;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseRowResource;
use Illuminate\Http\Request;

class ExerciseRowController extends Controller
{
    public function copyLastRow($exercise_group_id)
    {
        $group = ExerciseGroup::findOrFail($exercise_group_id);
        $exerciseRow = $group->exerciseRows()->orderBy('order', 'DESC')->first();
        $newExerciseRow = $exerciseRow->replicate();
        $newExerciseRow->order = $newExerciseRow->order + 1;
        $newExerciseRow->save();
        $newExerciseRow->exercisable()->create($exerciseRow->exercisable->toArray());
        return new ExerciseRowResource($newExerciseRow);
    }
    
    public function update(Request $request, $id)
    {
        $exercise_row = ExerciseRow::find($id);
        $type = $exercise_row->exerciseGroup->workout->workoutable_type;
        if($type == 'App\Models\Template'){
            $request->is_lifted = false;
        }
        if($type == 'App\Models\Complete'){
            $request->is_lifted = true;
        }
        $exercise_row->update([
            'is_lifted' => $request->is_lifted,
        ]);
        $exercise_row->exercisable->update($request->exercisable);
        return new ExerciseRowResource($exercise_row);
    }

    public function destroy($id)
    {
        $weighted_exercise = ExerciseRow::find($id)->delete();
    }
}