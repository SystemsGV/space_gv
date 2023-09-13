1<?php
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
	if(count($data_detalle)) {
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
                } else {
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
	$body=file_get_contents("../template/reserva.html");
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
	$post = Cart::find_by_sql("select ca.intCartId, ca.intcartst, ca.intCartSede, CASE ca.intCartSede WHEN 1 THEN 'GRANJA VILLA SUR' WHEN 2 THEN 'GRANJA VILLA NORTE' END as sede, 
                                CASE ca.intCartTpago WHEN 1 THEN 'DEPOSITO' WHEN 2 THEN 'VISA' END as tpago, concat(cl.sClieApepat, ' ', cl.sClieApemat, ' ', cl.sClieName) comprador, ca.varCartCreserva, 
                                cl.charClienteDni, cl.sClieMail, DATE_FORMAT(ca.dateCartFreg,'%d/%m/%Y') freg, ca.intCartCant, ca.decCartStotal, ca.decCartIgv, ca.decCartTotal from cart ca 
                                left join CLIENTE cl on ca.intClienteId = cl.cClieCode where ca.intCartId='{$idcart}'");

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
	$det = Cartdet::find_by_sql("select	@rownum:=@rownum+1 nro,	cd.intcartdetid, DATE_FORMAT(cd.dateCartdetFreg,'%d/%m/%Y') freg, b.varBoletoTitulo, cd.varcartdetapepat, cd.varCartdetApemat, 
                                cd.varCartdetNombres, CONCAT(cd.varCartdetApepat, ' ', cd.varCartdetApemat, ' ', cd.varCartdetNombres) beneficiado,	cd.charCartdetDni, cd.decCartdetPu from cartdet cd 
                                left join boleto b on cd.intBoletoId=b.intBoletoId, (SELECT @rownum:=0) p where cd.intCartId='{$idcart}' and charCartdetTipo='T'");
                                
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
        <td width="100%" valign="top" style="font-family:Arial; font-size:8.5px;"><strong>BIENVENIDOS</strong> <br><br>
            Para que tu experiencia dentro del Festival de Navidad sea segura y divertida, hemos preparado los siguientes tips para ti:<br />
            1. El uso de la mascarilla es obligatorio durante toda tu estadia. Solo podras retirartela cuando te encuentres sentado en las mesas senaladas para consumir alimentos y bebidas. Se deben respetar el protocolo de bioseguridad para poder
                permanecer dentro del Festival, revísalo aqui: PROTOCOLO DE BIOSEGURIDAD<br />
            2. Niños a partir de los 80 cm de estatura deberan adquirir su entrada.<br />
            3. El evento inicia a las 7:00 p.m. y termina a las 11:00 p.m.<br />
            4. Los juegos mecanicos tienen limites de estatura y/o peso establecidos por sus fabricantes. La informacion esta publicada en la Guias de Seguridad de cada atraccion. Ingresa a www.LaGranjaVilla.com/atracciones/ para mayor información.<br />
            5. El uso de la pulsera es indispensable e intransferible. Es necesario llevarla colocada para acceder a los beneficios. En caso de retirarsela y/o perderla, debera adquirir la
                reposicion de la misma por un costo de S/5.00. De lo contrario, no podra disfrutar de las atracciones.<br />
            6. La pulsera tiene validez solo por el dia de su visita durante el tiempo que este en nuestras instalaciones. Si se retira del Festival, no podra reingresar.<br />
            7. Recuerda traer ropa que te proteja del viento. No nos responsabilizamos por los cambios climaticos que puedan presentarse.<br />
            8. Por favor, respeta las normas del estacionamiento. El personal de seguridad lo orientara con la ubicacion de su vehiculo.<br />
            9. Por la privacidad de terceras personas, no tomes fotos ni videos de visitantes ajenos a tu grupo.<br />
            10. No te apartes de tu grupo durante la noche. Si te pierdes, anda al restaurante La Palapa para ayudarte.<br />
            11. Si deseas alquilar una silla de ruedas, debes solicitarla en el ingreso. Tiene un costo de S/20.00.<br />
            12. Respeta a los personajes navideños. Si los agredes, ya no podras seguir disfrutando del festival.<br />
            13. En el juego mecánico “Disco Nazca”, no esta permitido el ingreso con sandalias que no tengan correas ajustables que pasen por detras del tobillo. Puedes comprar un sujetador en el kiosco si no traes un calzado ajustable.<br />
            14. No esta permitido subir a los juegos mecanicos con objetos, como: carteras, canguros, gorras, mochilas, lentes, etc.<br />
            15. Si tienes entre 13 y 17 años y quieres ingresar sin la compañia de un adulto, el padre o apoderado debera firmar un documento donde deje constancia que autoriza el ingreso del menor al Festival.<br />
            16. Fumar esta permitido en ciertas zonas del festival (pregunta por la zona de fumadores).<br />
            17. Si pagas con tarjeta de credito es indispensable presentar DNI. En el caso de los extranjeros, deben presentar su pasaporte o carnet de extranjeria.<br />
            18. Nuestro personal realizara una inspeccion de todas las mochilas y bolsos que ingresen al festival, esto nos brindara una noche completamente segura.<br />
            19. Por su seguridad, no se permite el ingreso de armas de fuego, objetos punzo cortantes, mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas, alimentos, bebidas y palo de selfie.<br />
            20. Los visitantes con yesos, ferulas, protesis y/o botas inmovilizadoras, no podrán ingresar a ciertos juegos mecanicos.<br />
            21. Si no gozas de buena salud, no podras ingresar a todos los juegos mecanicos.<br />
            22. No se permite el ingreso a visitantes con signos de alguna enfermedad eruptiva o infectocontagiosa. Debemos preservar la salud comunitaria y propia de cada visitante.<br />
            23. Es importante respetar las normas de seguridad que indica el operador de cada juego mecanico. De lo contrario, no podras subirte mas al juego.<br />
            24. No nos responsabilizamos por las perdidas o robos de objetos personales y/o dejados dentro de los lockers. Te recomendamos no dejar dinero ni objetos de valor.<br />
            25. Si vas a utilizar los lockers, sigue las instrucciones colocadas en la parte frontal. El costo del servicio es de S/2.00 la hora + tu DNI en fisico. Te daremos una tarjeta, la cual sera la llave de tu locker. Al finalizar el uso, podras devolver la tarjeta y
                obtener tu DNI de vuelta. Si pierdes la tarjeta, la penalidad es de S/. 20.00.<br />
            26. Si deseas más informacion, no dudes en comunicarte con nosotros al 996319026 o escribenos por cualquiera de nuestras redes sociales o pagina web.<br />
                    &iexcl;Gracias por elegirnos! <br />
                </td>
        </tr>
        </table>';

		$terminosOther ='<table style="font-family:Arial; font-size:8.5px;" width="100%">
            <tr>
                <td width="100%" valign="top" style="font-family:Arial; font-size:8.5px;"><strong>BIENVENIDOS</strong> <br><br>
                    1. La entrada al parque, se debe cargar a un dispositivo inteligente (pulsera o tarjeta) para poder disfrutar de una tecnologia sin contacto y todos sus beneficios. El precio del dispositivo inteligente no está incluido en el precio de entrada.<br />
                    2. El dispositivo inteligente solo se comprara una vez. En el, podras agregar saldo y adquirir lo que desees en todos los puntos de venta dentro del parque. Podras cargar entradas para futuras visitas y tambien, sera la llave digital para el alquiler de los lockers si asi lo deseas. Tendrás tu historial de acceso a juegos y compras, es un dispositivo completamente personalizado.<br />
                    3. El dispositivo inteligente es intransferible, personal e indispensable durante tu estadía en el parque.<br />
                    4. La entrada incluye el ingreso a los juegos mecanicos, tours de animales silvestres, area de granja, dinosaurios y zona acuatica (solo en las fechas publicadas en nuestras plataformas digitales). Podras ingresar a los juegos las veces que desees. Toma en cuenta que los juegos tienen horarios, rangos de estaturas y funcionan en base a la guia de seguridad. No incluye los juegos feriales, donde se concursa por un premio. Niños a partir de los 80 cm de estatura deberan adquirir su entrada.<br />
                    5. Para ingresar a los juegos, deberas escanear tu pulsera en el ingreso del mismo. Tambien, la podras utilizar para abrir y cerrar tu locker si decides alquilarlo. Si pierdes el dispositivo inteligente, deberas adquirir uno nuevo, ya que no podras acceder a los beneficios del parque sin tu pulsera/tarjeta.<br />
                    6. Niños por debajo de los 80 cm (medida con calzado) de estatura podran ingresar al parque sin dispositivo inteligente y tendran acceso al area de granja, tours de animales silvestres, dinosaurios y zona acuatica (en las fechas determinadas) acompañados de un adulto con dispositivo inteligente. Si desea que el niño participe de los juegos, debera adquirir su dispositivo inteligente. Dale clic a este enlace para ver los juegos que le brindaran acceso ilimitado al niño de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/ . Si el niño no porta la pulsera/tarjeta, no tendra acceso a los juegos.<br />
                    7. La entrada tiene validez solo por el dia de su visita. Si la persona se retira de las instalaciones no podra reingresar. El dispositivo inteligente se podra utilizar en varias visitas si se recarga adecuadamente.<br />
                    8. Respeta las normativas del estacionamiento. Por seguridad, sigue las indicaciones del personal encargado, quien orientara la ubicacion de su vehiculo segun la hora de llegada. <br />
                    9. El personal realizara una inspeccion de todas las mochilas y bolsos que ingresen al parque, esto nos garantiza un día completamente seguro para todos <br />
                    10. Por seguridad, no esta permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, globos, inflables, coolers, cigarros, instrumentos musicales, palos selfie, tripode, flotadores, tapetes, juegos de propulsión a chorro o pistolas de agua o juguetes que puedan comprometer algun riesgo, silbatos, trompetas, megafonos, objetos que emitan sonido, triciclos, bicicletas, scooters, skates, patinetas, patines, carritos, fosforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.<br />
                    11. Una vez que el visitante ingresa a nuestras instalaciones, La Granja Villa se hace responsable de su seguridad dentro de nuestras instalaciones. En el siguiente link podras encontrar nuestro protocolo: http://lagranjavilla.com/protocolos/mod1/index.php donde se indica que La Granja Villa se responsabiliza de los productos alimenticios que se elaboran y ofrecen, mas no podemos responsabilizarnos de los alimentos que proceden de fuera, sobre los cuales no conocemos su preparacion ni preservacion.<br />
                    12. En el caso del agua, esta permitido ingresar 1 botella plastica SELLADA maximo de 1 litro por persona. En el caso de papillas, leche en polvo, formula y termos de agua hervida que NO contengan vidrio en su interior (hasta maximo 750 ml), ingresan directamente. En el caso de que estos alimentos vengan en contenedores o termos de vidrio y refrigerios que contengan dietas especiales, podran ingresar siempre y cuando se active protocolo requerido en la oficina de RRPP, segun lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php <br />
                    13. Por su seguridad y la de otros visitantes, "Conforme a las recomendaciones para la prevencion y cuidado de la salud dentro de nuestras instalaciones, el ingreso de los visitantes que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunación gratuita y que las recomendaciones de aislamiento temporal responden a condiciones medicas generales, a efectos de evitar la transmision y difusion de virus".<br />
                    14.  Es muy importante respetar las normas de seguridad que indica el operador de cada juego. Ademas, estan publicadas en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Los juegos funcionan en base a estatura y/o peso del visitante, ya que el sistema de seguridad es diseñado y dado por el fabricante de cada juego. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para mas detalle de las guias de seguridad visita: http://www.lagranjavilla.com/atracciones/<br />
                    15. Por la privacidad de terceras personas, no se permiten las fotografias o grabaciones a visitantes que no sean de nuestro circulo amical o familiar.<br />
                    16. Durante su visita, solo podra ingresar una vez a la Mansion Embrujada, siempre que supere el 1.20 m de estatura. <br />
                    17. No esta permitido subir a los juegos con articulos que puedan desprenderse del usuario, ya que puede poner en riesgo la operatividad y la seguridad del juego y los visitantes. No se permiten los objetos como: carteras, canguros, gorras, mochilas, lentes, etc.<br />
                    18. Por seguridad, en el juego del Disco Nazca, no se permite el ingreso con sandalias que no tengan correas reajustables, evitando que puedan salir disparadas y caigan en el riel de transito del juego. En el quiosco mas cercano, se venden sujetadores que puedes colocar en tus sandalias si asi lo deseas.<br />
                    19. El horario de atencion es de 10 a.m. a 6 p.m. en la mayoria de los juegos. Solo en el caso de: <br />
                        a) Black Hole, Rio Granjero y Cuy Loco, estaran operativos en los siguientes horarios: - Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 5:30 p.m. ; - Sabados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.<br />
                        b) Vikingo, Disco Nazca, Tagadisco, Mansion Embrujada y La Torre, estaran operativos de: - Lunes a Domingo de 12:30 p.m. a 06:00 p.m.<br />
                    20. El ingreso a los recintos de animales debe realizarse con serenidad y sin presion de los padres. No se recomienda obligar a los niños a ingresar, ya que los gritos y el llanto perturban a los animales, quienes podrian realizar conductas inadecuadas ante el estres ocasionado por el ruido.<br />
                    21. Los animales solo se deben alimentar con una dieta especial y balanceada, de acuerdo a su especie y caracteristicas. El alimento que se otorga para la interaccion esta racionado y preparado para ofrecer la mejor experiencia al visitante sin perjuicio del animal. No se permite ofrecer alimentos a los animales que no sea proporcionado por nuestros especialistas y adquirido dentro del parque, ya que pueden atentar contra su bienestar y salud.<br />
                    22. No se permite alterar la tranquilidad o manipular a los animales que se encuentran libres. Es importante seguir las indicaciones de los profesionales a cargo.<br />
                    23. En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio de la zona acuatica, donde contamos con agua saludable certificada por DIGESA. Para mantener este estandar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con ropa de baño lycra o impermeable, indicado por la DS 007-2003-SA del 03 de abril del 2003 – DISA "El ingreso a la zona de piscinas es unicamente con ropa de baño". La ropa interior, polos y shorts (de deporte o algodon), no son ropa de baño, por lo que no se permitira el ingreso a las piscinas con dicho material.<br />
                    24. El ingreso a la zona acuatica es de 10 a.m. a 5:15 p.m. en temporada de verano (fechas publicadas en las plataformas digitales).<br />
                    25. Si deseas ingresar al parque y tienes entre 13 y 17 años, necesitas una carta de responsabilidad y autorización firmada por tus padres o apoderados. Esta carta se firma en Relaciones Publicas, en el ingreso a La Granja Villa. Puedes encontrar mas detalles aquí: http://lagranjavilla.com/protocolos/mod2/index.php. Por seguridad, los menores de edad unicamente ingresaran a la zona acuatica acompañados de un adulto responsable. De lo contrario, no se permitira el ingreso.<br />
                    26. Recomendamos la aplicación de protector solar para evitar las insolaciones, sobre todo en temporada de verano. Tambien se recomienda el uso de repelente.<br />
                    27. La Granja Villa no se hace responsable por los cambios climaticos que puedan presentarse diariamente.<br />
                    28. Para realizar cualquier pago con tarjeta de credito es indispensable presentar su DNI. En el caso de ser extranjero, debe presentar su pasaporte o carnet de extranjeria<br />
                    29. Sobre el uso de los lockers: El costo del servicio es de S/2.00 la hora y S/10.00 por 6 horas. La Granja Villa no se responsabiliza por perdidas o robos de objetos dejados dentro de los lockers, por lo que no se recomienda dejar dinero ni objetos de valor. Se debe verificar que el casillero se encuentre cerrado en su totalidad. Por favor, siga las instrucciones que aparecen en la zona de los lockers. Por otro lado, si tuvieras algo que no se permite ingresar, podras utilizar los lockers de la entrada por el precio de S/.1.00<br />
                    30. No se permite la venta de ningun tipo de mercaderia dentro de las instalaciones de La Granja Villa <br />
                    &iexcl;Gracias por elegirnos, pasa un dia excelente!<br />
                    ESTE CUPON ES VALIDO SOLO PARA LA FECHA Y USUARIO REGISTRADO. SOLO PUEDE CAMBIAR <br />
                    LA FECHA Y USUARIO DEL CUPON SI ADQUIRIO EL SEGURO (S/5.00 POR CUPON) DURANTE EL PROCESO DE COMPRA WEB. NO SE REALIZA DEVOLUCION DE DINERO. LOS CAMBIOS DE FECHA NO SON VALIDOS PARA DIAS DE EXCLUSIVIDAD POR EVENTOS CORPORATIVOS. <br />
                </td>
            </tr>
        </table>';
        
		$terminosOther1 ='<table style="font-family:Arial; font-size:10px;" width="100%">
            <tr>
                <td width="50%" valign="top" style="font-family:Arial; font-size:10px;"><strong>BIENVENIDOS</strong> <br><br>
       1. La entrada al parque, se debe cargar a un dispositivo inteligente (pulsera o tarjeta) para poder disfrutar de una tecnologia sin contacto y todos sus beneficios. El precio del dispositivo inteligente no está incluido en el precio de entrada.<br />
                    2. El dispositivo inteligente solo se comprara una vez. En el, podras agregar saldo y adquirir lo que desees en todos los puntos de venta dentro del parque. Podras cargar entradas para futuras visitas y tambien, sera la llave digital para el alquiler de los lockers si asi lo deseas. Tendrás tu historial de acceso a juegos y compras, es un dispositivo completamente personalizado.<br />
                    3. El dispositivo inteligente es intransferible, personal e indispensable durante tu estadía en el parque.<br />
                    4. La entrada incluye el ingreso a los juegos mecanicos, tours de animales silvestres, area de granja, dinosaurios y zona acuatica (solo en las fechas publicadas en nuestras plataformas digitales). Podras ingresar a los juegos las veces que desees. Toma en cuenta que los juegos tienen horarios, rangos de estaturas y funcionan en base a la guia de seguridad. No incluye los juegos feriales, donde se concursa por un premio. Niños a partir de los 80 cm de estatura deberan adquirir su entrada.<br />
                    5. Para ingresar a los juegos, deberas escanear tu pulsera en el ingreso del mismo. Tambien, la podras utilizar para abrir y cerrar tu locker si decides alquilarlo. Si pierdes el dispositivo inteligente, deberas adquirir uno nuevo, ya que no podras acceder a los beneficios del parque sin tu pulsera/tarjeta.<br />
                    6. Niños por debajo de los 80 cm (medida con calzado) de estatura podran ingresar al parque sin dispositivo inteligente y tendran acceso al area de granja, tours de animales silvestres, dinosaurios y zona acuatica (en las fechas determinadas) acompañados de un adulto con dispositivo inteligente. Si desea que el niño participe de los juegos, debera adquirir su dispositivo inteligente. Dale clic a este enlace para ver los juegos que le brindaran acceso ilimitado al niño de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/ . Si el niño no porta la pulsera/tarjeta, no tendra acceso a los juegos.<br />
                    7. La entrada tiene validez solo por el dia de su visita. Si la persona se retira de las instalaciones no podra reingresar. El dispositivo inteligente se podra utilizar en varias visitas si se recarga adecuadamente.<br />
                    8. Respeta las normativas del estacionamiento. Por seguridad, sigue las indicaciones del personal encargado, quien orientara la ubicacion de su vehiculo segun la hora de llegada. <br />
                    9. El personal realizara una inspeccion de todas las mochilas y bolsos que ingresen al parque, esto nos garantiza un día completamente seguro para todos <br />
                    10. Por seguridad, no esta permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, globos, inflables, coolers, cigarros, instrumentos musicales, palos selfie, tripode, flotadores, tapetes, juegos de propulsión a chorro o pistolas de agua o juguetes que puedan comprometer algun riesgo, silbatos, trompetas, megafonos, objetos que emitan sonido, triciclos, bicicletas, scooters, skates, patinetas, patines, carritos, fosforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.<br />
                    11. Una vez que el visitante ingresa a nuestras instalaciones, La Granja Villa se hace responsable de su seguridad dentro de nuestras instalaciones. En el siguiente link podras encontrar nuestro protocolo: http://lagranjavilla.com/protocolos/mod1/index.php donde se indica que La Granja Villa se responsabiliza de los productos alimenticios que se elaboran y ofrecen, mas no podemos responsabilizarnos de los alimentos que proceden de fuera, sobre los cuales no conocemos su preparacion ni preservacion.<br />
                    12. En el caso del agua, esta permitido ingresar 1 botella plastica SELLADA maximo de 1 litro por persona. En el caso de papillas, leche en polvo, formula y termos de agua hervida que NO contengan vidrio en su interior (hasta maximo 750 ml), ingresan directamente. En el caso de que estos alimentos vengan en contenedores o termos de vidrio y refrigerios que contengan dietas especiales, podran ingresar siempre y cuando se active protocolo requerido en la oficina de RRPP, segun lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php <br />
                    13. Por su seguridad y la de otros visitantes, "Conforme a las recomendaciones para la prevencion y cuidado de la salud dentro de nuestras instalaciones, el ingreso de los visitantes que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunación gratuita y que las recomendaciones de aislamiento temporal responden a condiciones medicas generales, a efectos de evitar la transmision y difusion de virus".<br />
                    14.  Es muy importante respetar las normas de seguridad que indica el operador de cada juego. Ademas, estan publicadas en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Los juegos funcionan en base a estatura y/o peso del visitante, ya que el sistema de seguridad es diseñado y dado por el fabricante de cada juego. Vulnerar alguna de estas medidas implica retirar a la persona del juego. Para mas detalle de las guias de seguridad visita: http://www.lagranjavilla.com/atracciones/<br />
                    15. Por la privacidad de terceras personas, no se permiten las fotografias o grabaciones a visitantes que no sean de nuestro circulo amical o familiar.<br />
                    16. Durante su visita, solo podra ingresar una vez a la Mansion Embrujada, siempre que supere el 1.20 m de estatura. <br />
                    17. No esta permitido subir a los juegos con articulos que puedan desprenderse del usuario, ya que puede poner en riesgo la operatividad y la seguridad del juego y los visitantes. No se permiten los objetos como: carteras, canguros, gorras, mochilas, lentes, etc.<br />
                    18. Por seguridad, en el juego del Disco Nazca, no se permite el ingreso con sandalias que no tengan correas reajustables, evitando que puedan salir disparadas y caigan en el riel de transito del juego. En el quiosco mas cercano, se venden sujetadores que puedes colocar en tus sandalias si asi lo deseas.<br />
                    19. El horario de atencion es de 10 a.m. a 6 p.m. en la mayoria de los juegos. Solo en el caso de: <br />
                        a) Black Hole, Rio Granjero y Cuy Loco, estaran operativos en los siguientes horarios: - Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 5:30 p.m. ; - Sabados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.<br />
                        b) Vikingo, Disco Nazca, Tagadisco, Mansion Embrujada y La Torre, estaran operativos de: - Lunes a Domingo de 12:30 p.m. a 06:00 p.m.<br />
                    20. El ingreso a los recintos de animales debe realizarse con serenidad y sin presion de los padres. No se recomienda obligar a los niños a ingresar, ya que los gritos y el llanto perturban a los animales, quienes podrian realizar conductas inadecuadas ante el estres ocasionado por el ruido.<br />
                    21. Los animales solo se deben alimentar con una dieta especial y balanceada, de acuerdo a su especie y caracteristicas. El alimento que se otorga para la interaccion esta racionado y preparado para ofrecer la mejor experiencia al visitante sin perjuicio del animal. No se permite ofrecer alimentos a los animales que no sea proporcionado por nuestros especialistas y adquirido dentro del parque, ya que pueden atentar contra su bienestar y salud.<br />
                    22. No se permite alterar la tranquilidad o manipular a los animales que se encuentran libres. Es importante seguir las indicaciones de los profesionales a cargo.<br />
                    23. En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio de la zona acuatica, donde contamos con agua saludable certificada por DIGESA. Para mantener este estandar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con ropa de baño lycra o impermeable, indicado por la DS 007-2003-SA del 03 de abril del 2003 – DISA "El ingreso a la zona de piscinas es unicamente con ropa de baño". La ropa interior, polos y shorts (de deporte o algodon), no son ropa de baño, por lo que no se permitira el ingreso a las piscinas con dicho material.<br />
                    24. El ingreso a la zona acuatica es de 10 a.m. a 5:15 p.m. en temporada de verano (fechas publicadas en las plataformas digitales).<br />
                    25. Si deseas ingresar al parque y tienes entre 13 y 17 años, necesitas una carta de responsabilidad y autorización firmada por tus padres o apoderados. Esta carta se firma en Relaciones Publicas, en el ingreso a La Granja Villa. Puedes encontrar mas detalles aquí: http://lagranjavilla.com/protocolos/mod2/index.php. Por seguridad, los menores de edad unicamente ingresaran a la zona acuatica acompañados de un adulto responsable. De lo contrario, no se permitira el ingreso.<br />
                    26. Recomendamos la aplicación de protector solar para evitar las insolaciones, sobre todo en temporada de verano. Tambien se recomienda el uso de repelente.<br />
                    27. La Granja Villa no se hace responsable por los cambios climaticos que puedan presentarse diariamente.<br />
                    28. Para realizar cualquier pago con tarjeta de credito es indispensable presentar su DNI. En el caso de ser extranjero, debe presentar su pasaporte o carnet de extranjeria<br />
                    29. Sobre el uso de los lockers: El costo del servicio es de S/2.00 la hora y S/10.00 por 6 horas. La Granja Villa no se responsabiliza por perdidas o robos de objetos dejados dentro de los lockers, por lo que no se recomienda dejar dinero ni objetos de valor. Se debe verificar que el casillero se encuentre cerrado en su totalidad. Por favor, siga las instrucciones que aparecen en la zona de los lockers. Por otro lado, si tuvieras algo que no se permite ingresar, podras utilizar los lockers de la entrada por el precio de S/.1.00<br />
                    30. No se permite la venta de ningun tipo de mercaderia dentro de las instalaciones de La Granja Villa <br />
                    &iexcl;Gracias por elegirnos, pasa un dia excelente!<br />
                    ESTE CUPON ES VALIDO SOLO PARA LA FECHA Y USUARIO REGISTRADO. SOLO PUEDE CAMBIAR <br />
                    LA FECHA Y USUARIO DEL CUPON SI ADQUIRIO EL SEGURO (S/5.00 POR CUPON) DURANTE EL PROCESO DE COMPRA WEB. NO SE REALIZA DEVOLUCION DE DINERO. LOS CAMBIOS DE FECHA NO SON VALIDOS PARA DIAS DE EXCLUSIVIDAD POR EVENTOS CORPORATIVOS. <br />
                 </td>
            </tr>
        </table>';
        
		$newname = substr($v->varcartdetapepat, 0, 1).substr($v->varcartdetapemat, 0, 1).substr($v->varcartdetnombres, 0, 1)."_".$v->intcartdetid;
		$dompdf = new DOMPDF();
		$ticket = file_get_contents("../Adminv2/template/ticket.html");
		if($v->varboletotitulo=="ENTRADA TERROR"){
		    $terminos = $terminosGeneral;
		} elseif($v->varboletotitulo=="ENTRADA GENERAL") {
		    $terminos = $terminosOther1;
		} else {
		    $terminos = $terminosOther;
		}
		$findtxticket = array("{beneficiado}","{dni}","{comprador}","{tentrada}","{nro}","{sede}","{fconsumo}","{datacode}","{terminos}","{precio}");
		$newtxticket  = array($v->beneficiado,$v->charcartdetdni,$post[0]->comprador,$v->varboletotitulo,$v->intcartdetid,$post[0]->sede,$v->freg,date("Ymd").$post[0]->intcartsede.$v->intcartdetid,$terminos,$v->deccartdetpu);
		$ticket = str_replace($findtxticket, $newtxticket, $ticket);
		$dompdf->load_html($ticket);
		$dompdf->render();
		$output = $dompdf->output();
		file_put_contents("../Adminv2/uploads/tickets/{$newname}.pdf", $output);
		$mail->AddAttachment("../Adminv2/uploads/tickets/{$newname}.pdf");
	}
	$body=file_get_contents("../Adminv2/template/confirmacion.html");
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
?>