<?php
session_start();
if(!isset($_SESSION["idorder"])){
    echo "<script>location.href='index.php'</script>";
}
$idorder = $_SESSION["idorder"];
$data_order = Order::find($_SESSION["idorder"]);

/*if(!isset($data_order->intcartsede)){
	if(isset($_SESSION["sess_cart_sede"])){
	    if($_SESSION["sess_cart_sede"] == 1){ //Granja Villa Sur
	        include('lib.inc');
        }else{ //Granja Villa Norte
        	include('lib.norte.inc');
        }
    }else{
    	echo "<script>location.href='index.php'</script>";
    }*/
//}else{
    //echo "id de pedido único : " . $data_order->intcartid;
if($data_order->intcartsede == 1){ //Granja Villa Sur
	echo "<script>location.href='/tienda/PagoVisa/index.php'</script>";
}else{ //Granja Villa Norte
	include('lib.norte.inc');
}
//}
//Se asigna el código de comercio y Nro. de pedido
$numPedido = $idorder;
$codTienda = VISA_DEV_MERCHANT_ID;
$_SESSION["tienda"] = $codTienda;
$mount = number_format($data_order->deccarttotal,2,".","");

echo "<div style='text-align:center;margin-top:80px;'><h2>VALIDANDO...</h2></div>";
echo "<div style='text-align:center;'>Numero de pedido: ".$numPedido."</div>";
sleep(3);

/////////////////////
