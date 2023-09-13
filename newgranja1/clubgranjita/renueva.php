<?php

include("inc.var.php");
include("modelo.php");

if(isset($_SESSION['session_socio'])){
	$id=$_SESSION['session_socio'];
	$idfnac=$_SESSION['session_sociofnac'];
	$idtarjeta=$_SESSION['session_tarjeta'];
	$socio = new cls_emp_socio($id);

	$sql="SELECT c.cClieCode,c.sClieApel,t.nTarjNumb,c.sClieName,c.sClieAddr,c.sClieTelf,c.sClieMail,c.dNacmDate FROM CLIENTE AS c, TARJETA AS t WHERE c.cClieCode=t.cClieCode AND t.nTarjNumb='$idtarjeta' AND c.dNacmDate='$idfnac'";
//	$sql="select * from Cliente where ccliecode=".$id." and dnacmdate='$idfnac' order by ccliecode";
	$rsl=mysqli_query($database,$sql)or die(mysqli_error($database));
	$rs=mysqli_fetch_array($rsl);
	//$sql2="SELECT * FROM Acumulacion_Punto WHERE cClieCode='$id' ORDER BY cClieCode";
	//$rsl2=mysqli_query($database, $sql2)or die(mysqli_error($database));
	//echo "tot:".$tot=mysql_num_rows($rsl2);
	//$rs2=mysqli_fetch_array($rsl2);
}else{
	header("location:frm_login.php");
}
?>

<!doctype html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imgclub/favicon.ico">
    <script src="https://kit.fontawesome.com/c51b016b55.js" crossorigin="anonymous"></script>
    <title>Socios Granja Villa</title>
  </head>
  <style type="text/css">
    .container, .row {
        height: 100%;
        min-height: 100%;
      }
      @font-face {
    font-family: 'riffic_freebold';
    src: url('fonts/rifficfree-bold-webfont.woff2') format('woff2'),
         url('fonts/rifficfree-bold-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
  }
    .textotitulo{
      font-family:'riffic_freebold', sans-serif; 
      font-weight: 200; 
      font-size: 26px; 
    }
    .textotitulo2{
      font-family:'riffic_freebold', sans-serif; 
      font-weight: 100; 
      font-size: 22px; 
    }
    .navtitulo{
      font-family: 'riffic_freebold', sans-serif;
      font-weight: 100; 
      font-size: 16px; 
    }
    .navtitulo a:hover{
      font-family: 'riffic_freebold', sans-serif;
      color: #fff;

    }

      body{
      	height: 100%;
		background:
		 url("imgclub/Pantalla.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
    background-attachment: fixed;
      }

      html {
      }
  </style>
  <body class="body">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <div class="container">
        <a class="navbar-brand" href="#">
          <img src="imgclub/logo.png" width="80" height="80" alt="">
           <span class="name"> Hola, <?php echo $_SESSION['session_name'];?> </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav">

              <li class="nav-item">
              <a class="nav-link navtitulo " href="socios.php">DATOS DE SOCIO <span class="sr-only"></span></a>
            </li>
            <!--<li class="nav-item ">
              <a class="nav-link navtitulo" href="tarjeta.php">DATOS DE TARJETA <span class="sr-only"></span></a>
            </li>-->
              <li class="nav-item ">
              <a class="nav-link navtitulo active" href="renueva.php">RENUEVA TU MEMBRESÍA <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link navtitulo" href="promosocio.php">PROMOCIONES</a>
              </li>
            <li class="nav-item">
                  <a class="nav-link navtitulo" href="cerrarsesion.php">SALIR</a>
              </li>
            </ul>
          </ul>
        </div>
    </div>
  </nav>
  <div class="container">
    <div class="row justify-content-center align-items-center">

        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
             <img src="imgclub/socios.png" height="30" width="30" align="left" style="margin-right: 8px;" ><h6 class="textotitulo">    Renueva tu membresia</h6>
              <p class="add1">
              Renueva tu membresía
Para renovar tu código de socio, debes depositar* S/ 25.00 nuevos soles por cada código de socio a renovar. Tenemos la siguiente cuenta en soles a su disposición para efectuar el pago: Banco Continental: 0011-0130-0100046404-28 - BBVA. Es importante recordar que toda renovación se realiza con 48 horas de anticipación de ser un depósito o transferencia, de esta manera podremos hacer las verificaciones correspondientes con el área contable. Luego de realizar el abono deberá ingresar la fecha de abono, el número de operación y enviar el voucher de pago escaneado al siguiente correo: atencionalcliente@lagranjavilla.com. <br> (*) Para todos aquellos depósitos y/o transferencias realizados desde provincia por concepto de renovación de membresía el cliente deberá asumir los cargos adicionales que genere la transferencia a cuenta de LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.
            </p><br>
           <!--  <form name="form1" method="post">
              <h6 class="card-title">Renueva aquí tu Membresía</h6>
               <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                        <input name= "txt_psw1" type="text" id="txt_psw1"formaction="" class="form-control"  placeholder="Fecha de pago" required >
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                        <input  name="txt_psw2" type="text" id="txt_psw2" class="form-control" placeholder="N° de Operación" required >
                    </div>
                  </div>
                </div>
                </form> -->
            </div>
          </div>
          <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>-->
        </div>
        <div class="div1">
          <div class="card">
            <div class="card-body">
              <img src="imgclub/deposito.jpg" class="card-img-top" alt="...">
            </div>
          </div>
        </div>

    </div>

  </div>
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
</body>
</html>


