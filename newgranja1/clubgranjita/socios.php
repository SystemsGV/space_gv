<?php

//include("inc.var.php");
include("modelo.php");
session_start();
if (isset($_SESSION['session_socio'])) {
    $id = $_SESSION['session_socio'];
    $idfnac = $_SESSION['session_sociofnac'];
    $idtarjeta = $_SESSION['session_tarjeta'];
    //$socio = new cls_emp_socio($id);

    $sql = "SELECT c.cClieCode,c.sClieApel,t.nTarjNumb,c.sClieName,c.sClieAddr,c.sClieTelf,c.sClieMail,c.dNacmDate FROM CLIENTE AS c, TARJETA AS t WHERE c.cClieCode=t.cClieCode AND t.nTarjNumb='$idtarjeta' AND c.dNacmDate='$idfnac'";
    //	$sql="select * from Cliente where ccliecode=".$id." and dnacmdate='$idfnac' order by ccliecode";
    $rsl = mysqli_query($database, $sql) or die(mysqli_error($database));
    $rs = mysqli_fetch_array($rsl);
    //$sql2="SELECT * FROM Acumulacion_Punto WHERE cClieCode='$id' ORDER BY cClieCode";
    //$rsl2=mysqli_query($database, $sql2)or die(mysqli_error($database));
    //echo "tot:".$tot=mysql_num_rows($rsl2);
    //$rs2=mysqli_fetch_array($rsl2);
} else {
    header("location:frm_login.php");
}

function formatDateTime($charCurrent, $charReplace, $date, $no_show_hour = 0)
{
    $date = explode($charCurrent, $date);
    $time = explode(" ", $date[2]);
    if ($no_show_hour) {
        $newDate = $time[0] . $charReplace . $date[1] . $charReplace . $date[0];
    } else {
        $newDate = $time[0] . $charReplace . $date[1] . $charReplace . $date[0] . " " . $time[1];
    }

    return $newDate;
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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

    .textotitulo {
        font-family: 'riffic_freebold', sans-serif;
        font-weight: 200;
        font-size: 26px;
    }

    .textotitulo2 {
        font-family: 'riffic_freebold', sans-serif;
        font-weight: 100;
        font-size: 22px;
    }

    .container,
    .row {
        height: 100%;
        min-height: 100%;
    }

    .navtitulo {
        font-family: 'riffic_freebold', sans-serif;
        font-weight: 100;
        font-size: 16px;
    }

    .navtitulo a:hover {
        font-family: 'riffic_freebold', sans-serif;
        background-color: #fff;

    }

    body {
        height: 100%;
        background: url("imgclub/Pantalla.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    html {}
</style>

<body class="body">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="imgclub/logo.png" width="80" height="70" alt="">
                <span class="name"> Hola,
                    <?php echo $_SESSION['session_name']; ?>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link navtitulo active" href="socios.php">DATOS DE SOCIO <span class="sr-only"></span></a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link navtitulo" href="tarjeta.php">DATOS DE TARJETA <span
                                    class="sr-only"></span></a>
                        </li>-->
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
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <img src="imgclub/socios.png" height="30" width="30" align="left" style="margin-right: 8px;">
                        <h6 class="textotitulo"> Zona Socios de La Granja Villa</h6>
                        <p class="add">Zona Socios de La Granja Villa
                            Uno de nuestros mayores logros, es observar que las familias que nos visitan, no solo se
                            limitan a observar como disfrutan sus hijos o ellos mismos en los diferentes juegos, lo
                            motivador es ver a padres e hijos recoger la cesta de alimentos para los animales de la
                            granja juntos y lograr entablar todo un proceso de interacción con sus niños, guiándolos por
                            la granja y enseñándoles la forma de alimentar a cada especie. <br>Conocemos la importancia
                            de que los niños compartan con sus padres y familias cercanas un día de entretenimiento para
                            lograr una mayor integración familiar, para ello ofrecemos nuestras instalaciones, donde
                            pueden organizar actividades en fechas tan importantes para toda la familia. (*) Para
                            acceder a los beneficios del socio tendrá que activar su Código de Socio con 48 horas de
                            anticipación, sea renovación o afiliación.

                            <br><strong class="add">ES NECESARIO PRESENTAR SU DNI Y CÓDIGO DE SOCIO VIGENTE PARA ACCEDER
                                A TODOS LOS BENEFICIOS</strong><br><strong class="add">CLUB GRANJA VILLA</strong>
                            <br><strong class="add">Beneficios del Socio*:</strong>
                            <br>
                            <span class="add">- Membresía válida por un año.<br>
                                - Una entrada gratis por cumpleaños del socio. La puedes obtener el mismo día del
                                onomástico o 6 días antes o 6 días después.
                                <br>
                                - Con tu código de socio, ingresa a la web “Club Granja Villa” e imprime tus vales de
                                descuento todos los meses del año (tener en cuenta las indicaciones del cupón).
                                <br>
                                - Una entrada gratis para asistir a la Semana del Socio que te corresponde. De acuerdo a
                                tu número mágico, tendrás una fecha para utilizar esta entrada. Al año, habilitamos 4
                                semanas para nuestros afiliados, los cuales son chocolateados de acuerdo al último
                                número de su código de socio.
                                <br>
                                (*) Los beneficios son –únicamente- para el titular de la membresía.
                                <br>
                                (*) Es obligatorio presentar el código de socio vigente online y DNI en físico para
                                acceder a los beneficios correspondientes.
                                <br>
                                (*) Si tu código de socio venció, está por vencer o se perdió, puedes renovarlo. Costo:
                                S/25.00 (no incluye dispositivo inteligente)
                                <br>
                                (*) Los beneficios del socio se activan 48 horas después de realizada la afiliación o
                                renovación.
                                <br>
                                (*) La membresía puede adquirirse para niños y adultos. No hay edad límite.
                                <br>
                                (*) Los beneficios del socio no incluyen el dispositivo inteligente (pulsera o tarjeta).

                                <br>

                                Solo en LA GRANJA VILLA .<span>
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card info">
                    <div class="card-body">
                        <img src="imgclub/pen.png" height="30" width="30" align="left" style="margin-right: 8px;">
                        <h5 class="textotitulo2">Información del Socio</h5>
                        <strong class="add1">Nombre del socio:</strong>
                        <p class="add" style="font-size: 12px;">
                            <?= $_SESSION['session_nomsocio'] ?>
                        </p>
                        <strong class="add1">Dirección:</strong>
                        <p class="add" style="font-size: 12px;">
                            <?= $rs['sClieAddr'] ?>
                        </p>
                        <strong class="add1">Teléfono:</strong>
                        <p class="add" style="font-size: 12px;">
                            <?= $rs['sClieTelf'] ?>
                        </p>
                        <strong class="add1">Correo Electrónico:</strong>
                        <p class="add" style="font-size: 12px;">
                            <?= $rs['sClieMail'] ?>
                        </p>
                        <strong class="add1">Fecha de Nacimiento:</strong>
                        <p class="add" style="font-size: 12px;">
                            <?= formatDateTime("-", "/", $_SESSION['session_sociofnac'], 1) ?>
                        </p>
                        <strong class="add1">Codigo de Socio</strong>
                        <p class="add" style="font-size: 12px;">
                            <?= $id ?>
                        </p>


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
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>

</html>