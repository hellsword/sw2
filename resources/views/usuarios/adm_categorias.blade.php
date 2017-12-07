@extends('layouts.secundaria2')
@section('contenido')

            
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


    <h5>Nueva Categoría</h5>
    <input type="" name="" placeholder="nombre clave categoría"> <input type="" name="" placeholder="nombre completo categoría"> <button>+</button>
    <br>


    <h5>Nueva Sub-categoría</h5>
    <select class="form-control" id="searchText" name="searchText" style="width: 25%;">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->nombre}}" >{{$categoria->nombre_completo}}</option>
        @endforeach
    </select> <br>
    <input type="" name="sub_categoria" placeholder="nombre clave sub-categoría"> <input type="" name="nombre_completo" placeholder="nombre completo sub-categoría"> <button>+</button>
    <br>


    <h5>Listado de Categorías</h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>Nombre</th>
            <th>Nombre completo</th>
            <th></th>
         
        </thead>
        @foreach ($categorias as $categoria)
        <tr>
            <td><input type="text" name="nombre" value="{{$categoria->nombre}}"></td>
            <td><input type="text" name="nombre_completo" value="{{$categoria->nombre_completo}}"></td>
            <td><button>Editar</button></td>
        </tr>
        @endforeach
    </table>

    <h5>Listado de Sub-categorías</h5>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>Nombre</th>
            <th>Nombre completo</th>
            <th></th>
         
        </thead>
        @foreach ($sub_categorias as $sub_categoria)
        <tr>
            <td><input type="text" name="sub_catgoria" value="{{$sub_categoria->sub_categoria}}"></td>
            <td><input type="text" name="nombre_completo" value="{{$sub_categoria->nombre_completo}}"></td>
            <td><button>Editar</button></td>
        </tr>
        @endforeach
    </table>
            
            
  
@endsection