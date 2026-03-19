<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Class TaskController extends Controller
{

    public function crearTarea(Request $request){
        $user = auth()->user();
        $express = env('EXPRESS_URL');
        $headers = ['Authorization'=>'Token'.env('clave')];

        $tarea  = Http::AuthHeader($headers)->post($express/tasks,[
            'id_task' => request -> id_task,
            'title' => request-> title,
            'description' => request -> description,
            'status' => request -> status,
        ]);
        if ($tarea->failed){
            return response()->json(["message" =>'error',502]);
        }

    }

    public function traerTarea(Request $request){
        $user = auth()->user();
        $express = env('EXPRESS_URL');

        $tarea  = Http::AuthHeader($headers)->post($express/tasks,[
            
        ]);
        if ($tarea->failed){
            return response()->json(["message" =>'error',502]);
        }
    }


    public function traerTareas(Request $request){
        $user = auth()->user();
        $express = env('EXPRESS_URL');
        $headers = ['Authorization'=>'Token'.env('clave')];

        $tarea  = Http::AuthHeader($headers)->post($express/tasks,[
            'id_task' => request -> id_task,
            'title' => request-> title,
            'description' => request -> description,
            'status' => request -> status,
        ]);
        if ($tarea->failed){
            return response()->json(["message" =>'error',502]);
        }


    }

    public function actualizarTarea(Request $request){
        $user = auth()->user();
        $express = env('EXPRESS_URL');
        $headers = ['Authorization'=>'Token'.env('clave')];

        $tarea  = Http::AuthHeader($headers)->post($express/tasks,[
            'id_task' => request -> id_task,
            'title' => request-> title,
            'description' => request -> description,
            'status' => request -> status,
        ]);
        if ($tarea->failed){
            return response()->json(["message" =>'error',502]);
        }


    }

    public function borrarTarea(Request $request){
        $user = auth()->user();
        $express = env('EXPRESS_URL');
        $headers = ['Authorization'=>'Token'.env('clave')];

        $tarea  = Http::AuthHeader($headers)->post($express/tasks,[
            'id_task' => request -> id_task,
            'title' => request-> title,
            'description' => request -> description,
            'status' => request -> status,
        ]);
        if ($tarea->failed){
            return response()->json(["message" =>'error',502]);
        }


    }

    public function borrarTareas(Request $request){
        $user = auth()->user();
        $express = env('EXPRESS_URL');
        $headers = ['Authorization'=>'Token'.env('clave')];

        $tarea  = Http::AuthHeader($headers)->post($express/tasks,[
            'id_task' => request -> id_task,
            'title' => request-> title,
            'description' => request -> description,
            'status' => request -> status,
        ]);
        if ($tarea->failed){
            return response()->json(["message" =>'error',502]);
        }


    }

    


}
