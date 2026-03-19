<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function crearTarea(Request $request)
    {
        $headers = ['Authorization' => 'Token ' . env('clave')];

        $tarea = Http::withHeaders($headers)->post(env('EXPRESS_URL') . '/tasks', [
            'id_task'     => $request->id_task,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        if ($tarea->failed()) {
            return response()->json(['message' => 'error'], 502);
        }

        return response()->json(['message' => 'ok'], 200);
    }

    public function traerTareas()
    {
        $headers  = ['Authorization' => 'Token ' . env('clave')];
        $response = Http::withHeaders($headers)->get(env('EXPRESS_URL') . '/tasks');

        if ($response->failed()) {
            return response()->json(['message' => 'error'], 502);
        }

        return response()->json($response->json(), 200);
    }

    public function traerTareasPorUsuario($usuario)
    {
        $headers  = ['Authorization' => 'Token ' . env('clave')];
        $response = Http::withHeaders($headers)->get(env('EXPRESS_URL') . '/tasks/' . $usuario);

        if ($response->failed()) {
            return response()->json(['message' => 'error'], 502);
        }

        return response()->json($response->json(), 200);
    }

    public function actualizarTarea(Request $request, $id)
    {
        $headers = ['Authorization' => 'Token ' . env('clave')];

        $tarea = Http::withHeaders($headers)->put(env('EXPRESS_URL') . '/tasks/' . $id, [
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        if ($tarea->failed()) {
            return response()->json(['message' => 'error'], 502);
        }

        return response()->json(['message' => 'Tarea actualizada'], 200);
    }

    public function borrarTarea($id)
    {
        $headers = ['Authorization' => 'Token ' . env('clave')];
        $tarea   = Http::withHeaders($headers)->delete(env('EXPRESS_URL') . '/tasks/' . $id);

        if ($tarea->failed()) {
            return response()->json(['message' => 'error'], 502);
        }

        return response()->json(['message' => 'Tarea eliminada'], 200);
    }

    public function borrarTareasPorUsuario($usuario)
    {
        $headers  = ['Authorization' => 'Token ' . env('clave')];
        $response = Http::withHeaders($headers)->delete(env('EXPRESS_URL') . '/tasks/usuario/' . $usuario);

        if ($response->failed()) {
            return response()->json(['message' => 'error'], 502);
        }

        return response()->json(['message' => 'Tareas eliminadas'], 200);
    }
}