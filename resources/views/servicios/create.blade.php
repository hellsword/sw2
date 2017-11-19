@extends('layouts.nueva')
@section('contenido')

<style type="text/css">
    .imagen {
      border: thick solid #bec0c4;
    }
</style>

    <div class="pagetitle">
        <a href="/"><h1>MUMEFLET</h1></a> <span>Creación de nuevo anuncio</span>
    </div><!--pagetitle-->

    <!-- CAMBIAR POR LOS DATOS PARA CREAR UN ANUNCIO -->
    <div class="maincontent" align="center">
        <div class="contentinner">
                <div class="widgetcontent" style="width: 80%; text-align: left;" >

                    <!-- START OF DEFAULT WIZARD -->
                    {!!Form::open(array('url'=>'servicios', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'formu', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}
                   
                    <div id="wizard" class="wizard">
                        <br />
                        <ul class="hormenu">
                            <li>
                                <a href="#wiz1step1">
                                    <span class="h2">Paso 1</span>
                                    <span class="label">Información Básica</span>
                                </a>
                            </li>
                            <li>
                                <a href="#wiz1step2">
                                    <span class="h2">Paso 2</span>
                                    <span class="label">Información Avanzada</span>
                                </a>
                            </li>
                            <li>
                                <a href="#wiz1step3">
                                    <span class="h2">Paso 3</span>
                                    <span class="label">Información de Pago</span>
                                </a>
                            </li>
                        </ul>
                                                    
                        <div id="wiz1step1" class="formwiz">
                            <h4 class="widgettitle">Paso 1: Información Básica</h4>
                            
                                <p>
                                    <label>Título</label>
                                    <span class="field"><input type="text" name="titulo" id="titulo" class="input-xxlarge" required="" placeholder="Escoja el título que tendrá su anuncio" /></span>
                                </p>

                                <p>
                                    <label>Tipo servicio</label>
                                        <select name="tipo" id="tipo" class="uniformselect" onchange="cambio_tipo()" required="">
                                          <option value="humano" disabled style="background-color: pink" >Servicio personas</option>
                                            <option value="mecanico" >Mecánico</option>
                                            <option value="otros_per" >Otros servicios</option>
                                          <option value="vehiculo" disabled="" style="background-color: pink" >Servicio vehículos</option>
                                            <option value="transporte" >Transportes/Mudanzas</option>
                                            <option value="arriendo" >Arriendo</option>
                                        </select>
                                </p>



                                <h4 class="widgettitle">Ubicación del servicio</h4>

                                <p>
                                    <label>Región</label>
                                    <span class="field">
                                    <select name="region" id="region" class="uniformselect" required="" onclick="provinciaP()">
                                    @foreach($regiones as $region)
                                    <option>{{$region -> REGION_NOMBRE}}</option>
                                    @endforeach
                                    </select>
                                    </span>
                                </p>
                                  <div id="provincia">
                                <p>
                                 
                                    <div id="cambio_provincia">
                                    
                              
                                </div>
                            </div>
                                  </p>

                                <p>
                                
                               <label>Comuna:</label>
                                <span class="field"><input type="text" id="comuna" name="comuna" class="input-xxlarge" /></span>

                                  </p>

                                
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                            <h4 class="widgettitle">Paso 2: Información Avanzada</h4>
                                
                            <div id="cambia_servicio">
                                <p>
                                    <label>RUT</label>
                                    <span class="field"><input type="text" name="rut" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Nombre</label>
                                    <span class="field"><input type="text" name="nombre" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Apellido</label>
                                    <span class="field"><input type="text" name="apellido" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Profesión</label>
                                    <span class="field"><input type="text" name="profesion" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Años de experiencia</label>
                                    <span class="field"><input type="text" name="years" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Curriculum</label>
                                    <span class="field"><input type="text" name="curriculum" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Descripción: (Agregue aquí toda la información adicional para su anuncio)</label>
                                    <span class="field"><textarea cols="80" rows="5" class="span6" name="descripcion"></textarea></span>
                                </p>
                                <p>
                                    <label>Defina el precio de su servicio</label>
                                    <span class="field"><input type="text" name="precio_serv" class="input-xxlarge" /></span>
                                </p>
                                
                                <p>
                                <label>Subir Imagenes:</label>
                                <!-- VER LA PROPIEDAD multiple PARA AGREGAR VARIOS ARCHIVOS -->
                                <span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" /></span>
                                </p>


                                <div id="imagenes"></div>
                               

                            </div>
                                                                                               
                        </div><!--#wiz1step2-->
                        
                        <div id="wiz1step3">
                            <h4 class="widgettitle">Paso 3: Información de Pago</h4>
                            <div class="par terms" style="padding: 0 20px;">

                                <div class="tabcontent">
                                    <p>
                                        <label>Modo de pago</label>
                                           
                                                <select name="modo_pago" id="modo_pago" class="uniformselect"  onclick="modo_pago1()">
                                                
                                                    <option value="tarjeta" >Tarjeta de crédito</option>
                                                    <option value="efectivo" >Efectivo</option>
                                                </select>
                                            
                                    </p>
                                </div><br>
                            <div id="pagos">

                                  <div id="cambio_pago">

                                
                            </div></div>

                        </div><!--#wiz1step3-->
                        
                    </div><!--#wizard-->
                    {!!Form::close()!!}

                    <!-- END OF DEFAULT WIZARD -->
                </div><!--widgetcontent-->  
                <div align="right">
                <button onclick="location.href = '/';" class="btn btn-danger" >Volver</button>
                </div>
            </div>
    </div>
    </div>

    <div class="clearfix"></div>
    
    <div class="footer">
        <div class="footerleft">Katniss Premium Admin Template v1.0</div>
        <div class="footerright">&copy; ThemePixels - <a href="http://twitter.com/themepixels">Follow me on Twitter</a> - <a href="http://dribbble.com/themepixels">Follow me on Dribbble</a></div>
    </div><!--footer-->

    
    
<script type="text/javascript">
    jQuery(document).ready(function(){
        // Smart Wizard     
        jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard4').smartWizard({onFinish: onFinishCallback});
        
        function onFinishCallback(){
            document.formu.submit();
        } 
        
        jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
        
        jQuery('select, input:checkbox').uniform();

    });

 function provinciaP() {
        //Limpia el contenido del <div> con id="cambia_servicio"
        var cambio_provincia = document.getElementById("cambio_provincia");   
        cambio_provincia.parentNode.removeChild(cambio_provincia);

        var region = document.getElementById("region").value;     //Obtiene el tipo seleccionado
        
      if (region == 'Arica y Parinacota'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Arica</option>'+
                                    '<option>Parinacota</option>'+  
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        
        }else if(region == 'Tarapacá'){
              
            var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Iquique</option>'+
                                    '<option>Tamarugal</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Antofagasta'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Antofagasta</option>'+
                                    '<option>El Loa</option>'+
                                    '<option>Tocopilla</option>'+
                                    '<option>Taltal</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Atacama'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Copiapó</option>'+
                                    '<option>Chañaral</option>'+
                                    '<option>Huasco</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Coquimbo'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Elqui</option>'+
                                    '<option>Choapa</option>'+
                                    '<option>Limarí</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Valparaíso'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Valparaíso</option>'+
                                    '<option>Isla de Pascua</option>'+
                                    '<option>Los Andes</option>'+
                                    '<option>Petorca</option>'+
                                    '<option>Quillota</option>'+
                                    '<option>San Antonio</option>'+
                                    '<option>Marga Marga</option>'+

                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región del Libertador Gral. Bernardo O’Higgins'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Cachapoal</option>'+
                                    '<option>Cardenal Caro</option>'+
                                    '<option>Colchagua</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región del Maule'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Talca</option>'+
                                    '<option>Cauquenes</option>'+
                                    '<option>Curepto</option>'+
                                    '<option>Curicó</option>'+
                                    '<option>Linares</option>'+     
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región del Biobío'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Concepción</option>'+
                                    '<option>Arauco</option>'+
                                    '<option>Biobío</option>'+
                                    '<option>Ñuble</option>'+

                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región de la Araucanía'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Cautín</option>'+
                                    '<option>Malleco</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región de Los Lagos'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Valdivia</option>'+
                                    '<option>Ranco</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región Aisén del Gral. Carlos Ibáñez del Campo'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Coyhaique</option>'+
                                    '<option>Aisén</option>'+
                                     '<option>Capitán Prat</option>'+
                                    '<option>General Carrera</option>'+

                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región de Magallanes y de la Antártica Chilena'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Magallanes</option>'+
                                    '<option>Antártica Chilena</option>'+
                                     '<option>Tierra del Fuego</option>'+
                                    '<option>Ultima Esperanza</option>'+
                                    
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región Metropolitana de Santiago'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Santiago</option>'+
                                    '<option>Cordillera</option>'+
                                     '<option>Chacabuco</option>'+
                                    '<option>Maipo</option>'+
                                    '<option>Melipilla</option>'+
                                    '<option>Talagante</option>'+
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región de Los Ríos'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Llanquihue</option>'+
                                    '<option>Chiloé</option>'+
                                     '<option>Osorno</option>'+
                                    '<option>Palena</option>'+
                                   
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }else if (region == 'Región de Ñuble'){
              var str = '<div id="cambio_provincia">'+
                                '<label>Provincia</label><br>'+
                                    '<span class="field" >'+
                                   '<select name="provincia" id="provincia" class="uniformselect" required="">'+
                                    '<option>Diguillín</option>'+
                                    '<option>Itata</option>'+
                                     '<option>Punilla</option>'+ 
                                    '</select>'+
                                    '</span>'+
                                    '</div>';
         document.getElementById('provincia').innerHTML = str;
        }
    }


       //Escoger modo de pago
        function modo_pago1(){
            
            var cambio_pago = document.getElementById("cambio_pago");   
             cambio_pago.parentNode.removeChild(cambio_pago);
         
             var tipoPago = document.getElementById("modo_pago").value;     //Obtiene el tipo seleccionado
             if(tipoPago == 'tarjeta'){
                var str = '<div id="cambio_pago">'+
                                '<label>Pago con Tarjeta</label><br>'+
                                    '<p>'+
                                        '<label>N° Tarjeta: </label>'+
                                        '<span class="field"><input id="num_tarjeta" type="text" name="num_tarjeta" class="input-xxlarge" onchange="detecta_tarjeta()" value="" required autofocus /></span>'+
                                    '</p>'+

                                    '<p>'+
                                        '<label>Tipo Tarjeta: </label>'+
                                        '<span class="field"><input id="tarjeta" type="text" name="tarjeta" class="input-xxlarge" value="" autofocus readonly /></span>'+
                                    '</p>'+

                                     '<p>'+
                                        '<label>Fecha de caducidad: </label><div id="row-fluid" class="row-fluid">'+
                                            '<div class="span1"><input id="mes" type="text" class="form-control" name="mes" value="" required placeholder="MM"></div>'+
                                            '<div class="span1"><input id="year" type="text" class="form-control" name="year" value="" required placeholder="YY"></div>'+
                                            '<div class="span1"><input id="c_seguridad" type="text" class="form-control" name="c_seguridad" value="" required placeholder="CVV"></div> <div class="span1"><i class="fa fa-credit-card" aria-hidden="true"></i></div>'+
                                    '</div></p>'+

                                    '<p>'+
                                        '<label>Nombre del titular: </label>'+
                                            '<div class="4u"><input id="nombre" type="text" class="input-xxlarge" name="nombre" value="" required placeholder="Nombre"></div>'+
                                    '</p>'+
                                    '<p>'+
                                            '<label>Apellidos del titular: </label>'+
                                            '<div class="4u"><input id="apellidos" type="text" class="input-xxlarge" name="apellidos" value="" required placeholder="Apellidos"></div>'+
                                    '</p><br>'+

                                    '<p>'+
                                        '<label>Duración del anuncio (meses): </label>'+
                                        '<span class="field"><input type="text" id="tiempo" name="tiempo" class="input-small input-spinner" onchange="calcula_total()"/></span>'+
                                    '</p>'+

                                    '<p>'+
                                        '<label>Total: </label>'+
                                        '<span class="field"><input type="text" id="total" name="" class="input-xxlarge" value="" readonly/></span>'+
                                    '</p>'+

                                '</div><br>';

                document.getElementById('pagos').innerHTML = str;

        }else if(tipoPago == 'efectivo'){
            document.getElementById('pagos').innerHTML =  
            '<div id="cambio_pago">'+

                               
                     
                                        '<label>Pago en efectivo</label><br>'+        
                 
                                    '<p>'+
                                        '<label>Duración del anuncio (meses): </label>'+
                                        '<span class="field"><input type="text" id="tiempo2" name="tiempo2" class="input-small input-spinner" onchange="calcula_total2()"/></span>'+
                                    '</p>'+
                                    '<p>'+
                                        '<label>Total: </label>'+
                                        '<span class="field"><input type="text" id="total2" name="total2" class="input-xxlarge" value="" readonly/></span>'+
                                    '</p>'+
                                '</div><br>';

    }
}


//VISTA PREVIA DE IMAGENES
var loadFile = function(event) {

    var imagenes = document.getElementById("imagenes");   
    imagenes.parentNode.removeChild(imagenes);
    document.getElementById('cambia_servicio').insertAdjacentHTML( 'beforeend', '<div id="imagenes"></div>' ); 

    //Obtiene cantidad de imagenes
    var limite = document.getElementById("imagen").files;
    //alert(limite.length);

    //document.getElementById('imagenes').innerHTML = '<div id="row-fluid" class="row-fluid">';

    var str = '<br> <h4 class="widgettitle">VISTA PREVIA:</h4> <div id="row-fluid" class="row-fluid">';
    var cont = 0;
    for (var i = 0; i < limite.length; i++) {
        str = str+'<div class="span4"><img class="imagen" id="output'+i+'" /> </div>';

        cont = cont+1;

        if(cont == 3){
            cont = 0;
            str = str+'</div><br><hr><br> <div id="row-fluid" class="row-fluid">';
        }

    }
    str = str+'</div><br><br>';

    document.getElementById('imagenes').innerHTML = str;

    for (var i = 0; i < limite.length; i++) {
        var output = document.getElementById('output'+i);
        output.src = URL.createObjectURL(event.target.files[i]);
    }
    
};


 function detecta_tarjeta(){
            var n_tarjeta = document.getElementById("num_tarjeta");
            var tarjeta = document.getElementById("tarjeta");
            if(n_tarjeta.value[0] == 4)
                tarjeta.value = "VISA";
            else if(n_tarjeta.value[0] == 5)
                tarjeta.value = "MASTERCARD";
            else
                tarjeta.value = "TARJETA NO VÁLIDA";
}



 function calcula_total(){
            var tiempo = document.getElementById("tiempo");
            var total = document.getElementById("total");
            
            total.value = tiempo.value*5290;
        }

 function calcula_total2(){
            var tiempo = document.getElementById("tiempo2");
            var total = document.getElementById("total2");
            
            total.value = tiempo.value*5290;
        }


   


    //$("p").append(" <b>Appended text</b>.");

    function cambio_tipo() {
        //Limpia el contenido del <div> con id="cambia_servicio"
        var cambia_servicio = document.getElementById("cambia_servicio");   
        cambia_servicio.parentNode.removeChild(cambia_servicio);

        var tipo = document.getElementById("tipo").value;     //Obtiene el tipo seleccionado
        
        if(tipo == 'mecanico' || tipo == 'otros_per'){
            document.getElementById('wiz1step2').innerHTML = 
            '<div id="cambia_servicio">'+
                '<h4 class="widgettitle">Paso 2: Información Avanzada</h4>'+
                '<p>'+
                    '<label>RUT</label>'+
                    '<span class="field"><input type="text" name="rut" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Nombre</label>'+
                    '<span class="field"><input type="text" name="nombre" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Apellido</label>'+
                    '<span class="field"><input type="text" name="apellido" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Profesión</label>'+
                    '<span class="field"><input type="text" name="profesion" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Años de experiencia</label>'+
                    '<span class="field"><input type="text" name="years" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Curriculum</label>'+
                    '<span class="field"><input type="text" name="curriculum" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Descripción: (Agregue aquí toda la información adicional para su anuncio)</label>'+
                    '<span class="field"><textarea cols="80" rows="5" class="span6" name="descripcion"></textarea></span>'+
                '</p>'+
                '<p>'+
                    '<label>Precio de su servicio</label>'+
                    '<span class="field"><input type="text" name="precio_serv" class="input-xxlarge" /></span>'+
                '</p>'+
                '<label>Subir Imagenes:</label>'+
                '<span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" /></span>'+
                '</p>'+
                '<div id="imagenes"></div>'+
            '</div>';
        }
        else if(tipo == 'arriendo' || tipo == 'transporte'){
            document.getElementById('wiz1step2').innerHTML = 
            '<div id="cambia_servicio">'+
                '<h4 class="widgettitle">Paso 2: Información Avanzada</h4>'+
                '<p>'+
                    '<label>Patente</label>'+
                    '<span class="field"><input type="text" name="patente" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Categoria</label>'+
                    '<span class="field"><input type="text" name="categoria" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Capacidad</label>'+
                    '<span class="field"><input type="text" name="capacidad" class="input-xxlarge" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Descripción: (Agregue aquí toda la información adicional para su anuncio)</label>'+
                    '<span class="field"><textarea cols="80" rows="5" class="span6" name="descripcion"></textarea></span>'+
                '</p>'+
                '<p>'+
                    '<label>Precio de su servicio</label>'+
                    '<span class="field"><input type="text" name="precio_serv" class="input-xxlarge" /></span>'+
                '</p>'+
                '<label>Subir Imagenes:</label>'+
                '<span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" /></span>'+
                '</p>'+
                '<div id="imagenes"></div>'+
            '</div>';
        }
    }
</script>

@stop
