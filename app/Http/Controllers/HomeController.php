<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fecha_actual=date('Y-m-d');

        $servicios = DB::table('anuncio as a')
        ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
        ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
        ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
        ->where('f.id_foto', '=', '0')
        ->where('a.condicion', '=', '1')
        ->where('o.fecha_venc', '>=', $fecha_actual)
        ->select('a.id_anuncio as id_anuncio',
                'a.titulo as titulo',
                'a.descripcion as descripcion',
                'a.precio_serv as precio_serv',
                'a.tipo_servicio as tipo_servicio',
                'a.region as region',
                'a.comuna as comuna',
                'u.nombre as nombre',
                'u.apellido as apellido',
                'f.foto as foto'
                )
        ->take(4)
        ->orderBy('a.id_anuncio', 'desc')
        ->get();

        return view('/home', ['servicios'=> $servicios]);
    }
}
