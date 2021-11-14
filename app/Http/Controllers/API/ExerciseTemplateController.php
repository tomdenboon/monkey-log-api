<?php

namespace App\Http\Controllers;

use App\Models\ExerciseTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExerciseTemplateController extends Controller
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
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
        ]);
        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $data['user_id'] = $request->user()->id;
        $exerciseTemplate = ExerciseTemplate::create($data);

        return response([ 'exercise_template' => new ExerciseTemplate($workout), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseTemplate  $exerciseTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(ExerciseTemplate $exerciseTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExerciseTemplate  $exerciseTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(ExerciseTemplate $exerciseTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExerciseTemplate  $exerciseTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExerciseTemplate $exerciseTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseTemplate  $exerciseTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExerciseTemplate $exerciseTemplate)
    {
        //
    }
}
