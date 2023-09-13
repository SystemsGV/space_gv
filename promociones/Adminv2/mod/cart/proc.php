<? 
include("../../inc.var.php");
include "../../includes/sendmail/class.phpmailer.php";
require_once("../../libs/dompdf/dompdf_config.inc.php");
$path="http://www.lagranjavilla.com/tienda/";
$host="http://www.lagranjavilla.com/tienda/";
$ruta="/home3/lagranja/public_html/tienda/";

switch ($_POST[act]) {
	case 'new':
		//$post = new Cart();		
		//$post->intcartst=$_POST["stado"];
		//$post->save();		
		//break;
	case 'upt':
		if($_POST[stado]=="2"){
			$upcart = Cart::find($_POST[idf]);
			$upcart->intcartst=$_POST["stado"];
			$upcart->save();
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
	where ca.intCartId='{$_POST[idf]}'");		
			


			$from="info@lagranjavilla.com";
			$name="La Granja Villa";
			$to=$post[0]->scliemail;
			$cc="sistemas@lagranjavilla.com, lvega12@gmail.com";	    
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
			$membresiadet = Cartdet::find_by_sql("select * from cartdet where intCartId = ".$_POST['idf']." AND charCartdetTipo='M' limit 0,1");
			//El control de membresías se hará manualmente	
			/*if($membresiadet[0]->intcartdetid){
				$fintarjeta = Tarjeta::find_by_sql("select * from TARJETA where cClieCode='{$membresiadet[0]->cliente_ccliecode}'");
										
				if($fintarjeta[0]->ntarjnumb){
					//echo "tarjeta existe";
					$tarjeta = Tarjeta::find($fintarjeta[0]->id);
					$tarjeta->demisdate=date("Y-m-d");
					$tarjeta->dcadudate=date("Y-m-d", strtotime("+1 year", strtotime(date("Y-m-d")) ));
					$tarjeta->save();
				}else{
					//echo "tarjeta no existe";
					$newtar = Tarjeta::find_by_sql("select (MAX(nTarjNumb) + 1) nrotarjeta from TARJETA");
					$nro_tarjeta = $newtar[0]->nrotarjeta;;
					$objTarjeta = new Tarjeta();
					$objTarjeta->ccliecode = $membresiadet[0]->cliente_ccliecode;
					$objTarjeta->ntarjnumb = $nro_tarjeta;
					$objTarjeta->ctarjacti="1";
					$objTarjeta->demisdate=date("Y-m-d");
					$objTarjeta->dcadudate=date("Y-m-d", strtotime("+1 year", strtotime(date("Y-m-d")) ));
					$objTarjeta->save();
				}				
			}*/
			//Fin Control de membresías
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
		where cd.intCartId='{$post[0]->intcartid}' and charCartdetTipo='T'");

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
				$ticket = file_get_contents("../../template/ticket.html");
				
				$findtxticket = array("{beneficiado}","{dni}","{comprador}","{tentrada}","{nro}","{sede}","{fconsumo}","{datacode}");
				$newtxticket  = array($v->beneficiado,$v->charcartdetdni,$post[0]->comprador,$v->varboletotitulo,$v->intcartdetid,$post[0]->sede,$v->freg,date("Ymd").$post[0]->intcartsede.$v->intcartdetid);
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
			    $content="Mailer Error: " . $mail->ErrorInfo;
			}else{
			    $content='<br><div class="text-center">Por favor verifica su correo para activar su cuenta y poder iniciar sessión</div><br>';
			} 
		}else{
			//$upcart = Cart::find($_POST[idf]);
			//$upcart->intcartst=$_POST["stado"];
			//$upcart->save();
		}
		break;
}
if($_GET[act]=="del"){
	//$post = Boleto::find($_GET[idf]);	
	//$post->delete();
}

//echo $post::connection()->last_query;
header("Location:../../index.php?mod={$_REQUEST[mod]}&smod={$_REQUEST[smod]}&page=index")
?>






