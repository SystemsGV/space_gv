<?
if(!isset($_POST["eticket"]) && !$_SESSION['idorder'] ){    
    echo "<script>location.href='?mod=cart'</script>";
}
$idorder = $_SESSION['idorder'];
$data_order = Order::find($_SESSION['idorder']);
$data_cliente = Cliente::find($data_order->intclienteid);
include('lib.inc');
include "includes/sendmail/class.phpmailer.php";
$eTicket= $_POST["eticket"];

$codTienda = CODIGO_TIENDA;

//Se arma el XML de requerimiento
$xmlIn = "";
$xmlIn = $xmlIn . "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
$xmlIn = $xmlIn . "<consulta_eticket>";
$xmlIn = $xmlIn . "	<parametros>";
$xmlIn = $xmlIn . "		<parametro id=\"CODTIENDA\">";
$xmlIn = $xmlIn . $codTienda;//Aqui se asigna el CĂłdigo de tienda
$xmlIn = $xmlIn . "</parametro>";
$xmlIn = $xmlIn . "		<parametro id=\"ETICKET\">";
$xmlIn = $xmlIn . $eTicket;//Aqui se asigna el eTicket
$xmlIn = $xmlIn . "</parametro>";
$xmlIn = $xmlIn . "	</parametros>";
$xmlIn = $xmlIn . "</consulta_eticket>";

//Se asigna la url del servicio
$servicio = URL_WSCONSULTAETICKET_VISA;

//Invocación al web service
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
$parametros=array(); //parametros de la llamada
$parametros['xmlIn']= $xmlIn;
//Aqui captura la cadena de resultado
$result = $client->ConsultaEticket($parametros);
$rpta = 0;
//Aqui carga la cadena resultado en un XMLDocument (DOMDocument)
$xmlDocument = new DOMDocument();
if ($xmlDocument->loadXML($result->ConsultaEticketResult)) {
	
	 
	$rpta = RecuperaCampos($xmlDocument,1,"respuesta");
	
	//Ejemplo para determinar la cantidad de operaciones 
	//asociadas al Nro. de pedido
	$iCantOpe= CantidadOperaciones($xmlDocument, $eTicket);
	$HTML= $HTML . "<span class='texto'>Cantidad de Operaciones: " . $iCantOpe . "</span><br><br>";
	
	//Ejemplo para mostrar los parŕŹĽtros de las operaciones
	//asociadas al Nro. de pedido
	for($iNumOperacion=0;$iNumOperacion < $iCantOpe; $iNumOperacion++){
		$HTML= $HTML . PresentaResultado($xmlDocument, $iNumOperacion+1);
	}

	//Ejemplo para determinar la cantidad de mensajes 
	//asociadas al Nro. de pedido
	$iCantMensajes= CantidadMensajes($xmlDocument);
	$HTML= $HTML . '<br><br>Cantidad de Mensajes: ' . $iCantMensajes . '<br>';

	//Ejemplo para mostrar los mensajes de las operaciones
	//asociadas al Nro. de pedido
	for($iNumMensaje=0;$iNumMensaje < $iCantMensajes; $iNumMensaje++){
		$HTML= $HTML . 'Mensaje #' . ($iNumMensaje +1) . ': ';
		$HTML= $HTML . RecuperaMensaje($xmlDocument, $iNumMensaje+1);
		$HTML= $HTML . '<BR>';
	}
}else{
	$HTML= "Error";
}
//Registrar el pedido en la tabla original
$post = new Cart();
$post->intclienteid = $data_order->intclienteid;
$post->varcarttitulo = $data_order->varcarttitulo;
$post->intcartcant = $data_order->intcartcant;
$post->deccartstotal = $data_order->deccartstotal;
$post->deccartigv = $data_order->deccartigv;
$post->deccarttotal = $data_order->deccarttotal;
$post->varcartcreserva = $data_order->varcartcreserva;
$post->datecartfreg = date("Y-m-d H:i:s");
$post->intcarttpago = $data_order->intcarttpago;
$post->intcartsede = $data_order->intcartsede;
$post->intcarttdoc = $data_order->intcarttdoc;
$post->varcartrsocial = $data_order->varcartrsocial;
$post->charcartruc = $data_order->charcartruc;
$post->varcartdirec = $data_order->varcartdirec;
$post->intcartst = "1";
$post->save();
$idcart = $post->intcartid;	

