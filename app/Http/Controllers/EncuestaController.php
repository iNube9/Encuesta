<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EncuestaController extends Controller
{
    public function consultarPreguntas()
    {
        $preguntas = DB::table('preguntas')
        ->where('Encuesta', 4)
        ->get()
        ->toArray();

        $numero = count($preguntas);

        $secciones = DB::table('preguntas')
        ->select('Clasificacion')
        ->where('encuesta', 4)
        ->distinct()
        ->get()
        ->toArray();

        $registros = DB::table('respuestas')->count();

        return view('encuesta')->with([
            'preguntas' => $preguntas,
            'numero' => $numero,
            'secciones' => $secciones,
            'registros' => $registros,
        ]);
    }

    public function guardarRespuestas($numero, $respuesta, $nombre)
    {
        DB::table('respuestas')->insert([
            'año' => '2023',
            'periodo' => '0',
            'encuestado' => $nombre,
            'encuesta' => '4',
            'pregunta' => $numero,
            'respuesta' => $respuesta,
            'materia' => '0',
            'grupo' => 'x',
        ]);
    }
}
