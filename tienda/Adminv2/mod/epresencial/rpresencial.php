<?php
include("../../inc.var.php");
include "../../includes/sendmail/class.phpmailer.php";
require_once("../../libs/dompdf/dompdf_config.inc.php");

$path="http://www.lagranjavilla.com/tienda/";
$host="http://www.lagranjavilla.com/tienda/";
$ruta="/home3/lagranja/public_html/tienda/";

$varmembresia = 20;
$varseguro = 5;
//Registro del Cliente
	//$fnac = explode("/",$_POST["fnacimiento"]);
	$cli = Cliente::find_by_sql("select (MAX(cClieCode) + 1) idcliente from CLIENTE");	
	$post = New Cliente();
	$post->ccliecode=$cli[0]->idcliente;
	$post->sclieapel=$_POST["apaterno"]." ".$_POST["amaterno"];
	$post->sclieapepat=$_POST["apaterno"];
	$post->sclieapemat=$_POST["amaterno"];
	$post->scliename=$_POST["nombres"];
	$post->charclientedni=$_POST["dni"];
	$post->scliemail=$_POST["email"];
	$post->sclietelf=$_POST["telefono"];
	$post->dnacmdate=$_POST["fnacimiento"];
	$post->sclieaddr=$_POST["direccion"];
	$post->varclienteclave="PRESENCIAL";
	$post->dateclientefreg=date("Y-m-d");
	$post->varclientelink="PRESENCIAL";
	$post->intclientecmail="0";
	$post->intclientesocio="1";
	$post->save();

