@extends('layouts.secundaria_admin')
@section('contenido')


            
                <legend><h3>Gestión de la página: </h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


<table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Regiones</th>
                    <th>Cantidad de Anuncios</th>
                    <th>Monto Total</th>
                 
                </thead>
                @foreach ($region as $r)
                <tr>
                    <td>{{$r -> REGION_NOMBRE}}</td>
                    <td>{{$r -> cantidad}}</td>
                    <td>{{$r -> total}}</td>

                    

                </tr>
        
                @endforeach
            </table>


            
            
  
@endsection