$td = "";
$data_detalle = Orderdet::find_by_sql("select * from orderdet where intcartid = " . $data_order->intcartid);
if(count($data_detalle)){
	foreach($data_detalle as $r)
	{
		//Detalle del item seleccionado
		$data_boleto = Boleto::find($r->intboletoid);
		
		$postdet = new Cartdet();			
		$postdet->intcartid = $idcart;
		$postdet->intboletoid = $r->intboletoid;
		$postdet->cliente_ccliecode = $r->cliente_ccliecode;
		$postdet->datecartdetfreg = $r->datecartdetfreg;
		$postdet->deccartdetpu = $r->deccartdetpu;
		$postdet->intcartdetcant = $r->intcartdetcant;
		$postdet->deccartdetstotal = $r->deccartdetstotal;
		$postdet->varcartdetapepat = $r->varcartdetapepat;
		$postdet->varcartdetapemat = $r->varcartdetapemat;
		$postdet->varcartdetnombres = $r->varcartdetnombres;
		$postdet->charcartdetdni = $r->charcartdetdni;
		$postdet->varcartdettelefono = $r->varcartdettelefono;
		$postdet->charcartdettipo = $r->charcartdettipo;
		$postdet->intcartdetst="1";
		$postdet->save();
		
		$td.="<tr>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">{$n}</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".date("d-m-Y",strtotime($r->datecartdetfreg))."</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletotitulo."<BR>SEDE:".($data_order->intcartsede==1?"GRANJA VILLA SUR":"GRANJA VILLA NORTE")."</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletonombre."</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".ucwords($r->varcartdetapepat." ".$r->varcartdetapemat." ".$r->varcartdetnombres)."<BR>DNI:".$r->charcartdetdni."</td>
		
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. ".number_format($r->deccartdetstotal,2,".","")."</td>
	</tr>";
	}
}

$from="info@lagranjavilla.com";
$name="La Granja Villa";
$to = $data_cliente->scliemail;
$cc="lvega12@gmail.com,alex.gilc@gmail.com";	    
$subject=utf8_decode("Confirmación de Compra");
$body=file_get_contents("template/reserva.html");
$findtxt = array("{creserva}","{cliente}", "{dni}", "{fecha}","{cantidad}","{tpagado}","{td}","{stotal}","{igv}","{total}");
$newtxt  = array($data_order->varcartcreserva, ucwords($data_cliente->sclieapel." ".$data_cliente->scliename),$data_cliente->charclientedni,date("d-m-Y",strtotime($data_order->datecartfreg)),count($data_detalle),number_format($data_order->deccarttotal,2,".",""),$td,number_format($data_order->deccartstotal,2,".",""),number_format($data_order->deccartigv,2,".",""),number_format($data_order->deccarttotal,2,".",""));
$body = str_replace($findtxt, $newtxt, $body);  
$mail = new phpmailer();
$mail->PluginDir = $path;
$mail->Mailer = "mail";
$mail->Host = $host;
$mail->From = $from;
$mail->FromName = $name;
$mail->Sender = $from;
$mail->Timeout = 30;
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->IsHTML(true);
$mail->Body = $body;
//$mail->AddAttachment('img/logo.png');
$mail->AddBCC($cc);
$exito = $mail->Send();
unset($_SESSION['idorder']);
?>

<div class="container"  id="content-mod-center">

    <div class="row container">
		<?php
        if($rpta==1){
		?>
        <h3>EL PROCESO DE PAGO SE REALIZÓ SATISFACTORIAMENTE</h3>
        <p>En breve le enviaremos un mail de confirmación del pedido</p>
		<?php
		}elseif($rpta==2){
		?>
        <h3>OCURRIÓ UN ERROR AL PROCESAR EL PAGO</h3>
        <p>Por favor, vuelva a intentarlo.</p>
        <?php
		}
		?>
    </div>

</div>
<script>
$(document).ready(function() {
	setTimeout(window.location.href = "index.php", 5000);
});
</script>