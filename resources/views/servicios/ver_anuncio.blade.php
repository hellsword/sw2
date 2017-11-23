@extends('layouts.inicial')
@section('contenido')

	<!-- CSS para slideshow de imagenes -->
	<link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">
	<!-- BOTONES -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<br><br><br>

	<?php $val = 0; ?>
	@if(Auth::check())
		@if(Auth::user()->id == $autor->id)
			<?php $val = 1; ?>
		@endif

		@foreach ($favoritos as $favorito)
			@if($servicio->id_anuncio == $favorito->id_anuncio)
				<?php $val = 1; ?>
			@endif
		@endforeach
	@endif
	


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
							<p>&nbsp;&nbsp;&nbsp;Región: {{$lugar -> region}}</p>
							<p>&nbsp;&nbsp;&nbsp;Provincia: {{$lugar -> provincia}}</p>
							<p>&nbsp;&nbsp;&nbsp;Comuna: {{$lugar -> comuna}}</p>
						</section>

						

						@if($val == 0)
							@if(Auth::check())
								{!!Form::open(array('url'=>'favoritos', 'method'=>'POST', 'class'=>'stdform', 'id'=>'formu', 'name'=>'formu', 'autocomplete'=>'off'))!!}
									<input type="hidden" name="id_anuncio" value="{{$servicio -> id_anuncio}}">
									<a class="w3-button w3-red w3-round-xlarge" href="javascript:;" onclick="document.getElementById('formu').submit(); alert('Anuncio añadido');">Añadir a favoritos</a>
									<a href="javascript:;" class="w3-button w3-orange w3-round-xlarge" onclick="mostrar()">Contactar anunciante</a>
								{!!Form::close()!!}
							@else
								<a href="/login2" class="w3-button w3-red w3-round-xlarge">Añadir a favoritos</a>
								<a href="javascript:;" class="w3-button w3-orange w3-round-xlarge" onclick="mostrar()">Contactar anunciante</a>
							@endif
						@else
							<a class="w3-button w3-red w3-round-xlarge " style="text-decoration:line-through;">Añadir a favoritos</a>
							<a href="javascript:;" class="w3-button w3-orange w3-round-xlarge" onclick="mostrar()">Contactar anunciante</a>
						@endif

						<ul id="lista_contacto" class="icons" style='display:none;' >
							<li><a href="{{$face->contacto}}" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a class="icon fa-phone"><span class="label">Instagram</span></a></li>  {{$fono->contacto}}
						</ul>

						
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