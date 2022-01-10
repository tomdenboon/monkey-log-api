<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Complete;
use App\Http\Resources\CompleteResource;
use App\Http\Controllers\Controller;

class CompleteController extends Controller
{
    public function index(){
        return CompleteResource::collection(auth()->user()->completes()->orderBy('started_at', 'DESC')->limit(10)->get());
    }

    public function complete(){
        if (auth()->user()->active) {
            $newComplete = auth()->user()->active->complete();
            return new CompleteResource($newComplete);
        }
        return 'message: nothing active';
    }

    public function show($id)
    {   
        return new CompleteResource(Complete::findOrFail($id));
    }
}
