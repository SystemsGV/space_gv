<?php
include '../admin/includes/inc_header.php';
include '../admin/includes/constantes.php';
include '../admin/includes/funciones.php';
require_once '../admin/includes/sendmail/class.phpmailer.php';
include '../admin/includes/inc_login_cliente.php';
include '../admin/clases/cls_emp_cliente.php';
include ("../dompdf/dompdf_config.custom.inc.php");
include ("../dompdf/dompdf_config.inc.php");
include '../admin/clases/cls_emp_foto2.php'; /*This table Cupon*/

$path = "http://www.lagranjavilla.com/cupones/";
$host = "http://www.lagranjavilla.com/cupones/";
$ruta = "/home3/lagranja/public_html/cupones/";

$idCustomer = $_SESSION['session_cliente']; /*Id de cliente logeado*/

/* create instance of client */
$cliente = new cls_emp_cliente();
$cliente->cls_emp_cliente($idCustomer);

/* create instance of cupom and setting paramet */
$cupon = new cls_emp_foto();
$cupon->set_id_cliente($idCustomer);
$cupon->set_id_categoria($_POST['customer']);
$cupon->set_txt_titulo(date('Y-m-d H:i:s'));
$cupon->set_txt_email($_POST['email']);
$cupon->set_int_stado(0);

