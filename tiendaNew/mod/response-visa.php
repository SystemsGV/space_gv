<?php
error_reporting(E_ERROR | E_PARSE);
//echo "eticket - numorden :"  . $_POST["eticket"] . "-" . $_POST["numorden"] . " - MAYUSCULAS: " . $_POST["ETICKET"] . "-" . $_POST["NUMORDEN"];
//$_SESSION["sess_cart_active"]["idorder"] = $_SESSION["idorder"];

if(!isset($_POST["eticket"])){
    echo "<script>location.href='?mod=list'</script>";
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
			$postdet->varcartdetseguro = $r->varcartdetseguro;
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
	$cc="sistemas@lagranjavilla.com, atencionalcliente@lagranjavilla.com";	    
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
	$cc="sistemas@lagranjavilla.com, atencionalcliente@lagranjavilla.com";    
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

		$terminosOther ='<table style="font-family:Arial; font-size:8.5px;" width="100%">
        <tr>
        <td width="100%" valign="top" style="font-family:Arial; font-size:8.5px;"><strong>BIENVENIDOS</strong> <br><br>
		Para que tu experiencia dentro del Festival del Terror sea segura y divertida, hemos preparado algunos tips para ti:<br>
		1. 	El evento inicia a las 7:00 p.m. y termina a las 11:00 p.m.<br>
		2. 	Si no quieres asustarte, aléjate de las zonas de espanto y escenarios abominables. En la tienda de souvenirs, podrás adquirir un repelente anti-susto.<br>
		3. 	Los juegos mecánicos tienen límites de estatura y/o peso establecidos por sus fabricantes. La información está publicada en las guías de seguridad.<br>
		4. 	El uso de la pulsera es personal, indispensable e intransferible. Es necesario llevarla colocada para acceder a los beneficios. En caso de retirársela y/o perderla, deberá adquirir la reposición de la misma por un costo de S/. 5.00. De lo contrario, no podrá disfrutar de las atracciones.<br>
		5. 	La pulsera tiene validez solo por el día de su visita durante el tiempo que esté en nuestras instalaciones. Si se retira del festival, no podrá reingresar. <br>
		6. 	El servicio de caras pintadas y tatuajes tiene un costo adicional, al igual que los juegos feriales.<br>
		7. 	Para disfrutar al máximo de las atracciones extremas de forma segura, solo se permite el ingreso UNA VEZ por noche a cada una, si el tiempo te lo permite. <br>
		8. 	Si las criaturas poseídas se escapan de sus zonas, escucharás alarmas por todo el festival. ¡Corre y refugiate en las zonas señalizadas!<br>
		9. 	Los ciclos de participación en todas las atracciones del festival concluyen a las 10:45 pm. Te recomendamos ingresar a todas las atracciones extremas apenas llegues. No garantizamos que puedas ingresar a todas las atracciones del festival.<br>
		10. Recuerda traer ropa que te proteja del viento. Las noches de Octubre son frías. <br>
		11. No nos responsabilizamos por los cambios clim&aacute;ticos que puedan presentarse.<br>
		12. Por favor, respeta las normas del estacionamiento. El personal de seguridad lo orientar&aacute; con la ubicaci&oacute;n de su veh&iacute;culo.<br>
		13. Por la privacidad de terceras personas, no tomes fotos ni videos de visitantes ajenos a tu grupo. <br>
		14. No te apartes de tu grupo durante la noche. Si te pierdes, anda al restaurante La Palapa para ayudarte.<br>
		15. Si deseas alquilar una silla de ruedas, solicitarla en el ingreso. Tiene un consto de S/.20.00.<br>
		16. Respeta a las criaturas pose&iacute;das. No los golpees ni los insultes. Si los agredes, ya no podr&aacute;s disfrutar del festival.<br>
		17. En el juego mec&aacute;nico &ldquo;Disco Nazca&rdquo;, no est&aacute; permitido el ingreso con sandalias que no tengan correas ajustables que pasen por detr&aacute;s del tobillo. Puedes comprar un sujetador en el kiosko si no traes un calzado ajustable.<br>
		18. No est&aacute; permitido subir a los juegos mec&aacute;nicos con objetos, como: carteras, canguros, gorras, mochilas, lentes, etc.<br>
		19. Si tienes entre 13 y 17 a&ntilde;os y quieres ingresar sin la compa&ntilde;&iacute;a de un adulto, el padre o apoderado deber&aacute; firmar un documento donde deje constancia que autoriza el ingreso del menor al festival.<br>
		20. No se permite el ingreso con disfraces, m&aacute;scara o maquillaje.<br>
		21. Fumar est&aacute; permitido en ciertas zonas del festival (pregunta por la zona de fumadores).<br>
		22. Si pagas con tarjeta de cr&eacute;dito es indispensable presentar DNI. En el caso de los extranjeros, deben presentar su pasaporte o carnet de extranjer&iacute;a.<br>
		23. Nuestro personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen al festival, esto nos brindar&aacute; una noche completamente segura.<br>
		24. Por su seguridad, no se permite el ingreso de armas de fuego, objetos punzo cortantes, mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas, alimentos, bebidas y palo de selfie.<br>
		25. Los visitantes con yesos, f&eacute;rulas, pr&oacute;tesis y/o botas inmovilizadoras, no podr&aacute;n ingresar a ciertos juegos mec&aacute;nicos.<br>
		26. Si no gozas de buena salud, no podr&aacute;s ingresar a todos los juegos mec&aacute;nicos.<br>
		27. Por tu seguridad y la de tu beb&eacute;, no se permite el ingreso a mujeres gestantes.<br>
		28. No se permite el ingreso a visitantes con signos de alguna enfermedad eruptiva o infectocontagiosa. Debemos preservar la salud comunitaria y propia de cada visitante.<br>
		29. Es importante respetar las normas de seguridad que indica el operador de cada juego mec&aacute;nico. De lo contrario, no podr&aacute;s subirte m&aacute;s al juego.<br>
		30. No nos responsabilizamos por las p&eacute;rdidas o robos de objetos personales y/o dejados dentro de los lockers. Te recomendamos no dejar dinero ni objetos de valor.<br>
		31. Si vas a utilizar los lockers, sigue las instrucciones colocadas en la parte frontal. El costo del servicio es de S/.1.00 cada vez que abras la puerta del locker. Si pierdes la llave, la penalidad es de S/. 20.00<br>
		32. Si deseas m&aacute;s informaci&oacute;n, no dudes en comunicarte con nosotros al 717-7771 o escr&iacute;benos por cualquiera de nuestras redes sociales o pagina web.<br>
		33. No se dar&aacute;n devoluciones del pago de entrada luego de realizar la compra. No se podr&aacute; cambiar la fecha una vez que la haya elegido, ni se podr&aacute;n cambiar los datos de la persona inscrita en las entradas.<br>
		34. El pago de la pulsera del Festival del Terror incluye el cumplimiento de las normativas establecidas del festival. No estar de acuerdo con las normativas, no es motivo para pedir devoluci&oacute;n del pago realizado.<br>
		35. Es indispensable que el titular de la compra presente su DNI en f&iacute;sico el d&iacute;a de su visita. Asi mismo, debe presentar el c&oacute;digo enviado por mail despues de la compra. En RRPP se le otorgar&aacute;n las pulseras.<br>
		36. Si la transacci&oacute;n se da con VISA, se realiza a trav&eacute;s de Verified by Visa, lo que asegura la autenticidad y confiabilidad del procedimiento. Al confirmar las identidades de los tarjeta-habientes, se reducen las transacciones de comercio electr&oacute;nico fraudulentas o en disputa, eliminando las inquietudes del consumidor con respecto a las compras en l&iacute;nea.<br>
		37. Luego de realizar la compra, recibir&aacute; las entradas electr&oacute;nicas en el correo registrado. El cliente acepta no divulgar ni compartir la informaci&oacute;n contenida en este correo por ning&uacute;n medio, ya que podr&iacute;a afectar su ingreso al festival.
		</td>
        </tr>
        </table>';
		
		$terminosOther1 ='<table style="font-family:Arial; font-size:10px;" width="100%">
        <tr>
        <td width="50%" valign="top" style="font-family:Arial; font-size:10px;"><strong>BIENVENIDOS</strong> <br><br>
		Para que la &ldquo;Noche de Espantos&rdquo; del Festival del Terror sea segura y divertida, hemos preparado algunos tips para t&iacute;:<br><br>
		1. Los participantes deben tener m&iacute;nimo 6 a&ntilde;os para vivir esta experiencia. Presentar DNI.<br />
		2. El evento inicia a las 7:00 p.m. y termina a las 11:00 p.m.<br />
		3. Si no quieres asustarte, al&eacute;jate de las zonas de espanto y escenarios abominables. En la tienda de souvenirs, podr&aacute;s adquirir un repelente antisusto.<br />
		4. Los juegos mec&aacute;nicos tienen l&iacute;mites de estatura y/o peso dados por los fabricantes de cada atracci&oacute;n. La informaci&oacute;n est&aacute; publicada en las gu&iacute;as de seguridad.<br />
		5. El uso de la pulsera es indispensable e intransferible. Es necesario llevarla colocada para acceder a los beneficios. En caso de retir&aacute;rsela y/o perderla, no podr&aacute; disfrutar de las atracciones. La reposici&oacute;n del material de la pulsera tiene un costo de S/. 5.00.<br />
		6. La pulsera tiene validez solo por el d&iacute;a de su visita. Si la persona se retira de las instalaciones, no podr&aacute; reingresar. No incluye caritas pintadas ni tatuajes.<br />
		7. Por favor, respeta las normas del estacionamiento. El personal de seguridad lo orientar&aacute; con la ubicaci&oacute;n de su veh&iacute;culo.<br />
		8. No te apartes de tu grupo durante la noche. Si te pierdes, anda al restaurante La Pa- lapa para ayudarte.<br />
		9. Si deseas alquilar una silla de ruedas, solicitarla en el ingreso. Tiene un consto de S/.20.00.<br />
		10. Respeta a las criaturas pose&iacute;das. No los golpees ni los insultes. Si los agredes, ya no podr&aacute;s disfrutar de la noche de espantos.<br />
		11. En el juego mec&aacute;nico &ldquo;Disco Nazca&rdquo;, no est&aacute; permitido el ingreso con sandalias que no tengan correas reajustables que pasen por detr&aacute;s del tobillo.<br />
		12. No est&aacute; permitido subir a los juegos mec&aacute;nicos con objetos, como: carteras, canguros, gorras, mochilas, lentes, etc.<br />
		13. Si tienes entre 13 y 17 a&ntilde;os y quieres ingresar sin la compa&ntilde;&iacute;a de un adulto, el padre o apoderado deber&aacute; firmar un documento en donde se deja constancia la decisi&oacute;n de dejar solo al menor dentro de la &ldquo;Noche de Espantos&rdquo;.<br />
		14. No se permite el ingreso con disfraces, m&aacute;scara o maquillaje.<br />
		15. Fumar est&aacute; permitido en ciertas zonas del parque (pregunta por la zona de fumadores).<br />
		16. Si pagas con tarjeta de cr&eacute;dito es indispensable presentar DNI. En el caso de ser extranjeros, deben presentar su pasaporte o carnet de extranjer&iacute;a.<br />
		17. Nuestro personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen a la &ldquo;Noche de Espantos&rdquo;, esto nos brindar&aacute; una noche completamente segura para todos.<br />
		18. Por su seguridad, no se permite el ingreso de armas de fuego, objetos punzo cortantes, mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas, alimentos, bebidas y palo de selfie.<br />
		19. Los visitantes con yesos, f&eacute;rulas, pr&oacute;tesis y/o botas inmovilizadoras, no podr&aacute;n ingresar a ciertos juegos mec&aacute;nicos.<br />
		20. Si no gozas de buena salud o estas gestando, no podr&aacute;s ingresar a todos los juegos mec&aacute;nicos. <br />
		20. No se permite el ingreso a visitantes con signos de alguna enfermedad eruptiva o infectocontagiosa. Debemos preservar la salud comunitaria y propia de cada visitante.<br />
		21. Es importante respetar las normas de seguridad que indica el operador de cada juego mec&aacute;nico.<br />
		22. No nos responsabilizamos por las p&eacute;rdidas o robos de objetos personales o deja- dos dentro de los lockers, por lo que recomendamos no dejar dinero ni objetos de valor.<br />
		23. Si vas a utilizar los lockers, sigue las instrucciones colocadas en la parte frontal. El costo del servicio es de S/.1.00 cada vez que usted abra la puerta del locker. Si pierdes la llave, la penalidad de S/. 20.00<br />
		</td>
		</tr>
        </table>';


		$newname = substr($v->varcartdetapepat, 0, 1).substr($v->varcartdetapemat, 0, 1).substr($v->varcartdetnombres, 0, 1)."_".$v->intcartdetid;
		$dompdf = new DOMPDF();
		$ticket = file_get_contents("Adminv2/template/ticket.html");		
		if($v->varboletotitulo=="ENTRADA GENERAL - PULSERA MAGICA"){$terminos = $terminosGeneral;} elseif($v->varboletotitulo=="PULSERA NOCHE DE ESPANTO") {$terminos = $terminosOther1;} else {$terminos = $terminosOther;}
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
	
unset($_SESSION['idorder']);
unset($_SESSION["sess_cart_sede"]);
unset($_SESSION["sess_cart"]);
}
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
			//$_SESSION['idorder'] = $idorder;
			//$_SESSION["eticket"] = $_POST["eticket"];
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
		?>
		<form action="?mod=form-visa-intento" method="post"> 
		<div class="form-group">
            <div class="col-xs-12 text-center">
                <a href="http://lagranjavilla.com/tienda/?mod=list"><button type="button" class="btn btn-default">Volver al Carrito</button></a>&nbsp;   
					<input type="hidden" name="idorder" value="<?php echo $idorder; ?>">
					<!--<input type="hidden" name="eticket" value="<?php //echo $_POST["eticket"]; ?>"> -->
                <button type="submit" class="btn btn-default">Intentar con Otra Tarjeta</button>
            </div>
        </div>
		</form>
	<?php } ?>
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
            <textarea class="form-control text-justify" rows="18">
			La pulsera mágica es personal e intransferible. Le permite al portador el ingreso a los juegos mecánicos, tours de animales silvestres, área de granja y zona acuática (solo en las fechas publicadas en nuestras plataformas digitales). Podrás ingresar a los juegos las veces que desees, siempre y cuando el horario, tu estatura y/o peso lo permitan. Niños a partir de los 80 cm de estatura deberán adquirir la pulsera mágica.
