<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ExerciseType;
use App\Http\Resources\ActiveResource;
use App\Http\Controllers\Controller;

class ExerciseTypeController extends Controller
{
    public function index(){
        return ExerciseType::all();
    }
}
