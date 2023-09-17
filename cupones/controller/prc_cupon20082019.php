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
        $imagen = '<img src="http://generator.barcodetools.com/barcode.png?gen=0&data='.$nroCupon.'&bcolor=FFFFFF&fcolor=000000&tcolor=000000&fh=14&bred=0&w2n=2.5&xdim=2&w=100&h=320&debug=1&btype=7&angle=90&quiet=1&balign=2&talign=0&guarg=1&text=1&tdown=1&stst=1&schk=0&cchk=1&ntxt=1&c128=0">';

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
        <td width="60%" valign="top" style="font-family:Arial; font-size:9px;"><strong>&iexcl;BIENVENIDOS&#33;</strong><br />
        &iexcl;Estamos felices de que hayas elegido La Granja Villa para pasar tu d&iacute;a&#33; &iexcl;Nuestro objetivo es hacerte vivir una experiencia 		
		entretenida y adem&aacute;s educativa&#33;.<br />
        Por ello, es importante que leas estas indicaciones que te permitir&aacute;n prepararte para el dia de tu visita:<br />
        1. La Pulsera M&aacute;gica es personal e intransferible. Es necesario tenerla colocada durante toda la visita para acceder libremente a los beneficios dentro del parque. En caso de retirársela y/o perderla, la reposición tiene un costo de S/. 5.00. Le permite al portador el ingreso a los juegos mecánicos, tours de animales silvestres, área de granja y zona acuática (solo en las fechas publicadas en nuestras plataformas digitales). Podrás ingresar a los juegos las veces que desees, siempre y cuando el horario, tu estatura y/o peso lo permitan. Niños a partir de los 80 cm de estatura deberán adquirir la pulsera mágica. <br/>
		2. Niños por debajo de los 80 cm de estatura pueden ingresar al parque sin pulsera y tendrán acceso al área de granja, tours de animales silvestres y zona acuática acompañados de un adulto con pulsera mágica (solo en las fechas publicadas en nuestras plataformas digitales). Si desea que el niño participe de los juegos, deberá adquirir su pulsera mágica. Dale click a este enlace para ver los juegos que le brindarán acceso ilimitado al niño, de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/. En caso el niño no porte la pulsera mágica, no tendrá acceso a los juegos.<br />
		3. La pulsera mágica debe ser portada en el brazo derecho de cada visitante. En caso de retirársela y/o perderla, no podrá tener acceso a los beneficios. La reposición de otro material tiene un costo adicional.<br />
		4. La pulsera mágica tiene validez solo por el día que se adquiere. Si la persona se retira de las instalaciones, no podrá reingresar. <br />
		5. Por favor, respeta las normativas del estacionamiento. Por seguridad, es importante seguir las indicaciones del personal encargado, quien orientará la ubicación de su vehículo según la hora de llegada.<br />
		6. El personal realizará una inspección de todas las mochilas y bolsos que ingresen al parque, esto nos garantiza un día completamente seguro para todos.<br />
		7. No está permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, inflables, instrumentos musicales, palos selfie, silbatos, trompetas, megáfonos, objetos que emitan sonido, triciclos, patinetas, patines, carritos, fósforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.<br />
		8. Por seguridad, no está permitido el ingreso de alimentos ni bebidas. Una vez que el visitante ingresa a nuestras instalaciones, La Granja Villa se hace responsable de su seguridad dentro de las instalaciones. En el siguiente link podrás encontrar nuestro protocolo: http://lagranjavilla.com/protocolos/mod1/index.php donde se indica que La Granja Villa se responsabiliza de los productos alimenticios que se elaboran y ofrecen, mas no podemos responsabilizarnos de los alimentos que proceden de fuera, sobre los cuales no conocemos su preparación ni preservación.<br />
		9. En el caso del agua, est&aacute permitido ingresar 1 botella pl&aacutes;tica SELLADA máximo de 1 litro por persona. En el caso de papillas, leche en polvo, fórmula y termos de agua hervida que no contengan vidrio en su interior (hasta máximo 750 ml), ingresan directamente.  En el caso de que estos alimentos vengan en contenedores o termos de vidrio y refrigerios que contengan dietas especiales, podrán ingresar siempre y cuando se active protocolo requerido en la oficina de RRPP, según lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php <br />
		10. Por su seguridad y la de otros visitantes, "Conforme a las recomendaciones para la prevención y cuidado de la salud dentro de nuestras instalaciones, el ingreso de los visitantes que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunación gratuita y que las recomendaciones de aislamiento temporal responden a condiciones médicas generales, a efectos de evitar la transmisión y difusión de virus".<br />
		11. Es muy importante respetar las normas de seguridad que indica el operador de cada juego. Además, están publicadas en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Los juegos funcionan en base a estatura y/o peso del visitante, ya que el sistema de seguridad es diseñado y dado por el fabricante de cada juego. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para mas detalle de las guías de seguridad visita: http://www.lagranjavilla.com/atracciones/ <br />
		12. Por la privacidad de terceras personas, no se permiten las fotografías o grabaciones a visitantes que no sean de nuestro circulo amical o familiar. <br />
		13. El ingreso a la Mansión Embrujada (Chorrillos) es de una vez por el dia de su visita, siempre que supere el 1.20 m de estatura.<br />
		14. No está permitido subir a los juegos con artículos que puedan desprenderse del usuario, ya que puede poner en riesgo la operatividad y la seguridad del juego y los visitantes. No se permiten los objetos como: carteras, canguros, gorras, mochilas, lentes, etc.<br />
		15. Por seguridad, en el juego del Disco Nazca, no se permite el ingreso con sandalias que no tengan correas reajustables, evitando que puedan salir disparadas y caigan en el riel de tránsito del juego. En el kiosko más cercano, se venden sujetadores que puedes colocar en tus sandalias si asi lo deseas.<br />
		16. El horario de atención es de 10 am a 6 pm en la mayoria de los juegos. Solo en el caso de: Black Hole, Río Granjero y Cuy Loco, estarán operativos en los siguientes horarios:  Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 5:30 p.m. Sábados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.<br />
		17.El ingreso a los recintos de animales debe realizarse con serenidad y sin presión de los tutores. No se recomienda obligar a los niños a ingresar, ya que los gritos y el llanto perturban a los animales, quienes podrían realizar conductas inadecuadas ante el estrés ocasionado por el ruido. <br />
		18.Los animales solo se deben alimentar con una dieta especial y balanceada, de acuerdo a su especie y características. El alimento que se otorga para la interacción esta racionado y preparado para ofrecer la mejor experiencia al visitante sin perjuicio del animal. No se permite ofrecer alimentos a los animales que no sea proporcionado por nuestros especialistas y adquirido dentro del parque,  ya que pueden atentar contra su bienestar y salud.<br />
		19.No se permite alterar la tranquilidad o manipular a los animales que se encuentran libres. Es importante seguir las indicaciones de los profesionales a cargo.<br />
		20. En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio de la zona acuática, donde contamos con agua saludable certificada por DIGESA. Para mantener este estándar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con ropa de baño lycra o impermeable, indicado por la DS 007-2003-SA del 03 de Abril del 2003 – DISA "El ingreso a la zona de piscinas es únicamente con ropa de baño". La ropa interior, polos y shorts (de deporte o algodón), no son ropa de baño, por lo que no se permitirá el ingreso a las piscinas con dicho material.<br />
		21. El ingreso a la zona ácuatica es de 10 am a 5:15 pm en temporada de verano (fechas publicadas en las plataformas digitales).<br />
		22. Si deseas ingresar al parque y tienes entre 13 y 17 años, necesitas una carta de responsabilidad y autorización firmada por tus padres o apoderados. Esta carta se firma en Relaciones Publicas, en el ingreso a La Granja Villa. Puedes encontrar mas detalles aquí: http://lagranjavilla.com/protocolos/mod2/index.php.<br />
		23.Por seguridad, los menores de edad únicamente ingresarán a la zona acuática acompañados de un adulto responsable. De lo contrario, no se permitirá el ingreso.<br />
		24. Recomendamos la aplicación de protector solar para evitar las insolaciones, sobre todo en temporada de verano. También se recomienda el uso de repelente.<br />
		25. La Granja Villa no se hace responsable por los cambios climáticos que puedan presentarse diariamente.<br />
		26. Para realizar cualquier pago con tarjeta de crédito es indispensable presentar su DNI. En el caso de ser extranjero, debe presentar su pasaporte o carnet de extranjería.<br />
		27.Sobre el uso de los lockers: Seguir las instrucciones colocadas en la parte frontal de los lockers. El costo del servicio es de S/.1.00 cada vez que se abre la puerta del locker. Si la llave se pierde, la penalidad es de S/. 20.00. La Granja Villa y la empresa Maletek no se responsabilizan por perdidas o robos de objetos dejados dentro de los lockers, por lo que no se recomienda dejar dinero ni objetos de mucho valor. Se debe verificar que el casillero se encuentre cerrado en su totalidad al retirar la llave.<br /> 
		<br />

		Gracias por elegirnos, pasa un excelente día!<br />
		
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







