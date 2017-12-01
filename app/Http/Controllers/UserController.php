<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//agregamos nuestro modelo
use App\User;
use App\Tarjeta;
use App\Cliente;
use App\Secretaria;
use App\Contacto;
use App\Anuncio;
use App\Region;
//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;

//para tebajar con la clase DB de laravel.
use DB;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
class UserController extends Controller
{
     protected $auth;
   
   //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;


    }
    //Agregamos todo los metodos, al momento de meternos a menu/plantillas el rutas se llamara este controlador el cual nos permitira utilizar estos metodos.
    
    //METODOS :

    public function index(Request $request)
    {
    	if($request){
           if($this->auth->user()->tipo=='admin' || $this->auth->user()->tipo=='secretaria'){
            $query=trim($request->get('searchText'));
            
            $usuarios = DB::table('users as u')
            ->where('id', 'LIKE', '%'.$query.'%')
            //->where('estado', '<>', 'inactivo')
            ->select('u.id as id',
                    'u.rut as rut',
                    'u.nombre as nombre',
                    'u.apellido as apellido',
                    'u.email as email',
                    'u.tipo as tipo'
                    )
            ->paginate(10);

             return view('usuarios.index', ["usuarios" => $usuarios, "searchText" => $query]);

          }
      }

    }


 

    public function create()
    {
      return view('usuarios.create');  
    }

    public function store(Request $request)
    {   

      $tipo = $request->get('tipo'); //captura el tipo de servicio

      try {

        DB::beginTransaction();
      
        $usuario = new User;
        $usuario->rut=$request->get('rut');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->tipo=$request->get('tipo');
        $usuario->save(); 

        if($tipo == 'cliente'){
          $cliente = new Cliente;
          $cliente->id_cliente = $usuario->id;
          $cliente->save(); 
        }
        else if($tipo == 'secretaria'){
          $secretaria = new Secretaria;
          $secretaria->id_secretaria = $usuario->id;
          $secretaria->anuncios_pend = 0;
          $secretaria->save(); 
        }

        //Se agrega la informacion de contacto del usuario
        if($request->get('telefono') != '' || $request->get('telefono') != null){
          $contacto = new Contacto;
          $contacto->id = $usuario->id;
          $contacto->medio = 'telefono';
          $contacto->contacto = $request->get('telefono'); 
          $contacto->save(); 
        }
        if($request->get('facebook') != '' || $request->get('facebook') != null){
          $contacto = new Contacto;
          $contacto->id = $usuario->id;
          $contacto->medio = 'facebook';
          $contacto->contacto = $request->get('facebook'); 
          $contacto->save(); 
        }

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      return Redirect::to('usuarios');  

    }

// Para mostrar
    public function show($id)
    {

    }

    public function edit($id)
    {
    
      return view("usuarios.edit", ["usuario"=>User::findOrFail($id)]);  

    }

    public function update(Request $request,$id)
    {
      $usuario = User::findOrFail($id);
      $usuario->rut=$request->get('rut');
      $usuario->password=bcrypt($request->get('password'));
      $usuario->nombre=$request->get('nombre');
      $usuario->apellido=$request->get('apellido');
      $usuario->email=$request->get('email');
      $usuario->tipo= $request->get('tipo');;
      $usuario->update();

       return Redirect::to('usuarios');
 

    }
    

    public function destroy($id)
    {
      User::destroy($id);
      return Redirect::to('usuarios');


    }


    public function tarjeta_create(){
      return view('usuarios.tarjeta.create');
    }


    public function gestion(){

       $secretarias = DB::table('secretaria')
            ->join ('users', 'users.id', '=' , 'id_secretaria')
            ->select('secretaria.id_secretaria as id_secretaria',
                    'users.nombre as nombre',
                    'users.apellido as apellido',
                    'users.rut as rut'
                    )
            ->get();


        $region=DB::table('anuncio as a')
         ->join ('region as r', 'r.REGION_ID', '=' , 'a.region')
         ->select('r.REGION_NOMBRE',DB::raw('count(a.region) as cantidad'),DB::raw('sum(total) as total'))
         ->groupBy('r.REGION_NOMBRE')
         ->get();
        
        //DB::table('user_visits')->groupBy('user_id')->count();

      return view('usuarios.gestion', ["secretarias" => $secretarias,"region"=>$region]);


    }

/*

    public function tarjeta_store(Request $request){
      $tarjeta = new Tarjeta;
      $tarjeta->id_cliente=$request->get('id_cliente');
      $tarjeta->num_tarjeta=$request->get('num_tarjeta');
      $tarjeta->c_seguridad=$request->get('c_seguridad');
      $tarjeta->mes=$request->get('mes');
      $tarjeta->year= $request->get('year');
      $tarjeta->nombre= $request->get('nombre');
      $tarjeta->apellidos= $request->get('apellidos');
      $tarjeta->save(); 

      return Redirect::to('/');
    }
*/

}
