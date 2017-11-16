@extends('layouts.principal')
@section('contenido')

    <div class="row">
        @foreach ($servicios as $servicio)
            <div class="3u">
                <section class="special">
                    <a href="{{URL::action('ServiciosController@show', $servicio->id_anuncio)}}" class="image fit"><img src="data:image/png;base64, {{$servicio -> foto}}" alt="" ></a>
                    <h3>Mollis adipiscing nisl</h3>
                    <p>$32.000</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Ver más</a></li>
                    </ul>
                </section>
            </div>
        @endforeach
    </div>
    
@stop