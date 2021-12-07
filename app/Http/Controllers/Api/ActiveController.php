<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\Template;
use App\Http\Resources\ActiveResource;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{
    public function get(){
        if(auth()->user()->active){
            return new ActiveResource(auth()->user()->active);
        } else {
            return response(['message' => 'No active workout found'], 404);
        }
    }

    public function start($template_id){    
        $template = Template::findOrFail($template_id);
        $active = $template->toActive();
        return new ActiveResource($active);
    }
}
