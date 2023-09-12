<?php
session_start();
if(!isset($_POST["idorder"])){    
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
}*/
//}else{
//echo "id de pedido único : " . $data_order->intcartid;
if($data_order->intcartsede == 1){ //Granja Villa Sur
	include('lib.inc');
}else{ //Granja Villa Norte
	include('lib.norte.inc');
}

$nuevo_idorder = Order::find_by_sql("select (MAX(intCartId) + 1) idorder from `order`");
$idnuevo = $nuevo_idorder[0]->idorder;

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE `order` SET intCartId='".$idnuevo."' WHERE intCartId='".$idorder."'";
$sql2 = "UPDATE `orderdet` SET intCartId='".$idnuevo."' WHERE intCartId='".$idorder."'";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {

//}
//Se asigna el código de comercio y Nro. de pedido
$numPedido = $nuevo_idorder[0]->idorder;
$codTienda = CODIGO_TIENDA;
//$_SESSION["tienda"] = $codTienda;
$mount = number_format($data_order->deccarttotal,2,".","");

echo "<div style='text-align:center;margin-top:80px;'><h2>VALIDANDO...</h2></div>";
echo "<div style='text-align:center;'>Numero de pedido: ".$numPedido."</div>";
sleep(3);

/////////////////////
$data_cliente = Cliente::find($data_order->intclienteid);

$nombre = $data_cliente->scliename;
$apellido = $data_cliente->sclieapel;
$ciudad = "";
$direccion = $data_cliente->sclieaddr;
$correo = $data_cliente->scliemail;



$datoComercio= "LA GRANJA VILLA";
//Se arma el XML de requerimiento
$xmlIn = "";
$xmlIn = $xmlIn . "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
$xmlIn = $xmlIn . "<nuevo_eticket>";
$xmlIn = $xmlIn . "	<parametros>";
$xmlIn = $xmlIn . "		<parametro id=\"CANAL\">3</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"PRODUCTO\">1</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"CODTIENDA\">" . $codTienda . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"NUMORDEN\">" . $numPedido . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"MOUNT\">" . $mount . "</parametro>";

$xmlIn = $xmlIn . "		<parametro id=\"NOMBRE\">" . $nombre . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"APELLIDO\">" . $apellido . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"CIUDAD\">" . $ciudad . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"DIRECCION\">" . $direccion . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"CORREO\">" . $correo . "</parametro>";

$xmlIn = $xmlIn . "		<parametro id=\"DATO_COMERCIO\">" . $datoComercio . "</parametro>";
$xmlIn = $xmlIn . "	</parametros>";
$xmlIn = $xmlIn . "</nuevo_eticket>";

//Se asigna la url del servicio
$servicio= URL_WSGENERAETICKET_VISA;

//Invocación del web service
$conf=array();
//Se habilita el parametro PROXY_ON en el archivo "lib.inc" si se maneja algun proxy para realizar conexiones externas.
if(PROXY_ON == true){
	$conf=array('proxy_host'     => PROXY_HOST,
					'proxy_port'     => PROXY_PORT,
					'proxy_login'    => PROXY_LOGIN,
					'proxy_password' => PROXY_PASSWORD);
}
$client = new SoapClient($servicio, $conf);

//parametros de la llamada
$parametros=array(); 
$parametros['xmlIn']= $xmlIn;

//Aqui captura la cadena de resultado
$result = $client->GeneraEticket($parametros);

//Aqui carga la cadena resultado en un XMLDocument (DOMDocument)
$xmlDocument = new DOMDocument();

if ($xmlDocument->loadXML($result->GeneraEticketResult)){
	/////////////////////////[MENSAJES]////////////////////////
	//Ejemplo para determinar la cantidad de mensajes en el XML
	$iCantMensajes= CantidadMensajes($xmlDocument);
	//echo 'Cantidad de Mensajes: ' . $iCantMensajes . '<br>';
	
	//Ejemplo para mostrar los mensajes del XML 
	for($iNumMensaje=0;$iNumMensaje < $iCantMensajes; $iNumMensaje++){
		echo 'Mensaje #' . ($iNumMensaje +1) . ': ';
		echo RecuperaMensaje($xmlDocument, $iNumMensaje+1);
		echo '<BR>';
		echo "Numero de pedido: " . $numPedido;
	}
	/////////////////////////[MENSAJES]////////////////////////
	
	if ($iCantMensajes == 0){
		$Eticket= RecuperaEticket($xmlDocument);
		//echo 'Eticket: ' . $Eticket;
		echo '<div class="container"  id="content-mod-center">
			<div class="row container">
				<h3>REDIRECCIONANDO...</h3>
			</div>
		</div>';
		$html= htmlRedirecFormEticket($Eticket);
		echo $html;
		
		exit;
	}
			
}else{
	echo '
	<div class="container"  id="content-mod-center">
    	<div class="row container">
			<h3 class="text-center">OCURRIÓ UN ERROR, POR FAVOR, VUELVA A INTENTARLO.</h3>
    	</div>
	</div>';
	
	//echo "Error cargando XML";
	}
	} else {
    echo "<script>location.href='index.php'</script>";
}
?>
<!--<div class="container"  id="content-mod-center">

    <div class="row container">

        <h3>REDIRECCIONANDO...</h3>

    </div>

</div>-->