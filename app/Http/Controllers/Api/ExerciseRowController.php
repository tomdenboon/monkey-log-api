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
    public function store(Request $request, $exercise_group_id)
    {
        $group = ExerciseGroup::findOrFail($exercise_group_id);
        $is_lifted = false;
        if($group->workout->workoutable_type == 'App\Models\Template'){
            $is_lifted = false;
        }
        if($group->workout->workoutable_type == 'App\Models\Active'){
            $is_lifted = $request->is_lifted;
        }
        if($group->workout->workoutable_type == 'App\Models\Complete'){
            $is_lifted = true;
        }

        $exercise_row = $group->exerciseRow()->create([
            'order' => 1,
            'is_lifted' => $is_lifted,
        ]);
        $exercise_row->exercisable()->create($request->toArray());
        return new ExerciseRowResource($exercise_row);
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
            'order' => $request->order,
        ]);
        $exercise_row->exercisable->update($request->all());
        return new ExerciseRowResource($exercise_row);
    }

    public function destroy($id)
    {
        $weighted_exercise = ExerciseRow::find($id)->delete();
    }
}