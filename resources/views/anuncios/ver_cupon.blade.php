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
						@foreach ($cupon as $imagen)
					  	  <iframe class="mySlides" src="data:application/pdf;base64, {{$imagen -> cupon}}" style="width:100%; height: 520px"></iframe>
					  	@endforeach
					  
					</div>
					
				</section>
				 
			</div>
		</div>
		 <a href="/anuncios" class="boton azul">Volver</a>
	</div>

					

			

@stop