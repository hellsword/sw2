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
use App\Secretaria;

use Image; 
use DB;
use PDF;
use Alert;
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


        try {

        DB::beginTransaction();
      
            DB::table('anuncio as a')
            ->where('a.id_anuncio', '=' ,$request->get('id_anuncio'))
            ->update(['condicion' => 1]);

            $secretaria=DB::table('secretaria')->where('id_secretaria', '=', $this->auth->user()->id)->select('anuncios_pend as anuncios_pend')->first();

            Secretaria::where('id_secretaria', $this->auth->user()->id)
                  ->update(['anuncios_pend' => $secretaria->anuncios_pend-1]);

            DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      alert()->success('El anuncio ha sido aceptado.', '¡Santos cacahuates Batman!')->persistent('Cerrar');
       return Redirect::to('anuncios');
    }


  }