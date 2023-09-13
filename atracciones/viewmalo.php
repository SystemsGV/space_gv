

<!doctype html>

<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>



	<!-- Basic Page Needs

	================================================== -->

	<meta charset="utf-8">

	<title>.: La Granjavilla :.</title>

	<meta name="description" content="">

	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

	<link rel='stylesheet' href='css/flexslider.css'>

	<!--<link rel='stylesheet' href='css/font-awesome.css'>-->

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel='stylesheet' href='css/weather-icons.css'>

	<!--<link rel='stylesheet' href='css/bootstrap.css'>-->

	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

	<link rel='stylesheet' href='css/prettyPhoto.css'>

	<link rel='stylesheet' href='css/mmenu.css'>

	<link rel='stylesheet' href='css/jquery-ui-1.10.4.datepicker.min.css'>

	<link rel='stylesheet' href='style.css'>

	<link rel='stylesheet' href='css/mediaqueries.css'>

	<link rel='stylesheet' href='colors/default.css'>

	<link rel="shortcut icon" href="#">

	<link rel="apple-touch-icon" href="#">

	<link rel="apple-touch-icon" sizes="72x72" href="#">

	<link rel="apple-touch-icon" sizes="114x114" href="#">

	<!--[if lt IE 9]>

	<script src="js/html5shiv.js"></script>

	<![endif]-->

	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>

<body class=" fwslider">

<div id="mobile-bar">

	<a class="menu-trigger" href="#mobilemenu"><i class="fa fa-bars"></i></a>

	<h1 class="mob-title">Home</h1>

</div>



<div id="page">

	<header id="header">

		<div class="container">

			<div class="row">

				<div class="col-lg-10 col-lg-offset-1">					

					<nav class="nav row">

						<div class="col-sm-5">

							<ul class="navigation left-nav">

								<li class='current'><a class='current' href="#">Organización</a></li>

								<li><a href="#">Servicios</a></li>

								<li><a href="#">Atracciones</a></li>								

							</ul>

						</div>

						<div class="col-sm-2">

							<h1 class="logo"><a class='current' href="#"><img src="images/logo.png" alt=""></a></h1>

						</div>

						<div class="col-sm-5">

							<ul class="navigation right-nav">

								<li><a href="#">Instlaciones</a></li>

								<li><a href="#">Encuesta</a></li>

								<li><a href="#">Promociones</a></li>								

							</ul>

						</div>

					</nav>

					<div id="mobilemenu">

						<ul>

							<li class='current'><a class='current' href="#">Organización</a></li>

							<li><a href="#">Servicios</a></li>

							<li><a href="#">Atracciones</a></li>

							<li><a href="#">Instalaciones</a></li>

							<li><a href="#">Encuesta</a></li>

							<li><a href="#">Promociones</a></li>

						</ul>

					</div>

				</div> <!-- main container -->

			</div>

		</div>

	</header>



	<div id="slider" class="flexslider loading">

		<ul class="slides">

			<li style="background: url('images/slider/slider_1.jpg') no-repeat top center"></li>

			<!--<li style="background: url('images/slider/slider_2.jpg') no-repeat top center"></li>

			<li style="background: url('images/slider/slider_3.jpg') no-repeat top center"></li>!-->

		</ul>

	</div> <!-- #slider -->



	<div class="booking-wrap">

		<div class="container">

			<div class="row">

				<div class="col-lg-7">

					<h2 class="title" style="color:#fff">¿Quieres saber en qué atracciones puedes subir?</h2>

					<p>Por motivos de seguridad, dependiendo de los niveles de sensación, tamaño y sujeciones, el acceso a algunas atracciones está restringido en función de la altura del usuario.</p>

				</div>

				<div class="col-lg-5">

					<form class="b-form group" method="post" action="view.php">

						<div class="departure group">

							<select name="adults" id="adults" class="dk"  style="width:45%">

								<option selected disabled>Metros</option>

								<option value="0">0</option>

								<option value="1">1</option>

								<option value="2">2</option>			

							</select>

						</div>

						<div class="departure group" style="width:45%">

							<select name="room" id="room" class="dk">

								<option selected disabled>Centímetros</option>

								<option value="1">1</option>

								<option value="2">2</option>

								<option value="3">3</option>

								<option value="4">4</option>

								<option value="5">5</option>

							</select>

						</div>

						<div class="bookbtn group">

							<button type="submit">Consultar</button>

							<!--<a href="prc.php?ajax=true&amp;width=400&amp;height=160" rel="prettyPhoto[ajax]">Consultar</a>-->

						</div>

					</form>

				</div>

			</div>

		</div>

	</div> <!-- .booking-wrap -->



	<main id="main">

		<div class="container">

	      <h2>Restricciones por altura</h2>

	      <p>Ten en cuenta que por seguridad algunas atracciones tienen otras restricciones además de la altura (edad, constitución física, etc.) Por lo que es posible que no puedas acceder a algunas de las atracciones que aparecen a continuación. Puedes consultar más detalles en el teléfono 902 16 17 16 o bien a través del formulario de contacto.</p>

			<br>

			  <div class="container">

			  <i class="fa fa-child"></i> Podrás montar solo.  |  <i class="fa fa-child"></i><i class="fa fa-female"></i> Es necesario montar acompañado de un adulto.  |  <i class="fa fa-thumbs-o-up"></i> *Sin restricciones de altura o restricciones no disponibles en la web.



			  </div>

			<br>  

	      <div class="table-responsive">          

	      <table class="table table-striped">

	        <thead>

	          <tr>

	            <th>&nbsp;</th>

	            <th>Nombres</th>	            

	            <th>Estaturas Permitidas</th>

	            <th>Otras Restricciones</th>

	          </tr>

	        </thead>

	        <tbody>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>

	          <tr>

	            <td><i class="fa fa-child"></i></td>

	            <td>Carrusel Mágico</td>	            

	            <td>Hasta 1,10 m deben ir acompañados por un adulto.</td>

	            <td>Menores de 2 años deben subir en plazas fijas</td>	            

	          </tr>	          

	        </tbody>

	      </table>

	      </div>

	    </div>		

	</main>



	<footer id="footer">

		<div class="container">

			<div class="row">

				<div class="col-lg-10 col-lg-offset-1">

					<hr>

					<nav class="nav row">

	<div class="col-sm-5">

		<ul class="navigation left-nav">

			<li class='current'><a class='current' href="#">Organización</a></li>

			<li><a href="#">Servicios</a></li>

			<li><a href="#">Atracciones</a></li>			

		</ul>

	</div>

	<div class="col-sm-2">

		<div class="logo"><a class='current' href="#"><img src="images/logo.png" alt=""></a></div>

	</div>

	<div class="col-sm-5">

		<ul class="navigation right-nav">

			<li><a href="#">Instalación</a></li>

			<li><a href="#">Encuesta</a></li>

			<li><a href="#">Promociones</a></li>

		</ul>

	</div>

</nav>

					<p class="credits">Copy WebSolutionconsulting.com</p>

				</div>

			</div>

		</div>

	</footer>

</div>

<script src='js/jquery-1.10.1.min.js'></script>

<script src='js/jquery-ui-1.10.4.custom.min.js'></script>

<script src='js/superfish.min.js'></script>

<script src='js/jquery.flexslider-min.js'></script>

<script src='js/jquery.mmenu.min.js'></script>

<script src='js/jquery.dropkick-min.js'></script>

<script src='js/jquery.fitvids.js'></script>

<script src='js/jquery.prettyPhoto.js'></script>

<script src='js/contact.js'></script>

<script src='js/scripts.js'></script>

</body>

</html>