{!! Form::open(array('url'=>'usuarios', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Ingrese lo que busca..." value="{{$searchText}}">
			
				<br><button type="submit" class="btn btn-primary">Buscar</button>
			
		</div>
	</div>
{{Form::close()}}