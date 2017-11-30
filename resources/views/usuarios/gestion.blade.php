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


            <div class="container">

                Arica: 4 $3434  <br>
                Maule: 4 $3434  <br>
                Magallanes: 4 $3434 <br>
            </div>

            
            
  
@endsection