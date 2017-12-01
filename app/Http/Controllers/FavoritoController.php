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

            $fecha_actual=date('Y-m-d');
       

        //Carga un servicio con vehiculo        
        if($request->get('vehiculo') != null){
            $servicios = DB::table('anuncio as a')
            ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
            ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
            ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
            ->join ('vehiculo as v', 'a.patente', '=' , 'v.patente')
            ->join ('region', 'region.REGION_ID', '=' , 'a.region')
            ->join ('provincia', 'provincia.PROVINCIA_ID', '=' , 'a.provincia')
            ->join ('comuna', 'comuna.COMUNA_ID', '=' , 'a.comuna')
            ->join ('favoritos', 'favoritos.id_anuncio', '=' , 'a.id_anuncio')
            ->where('favoritos.id_cliente', '=', $this->auth->user()->id)
            ->where('f.id_foto', '=', '0')
            ->where('a.condicion', '=', '1')
            ->where('o.fecha_venc', '>=', $fecha_actual)
            ->where(\DB::raw("CONCAT(a.titulo, ' ', a.tipo_servicio, ' ', a.descripcion)"), 'LIKE', '%'.$query.'%')     //BUSCA POR EL TITULO DEL ANUNCIO
            ->where('a.tipo_servicio', 'LIKE', '%'.$request->get('sub_categoria').'%')
            ->where('a.region', '=', $request->get('region'))
            ->where('a.provincia', '=', $request->get('provincia'))
            ->where('a.comuna', '=', $request->get('comuna'))
            ->where('v.categoria', 'LIKE', '%'.$request->get('vehiculo').'%')
            ->select('o.id_cliente as id_cliente',
                    'a.id_anuncio as id_anuncio',
                    'a.titulo as titulo',
                    'a.descripcion as descripcion',
                    'a.precio_serv as precio_serv',
                    'a.tipo_servicio as tipo_servicio',
                    'region.REGION_NOMBRE as region',
                    'provincia.PROVINCIA_NOMBRE as provincia',
                    'comuna.COMUNA_NOMBRE as comuna',
                    'u.apellido as apellido',
                    'f.foto as foto',
                    'o.fecha as fecha'
                    )
            ->paginate(5);
        }
        else{   //Carga un servicio con personas  
            $servicios = DB::table('anuncio as a')
            ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
            ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
            ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
            ->join ('region', 'region.REGION_ID', '=' , 'a.region')
            ->join ('provincia', 'provincia.PROVINCIA_ID', '=' , 'a.provincia')
            ->join ('comuna', 'comuna.COMUNA_ID', '=' , 'a.comuna')
            ->join ('favoritos', 'favoritos.id_anuncio', '=' , 'a.id_anuncio')
            ->where('favoritos.id_cliente', '=', $this->auth->user()->id)
            ->where('a.condicion', '=', '1')
            ->where('f.id_foto', '=', '0')
            //condicion para mostrar solo los avisos q esten vijentes 
            ->where('o.fecha_venc', '>=', $fecha_actual)

            ->where(\DB::raw("CONCAT(a.titulo, ' ', a.tipo_servicio, ' ', a.descripcion)"), 'LIKE', '%'.$query.'%')     //BUSCA POR EL TITULO DEL ANUNCIO
            ->where('a.tipo_servicio', 'LIKE', '%'.$request->get('sub_categoria').'%')
            ->where('a.comuna', 'LIKE', '%'.$request->get('region').'%')
            ->where('a.comuna', 'LIKE', '%'.$request->get('provincia').'%')
            ->where('a.comuna', 'LIKE', '%'.$request->get('comuna').'%')
            ->select('o.id_cliente as id_cliente',
                    'a.id_anuncio as id_anuncio',
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
        }

            $regiones=DB::table('region')->get();

            $categorias=DB::table('categorias')->get();

            $sub_categorias=DB::table('sub_categorias')->get();

            $categoria_vehiculos=DB::table('categoria_vehiculo')->get();

            $provincias = DB::table('provincia')->get();

            $comunas = DB::table('comuna')->get();


            if($this->auth->user()){
                $favoritos = DB::table('favoritos')->where('id_cliente', $this->auth->user()->id)->get();
                return view('servicios.index', ["servicios" => $servicios, "favoritos" => $favoritos, 'regiones'=> $regiones, "searchText" => $query, 'categorias'=> $categorias, 'sub_categorias'=> $sub_categorias, 'categoria_vehiculos'=> $categoria_vehiculos ,'provincias'=> $provincias, 'comunas'=> $comunas]);
            }
            else
                return view('servicios.index', ["servicios" => $servicios, 'regiones'=> $regiones, "searchText" => $query, 'categorias'=> $categorias, 'sub_categorias'=> $sub_categorias, 'categoria_vehiculos'=> $categoria_vehiculos, 'provincias'=> $provincias, 'comunas'=> $comunas]);
        }
    }


    public function store(Request $request, Guard $auth, $id)
    {   

      

    }



    public function almacenar(Request $request, Guard $auth)
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
