<?php
include './admin/includes/inc_header.php';
include './admin/includes/constantes.php';
include './admin/includes/funciones.php';
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="js-no ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="js-no ie10"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<head>
	<title>Cuponera Granja Villa</title>
	<link rel="shortcut icon" href="assets/img/favicon.ico">

	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Cupones Granja Villa">
	<meta name="author" content="La Granja Villa">

	<!--  Boostrap Framework  -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!--=== CSS - Dragonfly ===-->
	<link href="assets/css/themes/light-blue.css" rel="stylesheet" id="colors">

	<!--=== LESS - Dragonfly ===-->
	<!--    <link href="assets/less/themes/light-blue.less" rel="stylesheet/less">-->

	<!-- Google Fonts - Lato -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">

	<!-- Font Awesome Icons -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- CSS Animations -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet">

	<!--  Slippry Slideshow -->
	<link href="assets/css/slippry.min.css" rel="stylesheet">
        
        <!-- jQuery -->
        <script src="assets/js/min/jquery.min.js"></script>
        <!--script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script-->
        <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.1.0/less.min.js"></script>-->

        <!-- Modernizr -->
        <script src="assets/js/min/modernizr.custom.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        
        
</head>
<body>

    <section class="bg-6 bg-center bg-cover  section-fxd">
        <div class="bg-filter">
            <div class="hv-center">
                <div class="sign-up">
                    <div class="sign-up-hr hidden-xs"></div>                    
                    <div class="row" style="padding-top:15px;">
                        <div class="col-md-6 col-sm-6" align="center">
                                <h2 style="color:#333; margin-top:0px;">Iniciar Sesión</h2>
                                <img src="assets/img/logo.png" class="img-responsive">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <span id="error" class="text-danger hidden text-center"> Por favor Verificar su usuario o Consulte a su Administrador </span>
                            
                            <form method="POST" role="form" class="icon">
                                <div class="form-group">
                                    <div class="control">
                                        <input type="user" id="user" name="user" class="form-control" placeholder="Usuario">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="control">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>

                                <button id="btnSuccess" type="button" class="btn btn-success"><i class="fa fa-check"></i>Ingresar a su cuenta</button>
                                <div class="space visible-sm visible-xs"></div>
                            </form>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Back to top-->
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a> 
    
    
    
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnSuccess").click(function(){
            var formValues = $("form").serialize();
            console.log(formValues);
            $.post('controller/prc_login.php', formValues, function(data){
                if($.trim(data) === "OK"){
                    $(location).attr('href', 'main.php');
                }else{
                    //alert("Usuario y/o contraseña son incorrectos.");
                    $("#error").removeClass('hidden');
                    $("#error").addClass('show');
                   
                    return false;
                }
            });
        });
    });
</script>
    

    

<!-- Bootstrap Plugin - open dropdown on hover -->
<script src="assets/js/min/bootstrap-hover-dropdown.min.js"></script>

<!-- LESS preprocessor -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.4/less.min.js"></script>

<!-- WOW.js - loading animations -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/wow/0.1.6/wow.min.js"></script>

<!-- Knobs - our skills -->
<script src="http://cdn.jsdelivr.net/jquery.knob/1.2.9/jquery.knob.min.js"></script>

<!-- Slippry - Slideshow -->
<script src="assets/js/min/slippry.min.js"></script>

<!-- Mixitup plugin - Portfolio Filter Grid -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/mixitup/1.5.6/jquery.mixitup.min.js"></script>

<!-- Make sticky whatever elements -->
<script src="http://cdn.jsdelivr.net/jquery.sticky/1.0.0/jquery.sticky.min.js"></script>

<!-- Smooth sroll -->
<script src="http://cdn.jsdelivr.net/jquery.nicescroll/3.5.4/jquery.nicescroll.min.js"></script>

<!-- Contact Form -->
<script src="assets/js/min/contact-form.min.js"></script>

<!-- Must be last of all scripts -->
<script src="assets/js/min/scripts.min.js"></script>

<!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</body>

</html>
