@extends('layouts.secundaria_gestion')
@section('contenido')

<!-- Botones -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- ICONOS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
    <h3>Administración de categorías: </h3>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <br>

<!--
    <h5>Nueva Categoría</h5>
    {!!Form::open(array('url'=>'usuarios/nueva_categoria', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off'))!!}
        <input type="" name="nombre" placeholder="nombre clave categoría" required=""> <input type="" name="nombre_completo" placeholder="nombre completo categoría" required=""> <button type="submit" class="w3-button w3-circle w3-teal w3-card-4">+</button>
    {!!Form::close()!!}
    <br>
-->

    <h5>Nueva Sub-categoría</h5>
    {!!Form::open(array('url'=>'usuarios/nueva_sub_categoria', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off'))!!}
    <select class="form-control" id="" name="id_categoria" style="width: 25%;" required="">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}" >{{$categoria->nombre_completo}}</option>
        @endforeach
    </select> <br>
    <input type="" name="sub_categoria" placeholder="nombre clave sub-categoría" required=""> <input type="" name="nombre_completo" placeholder="nombre completo sub-categoría" required=""> <button type="submit" class="w3-button w3-circle w3-teal w3-card-4">+</button>
    {!!Form::close()!!}
    <br>

<!--
    <h5>Actualizar Categoría</h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>Nombre clave</th>
            <th>Nombre completo</th>
            <th></th>
            <th></th>
         
        </thead>

        <?php $id_form = 0; ?>

        @foreach ($categorias as $categoria)

        
        {!!Form::open(array('url'=>'usuarios/actualiza_categoria', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'update_cat-'.$id_form))!!}
        <tr>
            <input type="hidden" name="id_categoria" value="{{$categoria->id_categoria}}" required="">
            <td><input type="text" name="nombre" value="{{$categoria->nombre}}" required=""></td>
            <td><input type="text" name="nombre_completo" value="{{$categoria->nombre_completo}}" required=""></td>
            <td><a href="#forum" onClick="javascript: document.getElementById('update_cat-{{$id_form}}').submit();" class="w3-button w3-green w3-border w3-border-red w3-round-large"> <i class="fa fa-refresh"></i> </a></td>
        
        {!!Form::close()!!}

     
        {!!Form::open(array('url'=>'usuarios/elimina_categoria', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'delete_cat-'.$id_form))!!}

            <input type="hidden" name="id_categoria" value="{{$categoria->id_categoria}}" required="">
            <input type="hidden" name="nombre_completo" value="{{$categoria->nombre_completo}}" required="">
            <input type="hidden" name="nombre_completo" value="{{$categoria->nombre_completo}}" required="">

            <td><a href="#form" onClick="javascript: document.getElementById('delete_cat-{{$id_form}}').submit();" class="w3-button w3-red w3-border w3-border-green w3-round-large"> <i class="fa fa-remove"></i> </a></td>
        </tr>

        {!!Form::close()!!}

        <?php $id_form = $id_form+1; ?>

        @endforeach
    </table>
-->



    <h5>Actualizar Sub-categoría</h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>Nombre clave</th>
            <th>Nombre completo</th>
            <th></th>
            <th></th>
         
        </thead>

        <!-- ID PARA IDENTIFICAR EL FORMULARIO -->
        <?php $id_form = 0; ?>

        @foreach ($sub_categorias as $sub_categoria)
        
        <!-- FORMULARIO PARA EDITAR SUB-CATEGORIA -->
        {!!Form::open(array('url'=>'usuarios/actualiza_sub_categoria', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'update_sub_cat-'.$id_form))!!}

        <tr>
            <input type="hidden" name="id_categoria" value="{{$sub_categoria->id_categoria}}" required="">
            <input type="hidden" name="sub_categoria" value="{{$sub_categoria->sub_categoria}}" required="">
            <td><input type="text" name="sub_categoria_nueva" value="{{$sub_categoria->sub_categoria}}" required=""></td>
            <td><input type="text" name="nombre_completo" value="{{$sub_categoria->nombre_completo}}" required=""></td>
            <td><a href="#form" onClick="javascript: document.getElementById('update_sub_cat-{{$id_form}}').submit();" class="w3-button w3-green w3-border w3-border-red w3-round-large"> <i class="fa fa-refresh"></i> </a></td>
        

        {!!Form::close()!!}

        <!-- FORMULARIO PARA BORRAR SUB-CATEGORIA -->
        {!!Form::open(array('url'=>'usuarios/elimina_sub_categoria', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'delete_sub_cat-'.$id_form))!!}

        <input type="hidden" name="id_categoria" value="{{$sub_categoria->id_categoria}}" required="">
        <input type="hidden" name="sub_categoria" value="{{$sub_categoria->sub_categoria}}" required="">
        <input type="hidden" name="nombre_completo" value="{{$sub_categoria->nombre_completo}}" required="">

            <td><a href="#form" onClick="javascript: document.getElementById('delete_sub_cat-{{$id_form}}').submit();" class="w3-button w3-red w3-border w3-border-green w3-round-large"> <i class="fa fa-remove"></i> </a></td>
        </tr>

        {!!Form::close()!!}

        <?php $id_form = $id_form+1; ?>
        @endforeach
    </table>
            


    <h5>Actualizar relaciones entre categorías y sub-categorías</h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>Categoría</th>
            <th>Sub-categoría</th>
            <th></th>
         
        </thead>

        <!-- ID PARA IDENTIFICAR EL FORMULARIO -->
        <?php $id_form = 0; ?>

        @foreach ($sub_categorias as $sub_categoria)

        <!-- FORMULARIO PARA EDITAR RELACIONES -->
        {!!Form::open(array('url'=>'usuarios/actualiza_relacion', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'update_relacion-'.$id_form))!!}

        <tr>
            <td>
                <select class="form-control" id="id_categoria_nueva" name="id_categoria_nueva" required="">
                    <option value="{{$sub_categoria->id_categoria}}"  selected style="background-color: #0000FF; color: white;">{{$sub_categoria->nombre_categoria}}</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id_categoria}}" >{{$categoria->nombre_completo}}</option>
                    @endforeach
                </select>
            </td>
            <td>{{$sub_categoria->nombre_completo}}</td>
            <input type="hidden" name="id_categoria" value="{{$sub_categoria->id_categoria}}" required=""> 
            <input type="hidden" name="sub_categoria" value="{{$sub_categoria->sub_categoria}}" required="">
            <td><a href="#form" onClick="javascript: document.getElementById('update_relacion-{{$id_form}}').submit();" class="w3-button w3-green w3-border w3-border-red w3-round-large"> <i class="fa fa-refresh"></i> </a></td>

        {!!Form::close()!!}

        </tr>
        <?php $id_form = $id_form+1; ?>
        @endforeach
    </table>
<br><br>
<hr style="padding-top: 30px; ">



    <h5>Nueva Categoría de Vehículo</h5>
    {!!Form::open(array('url'=>'usuarios/nueva_categoria_vehiculo', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off'))!!}
        <input type="" name="cod" placeholder="nombre clave categoría" required=""> <input type="" name="nombre" placeholder="nombre completo categoría" required=""> <button type="submit" class="w3-button w3-circle w3-teal w3-card-4">+</button>
    {!!Form::close()!!}
    <br>
            



    <h5>Actualizar Categoría Vehículo</h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>Código</th>
            <th>Nombre</th>
            <th></th>
            <th></th>
         
        </thead>

        <!-- ID PARA IDENTIFICAR EL FORMULARIO -->
        <?php $id_form = 0; ?>

        @foreach ($categorias_vehiculo as $categoria_vehiculo)

        <!-- FORMULARIO PARA EDITAR CATEGORIA -->
        {!!Form::open(array('url'=>'usuarios/actualiza_categoria_vehiculo', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'update_cat_car-'.$id_form))!!}
        <tr>
            <input type="hidden" name="cod" value="{{$categoria_vehiculo->cod}}" required="">
            <td><input type="text" name="cod_nuevo" value="{{$categoria_vehiculo->cod}}" required=""></td>
            <td><input type="text" name="nombre" value="{{$categoria_vehiculo->nombre}}" required=""></td>
            <td><a href="#forum" onClick="javascript: document.getElementById('update_cat_car-{{$id_form}}').submit();" class="w3-button w3-green w3-border w3-border-red w3-round-large"> <i class="fa fa-refresh"></i> </a></td>
        
        {!!Form::close()!!}

        <!-- FORMULARIO PARA BORRAR CATEGORIA -->
        {!!Form::open(array('url'=>'usuarios/elimina_categoria_vehiculo', 'method'=>'POST', 'class'=>'stdform stdform2', 'autocomplete'=>'off', 'id'=>'delete_cat_car-'.$id_form))!!}

            <input type="hidden" name="cod" value="{{$categoria_vehiculo->cod}}" required="">
            <input type="hidden" name="nombre" value="{{$categoria_vehiculo->nombre}}" required="">

            <td><a href="#form" onClick="javascript: document.getElementById('delete_cat_car-{{$id_form}}').submit();" class="w3-button w3-red w3-border w3-border-green w3-round-large"> <i class="fa fa-remove"></i> </a></td>
        </tr>

        {!!Form::close()!!}

        <?php $id_form = $id_form+1; ?>

        @endforeach
    </table>

  
@endsection