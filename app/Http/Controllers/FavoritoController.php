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


    public function index(Guard $auth, Request $request){

        $this->middleware('auth');
        $this->auth =$auth;

        if($request){
            $query=trim($request->get('searchText'));
        
            $servicios = DB::table('anuncio as a')
            ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
            ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
            ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
            ->join ('favoritos as fav', 'a.id_anuncio', '=' , 'fav.id_anuncio')
            ->join ('region', 'region.REGION_ID', '=' , 'a.region')
            ->join ('provincia', 'provincia.PROVINCIA_ID', '=' , 'a.provincia')
            ->join ('comuna', 'comuna.COMUNA_ID', '=' , 'a.comuna')
            ->where('o.id_cliente', '=', $this->auth->user()->id)
            ->where('f.id_foto', '=', '0')
            ->where('a.titulo', 'LIKE', '%'.$query.'%') 
            ->select('a.id_anuncio as id_anuncio',
                    'a.titulo as titulo',
                    'a.descripcion as descripcion',
                    'a.precio_serv as precio_serv',
                    'a.tipo_servicio as tipo_servicio',
                    'region.REGION_NOMBRE as region',
                    'provincia.PROVINCIA_NOMBRE as provincia',
                    'comuna.COMUNA_NOMBRE as comuna',
                    'u.nombre as nombre',
                    'u.apellido as apellido',
                    'f.foto as foto',
                    'o.fecha as fecha'
                    )
            ->paginate(5);

            $regiones=DB::table('region')->get();

            $categorias=DB::table('categorias')->get();

            $sub_categorias=DB::table('sub_categorias')->get();

            $categoria_vehiculos=DB::table('categoria_vehiculo')->get();

            $provincias = DB::table('provincia')->get();

            $comunas = DB::table('comuna')->get();

            return view('servicios.index', ["servicios" => $servicios, 'regiones'=> $regiones, "searchText" => $query, 'categorias'=> $categorias, 'sub_categorias'=> $sub_categorias, 'categoria_vehiculos'=> $categoria_vehiculos, 'provincias'=> $provincias, 'comunas'=> $comunas]);
        }
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
