<?php
error_reporting(E_ERROR | E_PARSE);
//echo "eticket - numorden :"  . $_POST["eticket"] . "-" . $_POST["numorden"] . " - MAYUSCULAS: " . $_POST["ETICKET"] . "-" . $_POST["NUMORDEN"];
$_SESSION["sess_cart_active"]["idorder"] = $_SESSION["idorder"];

if(!isset($_POST["eticket"])){
    echo "<script>location.href='?mod=cart'</script>";
}	 
include('lib.inc');
//include('lib.norte.inc');
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
$xmlIn = $xmlIn . $codTienda;//Aqui se asigna el Codigo de tienda
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
	$idorder = RecuperaCampos($xmlDocument,1,"nordent");
	
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

if($rpta==0){
		
		$codTienda = CODIGO_TIENDA_NORTE;

//Se arma el XML de requerimiento
$xmlIn = "";
$xmlIn = $xmlIn . "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
$xmlIn = $xmlIn . "<consulta_eticket>";
$xmlIn = $xmlIn . "	<parametros>";
$xmlIn = $xmlIn . "		<parametro id=\"CODTIENDA\">";
$xmlIn = $xmlIn . $codTienda;//Aqui se asigna el Codigo de tienda
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
	$idorder = RecuperaCampos($xmlDocument,1,"nordent");
	
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
		
	}
	
