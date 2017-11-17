@extends('layouts.secundaria')
@section('contenido')

	<!-- pull-right:posiciona el elemento a la derecha de la pantalla -->
	
	
		@foreach ($servicios as $servicio)

		<hr>
		<div class="row" >
			<div class="4u" style="vertical-align: middle;" >
				<section>
					<a href="{{URL::action('CuponController@show', $servicio->id_anuncio)}}" class=""><img src="data:image/png;base64, {{$servicio -> foto}}" alt="" height="200" width="200" ></a>
				</section>
			</div>
			<div class="8u">
				<section>
					<a href="#" style="text-decoration:none" ><h3 style="color:#00BFFF;">{{$servicio -> titulo}}</h3></a>
				</section>
			</div>
			<div class="4u">
				<section>
					
					<div style="border-bottom: 1px solid silver;"></div>
					Autor: {{$servicio -> nombre}} {{$servicio -> apellido}} <br>
					<div style="border-bottom: 1px solid silver;"></div>
					Servicio: {{$servicio -> tipo_servicio}} <br>
					<div style="border-bottom: 1px solid silver;"></div>
					Lugar: {{$servicio -> region}}, {{$servicio -> comuna}} <br>
					<div style="border-bottom: 1px solid silver;"></div>
				

				</section>
			</div>
			<div class="4u">
				
			</div>
		</div>

	@endforeach
	{{$servicios->render()}}


<br><br><br>

@stop