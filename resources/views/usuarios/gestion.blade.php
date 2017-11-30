@extends('layouts.secundaria_admin')
@section('contenido')


            <fieldset>
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

                

                <div class="row">
                    <div class="5u">
                        <section class="special box">
                            dasda
                        </section>
                    </div>

                    <div class="4u">
                        <section class="special box">
                            <label>Fecha inicial: </label>
                            <input type="" name="">
                            <label>Fecha final: </label>
                            <input type="" name="">
                        </section>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <input type="" name="">
                <input type="" name="">
                <input type="text" name="apellido" placeholder="Ej: Umberto" value="">
            </div>
              <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" placeholder="Ej: Correo@hotmail.com" value="">
            </div>
             <div class="form-group">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" placeholder="*************" value="">
            </div>
            <div class="form-group">
                <label for="password2">Confirme la Contraseña: </label>
                <input type="password" name="password2" placeholder="*************" value="">
            </div>


            @if(Auth::check())
                @if(Auth::user()->tipo=='admin')
                    <label>Tipo: </label>
                     
                    <select name="tipo">
                      <option value="cliente" >Cliente</option>
                       <option value="secretaria">Secretaria</option>
                       <option value="admin">Admin</option>
                    </select>
                @endif
            @else
                 <div class="form-group">
                    <label for="tipo">Tipo: </label>
                    <input type="text" name="tipo" value="cliente" readonly="">
                </div>
            @endif


            <br>
            <div class="form-group">
                <h4>Información de contacto</h4>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono: </label>
                <input type="text" name="telefono" placeholder="Ej: 73728321822" value="">
            </div>
            <div class="form-group">
                <label for="facebook">Teléfono: </label>
                <input type="text" name="facebook" placeholder="Ej: https://www.facebook.com/miface" value="">
            </div>

            <br>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="/usuarios" class="btn btn-danger">Cancelar</a>
            </div>
            {!!Form::close()!!}
            </fieldset>
  
@endsection