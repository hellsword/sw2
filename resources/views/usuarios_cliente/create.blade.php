@extends('layouts.inicial')
@section('contenido')

    <section id="two" class="wrapper style1">
        <header class="major">
            <h2>Nuevo usuario</h2>
            <p>Unete y disfruta los privilegios de ser parte de esta familia</p>
        </header>
        <div class="container" align="center">

            {!!Form::open(array('url'=>'usuarios_cliente', 'method'=>'POST', 'autocomplete'=>'off', 'style'=>'width: 60%; text-align: left' ))!!}
            {{Form::token()}}

                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    Nombre:<br>
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ej: Nico" value="" required autofocus>

                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <br>

                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    Apellido:<br>
                    <div class="col-md-6">
                        <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Ej: Umberto" value="" required autofocus>

                        @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><br>

                <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                    RUT:<br>
                    <div class="col-md-6">
                        <input id="rut" type="text" class="form-control" name="rut" placeholder="Ej: 18384726" value="" required>

                        @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rut') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><br>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    Email:<br>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Ej: Correo@hotmail.com" value="" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><br>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    Contraseña:<br>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" placeholder="*************" value="" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <br>

                <div class="form-group">
                    Confirme la contraseña:<br>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="*************" value="" required>
                    </div>
                </div>

                <br>
                <h4>Información de contacto adicional</h4>

                <div class="form-group">
                    Teléfono:<br>
                    <div class="col-md-6">
                        <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Ej: 73728321822" value="" required>
                    </div>
                </div><br>
                <div class="form-group">
                    Facebook:<br>
                    <div class="col-md-6">
                        <input id="facebook" type="text" class="form-control" name="facebook" required placeholder="Ej: https://www.facebook.com/miface" value="">
                    </div>
                </div><br>

                <div class="form-group">
                    <div class="row" >
                        <div class="6u" align="right"> <a href="/" class="button special"  >Cancelar</a> </div>
                        <div id="aceptar" class="6u" align="left"> <button type="submit" class="button special">
                            Aceptar</button> 
                        </div>
                    </div>
                </div>

            {!!Form::close()!!}
        </div>
    </section>

@stop
