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
	</head>
	<body id="top">

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
                            <li><a href="/usuarios/gestion">Gestion</a></li>
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


		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>MUMEFLET</h2>
					<p style="color: white;">Su mejor opción para buscar mudanzas, fletes y mecánicos <a href="ht
					tp://templated.co"></a></p>
					<ul class="actions">
						@if(!Auth::check())
							<li><a href="{{ route('usuarios_cliente.create') }}" class="button big special">Registrarse</a></li>
							<li><a href="/login2" class="button big btn-success">Publique ya su anuncio</a></li>
						@else
							<li><a href="/servicios/create" class="button big btn-success">Publique ya su anuncio</a></li>
						@endif
					</ul>
				</div>
			</section>


		<!-- Two -->
			<section id="two" class="wrapper style1">
				<header class="major">
					<h2>Últimas publicaciones</h2>
					<p>No te pierdas ningún anuncio</p>
				</header>
				<div class="container">
					<!-- AQUI INICIA EL CONTENIDO -->
					@yield('contenido')
					<!-- AQUI TERMINA EL CONTENIDO -->
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style2">
				<header class="major">
					<h2>¿Por qué escoger nuestros servicios de anuncios?</h2>
					<p>Aquí te contamos algunos de los beneficios que tenemos para ti</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<i class="icon fa-area-chart major"></i>
								<h3>Económico</h3>
								<p>Contamos con los precios más bajos del mercado. Haz la prueba y publica tu anuncio ya.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-refresh major"></i>
								<h3>Actualizado</h3>
								<p>Contamos con la última tecnología para que tu anuncio sea facil de encontrar.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-cog major"></i>
								<h3>Personalizado</h3>
								<p>Contamos con varias opciones de personalización para la busqueda de anuncios.</p>
							</section>
						</div>

					</div>
				</div>
			</section>
		

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
				<!--
					<div class="row double">
						<div class="6u">
							<div class="row collapse-at-2">
								<div class="6u">
									<h3>Accumsan</h3>
									<ul class="alt">
										<li><a href="#">Nascetur nunc varius</a></li>
										<li><a href="#">Vis faucibus sed tempor</a></li>
										<li><a href="#">Massa amet lobortis vel</a></li>
										<li><a href="#">Nascetur nunc varius</a></li>
									</ul>
								</div>
								<div class="6u">
									<h3>Faucibus</h3>
									<ul class="alt">
										<li><a href="#">Nascetur nunc varius</a></li>
										<li><a href="#">Vis faucibus sed tempor</a></li>
										<li><a href="#">Massa amet lobortis vel</a></li>
										<li><a href="#">Nascetur nunc varius</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="6u">
							<h2>Aliquam Interdum</h2>
							<p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
							</ul>
						</div>
					</div>
					-->
					<ul class="copyright">
						<li>&copy; MUMEFLET. All rights reserved.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

	</body>
</html>