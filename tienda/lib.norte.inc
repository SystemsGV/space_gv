<?php
define('CODIGO_TIENDA','600659702');

//// PRUEBAS
//define('URL_FORMULARIO_VISA','http://qas.multimerchantvisanet.com/formularioweb/formulariopago.aspx');
//define('URL_WSGENERAETICKET_VISA','http://qas.multimerchantvisanet.com/WSGenerarEticket/WSEticket.asmx?wsdl');
//define('URL_WSCONSULTAETICKET_VISA','http://qas.multimerchantvisanet.com/WSConsulta/WSConsultaEticket.asmx?wsdl');

//// PRODUCCIÓN
define('URL_FORMULARIO_VISA','https://www.multimerchantvisanet.com/formularioweb/formulariopago.aspx');
define('URL_WSGENERAETICKET_VISA','https://www.multimerchantvisanet.com/WSGenerarEticket/WSEticket.asmx?wsdl');
define('URL_WSCONSULTAETICKET_VISA','https://www.multimerchantvisanet.com/WSConsulta/WSConsultaEticket.asmx?wsdl');

///PROXY
define('PROXY_ON', false);
define('PROXY_HOST','000.000.000.000');
define('PROXY_PORT',3128);
define('PROXY_LOGIN','dom\usuario');
define('PROXY_PASSWORD','clave');

