@extends('layouts.secundaria_gestion')
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
			<h3>Lista de Usuarios del Sistema</h3>
		</div>	
	</div>

		<div class="table-responsive">
			@if(isset($usuarios))
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>RUT</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Tipo</th>
				</thead>
				@foreach ($usuarios as $usu)
				<tr>
					<td>{{$usu -> id}}</td>
					<td>{{$usu -> rut}}</td>
					<td>{{$usu -> nombre}}</td>
					<td>{{$usu -> apellido}}</td>
					<td>{{$usu -> email}}</td>
					<td>{{$usu -> tipo}}</td>
						 @if(Auth::user()->tipo=='admin')
					<td>

							<a  href="{{URL::action('UserController@edit', $usu -> id)}}"><btn class="btn btn-info"  ><i class="fa fa-pencil-square" style="font-size:20px;color:white"></i></btn></a>
							
						<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><btn class="btn btn-danger" ><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
					</td>
					@endif
				</tr>
				<!--@include('usuarios.modal')-->
				@endforeach
			</table>
			@endif
		{{$usuarios->render()}}
		</div>

@stop
