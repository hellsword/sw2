<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;

//Modelos
use App\Imagenes;
use App\Persona;
use App\Anuncio;
use App\Vehiculo;
use App\Orden;
use App\Forma_pago;
use App\Secretaria;
use App\Cupones;

use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;


class CuponController extends Controller
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
            ->join ('region', 'region.REGION_ID', '=' , 'a.region')
            ->join ('provincia', 'provincia.PROVINCIA_ID', '=' , 'a.provincia')
            ->join ('comuna', 'comuna.COMUNA_ID', '=' , 'a.comuna')
            ->where('f.id_foto', '=', '0')
            ->where('o.id_cliente', '=', $this->auth->user()->id)
            ->where('a.forma_pago','=','1')
            ->where('a.titulo', 'LIKE', '%'.$query.'%')     //BUSCA POR EL TITULO DEL ANUNCIO
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
                    'a.forma_pago as forma_pago'
                    )
            ->paginate(5);


            $regiones=DB::table('region')->get();

            $categorias=DB::table('categorias')->get();

            $sub_categorias=DB::table('sub_categorias')->get();

            $categoria_vehiculos=DB::table('categoria_vehiculo')->get();

            $provincias = DB::table('provincia')->get();

            $comunas = DB::table('comuna')->get();

            return view('cupones.index', ["servicios" => $servicios, 'regiones'=> $regiones, "searchText" => $query, 'categorias'=> $categorias, 'sub_categorias'=> $sub_categorias, 'categoria_vehiculos'=> $categoria_vehiculos,'provincias'=> $provincias, 'comunas'=> $comunas]);
        }

   
    }

    public function create(Guard $auth){

        $this->middleware('auth');
        $this->auth =$auth;

         $regiones=DB::table('region')->get();

         $provincias = DB::table('provincia')->get();

         $comunas = DB::table('comuna')->get();

        return view('servicios.create',['regiones'=> $regiones,'provincias'=> $provincias, 'comunas'=> $comunas]);
    }

    public function store(Request $request, Guard $auth){ 


        $this->middleware('auth');
        $this->auth =$auth;
        $anuncio=$request->get('id_anuncio'); //captura el tipo de servicio
        $id_cliente=$this->auth->user()->id;

        $id=$request->get('id_anuncio');

      

      try {

            DB::beginTransaction();



            //AQUI SE GUARDAN LAS FOTOS
            //Se crean los array de los siguientes datos:
            $file = Input::file('imagen');

            //Se recorren y asignan los array
         
                $temp = file_get_contents($file[0] );
                $image = base64_encode($temp);



                $cupones = new Cupones;
                $cupones->id_anuncio = $anuncio;
                $cupones->id_cliente = $id_cliente;
                $cupones->cupon = $image;
                $cupones->save();   

                //Actualizamos la forma de pago a 2 que significa que ya se subio el cupon de ese anuncio.
           DB::table('anuncio')
            ->where('id_anuncio',$id )
            ->update(['forma_pago' => 2]);
          
       


            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
        }



        return Redirect::to('/');

    }

    public function show($id_anuncio, Guard $auth)
    {
        $this->middleware('auth');
        $this->auth =$auth;

        $servicio = DB::table('anuncio')->where('id_anuncio', $id_anuncio)->first();
        $imagenes = DB::table('fotos')->where('id_anuncio', $id_anuncio)->get();
        $orden = DB::table('orden')->where('id_anuncio', $id_anuncio)->first();
        $autor = DB::table('users')->where('id', $orden->id_cliente)->first();


        $lugar = DB::table('anuncio as a')
            ->join ('region', 'a.region', '=' , 'region.REGION_ID')
            ->join ('provincia', 'a.provincia', '=' , 'provincia.PROVINCIA_ID')
            ->join ('comuna', 'a.comuna', '=' , 'comuna.COMUNA_ID')
            ->select('region.REGION_NOMBRE as region',
                    'provincia.PROVINCIA_NOMBRE as provincia',
                    'comuna.COMUNA_NOMBRE as comuna'
                    )
            ->first();

      return view("cupones.create", ['servicio' => $servicio, 'imagenes' => $imagenes, 'autor' => $autor, "lugar" => $lugar]);

        
    }

    public function verCupon(Request $request,Guard $auth)
    {
        $this->middleware('auth');
        $this->auth =$auth;
        $id_anuncio=$request->get('id_anuncio');

       
        $cupon = DB::table('cupones')->where('id_anuncio', $id_anuncio)->get();
        
   return view("anuncios.ver_cupon", [ 'cupon' => $cupon]);


    

  }
}
