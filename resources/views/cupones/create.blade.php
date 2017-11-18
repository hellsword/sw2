@extends('layouts.inicial')
@section('contenido')

    <!-- CSS para slideshow de imagenes -->
    <link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">
    <!-- BOTONES -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<br><br><br>

  


    <div class="container">
        
        <div class="row">
            <div class="6u">
                <section class="special box">
                    
                    <div class="w3-content w3-display-container">
                        @foreach ($imagenes as $imagen)
                          <img class="mySlides" src="data:image/png;base64, {{$imagen -> foto}}" style="width:100%; height: 520px">
                        @endforeach
                      <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                      <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                    
                </section>
            </div>
            <div class="6u">
                <section class="special box">
                    
                    <div style="text-align: left">
                        <h3>{{$servicio -> titulo}}</h3>
                        <h5 style="color: blue"> Autor: {{$autor -> nombre}} {{$autor -> apellido}}</h5>
                        
                        Valoración: ★★★★★ 
                        <div style="border-top: 1px solid silver;"></div><br>

                        <h1 style="color: #DE5122">Precio: ${{$servicio -> precio_serv}}</h1><br>

                        <section style="background-color: #FAFAFA">
                            <p>Tipo de servicio: {{$servicio -> tipo_servicio}}</p>
                            Lugar:
                            <div style="border-top: 1px solid silver;"></div><br>
                            <p>&nbsp;&nbsp;&nbsp;Región: {{$servicio -> region}}</p>
                            <p>&nbsp;&nbsp;&nbsp;Provincia: {{$servicio -> provincia}}</p>
                            <p>&nbsp;&nbsp;&nbsp;Comuna: {{$servicio -> comuna}}</p>
                        </section>
 {!!Form::open(array('url'=>'cupones', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'formu', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}
                         <p>
                            <label>ID Anuncio:</label>
                              <input type="text" name="id_anuncio" value="{{$servicio -> id_anuncio}}" class="input-xxlarge" />
                          </p>
                          <p>
                                <label>Subir Cupon:</label>
                                <!-- VER LA PROPIEDAD multiple PARA AGREGAR VARIOS ARCHIVOS -->
                                <span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="*" multiple="" onchange="loadFile(event)" /></span>
                                </p>

                 <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                  <a href="/cupones" class="btn btn-danger">Cancelar</a>
            </div>
                             
 {!!Form::close()!!}
                    
                        
                    </div>
                </section>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="12u">
            <section class="special box">
                <p>Descripción: {{$servicio -> descripcion}}</p>
            </section>
            </div>
        </div>

    </div>


    <script>

    //SLIDESHOW PARA LAS IMAGENES
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }


    //FUNCION PARA MOSTRAR INFORMACION DE CONTACTO DEL ANUNCIANTE
    function mostrar(){
        document.getElementById('lista_contacto').style.display = 'block';
    }

    </script>


@stop