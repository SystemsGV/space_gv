<?php
include("../../inc.var.php");
include "../../includes/sendmail/class.phpmailer.php";
require_once("../../libs/dompdf/dompdf_config.inc.php");

$path="http://www.lagranjavilla.com/tienda/";
$host="http://www.lagranjavilla.com/tienda/";
$ruta="/home3/lagranja/public_html/tienda/";

if($_REQUEST["idf"]){
   echo $_REQUEST["idf"];
   $idOrder = $_REQUEST["idf"];
    //Obtener el pedido en la tabla original
    $order = Order::find($idOrder);
    
    //Obtenemos los datos del cliente
    $cliente = Cliente::find($order->intclienteid);
    
    //Registrar la orden en la tabla Cart
    $cart   = new Cart();
    $cart->intclienteid  = $order->intclienteid;
    $cart->varcarttitulo = $order->varcarttitulo;
    $cart->intcartcant   = $order->intcartcant;
    $cart->deccartstotal = $order->deccartstotal;
    $cart->deccartigv    = $order->deccartigv;
    $cart->deccarttotal  = $order->deccarttotal;
    $cart->varcartcreserva = $order->varcartcreserva;
    $cart->datecartfreg    = date("Y-m-d H:i:s");
    $cart->intcarttpago   = $order->intcarttpago;
    $cart->intcartsede    = $order->intcartsede;
    $cart->intcarttdoc    = $order->intcarttdoc;
    $cart->varcartrsocial = $order->varcartrsocial;
    $cart->charcartruc    = $order->charcartruc;
    $cart->varcartdirec   = $order->varcartdirec;
    $cart->intcartst      = "2"; // Pagado
    $cart->save();
    
    //Obtenemos el id que se genera al procesar la orden 
    $idCart = $cart->intcartid;
    
    $td = "";
    $orderDetalle = Orderdet::find_by_sql("select * from orderdet where intcartid = " . $idOrder);
    
    if(count($orderDetalle)){
        foreach($orderDetalle as $row){
            //Detalle del item seleccionado
            if($row->intboletoid){
                $data_boleto = Boleto::find($row->intboletoid);            
            }
            //Generamos el detalle del pago.
            $cartDetalle = new Cartdet();			
            $cartDetalle->intcartid   = $idCart;
            $cartDetalle->intboletoid = $row->intboletoid;
            $cartDetalle->cliente_ccliecode = $row->cliente_ccliecode;
            $cartDetalle->datecartdetfreg = $row->datecartdetfreg;
            $cartDetalle->deccartdetpu = $row->deccartdetpu;
            $cartDetalle->intcartdetcant = $row->intcartdetcant;
            $cartDetalle->deccartdetstotal = $row->deccartdetstotal;
            $cartDetalle->varcartdetapepat = $row->varcartdetapepat;
            $cartDetalle->varcartdetapemat = $row->varcartdetapemat;
            $cartDetalle->varcartdetnombres = $row->varcartdetnombres;
            $cartDetalle->charcartdetdni = $row->charcartdetdni;
            $cartDetalle->varcartdettelefono = $row->varcartdettelefono;
            $cartDetalle->charcartdettipo = $row->charcartdettipo;
            $cartDetalle->intcartdetst="1";
            $cartDetalle->save();

            $td.="<tr>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".($row->datecartdetfreg?date("d-m-Y",strtotime($row->datecartdetfreg)):"")."</td>";
            if($row->intboletoid){
                    $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletotitulo."<BR>SEDE:".($data_order->intcartsede==1?"GRANJA VILLA SUR":"GRANJA VILLA NORTE")."</td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletonombre."</td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".ucwords($row->varcartdetapepat." ".$row->varcartdetapemat." ".$row->varcartdetnombres)."<BR>DNI:".$row->charcartdetdni."</td>";

                    $description_detail .= "1 ". $data_boleto->varboletotitulo."<BR>SEDE:".($order->intcartsede==1?" GRANJA VILLA SUR":" GRANJA VILLA NORTE")."<BR>";

            }else{
                    $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">MEMBRESIA GRANJA VILLA</td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>
            <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>";

                    $description_detail .= "1 MEMBRESIA GENERAL<BR>";

            }
            $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">S/. ".number_format($row->deccartdetstotal,2,".","")."</td>
            </tr>";
        }
    }
    
    //Generamos la entra 
    $from="info@lagranjavilla.com";
    $name="La Granja Villa";
    $to = $cliente->scliemail;
    $cc="sistemas@lagranjavilla.com, lvega12@gmail.com";	    
    $subject=utf8_decode("Confirmación de Compra");
    $prebody=file_get_contents("../../../template/reserva.html");
    $findtxt = array("{creserva}","{cliente}", "{dni}", "{fecha}","{cantidad}","{tpagado}","{td}","{stotal}","{igv}","{total}");
    $newtxt  = array($order->varcartcreserva, ucwords($cliente->sclieapel." ".$cliente->scliename),$cliente->charclientedni,date("d-m-Y",strtotime($order->datecartfreg)),count($orderDetalle),number_format($orderDetalle->deccarttotal,2,".",""),$td,number_format($orderDetalle->deccartstotal,2,".",""),number_format($orderDetalle->deccartigv,2,".",""),number_format($order->deccarttotal,2,".",""));
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
    
    
    
   
   
   
   
}
   
   
   
   




