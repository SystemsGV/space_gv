<?php
session_start();
if(!isset($_POST["idorder"])){    
    echo "<script>location.href='index.php'</script>";
}
if(!isset($_POST["eticket"])){    
    echo "<script>location.href='index.php'</script>";
}
$idorder = $_POST["idorder"];
$data_order = Order::find($_POST["idorder"]);

/*if(!isset($data_order->intcartsede)){
	if(isset($_SESSION["sess_cart_sede"])){
	if($_SESSION["sess_cart_sede"] == 1){ //Granja Villa Sur
	include('lib.inc');
}else{ //Granja Villa Norte
	include('lib.norte.inc');
}
}else{
	echo "<script>location.href='index.php'</script>";
}
}else{*/
//echo "id de pedido único : " . $data_order->intcartid;
if($data_order->intcartsede == 1){ //Granja Villa Sur
	include('lib.inc');
}else{ //Granja Villa Norte
	include('lib.norte.inc');
}
//}
	
	$Eticket = $_POST["eticket"];
		echo '<div class="container"  id="content-mod-center">
			<div class="row container">
				<h3>REDIRECCIONANDO...</h3>
			</div>
		</div>';
		sleep(2);
		$html= htmlRedirecFormEticket($Eticket);
		echo $html;
		
		exit;
?>
