<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;

//para tebajar con la clase DB de laravel.
use DB;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

//Modelos
use App\Favorito;

class FavoritoController extends Controller
{
    
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
    }


    public function index(){
        
        $servicios = DB::table('anuncio as a')
        ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
        ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
        ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
        ->join ('favoritos as fav', 'a.id_anuncio', '=' , 'fav.id_anuncio')
        ->where('f.id_foto', '=', '0')
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
        ->paginate(5);

        return view('favoritos.index', ["servicios" => $servicios]);
    }


    public function store(Request $request, Guard $auth)
    {   

      $this->middleware('auth');
      $this->auth =$auth;

      try {

        DB::beginTransaction();
      
        $favorito = new Favorito;
        $favorito->id_cliente= $this->auth->user()->id;
        $favorito->id_anuncio=$request->get('id_anuncio');
        $favorito->save(); 

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      return Redirect::to('/servicios');  

    }


}
