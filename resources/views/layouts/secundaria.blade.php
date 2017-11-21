<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>MUMEFLET</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>

    <script src="extra/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="extra/js/bootstrap.js" type="text/javascript"></script>
    <script src="extra/js/ct-navbar.js"></script>

    <link href="extra/css/bootstrap.css" rel="stylesheet" />
    <link href="extra/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="extra/css/ct-navbar.css" rel="stylesheet" />  

		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>


 <!--ESTILO PARA LOS BOTONES-->
    <link rel="stylesheet" href="{{ asset('css/boton.css') }}">


	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				
				<div id="navbar-full">
			      <div id="navbar">
			         <!--    
			          navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
			          -->
			          <nav class="navbar navbar-ct-azzure navbar-fixed-top" role="navigation" >
			            
			            <div class="container">
			              <!-- Brand and toggle get grouped for better mobile display -->
			              <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                  <span class="sr-only">Toggle navigation</span>
			                  <span class="icon-bar"></span>
			                  <span class="icon-bar"></span>
			                  <span class="icon-bar"></span>
			                </button>
			                <a class="navbar-brand navbar-brand-logo" href="/">
			                      <div class="logo">
			                      <img src="http://s3.amazonaws.com/seminuevos-migration/dealer_publiya/97/97_1449005711_770.png">
			                      </div>
			                      <div class="brand"> MUMEFLET </div>
			                </a>
			              </div>
			              <!-- Collect the nav links, forms, and other content for toggling -->
			              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
			                <ul class="nav navbar-nav navbar-right" >
			                    <li>
			                      <a href="/">
			                          <i class="pe-7s-home">
			                          </i>
			                          <p>Home</p>
			                      </a>
			                    </li> 
			                    <li>
			                      <a href="/servicios">
			                          <i class="pe-7s-portfolio">
			                          </i>
			                          <p>Servicios</p>
			                      </a>
			                    </li> 
			                    <li>
			                      <a href="#">
			                          <i class="pe-7s-info">
			                          </i>
			                          <p>Sobre nosotros</p>
			                      </a>
			                    </li> 
			                    <li>
			                      @if(Auth::check())
			                      	<a href="/servicios/create">
			                      @else
			                      	<a href="/login2">
			                      @endif
			                          <i class="pe-7s-note2">
			                          </i>
			                          <p>Publique su aviso</p>
			                      </a>

			                    </li> 
			                    
			                    @if(Auth::check())
			                    <li class="dropdown">
			                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                                <i class="pe-7s-user"></i>
			                                <p>{{ Auth::user()->nombre}}</p>
			                            </a>
			                         @if(Auth::user()->tipo=='admin')
			                          <ul class="dropdown-menu">
			                            <li><a href="#">Ver perfil</a></li>
			                            <li><a href="#">Anuncios</a></li>
			                            <li><a href="/favoritos">Favoritos</a></li>
			                            <li><a href="/usuarios">Lista Usuarios</a></li>
			                            <li><a href="{{ route('usuarios.create') }}">Crear Usuarios</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{url('/logout')}}">Salir</a></li>
			                          </ul>
			                          @elseif(Auth::user()->tipo=='secretaria')
			                           <ul class="dropdown-menu">
			                            <li><a href="#">Ver perfil</a></li>
			                            <li><a href="/anuncios">Anuncios</a></li>
			                            <li><a href="/favoritos">Favoritos</a></li>
			                            <li><a href="/usuarios">Lista Usuarios</a></li>
			                            <li><a href="{{url('/logout')}}">Salir</a></li>
			                          </ul>
			                          @else
			                           <ul class="dropdown-menu">
			                            <li><a href="#">Ver perfil</a></li>
			                            <li><a href="/mis_anuncios">Mis anuncios</a></li>
			                            <li><a href="/favoritos">Favoritos</a></li>
			                            <li><a href="#">Another action</a></li>
			                            <li><a href="usuarios.tarjeta.create">Vincular tarjeta</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{url('/logout')}}">Salir</a></li>
			                          </ul>
			                          @endif
			                    </li>
			                    @else
			                    <li><a href="{{ route('usuarios_cliente.create') }}" class="button special">Registrarse</a></li>
			                    <li><a href="login2" class="button special">Iniciar sesión</a></li>
			                    @endif
			                 </ul>
			                 <form class="navbar-form navbar-right navbar-search-form" role="search">                  
			                   <div class="form-group">
			                        <input type="text" value="" class="form-control" placeholder="Search...">
			                   </div> 
			                </form>
			                
			              </div><!-- /.navbar-collapse -->
			            </div><!-- /.container-fluid -->
			          </nav>
			        </div><!--  end navbar -->
			    </div> <!-- end menu-dropdown -->

			</header>

		<!-- Main -->
			<section id="main" class="">
				<br><br><br>
				<div class="container">
					<div class="row ">
						<div class="3u">
							<section>
								<h3>¿Qué buscas?</h3>
								
								{!! Form::open(array('url'=>'servicios', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" name="searchText" placeholder="Ingrese lo que busca..." value="{{$searchText}}">
											
												<br><button type="submit" class="btn btn-primary">Buscar</button>
											
										</div>
									</div>
								

								<h5>Personalice su busqueda por: </h5>
								<h6>Categorias</h6>
							    <select class="form-control" id="categoria" >
							        @foreach($categorias as $categoria)
	                                    <option value="{{$categoria -> id_categoria}}" >{{$categoria -> nombre_completo}}</option>
	                                @endforeach
							    </select> 
							    <h6>Sub Categorias</h6>
							    <select class="form-control" id="sub_categoria" name="sub_categoria">
									<option value="" >Todos</option>
							    </select> 
							    <h6>Vehiculos</h6>
							    <select class="form-control" id="categoria_vehiculo" name="vehiculo">
							    	<option value="" >Todos</option>
							    	@foreach($categoria_vehiculos as $categoria_vehiculo)
	                                    <option value="{{$categoria_vehiculo -> nombre}}" >{{$categoria_vehiculo -> nombre}}</option>
	                                @endforeach
							    </select> <br>

							    <h6>Lugar</h6>
							    <select class="form-control" id="sel1" >
							    	<option value="" >-</option>
							        <option>Todos</option>
							        <option>Flete</option>
							        <option>Grua</option>
							        <option>Mecánico</option>
							    </select> <br>
							    <select class="form-control" id="sel2">
							    	<option value="" >-</option>
							        <option>Talca</option>
							        <option>Camioneta</option>
							        <option>dsad</option>
							        <option>wqeqweq</option>
							    </select> <br>
							    <select class="form-control" id="comuna" name="comuna">
							    	<option value="" >-</option>
							        <option>Talca</option>
							        <option>Camioneta</option>
							        <option>dsad</option>
							        <option>wqeqweq</option>
							    </select> 
							</section>
							<hr />
							<!--
							<section>
								<h3>Categorias</h3>
								<ul class="actions">
									<li><a href="#" class="button alt">Mecánico</a></li><br>
									<li><a href="#" class="button alt">Sedan</a></li><br>
									<li><a href="#" class="button alt">Suv</a></li><br>
									<li><a href="#" class="button alt">Ejecutivo</a></li><br>
									<li><a href="#" class="button alt">Camioneta</a></li><br>
									<li><a href="#" class="button alt">Camión 3/4</a></li><br>
									<li><a href="#" class="button alt">Camión</a></li><br>
									<li><a href="#" class="button alt">Grua</a></li>
								</ul>
							</section>
							-->
						</div>
						<!-- AQUI INICIA EL CONTENIDO -->
						<div class="9u pull-right">
						@yield('contenido')
						<!-- AQUI TERMINA EL CONTENIDO -->
						</div>

						{{Form::close()}}

					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="copyright">
						<li>&copy; MUMEFLET. All rights reserved.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

	</body>

<script type="text/javascript">
	$( document ).ready(function() {
	    $( "select#categoria" ).click(function() {

	    	var seleccion = parseInt($( "select#categoria" ).val());
	    	<?php $seleccion = seleccion; ?>

	    	var str =   '<option value="" >{{$seleccion}}</option>'+
			    		'@foreach($sub_categorias as $sub_categoria)'+
			    			@if($sub_categoria->id_categoria == 1 )
                            	'<option value="{{$sub_categoria -> sub_categoria}}" >{{$sub_categoria -> nombre_completo}}</option>'+
                            @endif
                        '@endforeach';

	    		//Elimina y genera nuevas opciones para el select
	    		$('#sub_categoria')
				    .find('option')
				    .remove()
				    .end()
				    .append(str)
				;
				console.log(seleccion);




			/*
			if ($( "select#categoria" ).val() == 1) {
	    		//Elimina y genera nuevas opciones para el select
	    		$('#sub_categoria')
				    .find('option')
				    .remove()
				    .end()
				    .append('<option value="" >Todos</option>'+
				    		'@foreach($sub_categorias as $sub_categoria)'+
				    			'@if($sub_categoria->id_categoria == 1)'+
	                            	'<option value="{{$sub_categoria -> sub_categoria}}" >{{$sub_categoria -> nombre_completo}}</option>'+
	                            '@endif'+
	                        '@endforeach')
				;
	    	}
	    	else if ($( "select#categoria" ).val() == 2) {
	    		//Elimina y genera nuevas opciones para el select
	    		$('#sub_categoria')
				    .find('option')
				    .remove()
				    .end()
				    .append('<option value="" >Todos</option>'+
				    		'@foreach($sub_categorias as $sub_categoria)'+
				    			'@if($sub_categoria->id_categoria == 2)'+
	                            	'<option value="{{$sub_categoria -> sub_categoria}}" >{{$sub_categoria -> nombre_completo}}</option>'+
	                            '@endif'+
	                        '@endforeach')
				;			
			}
			*/
	    	
		});

	});
</script>


</html>