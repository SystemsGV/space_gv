<?php
    include '../inc.var.php';
    include 'config/functions.php';
    session_start();
    if(!isset($_SESSION["idorder"])){
        echo "<script>location.href='/tienda/PagoVisa/index.php'</script>";
    }
    $idorder = $_SESSION["idorder"];
    $data_order = Order::find($_SESSION["idorder"]);

    $postdet = Orderdet::find_by_sql("select cd.intCartdetId,cd.charCartdetTipo,b.charBoletoCodigo,b.varBoletoTitulo,charcartdetdni,varcartdettelefono,decCartdetPu,intCartdetCant,decCartdetStotal from orderdet cd LEFT JOIN boleto b ON cd.intBoletoId=b.intBoletoId WHERE cd.intcartid = '{$data_order->intcartid}' ");
    foreach($postdet as $k=>$v){
        $amount = number_format($data_order->deccarttotal,2,".","");
        $detallePago = "Venta de Pulsera";
        $nombre = $_SESSION["sess_user"]["usuario"];
        $moneda= 'Soles';
        $productos = count($_SESSION["sess_cart"]);
        $produc = $v->intcartdetcant;
        $descrip = $v->varboletotitulo;
        $token = generateToken();
        $sesion = generateSesion($amount, $token);
        $purchaseNumber = $idorder;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="assets/img/logog.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Pago Visa - La Granja Villa</title>
</head>
<style>
    .color{
      background: #f2fd4dbd !important;
    }
    .h{
      text-align: center;
    }
    .table-responsive {
      max-height:400px;
    }
</style>
<body>
    <section style="height: 130px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top color">
            <div class="container justify-content-center">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logog.png" width="90" height="90" alt="">
                </a>
            </div>
        </nav>
    </section>
    <div class="container">
        <h1 class="h font-weight-light">PAGO CON VISA</h1><br>
        <div class="table-responsive">
            <table class="table h display responsive nowrap">
                <thead>
                    <tr>
                        <th colspan="2">Información del Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="width: 50%">Número de Pedido</th>
                        <td><?php echo $purchaseNumber; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre y Apellido</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Descripción del Producto</th>
                        <td><?php echo $descrip; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cantidad</th>
                        <td><?php echo $productos; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo de Moneda</th>
                        <td><?php echo $moneda; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha</th>
                        <td><?php echo date("d/m/Y"); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Importe a Pagar</th>
                        <td>S/. <?php echo $amount; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><br>
        <input type="checkbox" name="ckbTerms" id="ckbTerms" onclick="visaNetEc3()"> <label for="ckbTerms">Acepto los <a href="https://lagranjavilla.com/tienda/terminos_condiciones.pdf" target="_blank">Términos y condiciones</a></label>
        <form id="frmVisaNet" action="https://lagranjavilla.com/tienda/PagoVisa/finalizar.php?amount=<?php echo $amount;?>&purchaseNumber=<?php echo $purchaseNumber?>&nombre=<?php echo $nombre?>&descript=<?php echo $descrip?>&cantidad=<?php echo $productos?>&moneda=<?php echo $moneda?>">
            <script src="<?php echo VISA_URL_JS?>"
                data-sessiontoken="<?php echo $sesion;?>"
                data-channel="web"
                data-merchantid="<?php echo VISA_MERCHANT_ID?>"
                data-merchantlogo="https://lagranjavilla.com/tienda/PagoVisa/assets/img/log.jpg"
                data-purchasenumber="<?php echo $purchaseNumber;?>"
                data-amount="<?php echo $amount; ?>"
                data-expirationminutes="5"
                data-timeouturl="https://lagranjavilla.com/tienda/PagoVisa/">
            </script>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-warning color" onclick="location='https://lagranjavilla.com/tiendaNew/?mod=form-2'">Regresar</button>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
 </body>
</html>