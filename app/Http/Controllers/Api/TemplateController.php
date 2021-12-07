<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Http\Resources\TemplateResource;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    public function index()
    {
        return TemplateResource::collection(auth()->user()->templates()->get());
    }

    public function show($id)
    {   
        return new TemplateResource(Template::findOrFail($id));
    }

    public function store(Request $request)
    {
        $template = auth()->user()->templates()->create([]);
        $template->workout()->create($request->all());
        return new TemplateResource($template);
    }

    public function clone($id)
    {
        $template = Template::findOrFail($id);
        $newTemplate = Template::create([
            'user_id' => 1,
        ]);
        $newWorkout = $template->workout->clone();
        $newWorkout->workoutable()->associate($newTemplate);
        $newWorkout->name = $newWorkout->name.' Copy';
        $newWorkout->save();
        return new TemplateResource($newTemplate);
    }
}