$description_detail = "";
$data_order   = Order::find($idorder);
$data_cliente = Cliente::find($data_order->intclienteid);
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
			
				$description_detail .= "1 ". $data_boleto->varboletotitulo."<BR>SEDE:".($data_order->intcartsede==1?" GRANJA VILLA SUR":" GRANJA VILLA NORTE")."<BR>";
			
			}else{
				$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">MEMBRESIA GRANJA VILLA</td>
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>
			<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>";
			
				$description_detail .= "1 MEMBRESIA GENERAL<BR>";
			
			}
			$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. ".number_format($r->deccartdetstotal,2,".","")."</td>
		</tr>";
		}
	}
	
	$from="info@lagranjavilla.com";
	$name="La Granja Villa";
	$to = $data_cliente->scliemail;
	$cc="sistemas@lagranjavilla.com, atencionalcliente@lagranjavilla.com, sistemas.st@lagranjavilla.com";	    
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
	$cc="sistemas@lagranjavilla.com, atencionalcliente@lagranjavilla.com, sistemas.st@lagranjavilla.com";    
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
		
		$terminosGeneral ='<table style="font-family:Arial; font-size:7px;" width="100%">
        <tr>
        <td width="50%" valign="top" style="font-family:Arial; font-size:7px;"><strong>&iexcl;BIENVENIDOS!</strong><br />
        &iexcl;¡Estamos felices de que hayas elegido La Granja Villa para pasar tu día! Nuestro objetivo es que vivas una experiencia entretenida y educativa al lado de tus seres queridos. Lee las siguientes indicaciones para preparar tu día de visita:<br />
       1. La pulsera le permite al portador el ingreso a los juegos mecanicos, tours de animales silvestres, area de granja, dinosaurios y zona acuática (solo en las fechas publicadas en nuestras plataformas digitales). Podrás ingresar a los juegos las veces que desees, siempre y cuando el horario, tu estatura y/o peso lo permitan (no incluye los juegos feriales, donde se concursa por un premio). ni&ntilde;os a partir de los 80 cm de estatura deberan adquirir su pulsera.<br />
		2. La pulsera es personal e intransferible, debe ser portada en el brazo derecho de cada visitante. Es necesario tenerla colocada durante toda la visita para acceder libremente a los beneficios dentro del parque. En caso de retirársela y/o perderla, no podrá tener acceso a los beneficios. La reposición de otro material tiene un costo adicional (S/10.00 por pulsera inteligente, S/5.00 por pulsera general y S/4.00 por tarjeta inteligente). En el caso que el padre decida colocarse la pulsera del ni&ntilde;o, deberán hacer uso de los juegos junto al ni&ntilde;os en todo momento, ya que no se permite el uso de los juegos SIN pulsera. Evite manipular la pulsera durante su estadía, ya que debera mostrarla para acceder a toda la diversion.<br />
		3. Ni&ntilde;os por debajo de los 80 cm (medida con calzado) de estatura pueden ingresar al parque sin pulsera y tendran acceso al &aacute;rea de granja, tours de animales silvestres, dinosaurios y zona acuatica acompañados de un adulto con pulsera (solo en las fechas publicadas en nuestras plataformas digitales). Si desea que el ni&ntilde;o participe de los juegos, debera adquirir su pulsera. Dale clic a este enlace para ver los juegos que le brindaran acceso ilimitado al ni&ntilde;o de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/. Si el ni&ntilde;o no porta la pulsera, no tendra acceso a los juegos.<br />
		4. La pulsera tiene validez solo por el d&iacute;a que se adquiere. Si la persona se retira de las instalaciones, no podra reingresar.<br />
		5. Respeta las normativas del estacionamiento. Por seguridad, es importante seguir las indicaciones del personal encargado, quien orientara la ubicacion de su vehiculo según la hora de llegada.<br />
		6. El personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen al parque, esto nos  garantiza un d&iacute;a completamente 
		seguro para todos.<br />
		7. Por seguridad, no esta permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, globos, inflables, coolers, cigarros, instrumentos musicales, palos selfie, tripode, flotadores, tapetes, juegos de propulsion a chorro o pistolas de agua o juguetes que puedan comprometer algun riesgo, silbatos, trompetas, megafonos, objetos que emitan sonido, triciclos, bicicletas, scooters, skates, patinetas, patines, carritos, fosforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.<br />
		8. Una vez que el visitante ingresa a nuestras instalaciones, La Granja Villa se hace responsable de su seguridad dentro de nuestras instalaciones. En el siguiente link podras encontrar nuestro protocolo: http://lagranjavilla.com/protocolos/mod1/index.php donde se indica que La Granja Villa se responsabiliza de los productos alimenticios que se elaboran y ofrecen, mas no podemos responsabilizarnos de los alimentos que proceden de fuera, sobre los cuales no conocemos su preparación ni preservacion. <br />
		9. En el caso del agua, esta permitido ingresar 1 botella plastica SELLADA maximo de 1 litro por persona. En el caso de papillas, leche en polvo, formula y termos de agua hervida que NO contengan vidrio en su interior (hasta maximo 750 ml), ingresan directamente. En el caso de que estos alimentos vengan en contenedores o termos de vidrio y refrigerios que contengan dietas especiales, podran ingresar siempre y cuando se active protocolo requerido en la oficina de RRPP, según lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php <br />
		10. Por su seguridad y la de otros visitantes, "Conforme a las recomendaciones para la prevención y cuidado de la salud dentro de nuestras instalaciones, el ingreso de los visitantes que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunacion gratuita y que las recomendaciones de aislamiento temporal responden a condiciones medicas generales, a efectos de evitar la transmision y difusion de virus".<br />
		11. Es muy importante respetar las normas de seguridad que indica el operador de cada juego. Ademas, están publicadas en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Los juegos funcionan en base a estatura y/o peso del visitante, ya que el sistema de seguridad es diseñado y dado por el fabricante de cada juego. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para mas detalle de las guias de seguridad visita: http://www.lagranjavilla.com/atracciones/ <br />
		12. Por la privacidad de terceras personas, no se permiten las fotografías o grabaciones a visitantes que no sean de nuestro circulo amical o familiar. <br />
		13. Durante su visita, solo podra ingresar una vez a la Mansi&oacute;n Embrujada, siempre que supere el 1.20 m de estatura.<br />
		14. No est&aacute; permitido subir a los juegos con art&iacute;culos que puedan desprenderse del usuario, ya que puede poner en riesgo la operatividad y la seguridad del juego y los visitantes. No se permiten los objetos como: carteras, canguros, gorras, mochilas, lentes, etc.<br />
		15. Por seguridad, en el juego del Disco Nazca, no se permite el ingreso con sandalias que no tengan correas reajustables, evitando que puedan salir disparadas y caigan en el riel de transito del juego. En el kiosko más cercano, se venden sujetadores que puedes colocar en tus sandalias si así lo deseas<br />
		16. El horario de atención es de 10 a.m. a 6 p.m. en la mayoría de los juegos. Solo en el caso de: <br />
