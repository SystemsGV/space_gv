<?php
//echo "eticket - numorden :"  . $_POST["eticket"] . "-" . $_POST["numorden"];

if(!isset($_POST["eticket"]) && !$_POST['numorden'] ){    
    echo "<script>location.href='?mod=cart'</script>";
}
if(!$_SESSION['idorder'])
	$_SESSION['idorder'] = $_POST['numorden'];
	
$idorder = $_SESSION['idorder'];

if(!$idorder)
	echo "<script>location.href='?mod=cart'</script>";

$data_order = Order::find($idorder);
$data_cliente = Cliente::find($data_order->intclienteid);
if($data_order->intcartsede == 1) //Granja Villa Sur
	include('lib.inc');
else //Granja Villa Norte
	include('lib.norte.inc'); 
	
include "includes/sendmail/class.phpmailer.php";
require_once("Adminv2/libs/dompdf/dompdf_config.inc.php");
$path="http://www.lagranjavilla.com/tienda/";
$host="http://www.lagranjavilla.com/tienda/";
$ruta="/home3/lagranja/public_html/tienda/";

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
$nro_tarjeta = "";
$fecha_transaccion = "";
$dsc_cod_accion = "";
//Aqui carga la cadena resultado en un XMLDocument (DOMDocument)
$xmlDocument = new DOMDocument();
if ($xmlDocument->loadXML($result->ConsultaEticketResult)) {
	
	 
	$rpta = RecuperaCampos($xmlDocument,1,"respuesta");
	$nro_tarjeta = RecuperaCampos($xmlDocument,1,"pan");
	$fecha_transaccion = RecuperaCampos($xmlDocument,1,"fechayhora_tx");
	$dsc_cod_accion = RecuperaCampos($xmlDocument,1,"dsc_cod_accion");
	
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
if($rpta==1){
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
	$post->intcartst = "2"; // Pagado
	$post->save();
	$idcart = $post->intcartid;	
	
	$td = "";
	$data_detalle = Orderdet::find_by_sql("select * from orderdet where intcartid = " . $data_order->intcartid);
	if(count($data_detalle)){
		foreach($data_detalle as $r)
		{
			//Detalle del item seleccionado

			if($r->intboletoid)
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
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".($r->datecartdetfreg?date("d-m-Y",strtotime($r->datecartdetfreg)):"")."</td>";
			if($r->intboletoid){
				$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletotitulo."<BR>SEDE:".($data_order->intcartsede==1?"GRANJA VILLA SUR":"GRANJA VILLA NORTE")."</td>
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletonombre."</td>
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".ucwords($r->varcartdetapepat." ".$r->varcartdetapemat." ".$r->varcartdetnombres)."<BR>DNI:".$r->charcartdetdni."</td>";
			}else{
				$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">MEMBRESIA GRANJA VILLA</td>
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>";
			}
			$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. ".number_format($r->deccartdetstotal,2,".","")."</td>
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
	
	//Envío de ticket
	$post = Cart::find_by_sql("select 
		ca.intCartId,
		ca.intcartst,
		ca.intCartSede,
		CASE ca.intCartSede  
			WHEN 1 THEN 'GRANJA VILLA SUR'
			WHEN 2 THEN 'GRANJA VILLA NORTE'
		END as sede,
		CASE ca.intCartTpago 
			WHEN 1 THEN 'DEPOSITO' 
			WHEN 2 THEN 'VISA' 
		END as tpago,
		concat(cl.sClieApepat,' ',cl.sClieApemat,' ',cl.sClieName) comprador,
		ca.varCartCreserva,cl.charClienteDni,cl.sClieMail,
		DATE_FORMAT(ca.dateCartFreg,'%d/%m/%Y') freg,ca.intCartCant,ca.decCartStotal,ca.decCartIgv,ca.decCartTotal
		from 
		cart ca left join CLIENTE cl 
		on ca.intClienteId = cl.cClieCode
		where ca.intCartId='{$idcart}'");		
				
	
	
	$from="info@lagranjavilla.com";
	$name="La Granja Villa";
	$to = $post[0]->scliemail;
	//$cc="lvega12@gmail.com,edtenorioc15@gmail.com";
	$cc="alex.gilc@gmail.com";    
	$subject=utf8_decode("Ticket de Entrada");
	
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
	//Esta parte de registrar la membresía se comenta ya que el proceso se hará manualmente
	/*$membresiadet = Cartdet::find_by_sql("select * from cartdet where charCartdetTipo='M' AND intCartId=".$idcart." limit 0,1");
		
	if($membresiadet[0]->intcartdetid){
		$fintarjeta = Tarjeta::find_by_sql("select * from TARJETA where cClieCode='{$membresiadet[0]->cliente_ccliecode}'");								
		if($fintarjeta[0]->ntarjnumb){
			//$tarjeta = Tarjeta::find($fintarjeta[0]->ntarjnumb);
			$tarjeta = Tarjeta::find($fintarjeta[0]->id);
			$tarjeta->demisdate=date("Y-m-d");
			$tarjeta->dcadudate=date("Y-m-d", strtotime("+1 year", strtotime(date("Y-m-d")) ));
			$tarjeta->save();
		}else{
			$newtar = Tarjeta::find_by_sql("select (MAX(ntarjnumb) + 1) nrotarjeta from TARJETA");	
			$tarjeta = New Tarjeta();
			$tarjeta->ccliecode=$membresiadet[0]->cliente_ccliecode;
			$tarjeta->ntarjnumb=$newtar[0]->nrotarjeta;
			$tarjeta->ctarjacti="1";
			$tarjeta->demisdate=date("Y-m-d");
			$tarjeta->dcadudate=date("Y-m-d", strtotime("+1 year", strtotime(date("Y-m-d")) ));
			$tarjeta->save();
		}				
	}*/
	//Fin registrar membresía
	$det = Cartdet::find_by_sql("
		select 
	@rownum:=@rownum+1 nro,
	cd.intcartdetid,
	DATE_FORMAT(cd.dateCartdetFreg,'%d/%m/%Y') freg,
	b.varBoletoTitulo,
	cd.varcartdetapepat,cd.varCartdetApemat,cd.varCartdetNombres,
	CONCAT(cd.varCartdetApepat,' ',cd.varCartdetApemat,' ',cd.varCartdetNombres) beneficiado,
	cd.charCartdetDni,
	cd.decCartdetPu
	from cartdet cd left join boleto b
	on cd.intBoletoId=b.intBoletoId ,(SELECT @rownum:=0) p
	where cd.intCartId='{$idcart}' and charCartdetTipo='T'");
	
	foreach($det as $k=>$v){
		$td.="<tr>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">{$v->nro}</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">{$v->freg}</td>			
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">{$v->varboletotitulo}</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">{$v->beneficiado}<BR>DNI:{$v->charcartdetdni}</td>
		<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. {$v->deccartdetpu}</td>
		</tr>";
		$newname = substr($v->varcartdetapepat, 0, 1).substr($v->varcartdetapemat, 0, 1).substr($v->varcartdetnombres, 0, 1)."_".$v->intcartdetid;
		$dompdf = new DOMPDF();
		$ticket = file_get_contents("Adminv2/template/ticket.html");			
		$findtxticket = array("{beneficiado}","{dni}","{comprador}","{tentrada}","{nro}","{sede}","{fconsumo}","{datacode}");
		$newtxticket  = array($v->beneficiado,$v->charcartdetdni,$post[0]->comprador,$v->varboletotitulo,$v->intcartdetid,$post[0]->sede,$v->freg,date("Ymd").$post[0]->intcartsede.$v->intcartdetid);
		$ticket = str_replace($findtxticket, $newtxticket, $ticket);
		$dompdf->load_html($ticket);			
		$dompdf->render();
		$output = $dompdf->output();
		file_put_contents("Adminv2/uploads/tickets/{$newname}.pdf", $output);			
		$mail->AddAttachment("Adminv2/uploads/tickets/{$newname}.pdf");		    
	}
	$body=file_get_contents("Adminv2/template/confirmacion.html");
	$findtxt = array("{sede}","{creserva}","{cliente}", "{dni}", "{fecha}","{cantidad}","{tpagado}","{td}","{stotal}","{igv}","{total}");
	$newtxt  = array($post[0]->sede,$post[0]->varcartcreserva,$post[0]->comprador,$post[0]->charclientedni,$post[0]->freg,$post[0]->intcartcant,$post[0]->tpago,$td,number_format($post[0]->deccartstotal,2,".",""),number_format($post[0]->deccartigv,2,".",""),number_format($post[0]->deccarttotal,2,".",""));
	$body = str_replace($findtxt, $newtxt, $body);
	
	$mail->Body = $body;
	$mail->AddBCC($cc);
	$exito = $mail->Send();
	$intentos=1;
	while ((!$exito) && ($intentos < 2)) {
		sleep(5);
		$exito = $mail->Send();
		$intentos=$intentos+1;  
	}
	if(!$exito){
		$content="Mailer Error: " . $mail->ErrorInfo;
	}else{
		$content='<br><div class="text-center">Por favor verifica su correo para activar su cuenta y poder iniciar sessión</div><br>';
	}
}
unset($_SESSION['idorder']);
?>

<div class="container"  id="content-mod-center">

    <div class="row container">
		<?php
        if($rpta==1){
		?>
        <h3 class="text-center">EL PROCESO DE PAGO SE REALIZÓ SATISFACTORIAMENTE</h3>
        <p class="text-center">En breve le enviaremos un mail de confirmación del pedido</p>
        <div class="row">
        	<div class="col-md-6 text-right">Número de pedido:</div>
            <div class="col-md-6"><?php echo $idorder ; ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Cliente:</div>
            <div class="col-md-6"><?php echo ucwords($data_cliente->sclieapel." ".$data_cliente->scliename); ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Número de tarjeta:</div>
            <div class="col-md-6"><?php echo $nro_tarjeta; ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Fecha y hora del pedido:</div>
            <div class="col-md-6"><?php echo $fecha_transaccion; ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Importe de la transacción:</div>
            <div class="col-md-6">S/.<?php echo number_format($data_order->deccarttotal,2,".",""); ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Moneda:</div>
            <div class="col-md-6">Soles</div>
        </div>
        <div class="row">
        	<div class="col-md-12 text-center">Para mayor seguridad, puede guardar esta información haciendo click en el botón IMPRIMIR. </div>
        </div>
        

        <div class="form-group">
            <div class="col-xs-12 text-center">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#termsModal">Ver términos y condiciones</button>&nbsp;
                <button type="button" class="btn btn-default" onclick="window.print();">Imprimir</button>
            </div>
        </div>
        
		<?php
		}elseif($rpta==2){
		?>
        <h3 class="text-center">OCURRIÓ UN ERROR AL PROCESAR EL PAGO</h3>
        <p class="text-center">Por favor, vuelva a intentarlo.</p>
        <div class="row">
        	<div class="col-md-6 text-right">Número de pedido:</div>
            <div class="col-md-6"><?php echo $idorder ; ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Fecha y hora del pedido:</div>
            <div class="col-md-6"><?php echo $fecha_transaccion; ?></div>
        </div>
        <div class="row">
        	<div class="col-md-6 text-right">Descripción de la denegación:</div>
            <div class="col-md-6"><?php echo $dsc_cod_accion; ?></div>
        </div>
        <?php
		}
		?>
    </div>

</div>
<!-- Terms and conditions modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Términos y Condiciones</h3>
            </div>

            <div class="modal-body">
            <textarea class="form-control text-justify" rows="18">“La pulsera Mágica es el distintivo personal e intransferible que le permite al portador, tanto niños como adultos, ingresar a los juegos, a los diferentes Tours de Animales, Granjita Interactiva, zona acuática y  zona de piscinas en la temporada de Verano, y El Pueblo todas las veces que desee siempre que la talla, peso y horario se lo permita. Niños menores de edad que superen los 80 cm de estatura  pagaran  su entrada (pulsera mágica). Los niños que midan menos de 0.80 cm. podrán ingresar libremente a parque con acceso únicamente a granjita, tour de animales y piscinas en temporada de Verano acompañados de un adulto que porte pulsera. Sin pulsera el menor de edad no tendrá acceso a los juegos, ni a El Pueblo a menos que el padre o apoderado adquiera una para el menor. Una vez que se haya retirado de nuestras instalaciones no podrá reingresar. Atendemos todos los días del año desde las 10 am. hasta las 6 pm (Consulte en nuestro facebook por ciertos cierres parciales o totales del parque en temporada Navideña por eventos empresariales). No se realizan devoluciones del pago de entrada una vez haya realizado la compra.  El pago de la pulsera mágica (entrada al parque) le da acceso a ingresar en una ocasión. El pago del ingreso a las sedes de Granja Villa incluye el cumplimiento de las normativas de los parques, por lo que no estar de acuerdo con estas normas no es motivo para pedir devolución del pago realizado. No esta permitido el ingreso de ningún tipo de alimentos, bebidas, mascotas, armas, pelotas, inflables, instrumentos musicales, palos de sefie, ni envases de vidrio al parque. Para contar con piscinas saludables, antes de ingresar a las piscinas debemos ducharnos e ingresar solo con ropa de baño (mujeres - licra y hombres ropa de baño impermeable), indicado por DS 007-2003-SA Del 03 de Abril del 2003 – DISA. No es necesaria reserva. Es imprescindible que el titular de la compra presente su DNI físico e  indique el código que se envía por mail una vez realizada la compra y en taquilla se cambia por la pulsera mágica; sin la pulsera no se puede ingresar al parque. Para una mejor planificación de la visita y saber a que juegos podrán acceder de acuerdo a las tallas pueden ingresar a http://www.lagranjavilla.com/atracciones/. La pulsera es válida para niños que midan 80 cm o más y para adultos. Menores de 18 años deben entrar acompañados de un adulto. Prohibido el ingreso de alimentos y bebidas a las instalaciones. No está permitido el ingreso de pelotas, triciclos, patinetas, patines, carritos, armas de fuego, envases de vidrio, silbatos, trompetas, megáfonos u otros objetos de ruido, cigarros, fósforos u objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes. La entrada no incluye juegos feriales ni el Derby (costo S/. 4.00) ni Bungy (costo S/. 6.50. La pulsera mágica no incluye ningún tipo de alimentos ni bebidas. Para ver las recomendaciones del parque sobre la visita ingresar a http://www.lagranjavilla.com/servicios_parafamilias.php. Para ver las guías de seguridad de cada juego ingresar a http://www.lagranjavilla.com/atracciones/. “</textarea>                              
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal">Acepto</button>
            </div>
        </div>
    </div>
</div>