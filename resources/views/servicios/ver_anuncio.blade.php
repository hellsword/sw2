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

						<a href="#" class="w3-button w3-red ">Añadir a favoritos</a>
						<a href="#" class="w3-button w3-orange">Contactar anunciante</a>
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
	</script>


@stop