a) Black Hole, Río Granjero y Cuy Loco, estarán operativos en los siguientes horarios: <br />
- Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 5:30 p.m.<br /> 
- Sábados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.<br />
b) Vikingo, Disco Nazca, Tagadisco, Mansión Embrujada y La Torre, estarán operativos de:<br />
- Lunes a Domingo de 12:30 p.m. a 06:00 p.m.<br />
		17. El ingreso a los recintos de animales debe realizarse con serenidad y sin presión de los tutores. No se recomienda obligar a los Ni&ntilde;os a ingresar, ya que los gritos y el llanto perturban a los animales, quienes podrian realizar conductas inadecuadas ante el estres ocasionado por el ruido.<br />
		18. Los animales solo se deben alimentar con una dieta especial y balanceada, de acuerdo a su especie y características. El alimento que se otorga para la interacción esta racionado y preparado para ofrecer la mejor experiencia al visitante sin perjuicio del animal. No se permite ofrecer alimentos a los animales que no sea proporcionado por nuestros especialistas y adquirido dentro del parque, ya que pueden atentar contra su bienestar y salud.<br />
		19. No se permite alterar la tranquilidad o manipular a los animales que se encuentran libres. Es importante seguir las indicaciones de los profesionales a cargo.<br />
		20. En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio de la zona acuática, donde contamos con agua saludable certificada por DIGESA. Para mantener este estándar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con ropa de ba&ntilde;o lycra o impermeable, indicado por la DS 007-2003-SA del 03 de abril del 2003 – DISA "El ingreso a la zona de piscinas es únicamente con ropa de ba&ntilde;o". La ropa interior, polos y shorts (de deporte o algodon), no son ropa de ba&ntilde;o, por lo que no se permitira el ingreso a las piscinas con dicho material.<br />
		21. El ingreso a la zona acuática es de 10 a.m. a 5:15 p.m. en temporada de verano (fechas publicadas en las plataformas digitales).<br />
		22. Si deseas ingresar al parque y tienes entre 13 y 17 a&ntilde;os, necesitas una carta de responsabilidad y autorizacion firmada por tus padres o apoderados. Esta carta se firma en Relaciones Publicas, en el ingreso a La Granja Villa. Puedes encontrar mas detalles aqui: http://lagranjavilla.com/protocolos/mod2/index.php.<br />
		23. Por seguridad, los menores de edad unicamente ingresaran a la zona acuatica acompanados de un adulto responsable. De lo contrario, no se permitira el ingreso.<br />
		24. Recomendamos la aplicación de protector solar para evitar las insolaciones, sobre todo en temporada de verano. También se recomienda el uso de repelente.<br />
		25. La Granja Villa no se hace responsable por los cambios clim&aacute;ticos que puedan presentarse diariamente.<br />
		26. Para realizar cualquier pago con tarjeta de crédito es indispensable presentar su DNI. En el caso de ser extranjero, debe presentar su pasaporte o carnet de extranjer&iacute;a.<br />
		27. Sobre el uso de los lockers: El costo del servicio es de S/2.00 la hora y S/10.00 por 6 horas. Se le brinda la tarjeta (alquilada con DNI) para poder abrir y cerrar el locker en caso no tuviera la pulsera inteligente. Si la tarjeta se pierde, la penalidad es de S/. 4.00. La Granja Villa no se responsabiliza por pérdidas o robos de objetos dejados dentro de los lockers, por lo que no se recomienda dejar dinero ni objetos de valor. Se debe verificar que el casillero se encuentre cerrado en su totalidad. Por favor, siga las instrucciones que aparecen en la zona de los lockers.<br />
Antes de ingresar al parque contamos con lockers en caso cuentes con objetos que no puedan ingresar al parque. El alquiler del locker es de S/1.00.<br />
		28. No se permite la venta de ningún tipo de mercadería dentro de las instalaciones de La Granja Villa.<br />
		CUPÓN VÁLIDO PRESENTANDOLO EL DÍA DE SU VISITA.<br />
		ESTE CUPÓN ES VÁLIDO SOLO PARA LA FECHA Y USUARIO REGISTRADO.<br />
