	<? 
include("inc.var.php");
$mod=$_GET[mod]?$_GET[mod]:"index"
?>
<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>	
	<!--<meta charset="utf-8">-->
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Prepara tu visita - La Granja Villa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='css/flexslider.css'>
	<!--<link rel='stylesheet' href='css/font-awesome.css'>-->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='css/weather-icons.css'>
	<!--<link rel='stylesheet' href='css/bootstrap.css'>-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel='stylesheet' href='css/prettyPhoto.css'>
	<link rel='stylesheet' href='css/mmenu.css'>
	<link rel='stylesheet' href='css/jquery-ui-1.10.4.datepicker.min.css'>
	<link rel='stylesheet' href='style.css'>
	<link rel='stylesheet' href='css/mediaqueries.css'>
	<link rel='stylesheet' href='color/default.css'>
	<link rel="shortcut icon" href="#">
	<link rel="apple-touch-icon" href="#">
	<link rel="apple-touch-icon" sizes="72x72" href="#">
	<link rel="apple-touch-icon" sizes="114x114" href="#">
	<link rel="stylesheet" href="fotorama/fotorama.css">	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>	
</head>
<body class=" fwslider">
<? include("top.php") ?>
	<main id="main">
		<?
		if(file_exists("mod/{$mod}.php")){
			include("mod/{$mod}.php");
		}
		?>
	</main>
	<footer id="footer"><? include("footer.php") ?></footer>
<script src='js/jquery-1.10.1.min.js'></script>
<script src='js/jquery.easing.1.3.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/liteaccordion.jquery.min.js"></script>
<script src='js/jquery-ui-1.10.4.custom.min.js'></script>
<script src='js/superfish.min.js'></script>
<script src='js/jquery.flexslider-min.js'></script>
<script src='js/jquery.mmenu.min.js'></script>
<script src='js/jquery.dropkick-min.js'></script>
<script src='js/jquery.fitvids.js'></script>
<script src='js/jquery.prettyPhoto.js'></script>
<script src='js/contact.js'></script>
<script src="fotorama/fotorama.js"></script>
<script src='js/scripts.js'></script>
</body>
</html>