{!! Form::open(array('url'=>'servicios', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Ingrese el ID que busca..." value="{{$searchText}}">
			
				<button type="submit" class="btn btn-primary">Buscar</button>
			
		</div>
	</div>
{{Form::close()}}