function noCache() {
  header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
}
function htmlRedirecFormAnt($CODTIENDA, $NUMORDEN, $MOUNT){
	$html='<Html>
	<head>
	<title>Pagina prueba Visa</title>
	</head>
	<Body onload="fm.submit();">

	<form name="fm" method="post" action="'.URL_FORMULARIO_VISA.'">
	    <input type="hidden" name="CODTIENDA" value="#CODTIENDA#" /><BR>
	    <input type="hidden" name="NUMORDEN" value="#NUMORDEN#" /><BR>
	    <input type="hidden" name="MOUNT" value="#MOUNT#" /><BR>
	</form>
	</Body>
	</Html>';

	$html=ereg_replace("#CODTIENDA#",$CODTIENDA,$html);
	$html=ereg_replace("#NUMORDEN#",$NUMORDEN,$html);
	$html=ereg_replace("#MOUNT#",$MOUNT,$html);

	return $html;
}
function htmlRedirecFormEticket_bak($ETICKET){
	$html='<Html>
	<head>
	<title>Pagina prueba Visa</title>
	</head>
	<Body >

	<form name="fm" method="post" action="'.URL_FORMULARIO_VISA.'">
	    <input type="hidden" name="ETICKET" value="#ETICKET#" /><BR>
	    <input type="submit" name="boton" value="Pagar" /><BR>
	</form>
	#ETICKET#
	</Body>
	</Html>';

	$html= str_replace("#ETICKET#", $ETICKET, $html);

	return $html;
}
function htmlRedirecFormEticket($ETICKET){
	$html='<Html>
	<head>
	<title>Pagina prueba Visa</title>
	</head>
	<Body onload="fm.submit();">

	<form name="fm" method="post" action="'.URL_FORMULARIO_VISA.'">
	    <input type="hidden" name="ETICKET" value="#ETICKET#" /><BR>
	    <!--<input type="submit" name="boton" value="Pagar" /><BR>-->
	</form>
	</Body>
	</Html>';

	$html= str_replace("#ETICKET#", $ETICKET, $html);

	return $html;
}
//Funcion que recupera el valor del Eticket
function RecuperaEticket($xmlDoc){
	$strReturn = "";
		
		$xpath = new DOMXPath($xmlDoc);
		$nodeList = $xpath->query("//registro/campo[@id='ETICKET']");
		
		$XmlNode= $nodeList->item(0);
		
		if($XmlNode==null){
			$strReturn = "";
		}else{
			$strReturn = $XmlNode->nodeValue;
		}
		return $strReturn;
}
function CantidadOperaciones($xmlDoc, $eTicket){
	$cantidaOpe= 0;
	$xpath = new DOMXPath($xmlDoc);
	$nodeList = $xpath->query('//pedido[@eticket="' . $eTicket . '"]', $xmlDoc);
	
	$XmlNode= $nodeList->item(0);
	
	if($XmlNode==null){
		$cantidaOpe= 0;
	}else{
		$cantidaOpe= $XmlNode->childNodes->length;
	}
	return $cantidaOpe; 
}
//Funcion que recupera el valor de uno de los campos del XML de respuesta
function RecuperaCampos($xmlDoc,$sNumOperacion,$nomCampo){
		$strReturn = "";
		
		$xpath = new DOMXPath($xmlDoc);
		$nodeList = $xpath->query("//operacion[@id='" . $sNumOperacion . "']/campo[@id='" . $nomCampo . "']");
		
		$XmlNode= $nodeList->item(0);
		
		if($XmlNode==null){
			$strReturn = "";
		}else{
			$strReturn = $XmlNode->nodeValue;
		}
		return $strReturn;
}
//Funcion que muestra en pantalla los parrZLtros de cada operacion
//asociada al Nro. de pedido consultado
function PresentaResultado($xmlDoc, $iNumOperacion){
		//ESTA FUNCION ES SOLAMENTE UN EJEMPLO DE COMO ANALIZAR LA RESPUESTA
		$sNumOperacion = "";

		$sNumOperacion = $iNumOperacion;

		$strValor = "";
		$strValor = $strValor . "<UL>";
		$strValor = $strValor . "<span class='texto'><LI> Respuesta: " . RecuperaCampos($xmlDoc, $sNumOperacion, "respuesta") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Estado: " . RecuperaCampos($xmlDoc, $sNumOperacion, "estado") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Cod_tienda: " . RecuperaCampos($xmlDoc, $sNumOperacion, "cod_tienda") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Nordent: " . RecuperaCampos($xmlDoc, $sNumOperacion, "nordent") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Cod_accion: " . RecuperaCampos($xmlDoc, $sNumOperacion, "cod_accion") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Pan: " . RecuperaCampos($xmlDoc, $sNumOperacion, "pan") . "<BR>";
		$strValor = $strValor . "<span class='texto'><LI> Nombre_th: " . RecuperaCampos($xmlDoc, $sNumOperacion, "nombre_th") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Ori_tarjeta: " . RecuperaCampos($xmlDoc, $sNumOperacion, "ori_tarjeta") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Nom_emisor: " . RecuperaCampos($xmlDoc, $sNumOperacion, "nom_emisor") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> ECI: " . RecuperaCampos($xmlDoc, $sNumOperacion, "eci") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Dsc_ECI: " . RecuperaCampos($xmlDoc, $sNumOperacion, "dsc_eci") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Cod_autoriza: " . RecuperaCampos($xmlDoc, $sNumOperacion, "cod_autoriza") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Cod_rescvv2: " . RecuperaCampos($xmlDoc, $sNumOperacion, "cod_rescvv2") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> ID_UNICO: " . RecuperaCampos($xmlDoc, $sNumOperacion, "id_unico") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Imp_autorizado: " . RecuperaCampos($xmlDoc, $sNumOperacion, "imp_autorizado") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Fechayhora_tx: " . RecuperaCampos($xmlDoc, $sNumOperacion, "fechayhora_tx") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Fechayhora_deposito: " . RecuperaCampos($xmlDoc, $sNumOperacion, "fechayhora_deposito") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Fechayhora_devolucion: " . RecuperaCampos($xmlDoc, $sNumOperacion, "fechayhora_devolucion") . "</span><BR>";
		$strValor = $strValor . "<span class='texto'><LI> Dato_comercio: " . RecuperaCampos($xmlDoc, $sNumOperacion, "dato_comercio") . "</span><BR>";
		$strValor = $strValor . "</UL>";
		
		return $strValor;
}
//Funcion de ejemplo que obtiene la cantidad de mensajes
function CantidadMensajes($xmlDoc){
	$cantMensajes= 0;
	$xpath = new DOMXPath($xmlDoc);
	$nodeList = $xpath->query('//mensajes', $xmlDoc);
	
	$XmlNode= $nodeList->item(0);
	
	if($XmlNode==null){
		$cantMensajes= 0;
	}else{
		$cantMensajes= $XmlNode->childNodes->length;
	}
	return $cantMensajes; 
}
//Funcion que recupera el valor de uno de los mensajes XML de respuesta
function RecuperaMensaje($xmlDoc,$iNumMensaje){
	$strReturn = "";
		
		$xpath = new DOMXPath($xmlDoc);
		$nodeList = $xpath->query("//mensajes/mensaje[@id='" . $iNumMensaje . "']");
		
		$XmlNode= $nodeList->item(0);
		
		if($XmlNode==null){
			$strReturn = "";
		}else{
			$strReturn = $XmlNode->nodeValue;
		}
		return $strReturn;
}

?>
