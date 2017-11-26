@extends('layouts.principal')
@section('contenido')

    <div class="row">
        @foreach ($servicios as $servicio)
            <div class="3u">
                <section class="special">
                    <a href="{{URL::action('ServiciosController@show', $servicio->id_anuncio)}}" class="image fit"><img src="data:image/png;base64, {{$servicio -> foto}}" alt="" ></a>
                    <h3>{{$servicio->titulo}}</h3>
                    <p>{{$servicio->precio_serv}}</p>
                </section>
            </div>
        @endforeach
    </div>
    
@stop