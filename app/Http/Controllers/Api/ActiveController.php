<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\Template;
use App\Http\Resources\ActiveResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function startEmpty(){    
        return DB::transaction(function() {
            $user = auth()->user();
            if($user->active){
                $user->active->workout->delete();
                $user->active->delete();
            }
            $active = Active::create([
                'user_id' => $user->id,
                'started_at' => Carbon::now(),
            ]);
            $active->workout()->create([
                "name" => "Empty workout"
            ]); 
            return new ActiveResource($active);
        });
    }
}