Niños por debajo de los 80 cm de estatura pueden ingresar al parque sin pulsera y tendrán acceso al área de granja, tours de animales silvestres y zona acuática acompañados de un adulto con pulsera mágica (solo en las fechas publicadas en nuestras plataformas digitales). Si desea que el niño participe de los juegos, deberá adquirir su pulsera mágica. Dale click a este enlace para ver los juegos que le brindarán acceso ilimitado al niño, de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/. En caso el niño no porte la pulsera mágica, no tendrá acceso a los juegos.
Una vez que se haya retirado de nuestras instalaciones, no podrá reingresar. Atendemos todos los días del año, desde las 10 am hasta las 6 pm (cierres parciales o totales del parque por eventos empresariales, serán publicados en nuestras plataformas digitales). 
No se darán devoluciones del pago de entrada luego de realizar la compra. No se podrá cambiar la fecha ni sede de su visita una vez que lo haya elegido.
• La pulsera mágica le da acceso a ingresar una vez a La Granja Villa.
• El pago de la pulsera mágica de La Granja Villa incluye el cumplimiento de las normativas establecidas del parque. No estar de acuerdo con las normativas, no es motivo para pedir devolución del pago realizado.
No está permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, inflables, instrumentos musicales, palos selfie, silbatos, trompetas, megáfonos, objetos que emitan sonido, triciclos, patinetas, patines, carritos, fósforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.
• En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio de la zona acuática, donde contamos con agua saludable certificada por DIGESA. Para mantener este estándar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con ropa de baño lycra o impermeable, indicado por la DS 007-2003-SA del 03 de Abril del 2003 – DISA.
• Es indispensable que el titular de la compra presente su DNI en físico el día de su visita. Asi mismo, debe presentar el código enviado por mail después de la compra. En RRPP se le otorgarán las pulseras mágicas.
• Dale click a este link y coloca tu estatura: http://www.lagranjavilla.com/atracciones/ . Así podrás conocer los juegos que te brindan acceso ilimitado en cada una de las sedes.
Si deseas ingresar al parque y tienes entre 13 y 17 años, necesitas una carta de responsabilidad y autorización firmada por tus padres o apoderados. Esta carta se firma en Relaciones Publicas, en el ingreso a La Granja Villa. Puedes encontrar más detalles aquí: http://lagranjavilla.com/protocolos/mod2/index.php
• La pulsera mágica no incluye alimentos, bebidas, juegos feriales ni el Bungy.
Para ver las guías de seguridad de cada juego ingresa a: http://www.lagranjavilla.com/atracciones/
			</textarea>                              
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal">Acepto</button>
            </div>
        </div>
    </div>
</div>