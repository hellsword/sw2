@extends('layouts.nueva')
@section('contenido')

<!-- EDITOR DE TEXTO -->
<script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>

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
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria -> nombre}}" disabled style="background-color: pink" >{{$categoria -> nombre_completo}}</option>
                                            @foreach($sub_categorias as $sub_categoria)
                                                @if($sub_categoria->id_categoria == $categoria->id_categoria)
                                                    <option value="{{$sub_categoria -> id_categoria}}|{{$sub_categoria -> sub_categoria}}" >{{$sub_categoria -> nombre_completo}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </select>
                                </p>



                                <h4 class="widgettitle">Ubicación del servicio</h4>

                                <p>
                                    <label>Región</label>
                                    <select class="form-control" id="region" name="region" required="">
                                        <option value="" >Todos</option>
                                        @foreach($regiones as $region)
                                            <option value="{{$region -> REGION_ID}}" >{{$region -> REGION_NOMBRE}}</option>
                                        @endforeach
                                    </select> 
                                </p>
                                <p>
                                  <label>Provincia</label>
                                  <select class="form-control" id="provincia" name="provincia" required="">
                                        <option value="" >-</option>
                                    </select> 
                                <p>
                                    <label>Comuna</label>
                                    <select class="form-control" id="comuna" name="comuna" required="">
                                        <option value="" >-</option>
                                    </select> 
                                </p>


                                <h4 class="widgettitle">Descripción de su anuncio</h4>

                                <p>
                                <span class="field"> 
                                    <div class="panel-body">
                                        <textarea class="ckeditor" rows="10" cols="80" id="descripcion" name="descripcion">
                                           
                                        </textarea>
                                   </div>
                                </span> 
                                </p>
                                <p>
                                    <label>Defina el precio de su servicio</label>
                                    <span class="field"><input type="text" name="precio_serv" id="precio_serv" class="input-xxlarge" required="" placeholder="40990" onkeypress="return validaNumericos(event)" /></span>
                                </p>

                                
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                            <h4 class="widgettitle">Paso 2: Información Avanzada</h4>
                                
                            <div id="cambia_servicio">
                                <p>
                                    <label>RUT</label>
                                    <span class="field"><input type="text" name="rut" id="rut" class="input-xxlarge" required="" placeholder="18.355.344-2" /></span>
                                </p>
                                <p>
                                    <label>Nombre</label>
                                    <span class="field"><input type="text" name="nombre" id="nombre" class="input-xxlarge" required="" placeholder="Roberto"/></span>
                                </p>
                                <p>
                                    <label>Apellido</label>
                                    <span class="field"><input type="text" name="apellido" id="apellido" class="input-xxlarge" required="" placeholder="Rodriguez"/></span>
                                </p>
                                <p>
                                    <label>Profesión</label>
                                    <span class="field"><input type="text" name="profesion" id="profesion" class="input-xxlarge" required="" placeholder="Mecánico"/></span>
                                </p>
                                <p>
                                    <label>Años de experiencia</label>
                                    <span class="field"><input type="text" name="years" id="years" class="input-xxlarge" required="" placeholder="12" onkeypress="return validaNumericos(event)" /></span>
                                </p>
                                <p>
                                    <label>Curriculum</label>
                                    <span class="field"><input type="text" name="curriculum" id="curriculum" class="input-xxlarge" required="" placeholder="mecánico naval, magister en mecánica automotriz"/></span>
                                </p>

                                <p>
                                    <label>Subir Imagenes (sólo formato jpeg):</label>
                                    <!-- VER LA PROPIEDAD multiple PARA AGREGAR VARIOS ARCHIVOS -->
                                    <span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" required=""/></span>
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
                                           
                                                <select name="modo_pago" id="modo_pago" class="uniformselect"  onclick="modo_pago1()" required="">
                                                    <option value="efectivo" >Efectivo</option>
                                                    <option value="tarjeta" >Tarjeta de crédito</option>
                                                </select>
                                            
                                    </p>
                                </div><br>
                            <div id="pagos">

                                  <div id="cambio_pago">

                                        <label>Pago en efectivo</label><br>        
                 
                                    <p>
                                        <label>Duración del anuncio (meses): </label>
                                        <span class="field"><input type="text" id="tiempo" name="tiempo" class="input-small input-spinner" onchange="calcula_total2()" required="" placeholder="4" onkeypress="return validaNumericos(event)" /></span>'
                                    </p>
                                    <p>
                                        <label>Total: </label>
                                        <span class="field"><input type="text" id="total" name="total" class="input-xxlarge" value="" readonly/></span>
                                    </p>
                                </div><br>;

                                
                            </div>

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

            var valido = 0;

            if(document.getElementById("titulo").value == '' || document.getElementById("region").value == ''
                || document.getElementById("provincia").value == '' || document.getElementById("comuna").value == '' 
                || document.getElementById("descripcion").value == '' || document.getElementById("precio_serv").value == ''){
                valido = 1;
            }
            else if (document.getElementById("tipo").value == 'mecanico' || document.getElementById("tipo").value == 'otros_per') {
                if(document.getElementById("rut").value == '' || document.getElementById("nombre").value == ''
                || document.getElementById("apellido").value == '' || document.getElementById("profesion").value == '' 
                || document.getElementById("years").value == '' || document.getElementById("curriculum").value == ''
                || document.getElementById("imagen").value == ''){
                    valido = 2;
                }
            }
            else if (document.getElementById("tipo").value == 'arriendo' || document.getElementById("tipo").value == 'transporte') {
                if(document.getElementById("patente").value == '' || document.getElementById("categoria").value == ''
                || document.getElementById("capacidad").value == '' || document.getElementById("imagen").value == ''){
                    valido = 2;
                }
            }
            else if(document.getElementById("total") == null ){
                valido = 4;
            }
            else if (document.getElementById("modo_pago").value == 'tarjeta' ) {
                if(document.getElementById("num_tarjeta").value == '' || document.getElementById("mes").value == ''
                || document.getElementById("year").value == '' || document.getElementById("c_seguridad").value == '' 
                || document.getElementById("nombre").value == '' || document.getElementById("apellidos").value == ''
                || document.getElementById("tiempo").value == '' || document.getElementById("total").value == ''){
                    valido = 3;
                }
            }
            else if (document.getElementById("modo_pago").value == 'efectivo' ) {
                if(document.getElementById("tiempo").value == '' || document.getElementById("total").value == '' ){
                    valido = 3;
                }
            }



            if (valido == 1) {
                swal(
                  'Oops...',
                  '¡Falta rellenar algunos campos en el Paso 1!',
                  'error'
                )
            }
            else if (valido == 2) {
                swal(
                  'Oops...',
                  '¡Falta rellenar algunos campos en el Paso 2!',
                  'error'
                )
            }
            else if (valido == 3) {
                swal(
                  'Oops...',
                  '¡Falta rellenar algunos campos en el Paso 3!',
                  'error'
                )
            }
            else if (valido == 4) {
                swal(
                  'Oops...',
                  '¡Debe seleccionar un modo de pago en el Paso 3!',
                  'error'
                )
            }
            else
                document.formu.submit();
        } 
        
        jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
        
        jQuery('select, input:checkbox').uniform();

    });



    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
          return true;
         }
         return false;        
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
                                        '<span class="field"><input id="num_tarjeta" type="text" name="num_tarjeta" class="input-xxlarge" onchange="detecta_tarjeta()" value="" required autofocus required="" placeholder="4621081012003829"/></span>'+
                                    '</p>'+

                                    '<p>'+
                                        '<label>Tipo Tarjeta: </label>'+
                                        '<span class="field"><input id="tarjeta" type="text" name="tarjeta" class="input-xxlarge" value="" autofocus readonly required="" /></span>'+
                                    '</p>'+

                                     '<p>'+
                                        '<label>Fecha de caducidad: </label><div id="row-fluid" class="row-fluid">'+
                                            '<div class="span1"><input id="mes" type="text" class="form-control" name="mes" value="" required placeholder="MM" maxlength="2" onkeypress="return validaNumericos(event)" ></div>'+
                                            '<div class="span1"><input id="year" type="text" class="form-control" name="year" value="" required placeholder="YY" maxlength="2" onkeypress="return validaNumericos(event)" ></div>'+
                                            '<div class="span1"><input id="c_seguridad" type="text" class="form-control" name="c_seguridad" value="" required placeholder="637" maxlength="3" onkeypress="return validaNumericos(event)" ></div> <div class="span1"><i class="fa fa-credit-card" aria-hidden="true"></i></div>'+
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
                                        '<span class="field"><input type="text" id="tiempo" name="tiempo" class="input-small input-spinner" onchange="calcula_total()" required="" placeholder="12" onkeypress="return validaNumericos(event)" /></span>'+
                                    '</p>'+

                                    '<p>'+
                                        '<label>Total: </label>'+
                                        '<span class="field"><input type="text" id="total" name="total" class="input-xxlarge" value="" readonly/></span>'+
                                    '</p>'+

                                '</div><br>';

                document.getElementById('pagos').innerHTML = str;

        }else if(tipoPago == 'efectivo'){
            document.getElementById('pagos').innerHTML =  
            '<div id="cambio_pago">'+

                               
                     
                                        '<label>Pago en efectivo</label><br>'+        
                 
                                    '<p>'+
                                        '<label>Duración del anuncio (meses): </label>'+
                                        '<span class="field"><input type="text" id="tiempo" name="tiempo" class="input-small input-spinner" onchange="calcula_total2()" required="" placeholder="4" onkeypress="return validaNumericos(event)" /></span>'+
                                    '</p>'+
                                    '<p>'+
                                        '<label>Total: </label>'+
                                        '<span class="field"><input type="text" id="total" name="total" class="input-xxlarge" value="" readonly/></span>'+
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
            var tiempo = document.getElementById("tiempo");
            var total = document.getElementById("total");
            
            total.value = tiempo.value*5290;
        }

   


    //$("p").append(" <b>Appended text</b>.");

    function cambio_tipo() {
        //Limpia el contenido del <div> con id="cambia_servicio"
        var cambia_servicio = document.getElementById("cambia_servicio");   
        cambia_servicio.parentNode.removeChild(cambia_servicio);

        var tipo = document.getElementById("tipo").value;     //Obtiene el tipo seleccionado
        var temp = tipo.split('|');
        tipo = temp[1];
        var str = '';
        
        if(tipo == 'mecanico' || tipo == 'otros_per'){
            str = str+
            '<div id="cambia_servicio">'+
                '<h4 class="widgettitle">Paso 2: Información Avanzada</h4>'+
                '<p>'+
                    '<label>RUT</label>'+
                    '<span class="field"><input type="text" name="rut" id="rut" class="input-xxlarge" required="" placeholder="18.355.344-2" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Nombre</label>'+
                    '<span class="field"><input type="text" name="nombre" id="nombre" class="input-xxlarge" required="" placeholder="Roberto"/></span>'+
                '</p>'+
                '<p>'+
                    '<label>Apellido</label>'+
                    '<span class="field"><input type="text" name="apellido" id="apellido" class="input-xxlarge" required="" placeholder="Rodriguez"/></span>'+
                '</p>'+
                '<p>'+
                    '<label>Profesión</label>'+
                    '<span class="field"><input type="text" name="profesion" id="profesion" class="input-xxlarge" required="" placeholder="Mecánico"/></span>'+
                '</p>'+
                '<p>'+
                    '<label>Años de experiencia</label>'+
                    '<span class="field"><input type="text" name="years" id="years" class="input-xxlarge" required="" placeholder="12" onkeypress="return validaNumericos(event)" /></span>'+
                '</p>'+
                '<p>'+
                    '<label>Curriculum</label>'+
                    '<span class="field"><input type="text" name="curriculum" id="curriculum" class="input-xxlarge" required="" placeholder="mecánico naval, magister en mecánica automotriz"/></span>'+
                '</p>'+
                '<p>'+
                    '<label>Subir Imagenes (sólo formato jpeg):</label>'+
                    '<span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" required=""/></span>'+
                '</p>'+


                '<div id="imagenes"></div>'+
            '</div>';
        }
        else if(tipo == 'arriendo' || tipo == 'transporte'){
            str = str+
            '<div id="cambia_servicio">'+
                '<h4 class="widgettitle">Paso 2: Información Avanzada</h4>'+
                '<p>'+
                    '<label>Patente</label>'+
                    '<span class="field"><input type="text" name="patente" id="patente" class="input-xxlarge" required="" placeholder="ZC-4566"/></span>'+
                '</p>'+
                '<p>'+
                    '<label>Categoria</label>'+
                    '<span class="field">'+
                        '<select class="form-control" id="categoria" name="categoria" required="">'+
                        @foreach($categoria_vehiculos as $cat_vehiculo)
                            '<option value="{{$cat_vehiculo -> cod}}" >{{$cat_vehiculo -> nombre}}</option>'+
                        @endforeach
                        '</select>'+
                    '</span>'+
                '</p>'+
                '<p>'+
                    '<label>Capacidad</label>'+
                    '<span class="field"><input type="text" name="capacidad" id="capacidad" class="input-xxlarge" required="" placeholder="Ej: 100kg, 4 personas, etc."/></span>'+
                '</p>'+
                '<p>'+
                    '<label>Subir Imagenes (sólo formato jpeg):</label>'+
                    '<span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" required=""/></span>'+
                '</p>'+


                '<div id="imagenes"></div>'+
            '</div>';
        }

        document.getElementById('wiz1step2').innerHTML = str;
    }
</script>

@stop