/*** Generation of cupon for user ***/
$day     = date('d/m/Y');
$days    = explode('/', $day);
$precode = $days[0].$days[1].$days[2];
$nroCode = $cupon->getCountCode($idCustomer, $precode);
$totalCupon = $nroCode + 1;
/* create number of cupom */
$nroCupon   = $precode.$idCustomer."-".$totalCupon;
$cupon->set_int_retoque($nroCupon);
if(!empty($totalCupon)){
    for($i = 1; $i <=1; $i++){    
        $imagen = '<img src="http://generator.barcodetools.com/barcode.png?gen=0&data='.$nroCupon.'&bcolor=FFFFFF&fcolor=000000&tcolor=000000&fh=14&bred=0&w2n=2.5&xdim=2&w=70px&h=220px&debug=1&btype=7&angle=90&quiet=1&balign=2&talign=0&guarg=1&text=1&tdown=1&stst=1&schk=0&cchk=1&ntxt=1&c128=0">';

        $head ='
        <!DOCTYPE html>
        <html lang="es">
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>La Granja Villa</title>
        <style>
        body {font-family:Verdana, Arial, Helvetica, sans-serif;background-color:#fff;}
        table {width:100%;}
        p{
            width: auto;
            height: auto;
            -ms-transform: rotate(270deg);
            -webkit-transform: rotate(270deg);
            transform: rotate(270deg);    
        }
        </style>
        </head> 
        <body>
        <table style="background: url(\'../admin/upload/cupon/'.$cliente->get_txt_email().'\'); background-repeat:no-repeat; height:360px;">
            <tr>
                <td style="width:25px;">&nbsp;</td>
                <td style="text-align:left;">'.$imagen.' 
                </td>
            </tr>			
        </table>
		<table>
		<tr>
	        <td align="left" style="font-size:11.5px;"><b>EMPRESA:</b> '.$cliente->get_txt_nombre().' </td><p>
			<td align="left"  style="font-size:11.5px;"><b>FECHA DE VENCIMIENTO:</b> '.$cliente->get_txt_nombre4().'</td>
			<td align="right"  style="font-size:11.5px;"><b>BENEFICIADO:</b> '.$cupon->get_id_categoria().' </td>
		</tr>
		</table>
		<br>
	<table style="font-family:Arial; font-size:9px;" width="100%">
        <tr>
        <td width="60%" valign="top" style="font-family:Arial; font-size:9px;"><strong>&iexcl;IMPORTANTE&#33;</strong><br />
        •	No v&aacute;lido para cierres parciales o totales del parque por exclusividad de empresas. Revisar web y redes sociales antes de su visita. <br />
        •	V&aacute;lido cancelando con efectivo, tarjeta de cr&eacute;dito y/o d&eacute;bito. <br />
        •	La entrada al parque, se debe cargar a un dispositivo inteligente (pulsera o tarjeta) para poder disfrutar de una tecnolog&iacute;a sin contacto y todos sus beneficios. El precio del dispositivo inteligente no est&aacute; incluido en el precio de entrada.  <br />
        •	El dispositivo inteligente es intransferible, personal e indispensable durante tu estad&iacute;a en el parque.  <br />
        •	Niños a partir de los 80 cm de estatura deber&aacute;n adquirir su entrada. <br />
        •	Para ingresar a los juegos, deber&aacute;s escanear tu pulsera en el ingreso del mismo. Tambi&eacute;n, la podr&aacute;s utilizar para abrir y cerrar tu locker si decides alquilarlo. Si pierdes el dispositivo inteligente, deber&aacute;s adquirir uno nuevo, ya que no podr&aacute;s acceder a los beneficios del parque sin tu pulsera/tarjeta.  <br />
        •	Niños por debajo de los 80 cm (medida con calzado) de estatura podr&aacute;n ingresar al parque sin dispositivo inteligente y tendr&aacute;n acceso al &aacute;rea de granja, tours de animales silvestres, dinosaurios y zona acu&aacute;tica (en las fechas determinadas) acompañados de un adulto con dispositivo inteligente. Si desea que el niño partícipe de los juegos, deber&aacute; adquirir su dispositivo inteligente. Dale clic a este enlace para ver los juegos que le brindaran acceso ilimitado al niño de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/ . Si el niño no porta la pulsera/tarjeta, no tendr&aacute; acceso a los juegos. <br /> 
        •	La entrada tiene validez solo por el d&iacute;a de su visita. Si la persona se retira de las instalaciones, no podr&aacute; reingresar.  <br />
        •	Respeta las normativas del estacionamiento. Sigue las indicaciones del personal encargado, quien orientara la ubicaci&oacute;n de su veh&iacute;culo seg&uacute;n la hora de llegada.  <br />
        •	El personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen al parque, esto nos garantiza un d&iacute;a completamente seguro para todos. <br />
        •	Por seguridad, no est&aacute; permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, globos, inflables, coolers, cigarros, instrumentos musicales, palos selfie, tripode, flotadores, tapetes, juegos de propulsi&oacute;n a chorro o pistolas de agua o juguetes que puedan comprometer alg&uacute;n riesgo, silbatos, trompetas, meg&aacute;fonos, objetos que emitan sonido, triciclos, bicicletas, scooters, skates, patinetas, patines, carritos, f&oacute;sforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque. <br />
        •	En el caso del agua, est&aacute; permitido ingresar 1 botella pl&aacute;stica SELLADA m&aacute;ximo de 1 litro por persona. En el caso de papillas, leche en polvo, formula y termos de agua hervida que NO contengan vidrio en su interior (hasta m&aacute;ximo 750 ml), ingresan directamente. En el caso de que estos alimentos vengan en contenedores o termos de vidrio y refrigerios que contengan dietas especiales, podr&aacute;n ingresar siempre y cuando se active protocolo requerido en la oficina de RRPP, seg&uacute;n lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php  <br />
        •	Por su seguridad y la de otros visitantes, "Conforme a las recomendaciones para la prevenci&oacute;n y cuidado de la salud dentro de nuestras instalaciones, el ingreso de los visitantes que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunaci&oacute;n gratuita y que las recomendaciones de aislamiento temporal responden a condiciones m&eacute;dicas generales, a efectos de evitar la transmisi&oacute;n y difusi&oacute;n de virus".  <br />
        •	Es muy importante respetar las normas de seguridad que indica el operador de cada juego. Adem&aacute;s, est&aacute;n publicadas en cada una de nuestras atracciones con el nombre de: GU&Iacute;A DE SEGURIDAD. Los juegos funcionan en base a estatura y/o peso del visitante, ya que el sistema de seguridad es diseñado y dado por el fabricante de cada juego. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para m&aacute;s detalle de las gu&iacute;as de seguridad visita: http://www.lagranjavilla.com/atracciones/  <br />
        •	Durante su visita, solo podr&aacute; ingresar una vez a la Mansi&oacute;n Embrujada, siempre que supere el 1.20 m de estatura. <br />
        •	No est&aacute; permitido subir a los juegos con art&iacute;culos que puedan desprenderse del usuario, ya que puede poner en riesgo la operatividad y la seguridad del juego y los visitantes. No se permiten los objetos como: carteras, canguros, gorras, mochilas, lentes, etc.  <br />
        •	Por seguridad, en el juego del Disco Nazca, no se permite el ingreso con sandalias que no tengan correas reajustables, evitando que puedan salir disparadas y caigan en el riel de transito del juego. En el quiosco m&aacute;s cercano, se venden sujetadores que puedes colocar en tus sandalias si as&iacute; lo deseas.  <br />
        •	El horario de atenci&oacute;n es de 10 a.m. a 6 p.m. en la mayor&iacute;a de los juegos. Solo en el caso de:  <br />
            a) Black Hole, R&iacute;o Granjero y Cuy Loco, estar&aacute;n operativos en los siguientes horarios:  <br />
            - Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 5:30 p.m. - S&aacute;bados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.  <br />
            b) Vikingo, Disco Nazca, Tagadisco, Mansi&oacute;n Embrujada y La Torre, estar&aacute;n operativos de:  <br />
            - Lunes a Domingo de 12:30 p.m. a 06:00 p.m.  <br />
        •	La Granja Villa no se hace responsable por los cambios clim&aacute;ticos que puedan presentarse diariamente.  <br />
        •	Para realizar cualquier pago con tarjeta de cr&eacute;dito es indispensable presentar su DNI. En el caso de ser extranjero, debe presentar su pasaporte o carnet de extranjer&iacute;a.  <br />
        •	Sobre el uso de los lockers: El costo del servicio es de S/2.00 la hora y S/10.00 por 6 horas. La Granja Villa no se responsabiliza por p&eacute;rdidas o robos de objetos dejados dentro de los lockers, por lo que no se recomienda dejar dinero ni objetos de valor. Se debe verificar que el casillero se encuentre cerrado en su totalidad. Por favor, siga las instrucciones que aparecen en la zona de los lockers. Por otro lado, si tuvieras algo que no se permite ingresar, podr&aacute;s utilizar los lockers de la entrada por el precio de S/.1.00.  <br />
        •	Servicios adicionales no incluidos: Alimentaci&oacute;n para animales, restaurante, quioscos, juegos de destreza, tienda de recuerdos, alquiler de lockers. <br />

     <br />

		<br />
		
		<br />
		</td>
        </tr>
        </table>
        ';
        $contraportada='';
        $footer=' </body>
        </html>';
        $content=$head.$contraportada.$footer;
        $dompdf=new DOMPDF();
        $dompdf->load_html($content);    
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents("download/{$nroCupon}.pdf", $output);
        ini_set("memory_limit","128M");
        set_time_limit ( 0 );           
    }
    sleep(3);
    if(file_exists("download/{$nroCupon}.pdf")){
        $cupon->guarda();
        /**** Genere to email ****/
        $from = "sistemas@lagranjavilla.com";
	$name = "La Granja Villa";
	$to   = $cupon->get_txt_email();
	//$cc   = "ljruizperalta@gmail.com, lvega@websconsulting.com";    
	$subject = utf8_decode("Cupón de Descuento");	
        $body    = utf8_decode("Buen día, <strong>".ucwords($cupon->get_id_categoria())."</strong><br/><br/>
                Adjunto encontrará su cupón, por favor imprimirlo al apersonarse a nuestras sedes.<br/><br/>                
                Muchas gracias<br/>
                La Granja Villa");        
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
        $mail->AddAttachment("./download/{$nroCupon}.pdf" );
        $mail->Body = $body;
	//$mail->AddBCC($cc);
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
    echo "OK";
}else{
    echo "FAIL";
}