//Registro del Cart
	do{		
        $creserva=RandomString(6,TRUE,TRUE,FALSE);
        $fcreserva=Cart::find_by_sql("select varCartCreserva from cart where varCartCreserva='{$creserva}'");
    }while(isset($fcreserva[0]->varcartcreserva));
	
	$numentradas = $_POST["numentradas"];
	$total = 0;
	$totalseguro = 0;
	for($i = 0; $i < $numentradas; $i++){
		$total += $_POST["precio{$i}"];
		if($_POST["seguro{$i}"]){
		$totalseguro += $_POST["seguro{$i}"];
		}
	}
	if($totalseguro>0){
	$totalseguro = $varseguro*$totalseguro;
	$total += $totalseguro;
	}
	if($_POST["membresia"]){
		$total += $varmembresia;
	}
    $stotal = number_format($total/1.18, 2,'.','');
	$igv    = number_format(0.18*$stotal, 2,'.','');
	
	if($_POST["tboleto"]==2){
		$sede=1;
	}elseif($_POST["tboleto"]==3){
		$sede=2;
	}elseif($_POST["tboleto"]==6){
		$sede=1;
	}elseif($_POST["tboleto"]==11){
		$sede=1;
	}

    //Obtenemos los datos del cliente
    $cliente = Cliente::find($cli[0]->idcliente);
    $datecart = date("Y-m-d H:i:s");
    //Registrar la orden en la tabla Cart
    $cart   = new Cart();
    $cart->intclienteid  = $cli[0]->idcliente;
    $cart->varcarttitulo = $cliente->sclieapel.', '.$cliente->scliename.'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>(PRESENCIAL)</b>';
    $cart->intcartcant   = $_POST["numentradas"];
    $cart->deccartstotal = $stotal;
    $cart->deccartigv    = $igv;
    $cart->deccarttotal  = $total;
    $cart->varcartcreserva = $creserva;
    $cart->datecartfreg    = $datecart;
    $cart->intcarttpago   = 2;
    $cart->intcartsede    = $sede;
    $cart->intcarttdoc    = $_POST["fob"];
    $cart->varcartrsocial = $_POST["rsocial"];
    $cart->charcartruc    = $_POST["ruc"];
    $cart->varcartdirec   = $_POST["direccionemp"];
    $cart->intcartst      = "2"; // Pagado
    $cart->save();
    
    //Obtenemos el id que se genera al procesar la orden 
    $idCart = $cart->intcartid;

    $td = "";
    if($_POST["tboleto"]){
        $data_boleto = Boleto::find($_POST["tboleto"]);            
    }
	for($i = 0; $i < $numentradas; $i++){
			
			if($_POST["seguro{$i}"]){
			$precioe=$_POST["precio{$i}"]+$varseguro;
			}else{
			$precioe=$_POST["precio{$i}"];	
			}
			
            //Generamos el detalle del pago.
            $cartDetalle = new Cartdet();			
            $cartDetalle->intcartid   = $idCart;
            $cartDetalle->intboletoid = $_POST["tboleto"];
            $cartDetalle->cliente_ccliecode = $cli[0]->idcliente;
            $cartDetalle->datecartdetfreg = $_POST["fentrada{$i}"];
            $cartDetalle->deccartdetpu = $precioe;
			$cartDetalle->intcartdetcant = "1";
            $cartDetalle->deccartdetstotal =$precioe;
			if($_POST["seguro{$i}"]){
			$cartDetalle->varcartdetseguro = $_POST["seguro{$i}"];
			}else{
			$cartDetalle->varcartdetseguro = 0;
			}
            $cartDetalle->varcartdetapepat = $_POST["apaternoe{$i}"];
            $cartDetalle->varcartdetapemat = $_POST["amaternoe{$i}"];
            $cartDetalle->varcartdetnombres = $_POST["nombrese{$i}"];
            $cartDetalle->charcartdetdni = $_POST["dnie{$i}"];
            $cartDetalle->varcartdettelefono = $_POST["telefonoe{$i}"];
            $cartDetalle->charcartdettipo = "T";
            $cartDetalle->intcartdetst="1";
            $cartDetalle->save();

            $td.="<tr>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".($_POST["fentrada{$i}"]?date("d-m-Y",strtotime($_POST["fentrada{$i}"])):"")."</td>";
                    $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletotitulo."<BR>SEDE:".($sede==1?"GRANJA VILLA SUR":"GRANJA VILLA NORTE")."</td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletonombre."</td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".ucwords($_POST["apaternoe{$i}"]." ".$_POST["amaternoe{$i}"]." ".$_POST["nombrese{$i}"])."<BR>DNI:".$_POST["dnie{$i}"]."</td>";

                    $description_detail .= "1 ". $data_boleto->varboletotitulo."<BR>SEDE:".($sede==1?" GRANJA VILLA SUR":" GRANJA VILLA NORTE")."<BR>";
            
			$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. ".number_format($precioe,2,".","")."</td>
            </tr>";        
        }

		if($_POST["membresia"]){
			//Generamos el detalle de la membresía.
            $cartDetalle = new Cartdet();			
            $cartDetalle->intcartid   = $idCart;
            $cartDetalle->intboletoid = 0;
            $cartDetalle->cliente_ccliecode = $cli[0]->idcliente;
            $cartDetalle->deccartdetpu = $varmembresia;
            $cartDetalle->intcartdetcant = "1";
            $cartDetalle->deccartdetstotal = $varmembresia;
            $cartDetalle->charcartdettipo = "M";
            $cartDetalle->intcartdetst="1";
            $cartDetalle->save();
			
			$td.="<tr>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>";
			$td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">MEMBRESIA GRANJA VILLA</td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>";

                    $description_detail .= "1 MEMBRESIA GENERAL<BR>";

            $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. ".number_format($varmembresia,2,".","")."</td>
            </tr>";
		}
		
    //$orderDetalle = Cartdet::find_by_sql("select * from cartdet where intcartid = " . $idCart);
    //Generamos la entra 
    $from="info@lagranjavilla.com";
    $name="La Granja Villa";
    $to = $cliente->scliemail;
    $cc="sistemas@lagranjavilla.com, atencionalcliente@lagranjavilla.com";	    
    $subject=utf8_decode("Confirmación de Compra");
    $prebody=file_get_contents("../../../template/reserva.html");
    $findtxt = array("{creserva}","{cliente}", "{dni}", "{fecha}","{cantidad}","{tpagado}","{td}","{stotal}","{igv}","{total}");
    $newtxt  = array($fcreserva[0]->varcartcreserva, ucwords($cliente->sclieapel." ".$cliente->scliename),$cliente->charclientedni,date("d-m-Y",strtotime($datecart)),$numentradas,number_format($total,2,".",""),$td,number_format($stotal,2,".",""),number_format($igv,2,".",""),number_format($total,2,".",""));
    $body = str_replace($findtxt, $newtxt, $prebody);  
    
    //Se crea la instancia para enviar el mail al cliente
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
    
    //Envío de ticket --- $post TO $postCart Cambio ZendljRp
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
            where ca.intCartId='{$idCart}'");		



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
    where cd.intCartId='{$idCart}' and charCartdetTipo='T'");

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
        &iexcl;Estamos felices de que hayas elegido La Granja Villa para pasar tu d&iacute;a! &iexcl;Nuestro objetivo es hacerte vivir una experiencia entretenida y
        adem&aacute;s educativa!.<br />
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
		</table>';

		$terminosOther ='<table style="font-family:Arial; font-size:8.5px;" width="100%">
        <tr>
        <td width="100%" valign="top" style="font-family:Arial; font-size:8.5px;"><strong>BIENVENIDOS</strong> <br><br>
		Para que tu experiencia dentro del Festival del Terror sea segura y divertida, hemos preparado algunos tips para ti:<br>
		1. Los participantes deben presentar DNI. La edad minima de ingreso al festival es de 7 a&ntilde;os (sin las atracciones extremas). Solo las personas mayores de 10 a&ntilde;os, pueden ingresar a las atracciones extremas.<br>
		2. El evento inicia a las 7:00 p.m. y termina a las 11:00 p.m.<br>
		3. Si no quieres asustarte, al&eacute;jate de las zonas de espanto y escenarios abominables. En la tienda de souvenirs, podr&aacute;s adquirir un repelente anti-susto.<br>
		4. Los juegos mec&aacute;nicos tienen l&iacute;mites de estatura y/o peso establecidos por sus fabricantes. La informaci&oacute;n est&aacute; publicada en las gu&iacute;as de seguridad.<br>
		5. El uso de la pulsera es personal, indispensable e intransferible. Es necesario llevarla colocada para acceder a los beneficios. En caso de retir&aacute;rsela y/o perderla, deber&aacute; adquirir la reposici&oacute;n de la misma por un costo de S/. 5.00. De lo contrario, no podr&aacute; disfrutar de las atracciones.<br>
		6. La pulsera tiene validez solo por el d&iacute;a de su visita durante el tiempo que est&eacute; en nuestras instalaciones. Si se retira del festival, no podr&aacute; reingresar. <br>
		7. El servicio de caras pintadas y tatuajes tiene un costo adicional, al igual que los juegos feriales.<br>
		8. Para disfrutar al m&aacute;ximo de las atracciones extremas (casas de terror) de forma segura, solo se permite el ingreso UNA VEZ por noche a cada una, si el tiempo te lo permite. <br>
		9. Si las criaturas pose&iacute;das se escapan de sus zonas, escuchar&aacute;s alarmas por todo el festival. &iexcl;Corre y refugiate en las zonas se&ntilde;alizadas!<br>
		10. Los ciclos de participaci&oacute;n en todas las atracciones del festival concluyen a las 10:45 pm. Te recomendamos ingresar a todas las atracciones extremas apenas llegues. No garantizamos que puedas ingresar a todas las atracciones del festival.<br>
		11. Recuerda traer ropa que te proteja del viento. Las noches de Octubre son fr&iacute;as. <br>
		12. No nos responsabilizamos por los cambios clim&aacute;ticos que puedan presentarse.<br>
		13. Por favor, respeta las normas del estacionamiento. El personal de seguridad lo orientar&aacute; con la ubicaci&oacute;n de su veh&iacute;culo.<br>
		14. Por la privacidad de terceras personas, no tomes fotos ni videos de visitantes ajenos a tu grupo. <br>
		15. No te apartes de tu grupo durante la noche. Si te pierdes, anda al restaurante La Palapa para ayudarte.<br>
		16. Si deseas alquilar una silla de ruedas, solicitarla en el ingreso. Tiene un consto de S/.20.00.<br>
		17. Respeta a las criaturas pose&iacute;das. No los golpees ni los insultes. Si los agredes, ya no podr&aacute;s disfrutar de la noche de espantos.<br>
		18. En el juego mec&aacute;nico &ldquo;Disco Nazca&rdquo;, no est&aacute; permitido el ingreso con sandalias que no tengan correas ajustables que pasen por detr&aacute;s del tobillo. Puedes comprar un sujetador en el kiosko si no traes un calzado ajustable.<br>
		19. No est&aacute; permitido subir a los juegos mec&aacute;nicos con objetos, como: carteras, canguros, gorras, mochilas, lentes, etc.<br>
		20. Si tienes entre 13 y 17 a&ntilde;os y quieres ingresar sin la compa&ntilde;&iacute;a de un adulto, el padre o apoderado deber&aacute; firmar un documento donde deje constancia que autoriza el ingreso del menor al festival.<br>
		21. No se permite el ingreso con disfraces, m&aacute;scara o maquillaje.<br>
		22. Fumar est&aacute; permitido en ciertas zonas del festival (pregunta por la zona de fumado- res).<br>
		23. Si pagas con tarjeta de cr&eacute;dito es indispensable presentar DNI. En el caso de los extranjeros, deben presentar su pasaporte o carnet de extranjer&iacute;a.<br>
		24. Nuestro personal realizar&aacute; una inspecci&oacute;n de todas las mochilas y bolsos que ingresen al festival, esto nos brindar&aacute; una noche completamente segura.<br>
		25. Por su seguridad, no se permite el ingreso de armas de fuego, objetos punzo cortantes, mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas, alimentos, bebidas y palo de selfie.<br>
		26. Los visitantes con yesos, f&eacute;rulas, pr&oacute;tesis y/o botas inmovilizadoras, no podr&aacute;n ingresar a ciertos juegos mec&aacute;nicos.<br>
		27. Si no gozas de buena salud, no podr&aacute;s ingresar a todos los juegos mec&aacute;nicos.<br>
		28. Por tu seguridad y la de tu beb&eacute;, no se permite el ingreso a mujeres gestantes.<br>
		29. No se permite el ingreso a visitantes con signos de alguna enfermedad eruptiva o infectocontagiosa. Debemos preservar la salud comunitaria y propia de cada visitante.<br>
		30. Es importante respetar las normas de seguridad que indica el operador de cada juego mec&aacute;nico. De lo contrario, no podr&aacute;s subirte m&aacute;s al juego.<br>
		31. No nos responsabilizamos por las p&eacute;rdidas o robos de objetos personales y/o dejados dentro de los lockers. Te recomendamos no dejar dinero ni objetos de valor.<br>
		32. Si vas a utilizar los lockers, sigue las instrucciones colocadas en la parte frontal. El costo del servicio es de S/.1.00 cada vez que abras la puerta del locker. Si pierdes la llave, la penalidad es de S/. 20.00<br>
		33. Si deseas m&aacute;s informaci&oacute;n, no dudes en comunicarte con nosotros al 717-7771 o escr&iacute;benos por cualquiera de nuestras redes sociales o pagina web.<br>
		34. No se dar&aacute;n devoluciones del pago de entrada luego de realizar la compra. No se podr&aacute; cambiar la fecha una vez que la haya elegido, ni se podr&aacute;n cambiar los datos de la persona inscrita en las entradas.<br>
		35. El pago de la pulsera del Festival del Terror incluye el cumplimiento de las normativas establecidas del festival. No estar de acuerdo con las normativas, no es motivo para pedir devoluci&oacute;n del pago realizado.<br>
		36. Es indispensable que el titular de la compra presente su DNI en f&iacute;sico el d&iacute;a de su visita. Asi mismo, debe presentar el c&oacute;digo enviado por mail despues de la compra. En RRPP se le otorgar&aacute;n las pulseras.<br>
		37. Si la transacci&oacute;n se da con VISA, se realiza a trav&eacute;s de Verified by Visa, lo que asegura la autenticidad y confiabilidad del procedimiento. Al confirmar las identidades de los tarjeta-habientes, se reducen las transacciones de comercio electr&oacute;nico fraudulentas o en disputa, eliminando las inquietudes del consumidor con respecto a las compras en l&iacute;nea.<br>
		38. Luego de realizar la compra, recibir&aacute; las entradas electr&oacute;nicas en el correo registrado. El cliente acepta no divulgar ni compartir la informaci&oacute;n contenida en este correo por ning&uacute;n medio, ya que podr&iacute;a afectar su ingreso al festival.
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
        $ticket = file_get_contents("../../template/ticket.html");			
        if($v->varboletotitulo=="ENTRADA GENERAL - PULSERA MAGICA"){$terminos = $terminosGeneral;} elseif($v->varboletotitulo=="PULSERA NOCHE DE ESPANTO") {$terminos = $terminosOther1;} else {$terminos = $terminosOther;}
		$findtxticket = array("{beneficiado}","{dni}","{comprador}","{tentrada}","{nro}","{sede}","{fconsumo}","{datacode}","{terminos}");
		$newtxticket  = array($v->beneficiado,$v->charcartdetdni,$post[0]->comprador,$v->varboletotitulo,$v->intcartdetid,$post[0]->sede,$v->freg,date("Ymd").$post[0]->intcartsede.$v->intcartdetid,$terminos);
        $ticket = str_replace($findtxticket, $newtxticket, $ticket);
        $dompdf->load_html($ticket);			
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents("../../uploads/tickets/{$newname}.pdf", $output);			
        $mail->AddAttachment("../../uploads/tickets/{$newname}.pdf");		    
    }

    $body=file_get_contents("../../template/confirmacion.html");
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
        echo "0";
    }else{
        echo "1";
    }
    
    
    
   
   
   
   

   
   
   
   




