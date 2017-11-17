@extends('layouts.secundaria')
@section('contenido')

	<!-- pull-right:posiciona el elemento a la derecha de la pantalla -->
	@foreach ($servicios as $servicio)

		<?php $val = 0; ?>
		@if(Auth::check())
			@if(Auth::user()->id == $servicio->id_cliente)
				<?php $val = 1; ?>
			@endif

			@foreach ($favoritos as $favorito)
				@if($servicio->id_anuncio == $favorito->id_anuncio)
					<?php $val = 1; ?>
				@endif
			@endforeach
		@endif

		

		<hr>
		<div class="row" >
			<div class="4u" style="vertical-align: middle;" >
				<section>
					<a href="{{URL::action('ServiciosController@show', $servicio->id_anuncio)}}" class=""><img src="data:image/png;base64, {{$servicio -> foto}}" alt="" height="200" width="200" ></a>
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
				<section>
					<label style="color: #DE5122; font-size: 18px">${{$servicio -> precio_serv}}</label> <br>
					Valoración: ★★★★★ <br>
					@if($val == 0)
						@if(Auth::check())
							{!!Form::open(array('url'=>'favoritos', 'method'=>'POST', 'class'=>'stdform', 'id'=>'formu', 'name'=>'formu', 'autocomplete'=>'off'))!!}
								<input type="hidden" name="id_anuncio" value="{{$servicio -> id_anuncio}}">
								<a class="button" href="javascript:;" onclick="document.getElementById('formu').submit(); alert('Anuncio añadido');">Añadir a favoritos</a>
							{!!Form::close()!!}
						@else
							<a href="login2" class="button ">Añadir a favoritos</a>
						@endif
					@else
						<a class="button" style="text-decoration:line-through;">Añadir a favoritos</a>
					@endif
				</section>
			</div>
		</div>
	
	@endforeach
	{{$servicios->render()}}


<br><br><br>

@stop