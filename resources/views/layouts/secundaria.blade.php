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


		<!-- SweetAlert2 -->
		<script src="js/sweetalert2/sweetalert2.all.js"></script>	
	    


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
                    @if(Auth::check() AND Auth::user()->tipo=='cliente')
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
                    @endif
                    
                    @if(Auth::check())
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-user"></i>
                                <p>{{ Auth::user()->nombre}}</p>
                            </a>
                        @if(Auth::user()->tipo=='admin')
                        <ul class="dropdown-menu">
                            <li><a href="#">Anuncios</a></li>
                            <li><a href="/usuarios">Lista Usuarios</a></li>
                            <li><a href="{{ route('usuarios.create') }}">Crear Usuarios</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/logout')}}">Salir</a></li>
                          </ul>
                          @elseif(Auth::user()->tipo=='secretaria')
                           <ul class="dropdown-menu">
                            <li><a href="/anuncios">Anuncios</a></li>
                            <li><a href="/usuarios">Lista Usuarios</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/logout')}}">Salir</a></li>
                          </ul>
                          @else
                           <ul class="dropdown-menu">
                            <li><a href="/mis_anuncios">Mis anuncios</a></li>
                            <li><a href="/favoritos">Favoritos</a></li>
                            <li><a href="/cupones">Subir Cupón</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/logout')}}">Salir</a></li>
                          </ul>
                          @endif
                    </li>
                    @else
                    <li><a href="{{ route('usuarios_cliente.create') }}" class="button special">Registrarse</a></li>
                    <li><a href="/login2" class="button special">Iniciar sesión</a></li>
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
							    <select class="form-control" id="categoria" name="categoria">
							        @foreach($categorias as $categoria)
	                                    <option value="{{$categoria -> id_categoria}}" >{{$categoria -> nombre_completo}}</option>
	                                @endforeach
							    </select> 
							    <h6>Sub Categorias</h6>
							    <select class="form-control" id="sub_categoria" name="sub_categoria">
									<option value="" >-</option>
							    </select> 
							    <h6>Vehiculos</h6>
							    <select class="form-control" id="categoria_vehiculo" name="vehiculo">
							    	<option value="" >Todos</option>
							    	@foreach($categoria_vehiculos as $categoria_vehiculo)
	                                    <option value="{{$categoria_vehiculo -> nombre}}" >{{$categoria_vehiculo -> nombre}}</option>
	                                @endforeach
							    </select> <br>

							    <h6>Lugar</h6>
							    <select class="form-control" id="region" name="region">
							    	<option value="" >Todos</option>
							    	@foreach($regiones as $region)
	                                    <option value="{{$region -> REGION_ID}}" >{{$region -> REGION_NOMBRE}}</option>
	                                @endforeach
							    </select> <br>
							    <select class="form-control" id="provincia" name="provincia">
							    	<option value="" >-</option>
							    </select> <br>
							    <select class="form-control" id="comuna" name="comuna">
							    	<option value="" >-</option>
							    </select> 
							    {{Form::close()}}
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

	@include('sweet::alert')

	</body>

<script type="text/javascript">
	$( document ).ready(function() {

		//Genera una nueva lista de subcategorias al seleccionar una categoria
	    $( "select#categoria" ).click(function(e) {
	    	
	    	var seleccion = parseInt($( "select#categoria" ).val());
	    	var sub_categorias = <?php echo json_encode($sub_categorias); ?>;
	    	var count = Object.keys(sub_categorias).length;

	    	var str =   '<option value="" >Todos</option>';

    		for (var i = 0; i < count; i++) {
    			if (sub_categorias[i]['id_categoria'] == seleccion) {
                	str = str+'<option value="'+sub_categorias[i]['sub_categoria']+'" >'+sub_categorias[i]['nombre_completo']+'</option>';
                }
            }

    		//Elimina y genera nuevas opciones para el select
    		$('#sub_categoria')
			    .find('option')
			    .remove()
			    .end()
			    .append(str)
			;
	    	
		});


		//Genera una nueva lista de provincias al seleccionar una region
	    $( "select#region" ).click(function(e) {
	    	
	    	var seleccion = parseInt($( "select#region" ).val());
	    	var provincias = <?php echo json_encode($provincias); ?>;
	    	var count = Object.keys(provincias).length;

	    	var str =   '<option value="" >Todos</option>';

    		for (var i = 0; i < count; i++) {
    			if (provincias[i]['PROVINCIA_REGION_ID'] == seleccion) {
                	str = str+'<option value="'+provincias[i]['PROVINCIA_ID']+'" >'+provincias[i]['PROVINCIA_NOMBRE']+'</option>';
                }
            }

    		//Elimina y genera nuevas opciones para el select
    		$('#provincia')
			    .find('option')
			    .remove()
			    .end()
			    .append(str)
			;
	    	
		});


		//Genera una nueva lista de comunas al seleccionar una provincia
	    $( "select#provincia" ).click(function(e) {
	    	
	    	var seleccion = parseInt($( "select#provincia" ).val());
	    	var comunas = <?php echo json_encode($comunas); ?>;
	    	var count = Object.keys(comunas).length;

	    	var str =   '<option value="" >Todos</option>';

    		for (var i = 0; i < count; i++) {
    			if (comunas[i]['COMUNA_PROVINCIA_ID'] == seleccion) {
                	str = str+'<option value="'+comunas[i]['COMUNA_ID']+'" >'+comunas[i]['COMUNA_NOMBRE']+'</option>';
                }
            }

    		//Elimina y genera nuevas opciones para el select
    		$('#comuna')
			    .find('option')
			    .remove()
			    .end()
			    .append(str)
			;
	    	
		});

	});
</script>

</html>