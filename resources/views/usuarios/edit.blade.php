@extends('layouts.secundaria_gestion')
@section('contenido')

    
    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <fieldset>
                <legend><h3>Editar Datos Usuario: {{ $usuario->id }}</h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!! Form::model($usuario, ['method'=>'PATCH', 'route'=>['usuarios.update', $usuario->id]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="id">RUT: </label>
                <input type="text" name="rut" placeholder="Ej: 18384726" value="{{$usuario->rut}}">

            </div>
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" placeholder="*************" value="">
            </div>
            <div class="form-group">
                <label for="password2">Confirme la Contraseña: </label>
                <input type="password" name="password2" placeholder="*************" value="">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre: </label> 
                <input type="text" name="nombre" placeholder="Ej: Nico" value="{{$usuario->nombre}}">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" placeholder="" value="{{$usuario->apellido}}">
            </div>
            <!--
            <div class="form-group">
                <label for="genero" >Genero: </label>
                <input type="radio" name="genero" value="hombre"> hombre
                <input type="radio" name="genero" value="mujer"> mujer
            </div>
            -->
        
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" style="width: 300px;" placeholder="Ej: {{$usuario->apellido}}@hotmail.com" value="{{$usuario->email}}">
            </div>

            <label>Tipo: </label>
             <select name="tipo">
          <option value="cliente" >Cliente</option>
           <option value="secretaria">Secretaria</option>
           <option value="admin">Admin</option>
           </select>

           <br>
       
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="/usuarios" class="btn btn-danger">Cancelar</a>
            </div>
            {!!Form::close()!!}
            </fieldset>
        </div>
    </div>
@stop