<?php
include 'inc_header.php';
include 'constantes.php';
include 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<title>La Granja Villa - Promociones</title>
<link rel="shortcut icon" href="assets/img/favicon.ico">
<link rel="stylesheet" href="css/estilos.css">
<link href="https://fonts.googleapis.com/css?family=Slackey&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
<!--<script src="js/function.js" type="text/javascript"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
      .btn-color{
        background-color: #5a3813;
        color: #fff;
      }
    
    </style>
    
<!--<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>-->
  
</head>
<body>
  <div class="hero-image">
    <div class="container hero-text">
      <div class="container" style="width: 300px; height: 250px;" align="center">
          <p class="text-h2">Inicio de Sesión</p>
          <img src="assets/img/logo.png" class="img-responsive" width="160" height="160" style="margin-top: 20px;">
      </div>
      <div class="container" style="width: 300px; height: 250px; margin-top: 15px;">
        <form action="proc_login.php" method="post">
          <div class="form-row">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required>            
            </div>
          </div>
          <div class="form-row">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>      
            </div>
          </div>
          <button type="image" class="btn btn-color" style="width: 132px; margin-bottom: 7px;">Iniciar Sesión</button>
          <a href="https://lagranjavilla.com/"><button type="button" class="btn btn-color" style="width: 132px; margin-bottom: 7px;">Cancelar</button></a>
          <?php
             if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
             {
                echo "<div class='text-center' style='color:red'>Usuario o contraseña invalido </div>";
             }
          ?>
        </form>
          <center>
          <a href="registro.php" class="btn btn-link" style="color: #5a3813;">Regístrate</a>
          <a href="recuperar.php" class="btn btn-link" style="color: #5a3813;">Recuperar contraseña</a>
          </center>
      </div>
    </div>
  </div>
  <!-- Bootstrap Plugin - open dropdown on hover -->
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-30833338-1']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!--[if lt IE 9]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->


</body>

</html>
