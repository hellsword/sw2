@extends('layouts.secundaria')
@section('contenido')

	<!-- obtiene la ruta actual-->
	<?php $ruta = $_SERVER['REQUEST_URI']; ?>

	<!-- pull-right:posiciona el elemento a la derecha de la pantalla -->
	@foreach ($servicios as $servicio)

		<?php $val = 2; ?>
		@if($ruta == '/servicios')
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
		@endif

		<hr>
		<div class="row" >
			<div class="4u" style="vertical-align: middle;" >
				<section>
					<a href="{{URL::action('ServiciosController@show', $servicio->id_anuncio)}}" class=""><img src="{{$servicio -> foto}}" alt="" height="150" width="200" ></a>
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
					Lugar: {{$servicio -> region}}, {{$servicio -> provincia}}, {{$servicio -> comuna}} <br>
					<div style="border-bottom: 1px solid silver;"></div>
					Creado el: {{$servicio -> fecha}}<br>
					<div style="border-bottom: 1px solid silver;"></div>
				</section>
			</div>
			<div class="4u">
				<section>
					<label style="color: #DE5122; font-size: 18px">${{$servicio -> precio_serv}}</label> <br>
					<!--  Valoración: ★★★★★ <br>  -->
					@if($val == 0)
						@if(Auth::check())
							@if(Auth::user()->tipo=='cliente')

								{!!Form::open(array('url'=>'favoritos/almacenar', 'id'=>$servicio -> id_anuncio, 'method'=>'POST', 'autocomplete'=>'off'))!!}
									<input type="" name="id_anuncio" value="{{$servicio -> id_anuncio}}" hidden>
									<a class="button" onclick="favorito({{$servicio -> id_anuncio}})" >Añadir a favoritos</a>

						        {!!Form::close()!!}
									
								
							@endif
						@else
							<a href="login2" class="button ">Añadir a favoritos</a>
						@endif
					@elseif($val == 1)
						<a class="button" style="text-decoration:line-through;">Añadir a favoritos</a>
					@else
						{{Form::Open(array('action'=>array('ServiciosController@destroy', $servicio -> id_anuncio), 'method'=>'delete', 'id'=>$servicio -> id_anuncio.'-destroy' ))}}
							<a onclick="eliminar({{$servicio -> id_anuncio}})"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
						 {!!Form::close()!!}
					@endif
				</section>
			</div>
		</div>
	
	@endforeach
	{{$servicios->render()}}


<br><br><br>


<script type="text/javascript">


	function eliminar(id_anuncio){

		swal({
		  title: "¿Seguro que desea eliminar el anuncio?",
		  text: "Una vez eliminado, no se podrá recuperar",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    document.getElementById(id_anuncio+'-destroy').submit();
		  } 
		});

	}


	
	function favorito(id_anuncio){
		swal({
		  title: "Anuncio agregado",
		  icon: "success",
		})
		.then((willDelete) => {
		  if (willDelete) {
		    document.getElementById(id_anuncio).submit();
		  } 
		});
	}

</script>

@stop