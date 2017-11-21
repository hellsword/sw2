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
use App\Cupones;

use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;


class AnuncioController extends Controller
{
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;


    }

    public function index(Guard $auth, Request $request){

        $this->middleware('auth');
        $this->auth =$auth;

        if($request){
            $query=trim($request->get('searchText'));

            $anuncios = DB::table('orden as o')
             ->join ('anuncio as a', 'o.id_anuncio', '=' ,'a.id_anuncio')
             //->join ('cupones as c', 'c.id_anuncio', '=' ,'a.id_anuncio')
             ->where('o.id_secretaria','=',$this->auth->user()->id)   
             ->where('a.condicion','=',0)  
             ->select('a.titulo','a.descripcion','a.condicion','a.id_anuncio','a.forma_pago')
             ->paginate(5);


            $regiones=DB::table('region')->get();

            $categorias=DB::table('categorias')->get();

            $sub_categorias=DB::table('sub_categorias')->get();

            $categoria_vehiculos=DB::table('categoria_vehiculo')->get();

            return view('anuncios.index', ["anuncios" => $anuncios, 'regiones'=> $regiones, "searchText" => $query, 'categorias'=> $categorias, 'sub_categorias'=> $sub_categorias, 'categoria_vehiculos'=> $categoria_vehiculos]);
        }

       
    }

    public function create(){
       return view('');
    }

    public function store(Request $request){ 

   }

       public function actualizar(Request $request)
    {

        DB::table('anuncio as a')
        ->where('a.id_anuncio', '=' ,$request->get('id_anuncio'))
        ->update(['condicion' => 1]);
   
       return Redirect::to('anuncios');
 

    }
  }