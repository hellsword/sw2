@extends('layouts.inicial')
@section('contenido')

<style type="text/css">
    label{
        text-align: left;
    }
</style>

<!-- BOTONES -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<section id="two" class="wrapper style1">
    <header class="major">
        <h2>Login</h2>
    </header>
    <div class="container" align="center">
    <div class="widgetcontent">
        <form class="stdform" method="POST" action="{{ route('login') }}" style="width: 60%;">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                <p>
                    <label>E-Mail Address:</label>
                    <span class="field"><input type="text" name="email" class="input-large" value="{{ old('email') }}" /></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </p>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Contraseña:</label>

                    <span class="field"><input type="password" name="password" class="input-large" required /></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <!--
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me 
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div><br>
            -->

            <br>
            <p class="stdformbutton">
                <button onclick="location.href = '/';" class="w3-button w3-red w3-round-xxlarge">Cancelar</button>
                <button class="w3-button w3-blue w3-round-xxlarge">Aceptar</button>
            </p>

        </form>
    </div>
    </div>
</section>

@endsection
