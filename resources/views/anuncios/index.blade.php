@extends('layouts.secundaria')
@section('contenido')

<!--
	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif
-->


	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Anuncios del Sistema</h3>
		</div>	
	</div>

		<div class="table-responsive">
			@if(isset($anuncios))
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Titulo</th>
					<th>Descripción</th>
					<th>Condicion</th>
				</thead>
				@foreach ($anuncios as $a)
				<tr>
					<td>{{$a -> id_anuncio}}</td>
					<td>{{$a -> titulo}}</td>
					<td>{{$a -> descripcion}}</td>
					<td>{{$a -> condicion}}</td>
					<td>
					{!! Form::model($anuncios, ['method'=>'PATCH', 'route'=>['anuncios.update', $a->id_anuncio]]) !!}
            {{Form::token()}}
							
							   <button class="boton verde"" type="submit">Aceptar</button>
            {!!Form::close()!!}

					
					</td>
				</tr>
			
				@endforeach
			</table>
			@endif
		{{$anuncios->render()}}
		</div>

		

@stop