SOLO PUEDE CAMBIAR LA FECHA Y USUARIO DEL CUPÓN SI ADQUIRIÓ EL SEGURO (S/5.00 POR CUPÓN) DURANTE EL PROCESO DE COMPRA WEB.<br />
NO SE REALIZA DEVOLUCIÓN DE DINERO.<br />
LOS CAMBIOS DE FECHA NO SON VÁLIDOS PARA DÍAS DE EXCLUSIVIDAD POR EVENTOS CORPORATIVOS.<br />

		</td>
        </tr>
        </table>';

		$terminosOther ='<table style="font-family:Arial; font-size:7px;" width="100%">
        <tr>
        <td width="100%" valign="top" style="font-family:Arial; font-size:7px;"><strong>BIENVENIDOS</strong> <br><br>
		Para que tu noche sea segura y divertida en El Festival del Terror de La Granja Villa, hemos preparado algunos tips y consejos para que lo disfrutes al m&aacute;ximo:
		<br><br>
		1. El Festival del Terror inicia a las 7:00 p.m. y termina a las 11:00 p.m. Para acceder a las atracciones extremas es indispensable tener de 13 a&ntilde;os en adelante. Si tienes de 8 a&ntilde;os a m&aacute;s y no quieres ser asustado, habr&aacute; zonas donde podr&aacute;s vivir una experiencia tem&aacute;tica de miedo en familia.<br>
		<br>
		2. El ingreso al Festival del Terror es exclusivamente para personas mayores de 8 a&ntilde;os. <br>
		<br>
		3. Es obligatorio presentar el DNI de menores de edad antes de adquirir la entrada.<br>
		<br>
		4. Si no quieres ser asustado, mant&eacute;n distancia de las zonas de espanto y atracciones de terror que estar&aacute;n se&ntilde;alizadas en distintas &aacute;reas del parque, &iexcl;NO TE ACERQUES A ESTAS ZONAS!, de esta manera evitar&aacute;s que las criaturas pose&iacute;das y monstruos te asusten. Al inicio del recorrido puedes acercarte a  nuestra tiendita y solicitar un "Repelente contra las criaturas pose&iacute;das y monstruos&quot;. <br>
		<br>
		5. Por motivos de Seguridad no se permite el ingreso de mujeres gestantes. <br>
		<br>
		6. Nuestros juegos operan en base a talla y peso seg&uacute;n las gu&iacute;as de seguridad de los fabricantes de cada juego. No incluye Caritas pintadas ni tatuajes.<br>
		<br>
		7. Para conocer mas detalle de las atracciones y juegos que estar&aacute;n disponibles en el festival del terror comun&iacute;cate al 717-7771 o visita nuestra p&aacute;gina web http://lagranjavilla.com/festivaldelterror/  y hacer click en la zona de Festival del Terror.<br>
		<br>
		8. El uso de la Pulsera es indispensable e intransferible. Es necesario tenerla colocada durante toda la visita para acceder libremente a los beneficios dentro parque. En caso de retir&aacute;rsela y/o perderla, no podr&aacute; tener acceso a los beneficios que brinda la pulsera. La reposici&oacute;n de otro material (pulsera) tiene un costo adicional. <br>
		<br>
		9. La Pulsera tiene validez solo por el d&iacute;a que se adquiere. Si la persona se retira de nuestras instalaciones no podr&aacute; REINGRESAR. Evite manipular la pulsera durante su estad&iacute;a, ya que deber&aacute; mostrarla para acceder a toda la diversi&oacute;n.<br>
		<br>
		10. Para disfrutar de las atracciones terror&iacute;ficas de forma segura, s&oacute;lo se permitir&aacute; el ingreso de una sola vez a cada atracci&oacute;n extrema (MANICOMIO, MASCRE, CIRCO SINIESTRO, MANSI&oacute;N EMBRUJADA Y JUEGO RADIACI&oacute;N). Por favor no insistir.<br>
		<br>
		11. Te sugerimos traer prendas que te protejan del viento. Octubre tiene un clima templado, no quisi&eacute;ramos que te resfr&iacute;es.<br>
		<br>
		12. Para mayor seguridad de sus veh&iacute;culos, agradeceremos respetar las normativas de nuestro estacionamiento. Por ello, es importante seguir las indicaciones del personal de seguridad, quien lo orientar&aacute; con la ubicaci&oacute;n de sus veh&iacute;culos seg&uacute;n la hora de llegada.<br>
		<br>
		13. Si te extrav&iacute;as en el parque, siempre habr&aacute; una criatura pose&iacute;da que pueda asustarte!!! No te apartes de tu grupo. Te recomendamos dirigirte al restaurante La Palapa, este lugar ser&aacute; el punto de encuentro para estar realmente seguro de las criaturas y monstruos.<br>
		 <br>
		14. Si deseas el servicio de alquiler de sillas de ruedas puedes solicitarlo al ingreso del parque.<br>
		 <br>
		15. Nuestro personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen al parque, esto nos brindar&aacute; una noche completamente segura para todos.<br>
		 <br>
		16. Por su seguridad y la de otros visitantes, no est&aacute; permitido ingresar al parque con armas de fuego u objetos punzo cortantes; tampoco est&aacute; permitido el ingreso de mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas y palo de selfie. Deja todo objeto que pueda lastimar a las criaturas pose&iacute;das y monstruos que habitan en el parque, ser&aacute; mas divertido si lo haces. En caso no quieras ser asustado puedes adquirir tu repelente de monstruos en la tienda de merchandising.<br>
		<br>
		17. Por seguridad no est&aacute; permitido el ingreso de alimentos ni bebidas al parque, ya que una vez que el visitante haya ingresado a nuestras instalaciones, el Festival del Terror se hace responsable de su seguridad dentro de nuestra sede. Los invitamos a conocer m&aacute;s en nuestra p&aacute;gina web http://www.lagranjavilla.com/servicios_parafamilias.php, donde se indica que el establecimiento se  responsabiliza de los productos alimenticios que se elaboran y ofrecen, mas no podemos responsabilizarnos de los alimentos sobre los cuales no conocemos su preparaci&oacute;n ni preservaci&oacute;n.<br>
		<br>
		18. Por su seguridad los visitantes con yesos, f&eacute;rulas o botas inmovilizadoras de articulaciones tales como tobillo, pie y pantorrilla, as&iacute; ́como pr&oacute;tesis, pueden estar restringidos de subir a ciertos juegos debido a que el sistema de seguridad no podr&aacute; trabajar adecuadamente y no tendr&aacute; una posici&oacute;n adecuada provocando una lesi&oacute;n a s&iacute; mismo o alg&uacute;n visitante. <br>
		 <br>
		19. Las personas que se encuentren en la siguiente lista deber&aacute;n tomar en cuenta las gu&iacute;as de seguridad de cada juego: <br>
		Reciente cirug&iacute;a.<br>
		Problemas card&iacute;acos.<br>
		Problemas en espalda, cuello y en huesos.<br>
		Mujeres embarazadas.<br>
		Presi&oacute;n alta o aneurismas.<br>
		Bajo la influencia de alcohol o drogas.<br>
		<br>
		20. Por su seguridad y la de otros visitantes, “Conforme a las recomendaciones para la prevenci&oacute;n y cuidado de la salud, dentro de nuestras instalaciones, el ingreso de los visitantes al parque que demuestren signos de alguna enfermedad eruptiva o infectocontagiosa se encuentra restringido en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunaci&oacute;n gratuita y que las recomendaciones de aislamiento temporal responden a condiciones m&eacute;dicas generales, a efectos de evitar la transmisi&oacute;n y difusi&oacute;n de virus&quot;.<br>
		<br>
		21. Es muy importante respetar las normativas de seguridad que indica el operador de cada juego al ingresar al &aacute;rea, y adem&aacute;s est&aacute;n publicadas en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Dependiendo del juego puede encontrar restricciones de talla y peso que son indicadas por el fabricante del juego en el manual. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para tener una noche divertida y segura, respete a las criaturas pose&iacute;das y monstruos. La &uacute;nica forma de no ser atacado es gritar, por favor no golpees, ni insultes porque se reportar&aacute; la agresi&oacute;n. <br>
		 <br>
		22. Los ciclos de participaci&oacute;n de las atracciones extremas y juegos mec&aacute;nicos culminan a las 10:45 p.m. No garantizamos que puedas participar de todas las atracciones extremas y juegos del parque, ya que durante el recorrido se calcula los ciclos que se rigen al horario de cierre de las atracciones extremas y juegos mec&aacute;nicos. <br>
		<br>
		23. En el juego del Disco Nazca, por seguridad no est&aacute; permitido el ingreso con sandalias que no tengan correas reajustables que pasen por detr&aacute;s del tobillo, para evitar que estas puedan salir disparadas y caigan en el riel de transito del juego.<br>
		<br>
		24. Por la privacidad de terceras personas, no est&aacute;n permitidas las fotograf&iacute;as o filmaciones a personas que no sean de su entorno, es decir a otros visitantes del parque con los que no tenemos amistad. <br>
		 <br>
		25. No est&aacute; permitido subir a los juegos con art&iacute;culos que puedan desprenderse del usuario al accionar la atracci&oacute;n, poniendo en riesgo la operatividad y la seguridad del juego y de otros visitantes. No acceder a nuestros juegos con objetos como: carteras, canguros, gorras, mochilas, lentes, etc.<br>
		<br>
		26. Para los menores de edad que quieran ingresar al parque sin la compa&ntilde;&iacute;a de un adulto deben tomar en cuenta primero: El padre o apoderado deber&aacute; firmar un documento en donde se deja constancia la decisi&oacute;n de dejar solo al menor (s&oacute;lo si la edad del menor fluct&uacute;a entre los 13 y 17 a&ntilde;os). <br>
		<br>
		27. No permitimos el ingreso al parque con ning&uacute;n tipo de disfraz, m&aacute;scara o maquillaje, ya que te pueden confundir y eso no te agradar&aacute;.<br>
		 <br>
		28. Fumar est&aacute; permitido en ciertas zonas del parque (pregunta por la zona de fumadores). Recuerda que por seguridad no permitimos fumar en cualquier zona, ya que el humo atrae a las criaturas y monstruos que habitan en el parque.<br>
		 <br>
		29. No aseguramos que la noche de tu visita logres participar de todas las atracciones extremas o todas las casas ya que estas tienen un horario de espera.<br>
		 <br>
		30. El Festival del Terror no se hace responsable por los cambios clim&aacute;ticos que puedan presentarse diariamente.<br>
		<br>
		31. Para realizar cualquier pago con tarjeta de cr&eacute;dito es indispensable presentar su DNI. En el caso de ser extranjeros deben presentar su pasaporte o carnet de extranjer&iacute;a.<br>
		<br>
		32. Sobre el uso de los Lockers: El servicio es exclusivo para los clientes del Festival del Terror y debe ser utilizado s&oacute;lo mientras permanezca en nuestras instalaciones. Ni El Festival del Terror ni la empresa Maletek se responsabiliza por las p&eacute;rdidas o robos de los objetos dejados dentro de los lockers, por lo que recomendamos no dejar dinero ni objetos de mucho valor. Se recomienda verificar que el casillero se encuentre cerrado en su totalidad al retirar la llave y tambi&eacute;n verificar las instrucciones de la utilizaci&oacute;n de los lockers. El costo del servicio es de S/.1.00  por cada vez que usted abra la puerta del locker y tiene que tomar en cuenta que la p&eacute;rdida de la llave tiene una penalidad de 20.00 soles.</td>
        </tr>
        </table>';

		


		$newname = substr($v->varcartdetapepat, 0, 1).substr($v->varcartdetapemat, 0, 1).substr($v->varcartdetnombres, 0, 1)."_".$v->intcartdetid;
		$dompdf = new DOMPDF();
		$ticket = file_get_contents("Adminv2/template/ticket.html");		
		if($v->varboletotitulo=="ENTRADA GENERAL - PULSERA MAGICA"){$terminos = $terminosGeneral;} else {$terminos = $terminosOther;}
		$findtxticket = array("{beneficiado}","{dni}","{comprador}","{tentrada}","{nro}","{sede}","{fconsumo}","{datacode}","{terminos}");
		$newtxticket  = array($v->beneficiado,$v->charcartdetdni,$post[0]->comprador,$v->varboletotitulo,$v->intcartdetid,$post[0]->sede,$v->freg,date("Ymd").$post[0]->intcartsede.$v->intcartdetid,$terminos);
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
unset($_SESSION["sess_cart_sede"]);
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
        	<div class="col-md-6 text-right">Descripción del producto:</div>
            <div class="col-md-6"><?php echo $description_detail; ?></div>
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
        <?php
            $log = new LogVisa();
            $log->id = '';
            $log->idorder = $idorder;
            $log->eticket = $_POST["eticket"];
            $log->mensaje = $description_detail;
            $log->fecha = date('Y-m-d H:i:s');
            $log->save();
			sleep(2);			
        ?>

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
            $log = new LogVisa();
            $log->id = '';
            $log->idorder = $idorder;
            $log->eticket = $_POST["eticket"];
            $log->mensaje = $dsc_cod_accion;
            $log->fecha   = date('Y-m-d H:i:s');
            $log->save(); 
            sleep(2);
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