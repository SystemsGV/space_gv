<?php

//include("inc.var.php");
include("modelo.php");
session_start();
if(isset($_SESSION['session_socio'])){
	$id=$_SESSION['session_socio'];
	$idfnac=$_SESSION['session_sociofnac'];
	$idtarjeta=$_SESSION['session_tarjeta'];
	//$socio = new cls_emp_socio($id);

	$sql="SELECT c.cClieCode,c.sClieApel,t.nTarjNumb,c.sClieName,c.sClieAddr,c.sClieTelf,c.sClieMail,c.dNacmDate,c.charclientedni,t.dcadudate FROM CLIENTE AS c, TARJETA AS t WHERE c.cClieCode=t.cClieCode AND t.nTarjNumb='$idtarjeta' AND c.dNacmDate='$idfnac'";
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

function formatDateTime($charCurrent,$charReplace,$date,$no_show_hour=0){
	$date=explode($charCurrent,$date);
	$time=explode(" ",$date[2]);
	if($no_show_hour){
		$newDate=$time[0].$charReplace.$date[1].$charReplace.$date[0];
	}else{
		$newDate=$time[0].$charReplace.$date[1].$charReplace.$date[0]." ".$time[1];
	}
	
	return $newDate;
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
    <title>Socios Granja Villa</title>
  </head>
  <style type="text/css">

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
    .container, .row {
        height: 100%;
        min-height: 100%;
      }
    .navtitulo{
      font-family: 'riffic_freebold', sans-serif;
      font-weight: 100; 
      font-size: 16px; 
    }
    .navtitulo a:hover{
      font-family: 'riffic_freebold', sans-serif;
      background-color: #fff;

    }
    body {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        min-width: 100%;
        min-height: 100vh;
        background-image: url('imgclub/Pantalla.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }

      @media (max-width: 991.98px) {
        .navbar-expand-lg>.container, .navbar-expand-lg>.container-fluid, .navbar-expand-lg>.container-lg, .navbar-expand-lg>.container-md, .navbar-expand-lg>.container-sm, .navbar-expand-lg>.container-xl {
          display: inline-grid;
        }
      } 

      @media (min-width: 991.99px) {
        .navbar-brand {
          margin-right: 5rem;
        }
      } 

      @media (min-width: 2430px) {
        .body {
            margin-top: -42px;
        }
      }

      @media (min-width: 726px) and (max-width: 2429px) {
        .body {
            margin-top: -42px;
        }
      }

      @media (min-width: 375px) and (max-width: 725px) {
        .body {
            margin-top: -22px;
        }
      }

      @media (min-width: 361px) and (max-width: 374px) {
        .body {
            margin-top: 65px;
        }
      }

      @media (max-width: 360px) {
        .body {
            margin-top: 16px;
        }
        .csscontainerAndversoReversoMobile, .cssanversoMobile, .cssreversoMobile {
          width: 280px !important;
          height: 177px !important;
        }
        .csscontainerDatosMobile {
          margin-top: 3px !important;
        }
        #csscontainerLogoNombreMobile {
          display: inline-grid;
          margin-right: 0rem;
        }
        #cssimgLogoMobile {
          margin: auto;
          
        }
      }

      html {

      }
  </style>
  <body class="body">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <div class="container" style="justify-content: center; align-items: center; text-align: center;">
        <a id="csscontainerLogoNombreMobile" name="" class="navbar-brand" href="#">
          <img id="cssimgLogoMobile" name="cssimgLogoMobile" src="imgclub/logo.png" width="80" height="70" alt="">
           <span class="name"> Hola, <?php echo $_SESSION['session_name'];?> </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav">

              <li class="nav-item">
              <a class="nav-link navtitulo" href="socios.php">DATOS DE SOCIO <span class="sr-only"></span></a>
            </li>
              <li class="nav-item ">
              <a class="nav-link navtitulo active" href="tarjeta.php">DATOS DE TARJETA <span class="sr-only"></span></a>
            </li>
              <li class="nav-item ">
              <a class="nav-link navtitulo" href="renueva.php">RENUEVA TU MEMBRESÍA <span class="sr-only"></span></a>
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
  <div class="container" style="padding-left: 0px; padding-right: 0px;">
    <div class="csscontainerAndversoReversoMobile" style="width: 365px; height: 230px; margin: auto;">
      <div class="cssanversoMobile" style="width: 365px; height: 230px; border: 1px solid #000000; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 2px 6px -1px rgb(0 0 0 / 10%); transition: box-shadow 0.2s ease-in-out; background-image: url(imgclub/anverso-tarjeta-digital-socio-la-granja-villa.png); background-repeat: no-repeat; background-size: 101% auto; background-position: center; margin-top: -60px;">
      </div>
      <div class="cssreversoMobile" style="width: 365px; height: 230px; border: 1px solid #000000; border-radius: 15px; box-shadow: 0 2px 6px -1px rgb(0 0 0 / 10%); transition: box-shadow 0.2s ease-in-out; background-image: url(imgclub/reverso-tarjeta-digital-socio-la-granja-villa.png); background-repeat: no-repeat; background-size: 113% auto; background-position: center; display: grid; text-align: center;">
        <div class="csscontainerDatosMobile" style="margin-top: 33px;">
          <span style="color: #000000; font-weight: bolder; display: flex; justify-content: center; align-items: center; text-decoration: underline;">NUMERO DE TARJETA</span>
          <span style="color: #000000; display: flex; justify-content: center; align-items: center; margin-top: -6px; margin-bottom: -3px;"><?php echo $_SESSION['session_tarjeta']?></span>
          <span style="color: #000000; font-weight: bolder; display: flex; justify-content: center; align-items: center; font-size: 11px; margin-bottom: -3px;"><span style="text-decoration: underline;">NUMERO MAGICO:</span><span style="font-weight: normal; margin-left: 5px;"><?php echo substr($_SESSION['session_tarjeta'], -1)?></span></span>
          <span style="color: #000000; font-weight: bolder; display: flex; justify-content: center; align-items: center; font-size: 11px; margin-bottom: -3px;"><span style="text-decoration: underline;">FECHA DE CADUCIDAD:</span><span style="font-weight: normal; margin-left: 5px;"><?php echo formatDateTime("-","/",$_SESSION['session_fcaducidad'],1)?></span></span>
          <span style="color: #000000; font-weight: bolder; display: flex; justify-content: center; align-items: center; font-size: 11px; margin-bottom: -7px; text-decoration: underline;">NOMBRE DEL SOCIO</span>
          <span style="color: #000000; display: flex; justify-content: center; align-items: center; font-size: 11px; margin-bottom: -3px;"><?php echo $_SESSION['session_name']." ".$_SESSION['session_surname'];?></span>
          <span style="color: #000000; font-weight: bolder; display: flex; justify-content: center; align-items: center; font-size: 11px; margin-bottom: -3px;"><span style="text-decoration: underline;">NUMERO DE DOCUMENTO:</span><span style="font-weight: normal; margin-left: 5px;"><?php echo $_SESSION['session_documento']?></span></span>
          <span style="color: #000000; font-weight: bolder; display: flex; justify-content: center; align-items: center; font-size: 11px;"><span style="text-decoration: underline;">FECHA DE NACIMIENTO:</span><span style="font-weight: normal; margin-left: 5px;"><?php echo formatDateTime("-","/",$_SESSION['session_sociofnac'],1)?></span></span>
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


