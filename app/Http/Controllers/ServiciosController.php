<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Alert;

//Modelos
use App\Imagenes;
use App\Persona;
use App\Anuncio;
use App\Vehiculo;
use App\Orden;
use App\Forma_pago;
use App\Secretaria;

use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;


class ServiciosController extends Controller
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
       
        //return $request->get('vehiculo');

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
            ->where('f.id_foto', '=', '0')
            ->where('a.condicion', '=', '1')
            ->where('o.fecha_venc', '>=', $fecha_actual)
            ->where(\DB::raw("CONCAT(a.titulo, ' ', a.tipo_servicio, ' ', a.descripcion)"), 'LIKE', '%'.$query.'%')     //BUSCA POR EL TITULO DEL ANUNCIO
            ->where('a.tipo_servicio', 'LIKE', '%'.$request->get('sub_categoria').'%')
            ->where('a.comuna', 'LIKE', '%'.$request->get('region').'%')
            ->where('a.comuna', 'LIKE', '%'.$request->get('provincia').'%')
            ->where('a.comuna', 'LIKE', '%'.$request->get('comuna').'%')
            ->where('v.categoria', '=', $request->get('vehiculo'))
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
            ->paginate(15);
        }
        else{   //Carga un servicio con personas  
            $servicios = DB::table('anuncio as a')
            ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
            ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
            ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
            ->join ('region', 'region.REGION_ID', '=' , 'a.region')
            ->join ('provincia', 'provincia.PROVINCIA_ID', '=' , 'a.provincia')
            ->join ('comuna', 'comuna.COMUNA_ID', '=' , 'a.comuna')
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

    public function create(Guard $auth){

        $this->middleware('auth');
        $this->auth =$auth;

         $regiones=DB::table('region')->get();

         $provincias = DB::table('provincia')->get();

         $comunas = DB::table('comuna')->get();

         $categorias=DB::table('categorias')->get();

         $sub_categorias=DB::table('sub_categorias')->get();

         $categoria_vehiculos=DB::table('categoria_vehiculo')->get();

        return view('servicios.create',['regiones'=> $regiones,'provincias'=> $provincias, 'comunas'=> $comunas, 'categorias'=> $categorias, 'sub_categorias'=> $sub_categorias, 'categoria_vehiculos'=> $categoria_vehiculos]);
    }

    public function store(Request $request, Guard $auth){ 


        $tipo = explode("|",$request->get('tipo'));

        $this->middleware('auth');
        $this->auth =$auth;

        $tipoServicio= $tipo[1]; //captura el tipo de servicio

      $tituloAnuncio=$request->get('titulo'); //captura el titulo del anuncio
      $duracion=$request->get('tiempo2'); //captura el titulo del anuncio


      $totalPagar=$request->get('total');
      $tipoPago=$request->get('modo_pago'); //captura el tipo de pago
      
       $duracionA=$request->get('tiempo');

      try {

            DB::beginTransaction();

            //Guarda los datos del anuncio
            $anuncio = new Anuncio;
            $lastValue = DB::table('anuncio')->orderBy('id_anuncio', 'desc')->first();
            if(count($lastValue) < 1){
              $anuncio->id_anuncio = 1;   
            }else{
              $anuncio->id_anuncio = $lastValue->id_anuncio + 1 ;
            }
            $anuncio->titulo = $request->get('titulo');
            $anuncio->descripcion = $request->get('descripcion');
            $anuncio->condicion = 0;
            $anuncio->precio_serv = $request->get('precio_serv');
            $anuncio->region = $request->get('region');
            $anuncio->provincia = $request->get('provincia');
            $anuncio->comuna = $request->get('comuna');
            $anuncio->tipo_servicio = $tipo[1];
            $anuncio->id_categoria = $tipo[0];
            $anuncio->total = $request->get('total');
           
            if($tipoPago=='efectivo'){
                $anuncio->forma_pago = 1;// 1 si es en efectivo 
            }else{
                $anuncio->forma_pago = 0; // 0 si es con tarjeta,lo dejaremos en 2 lo que significa que ya pago automaticamente
            }


            //Ingresa los datos de la persona o el vehiculo
            if($tipoServicio == 'mecanico' || $tipoServicio == 'otros_per'){

                $persona = new Persona;
                $persona->rut= Input::get('rut');
                $persona->nombre          = Input::get('nombre');
                $persona->apellido          = Input::get('apellido');
                $persona->profesion            = Input::get('profesion');
                $persona->años_experiencia  = Input::get('years');
                $persona->curriculum         = Input::get('curriculum');
                $persona->save();

                $anuncio->rut = $request->get('rut');
                $anuncio->patente = null;
            }
            else{

                $vehiculo = new Vehiculo;
                $vehiculo->patente= Input::get('patente');
                $vehiculo->categoria  = Input::get('categoria');
                $vehiculo->capacidad  = Input::get('capacidad');
                $vehiculo->save();

                $anuncio->rut = null;
                $anuncio->patente = $request->get('patente');
            }

            $anuncio->save(); 


            //AGREGAR DATOS A TABLA FORMA_PAGO
            $pago = new Forma_pago;
            $lastValue = DB::table('forma_pago')->orderBy('num_pago', 'desc')->first();
            if(count($lastValue) < 1){
              $pago->num_pago = 1;   
            }else{
              $pago->num_pago = $lastValue->num_pago + 1 ;
            }
            $pago->modo = Input::get('modo_pago');

            $pago->fecha_pago = '';
           

            $pago->fecha_pago = date("Y-m-d H:i:s");

            $pago->save();  


            
            //Genera los datos de la orden
            $orden = new Orden;
            $orden->num_pago = $pago->num_pago; 
            $orden->id_anuncio = $anuncio->id_anuncio;
            $orden->id_cliente = $this->auth->user()->id;
            $orden->fecha = date("Y-m-d");
            $orden->precio_uni  = 5290;
            $orden->duracion = Input::get('tiempo');
            $lastValue = DB::table('secretaria')->orderBy('anuncios_pend', 'asc')->first();
            $orden->id_secretaria = $lastValue->id_secretaria;
            
            //vemos la fecha de vencimiento
            $orden->fecha_venc = date('Y-m-d', strtotime('+'.$duracionA.'month')) ;
            $orden->save();  

            //Actualiza los anuncios pendientes de una secretaria
            $id_secretaria = $orden->id_secretaria;
            Secretaria::where('id_secretaria', $id_secretaria)
              ->update(['anuncios_pend' => $lastValue->anuncios_pend+1]);


            //AQUI SE GUARDAN LAS FOTOS
            //Se crean los array de los siguientes datos:
            $file = Input::file('imagen');

            $cont = 0;

            //Se recorren y asignan los array
            while($cont < count($file)){

                /*
                $temp = file_get_contents($file[$cont] );
                $image = base64_encode($temp);

                $imagen = new Imagenes;
                $imagen->id_foto = $cont;
                $imagen->id_anuncio = $anuncio->id_anuncio;
                $imagen->foto = $image;
                $imagen->save();   

                $cont = $cont+1;
                */
                if ($file[$cont]->guessExtension() != 'jpeg') {
                    alert()->error('Las imágenes deben estar en formato jpeg')->persistent('Cerrar');
                    return Redirect::to('/servicios');
                }

                $aleatorio = str_random(50);
                $nombre = $aleatorio.'-'.$file[$cont]->getClientOriginalName();
                $path = public_path('uploads/'.$nombre);
                $url = '/uploads/'.$nombre;
                $imagen = Image::make($file[$cont]->getRealPath())->resize(1280, 820);
                $imagen->save($path);

                $imagen = new Imagenes;
                $imagen->id_foto = $cont;
                $imagen->id_anuncio = $anuncio->id_anuncio;
                $imagen->foto = $url;
                $imagen->save();   

                $cont = $cont+1;

            }


            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
        }


        if($tipoPago=='efectivo'){
            //GENERA UN PDF PARA LOS VEHICULOS
              $numero_aleatorio = rand(10456780,16456780); //generamos el numero del comprobante
               $fechaActual = date('d-m-Y'); //obtenemos la fecha
               //Incrementando 20 dias
              $mod_date = strtotime($fechaActual."+ 20 days");
              $fechaVencimiento=date("d-m-Y",$mod_date);


                $anuncio=DB::table('anuncio as a')
                ->where('a.titulo','=',$tituloAnuncio)     
                 ->get();



               $pdf = PDF::loadView('servicios.pdf', ["anuncio" => $anuncio,"total" => $totalPagar,"comprobante" => $numero_aleatorio,"fecha" => $fechaActual,"fechaV" => $fechaVencimiento,"duracion" => $duracion]);

               alert()->success('Su anuncio ha sido creado exitosamente.', '¡Felicidades!')->persistent('Cerrar');
               
               return $pdf->download('cupon.pdf');
        }
 
        alert()->success('Su anuncio ha sido creado exitosamente.', '¡Felicidades!')->persistent('Cerrar');
        return Redirect::to('/servicios');

    }

    public function show($id_anuncio, Guard $auth)
    {
        $this->middleware('auth');
        $this->auth =$auth;

        $servicio = DB::table('anuncio')->where('id_anuncio', $id_anuncio)->first();
        $imagenes = DB::table('fotos')->where('id_anuncio', $id_anuncio)->get();
        $orden = DB::table('orden')->where('id_anuncio', $id_anuncio)->first();
        $autor = DB::table('users')->where('id', $orden->id_cliente)->first();

        $face = DB::table('contacto')->where('id', $orden->id_cliente)->where('medio', 'facebook')->first();
        $fono = DB::table('contacto')->where('id', $orden->id_cliente)->where('medio', 'telefono')->first();

       $lugar = DB::table('anuncio as a')
            ->join ('region', 'a.region', '=' , 'region.REGION_ID')
            ->join ('provincia', 'a.provincia', '=' , 'provincia.PROVINCIA_ID')
            ->join ('comuna', 'a.comuna', '=' , 'comuna.COMUNA_ID')
            ->select('region.REGION_NOMBRE as region',
                    'provincia.PROVINCIA_NOMBRE as provincia',
                    'comuna.COMUNA_NOMBRE as comuna'
                    )
            ->first();

        if ($servicio->tipo_servicio == 'mecanico' || $servicio->tipo_servicio == 'otros_per') {
            
            $persona = DB::table('persona')->where('rut', $servicio->rut)->first();

            if($this->auth->user()){
                $favoritos = DB::table('favoritos')->where('id_cliente', $this->auth->user()->id)->get();
                return view("servicios.ver_anuncio", ['servicio' => $servicio, 'imagenes' => $imagenes, 'autor' => $autor, "favoritos" => $favoritos, "face" => $face, "fono" => $fono, "lugar" => $lugar, "persona" => $persona]);
            }
            else
                return view("servicios.ver_anuncio", ['servicio' => $servicio, 'imagenes' => $imagenes, 'autor' => $autor, "face" => $face, "fono" => $fono, "lugar" => $lugar, "persona" => $persona]);
        }
        else{

            $vehiculo = DB::table('vehiculo')->join ('categoria_vehiculo', 'categoria_vehiculo.cod', 'vehiculo.categoria')->where('patente', $servicio->patente)->first();

            if($this->auth->user()){
                $favoritos = DB::table('favoritos')->where('id_cliente', $this->auth->user()->id)->get();
                return view("servicios.ver_anuncio", ['servicio' => $servicio, 'imagenes' => $imagenes, 'autor' => $autor, "favoritos" => $favoritos, "face" => $face, "fono" => $fono, "lugar" => $lugar, "vehiculo" => $vehiculo]);
            }
            else
                return view("servicios.ver_anuncio", ['servicio' => $servicio, 'imagenes' => $imagenes, 'autor' => $autor, "face" => $face, "fono" => $fono, "lugar" => $lugar, "vehiculo" => $vehiculo]);
        }

    }



    public function destroy($id_anuncio)
    {

        try {

        DB::beginTransaction();

        $orden=DB::table('orden')->where('id_anuncio', '=', $id_anuncio)->select('id_secretaria as id_secretaria')->first();

        $secretaria=DB::table('secretaria')->where('id_secretaria', '=', $orden->id_secretaria)->select('anuncios_pend as anuncios_pend')->first();

            Secretaria::where('id_secretaria', $orden->id_secretaria)
                  ->update(['anuncios_pend' => $secretaria->anuncios_pend-1]);
      
        DB::table('anuncio')->where('id_anuncio', '=', $id_anuncio)->delete();

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      alert()->success('El anuncio ha sido eliminado.', '¡Listo!')->persistent('Cerrar');
      return Redirect::to('/servicios');


    }



  }