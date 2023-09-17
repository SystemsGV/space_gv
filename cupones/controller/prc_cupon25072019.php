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
        <head>
        <meta charset="utf-8" />
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
        <td width="50%" valign="top" style="font-family:Arial; font-size:7px;"><strong>&iexcl;BIENVENIDOS&#33;</strong><br />
        &iexcl;Estamos felices de que hayas elegido La Granja Villa para pasar tu d&iacute;a&#33; &iexcl;Nuestro objetivo es hacerte vivir una experiencia 		
		entretenida y adem&aacute;s educativa&#33;.<br />
        Por ello, es importante que leas estas indicaciones que te permitir&aacute;n prepararte antes de ingresar a nuestro parque:<br />
        1. El ingreso a La Granja Villa es &uacute;nicamente con la Pulsera M&aacute;gica que da acceso al parque, a los tours de animales y a los juegos mec&aacute;nicos 
		las veces que desee* dependiendo de la talla y peso de nuestros visitantes. Nuestros juegos operan en base a los tall&iacute;metros que dan las gu&iacute;as de seguridad
		de los fabricantes de cada juego. Tambi&eacute;n podr&aacute;n ingresar con la Pulsera M&aacute;gica al &aacute;rea de piscinas en temporada de verano. 
		*(No incluye el Bungy, ni los juegos feriales o de destre-za donde se concursa por un premio). Para m&aacute;s detalles de los juegos visita: 
		http://www.lagranjavilla.com/atracciones/<br />
		2. &Uacute;nicamente los ni&ntilde;os que midan menos de ochenta cent&iacute;metros (80 cm con calzado) pueden ingresar sin pulsera al parque, e incluso pueden acceder 
		a los tours de animales y en verano tambi&eacute;n al &aacute;rea de piscinas, mas no a los juegos mec&aacute;nicos.<br />
		3. Los ni&ntilde;os que midan menos de ochenta cent&iacute;metros (80 cm.) tienen la opci&oacute;n de adquirir la Pulsera M&aacute;gica y tendr&aacute;n acceso a los 
		siguientes juegos en Chorrillos: El Pueblo, Lonas Saltarinas, Carrusel, Barqui-to Pirata y El Manu. Mientras en Comas tendr&aacute;n: El Pueblo, Carrusel, Lonas 
		saltarinas y barquito Vikingo.<br />
		4. El uso de la Pulsera M&aacute;gica es indispensable e intransferible. Es necesario tenerla colocada durante toda la visita para acceder libremente a los 
		bene&#64257;cios en el parque. En caso de retir&aacute;rsela y/o perderla, no podr&aacute; tener acceso a los bene&#64257;cios que da la pulsera. La reposici&oacute;n 
		de otro material (pulsera) tiene un costo adicional. La Pulsera tiene validez solo por el d&iacute;a que se adquiere. Si la persona se retira de nuestras instalaciones 
		no podr&aacute; REINGRESAR. Evite manipular la pulsera durante su estad&iacute;a, ya que deber&aacute; mostrarla para acceder a toda la diversi&oacute;n.<br />
		5. Para mayor seguridad de sus veh&iacute;culos, agradeceremos respetar las normativas de nuestro estacionamiento. Por ello es importante seguir las indicaciones del 
		personal de seguridad quien lo orientar&aacute; con la ubicaci&oacute;n de sus veh&iacute;culos seg&uacute;n la hora de llegada.<br />
		6. Nuestro personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen al parque, esto nos asegurar&aacute; un d&iacute;a completamente 
		seguro para todos.<br />
		7. Por su seguridad y la de otros visitantes no est&aacute; permitido ingresar al parque con armas de fuego u objetos punzo cortantes, tampoco est&aacute; permitido 
		el ingreso de mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas, palo para sel&#64257;e, tr&iacute;pode, in&#64258;ables, 
		&#64258;otadores, tapetes, juegos de propulsi&oacute;n a chorro &oacute; pistolas de agua en temporada de verano, o juguetes que puedan comprometer alg&uacute;n 
		riesgo, tambi&eacute;n envases de vidrio, silbatos, cornetas u objetos que hagan ruido y perturben la tranquilidad de nuestros visitantes y de los animales que viven 
		en el parque.<br />
		8. Por seguridad no est&aacute; permitido el ingreso de alimentos ni bebidas, ya que una vez que el visitante haya ingresado a nuestras instalaciones, La Granja Villa 
		se hace responsable de su seguridad dentro de nuestras sedes. Los invitamos a conocer m&aacute;s en nuestra p&aacute;gina web 
		http://lagranjavilla.com/protocolos/mod1/index.php donde se indica que La Granja Villa se responsabiliza de los productos alimenticios que se elaboran y ofrece en 
		nuestra sede, mas no podemos responsabilizar-nos de los alimentos que proceden de fuera, sobre los cuales no conocemos su preparaci&oacute;n ni preservaci&oacute;n. 
		En el caso del ingreso de agua, est&aacute; permitido ingresar botellas pl&aacute;sticas SELLADAS m&aacute;ximo de 1 litro (una botella por persona). Por seguridad 
		botellas de agua selladas m&aacute;s grandes de 1 litro no podr&aacute; ingresar al parque.<br />
		9. En el caso de papillas, leche en polvo o f&oacute;rmula y termos de agua hervida que no contengan vidrio en su interior (hasta m&aacute;ximo 750 ml), ingresan 
		directamente al parque sin necesidad de activar protocolos.<br />
		10. En el caso de que estos alimentos (punto 9) vengan en contenedores de vidrio o termos de vidrio y refrigerios que contengan dietas especiales, se activar&aacute;n 
		protocolos en la o&#64257;cina de RRPP en el ingreso, seg&uacute;n lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php<br />
		11. Por su seguridad y la de otros visitantes, &quot;Conforme a las recomendaciones para la prevenci&oacute;n y cuidado de la salud, dentro de nuestras instalaciones, 
		el ingreso de los visitantes al parque, que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud 
		de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunaci&oacute;n gratuita y que las recomendaciones de 
		aislamiento temporal responden a condiciones m&eacute;dicas generales, a efectos de evitar la transmisi&oacute;n y difusi&oacute;n de virus&quot;.<br />
		12. Es muy importante respetar las normativas de seguridad que indica el operador de cada juego al ingresar al &aacute;rea, y que adem&aacute;s est&aacute;n publicadas 
		en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Dependiendo del juego puede encontrar restricciones de talla y peso que son indicadas por el 
		fabricante del juego en el manual. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para mas detalle de las gu&iacute;as de seguridad visita: 
		http://www.lagranjavilla.com/atracciones/ <br />
		13. Por la privacidad de terceras personas, no est&aacute;n permitidas las fotograf&iacute;as o &#64257;lmaciones a personas que no sean de su entorno, es decir a 
		otros visitantes del parque con los que no tenemos amistad.<br />
		14. El ingreso a la Mansi&oacute;n Embrujada (Chorrilos) es solo en una ocasi&oacute;n por visitante, siempre que se supere el metro 1.30 cent&iacute;metros de 
		estatura.<br />
		15. No est&aacute; permitido subir a los juegos con art&iacute;culos que puedan desprenderse del usuario al accionar la atracci&oacute;n, poniendo en riesgo la 
		operatividad y la seguridad del juego, adem&aacute;s de la de otros visitantes. Por lo cual, no est&aacute; permitido acceder a nuestros juegos con objetos como: 
		carteras, canguros, gorras, mochilas, lentes, etc. Para m&aacute;s informaci&oacute;n visita: http://www.lagranjavilla.com/atracciones/<br />
		16. En el juego del Disco Nazca, por seguridad no est&aacute; permitido el ingreso con sandalias que no tengan correas reajustables que pasen por detr&aacute;s del 
		tobillo, para evitar que estas puedan salir disparadas y caigan en el riel de tr&aacute;nsito del juego.<br />
		17. El horario de los juegos extremos en Chorrillos (Vikingo, Black Hole, R&iacute;o Granjero, Tagadisco, Disco Nazca y Mansi&oacute;n Embrujada,) y en Comas 
		(La Alfombra, Torre, Troncos, Tagadisco y R&iacute;o Amaz&oacute;nico), es en los siguientes horarios: Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 
		5:30 p.m, y los S&aacute;bados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.<br />
		18. El ingreso a los recintos de animales debe realizarse con serenidad y sin presi&oacute;n de los tutores, por lo que se recomienda no obligar a los ni&ntilde;os a 
		ingresar, ya que los gritos y el llanto perturban a los animalitos, los que pueden tomar conductos inadecuadas ante el estr&eacute;s ocasionado por el ruido o por no 
		cumplir con las indicaciones. Esto tambi&eacute;n evita escuchar la explicaci&oacute;n que da el gu&iacute;a en diferentes &aacute;reas. El cronograma de actividades 
		del plano entregado al ingreso, indica los horarios de las actividades del d&iacute;a.<br />
		19. Debemos darle de comer a nuestros animalitos de acuerdo a su especie y caracter&iacute;sticas especiales, siguiendo las indicaciones de los profesionales a cargo, 
		con el alimento que se otorga para la interacci&oacute;n ya que este se encuentra racionado y preparado para ofrecer la mejor experiencia al visitante sin perjuicio 
		del animal.<br />
		20. No est&aacute; permitido alterar la tranquilidad o manipular a los animales que se encuentran sueltos, ni darles alimentos que no sean proporcionados dentro 
		del parque para las diferentes &aacute;reas de animales, ya que estos alimentos podr&iacute;a atentar contra su vida. Cada animalito recibe una dieta especial y 
		balanceada diariamente por el parque.<br />
		21. El ingreso a las zonas de piscinas es de 10:00 a.m. a 5:15 p.m. y es solo en temporada de verano.<br />
		22. Todos los ba&ntilde;istas merecemos disfrutar de agua sana. Para lograr esto debemos cumplir CON EL DECRETO 007-2003-SA &quot;El ingreso a la zona de piscinas 
		es &uacute;nicamente con ropa de ba&ntilde;o&quot;. Son las normativas de DISA. La ropa de ba&ntilde;o es de material impermeable o lycra (la ropa interior, short 
		de deporte o algod&oacute;n, aso como los short de vestir No son ropa de ba&ntilde;o). Por ello no esta permitido el uso de las piscinas con short deportivo, de vestir 
		o de algod&oacute;n, que no permite mantener el agua sana o en las damas, el uso de las salidas de ba&ntilde;o sobre la ropa de ba&ntilde;o que no sean de lycra.<br />
		23. Para los menores de edad que quieran ingresar al parque sin la compa&ntilde;&iacute;a de un adulto deben tomar en cuenta primero: El padre o apoderado 
		deber&aacute; &#64257;rmar un documento en donde se deja constancia la decisi&oacute;n de dejar solo al menor (s&oacute;lo si la edad del menor &#64258;uct&uacute;a 
		entre los 13 y 17 a&ntilde;os). El cual tendr&aacute; acceso solo a los juegos mec&aacute;nicos, a la zona de animales silvestres y de animales de granja, pero no 
		se permitir&aacute; el ingreso a la zona de piscinas http://lagranjavilla.com/protocolos/mod2/index.php.<br />
		24. Por seguridad, los menores de edad &uacute;nicamente ingresaran al &aacute;rea de piscinas acompa&ntilde;ados por un adulto responsable. Si no hay un adulto 
		responsable con el menor de edad no se permitir&aacute; el ingreso al &aacute;rea de piscinas.<br />
		25. Recomendamos aplicarte protector solar para evitar las insolaciones, sobre todo en temporada de verano. Tambi&eacute;n se recomienda el uso de repelente en 
		nuestras instalaciones.<br />
		26. La Granja Villa no se hace responsable por los cambios clim&aacute;ticos que puedan presentarse diariamente.<br />
		27. Para realizar cualquier pago con tarjeta de cr&eacute;dito es indispensable presentar su DNI. En el caso de ser extranjeros deben presentar su pasaporte o 
		carnet de extranjer&iacute;a.<br />
		28. Sobre el uso de los Lockers: El servicio es exclusivo para los clientes de La Granja Villa y debe ser utilizado solo mientras permanezca en nuestras instalaciones. 
		Ni La Granja Villa ni la empresa Maletek se responsabiliza por las p&eacute;rdidas o robos de los objetos dejados dentro de los lockers, por lo que recomendamos no 
		dejar dinero ni objetos de mucho valor. Se recomienda veri&#64257;car que el casillero se encuentre cerrado en su totalidad al retirar la llave y tambi&eacute;n 
		veri&#64257;car las instrucciones de la utilizaci&oacute;n de los lockers. El costo del servicio es de 1.00 sol por cada vez que usted abra la puerta del locker y 
		tiene que tomar en cuenta que la p&eacute;rdida de la llave tiene una penalidad de 20.00 soles.<br />
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







