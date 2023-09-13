<?php
    include '../inc.var.php';
    include 'config/functions.php';
    include '../includes/sendmail/class.phpmailer.php';
    require_once("../Adminv2/libs/dompdf/dompdf_config.inc.php");
    $nombre = $_GET["nombre"];
    $moneda = $_GET["moneda"];
    $productos = $_GET["cantidad"];
    $descrip = $_GET["descript"];

    $transactionToken = $_POST["transactionToken"];
    $email = $_POST["customerEmail"];
    $amount = $_GET["amount"];
    $purchaseNumber = $_GET["purchaseNumber"];
    $data_order   = Order::find($purchaseNumber);
    $data_cliente = Cliente::find($data_order->intclienteid);
    $token = generateToken();
    $data = generateAuthorization($amount, $purchaseNumber, $transactionToken, $token);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/png" href="assets/img/logog.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Respuesta Visa - La Granja Villa</title>
  </head>
  <style>
    .color{
      background: #f8ff87 !important;
    }
    
    .h{
      text-align: center;
    }
    
    .table-responsive {
      max-height:300px;
    }
  </style>
<body>
    <section style="height: 130px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top color">
            <div class="container d-flex justify-content-center">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logog.png" width="90" height="90" alt="">
                </a>
                <!-- <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Salir<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>
    </section>
    <?php
    if (isset($data->dataMap)) {
        if ($data->dataMap->ACTION_CODE == "000") {
            $c = preg_split('//', $data->dataMap->TRANSACTION_DATE, -1, PREG_SPLIT_NO_EMPTY);
    ?>
    <div class="container justify-content-center">
        <div class="alert alert-success text-center" role="alert">
            EL PROCESO DE PAGO SE REALIZÓ SATISFACTORIAMENTE
        </div>
        <div class="container" id="PagoVisa">
            <p style="font-size: 35px;">Información del Pago</p>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Número de Pedido</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $purchaseNumber; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Nombre y Apellido</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $nombre; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Descripción del Producto</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $descrip; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Cantidad</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $productos; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Tipo de Moneda</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $moneda; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Fecha y Hora del Pedido</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $c[4].$c[5]."/".$c[2].$c[3]."/".$c[0].$c[1]." ".$c[6].$c[7].":".$c[8].$c[9].":".$c[10].$c[11]; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Tarjeta</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $data->dataMap->CARD." (".$data->dataMap->BRAND.")"; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Importe Pagado</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $data->order->amount. " ".$data->order->currency; ?></label>
            </div>
            <p>En breve le enviaremos un mail de confirmación del pedido.</p>
            <p>Para mayor seguridad, puede guardar esta información haciendo click en el botón <a href="#" id="onclick">Imprimir.</a></p>
            <label for="ckbTerms">
                <a href="https://lagranjavilla.com/tienda/terminos_condiciones.pdf" target="_blank">Términos y condiciones</a>
            </label>
        </div><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="cerrarsesion.php"><input type="button" class="btn btn-warning color" value="Finalizar"></a>
            </div>
        </div>
    </div>
    <?php
            include 'contenido.php';
        }
    } else {
        $c = preg_split('//', $data->data->TRANSACTION_DATE, -1, PREG_SPLIT_NO_EMPTY);
    ?>
    <div class="container justify-content-center">
        <div class="alert alert-danger text-center" role="alert">
            ¡Algo a salido mal!, por favor vuelva a intentarlo.
        </div>
        <div class="container" id="PagoVisa">
            <p style="font-size: 35px;">Información del Pago</p>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Número de Pedido</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $purchaseNumber; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Nombre y Apellido</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $nombre; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Fecha y Hora del Pedido</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $c[4].$c[5]."/".$c[2].$c[3]."/".$c[0].$c[1]." ".$c[6].$c[7].":".$c[8].$c[9].":".$c[10].$c[11]; ?></label>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label font-weight-bold">Tarjeta</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $data->data->CARD." (".$data->data->BRAND.")"; ?></label>
            </div>
        </div><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-warning color" onclick="location='https://lagranjavilla.com/tienda/?mod=form-2'">Regresar</button>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $("#onclick").on('click', function(event) {
            event.preventDefault();
            var div = document.querySelector("#PagoVisa");
            imprimirElemento(div);
        });
    </script>
    <script>
        function imprimirElemento (elemento) {
            var ventana = window.open('', 'PRINT', 'height=400,width=800');
            ventana.document.write('<html><head><title>' + document.title + '</title>');
            ventana.document.write('<link rel="stylesheet" href="style.css">');
            ventana.document.write('</head><body>');
            ventana.document.write(elemento.innerHTML);
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.onload = function () {
                ventana.print();
                ventana.close();
            }
            return true;
        }
    </script>
</body>
</html>