<?php
include("inc.var.php");
include "includes/sendmail/class.phpmailer.php";
$path="http://www.lagranjavilla.com/tienda/";
$host="http://www.lagranjavilla.com/tienda/";
$ruta="/home3/lagranja/public_html/tienda/";
$arr = array();
$sede[1]="GRANJA VILLA SUR";
$sede[2]="GRANJA VILLA NORTE";

/*
 * $_SESSION["sess_cart"]
 * $_SESSION["sess_cart_sede"]
 * $_SESSION["sess_user"]
 *  
 * 
 */
 
 
 /*if($_GET["sel"] == 6){
	 
	 $_SESSION["boleto"] = $_GET["sel"];
	 $_SESSION["sess_cart_sede"]["idsede"]= 1;
	 $_SESSION["sess_cart_sede"]["nombre"]=$sede[1];
	 
 }elseif($_GET["sel"] == 11){
	 
	 $_SESSION["boleto"] = $_GET["sel"];
	 $_SESSION["sess_cart_sede"]["idsede"]= 1;
	 $_SESSION["sess_cart_sede"]["nombre"]=$sede[1];
	 }*/
 
if($_POST["cmd"]=="addcart"){
    $items=count($_SESSION["sess_cart"]);
    if(empty($items)){
        unset($_SESSION["sess_cart_sede"]);
    }
    if($_POST["txtcant"]){
        if($_SESSION["sess_cart_sede"]["idsede"]){
            if($_SESSION["sess_cart_sede"]["idsede"]==$_POST["sede"]){
                $_SESSION["sess_cart_sede"]["idsede"]=$_POST["sede"];
                $_SESSION["sess_cart_sede"]["nombre"]=$sede[$_POST["sede"]];
                for ($i=1; $i <=$_POST["txtcant"] ; $i++) {
                    $post = Boleto::find($_POST["sel"]);
					$_SESSION["boleto"] = $post->intboletoid;

                    $date = explode("/",$_POST['txtfec']);
                    $date = $date[2]."-".str_pad($date[1], 2, "0", STR_PAD_LEFT)."-".str_pad($date[0], 2, "0", STR_PAD_LEFT);
                    $data_descuento = Descuento::find_by_sql("SELECT descuento FROM descuento WHERE inicio <= '".$date."' AND fin >= '".$date."' AND st='1'");

                    $precio_boleto = $post->decboletopu;
                    if(count($data_descuento)){
                        $precio_boleto = $data_descuento[0]->descuento;
                    }						

                    $arrSess=array("titulo"=>$post->varboletotitulo,"img"=>$post->varboletoimg,"txtfec"=>$_POST["txtfec"],"txtpu"=>$precio_boleto,"sede"=>$_POST["sede"],"txtcant"=>$_POST["txtcant"],"sel"=>$_POST["sel"],"tipo"=>"T");
                    $_SESSION["sess_cart"][]=$arrSess;					
                }				
                $content='<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-ticket fa-stack-1x fa-inverse "></i></span> '.$_POST["txtcant"].' tickets agregados al carrito</div><br>';
                    $arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Tickets añadidos al carrito!","txtconfirm"=>"Continuar","txtcancel"=>"Agregar más tickets","content"=>$content,"urlconfirm"=>"?mod=list","urlcancel"=>""));
            }else{
                $content='<br><div class="text-center">Debe agregar entradas para la misma sede de LA GRANJA VILLA</div><br>';
                $arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Advertencia","txtconfirm"=>"ok","txtcancel"=>"","content"=>$content,"urlconfirm"=>"","urlcancel"=>""));
            }
        }else{
            $_SESSION["sess_cart_sede"]["idsede"]=$_POST["sede"];
            $_SESSION["sess_cart_sede"]["nombre"]=$sede[$_POST["sede"]];
            for ($i=1; $i <=$_POST["txtcant"] ; $i++) {
                $post = Boleto::find($_POST["sel"]);
				$_SESSION["boleto"] = $post->intboletoid;

                $date = explode("/",$_POST['txtfec']);
                $date = $date[2]."-".str_pad($date[1], 2, "0", STR_PAD_LEFT)."-".str_pad($date[0], 2, "0", STR_PAD_LEFT);
                $data_descuento = Descuento::find_by_sql("SELECT descuento FROM descuento WHERE inicio <= '".$date."' AND fin >= '".$date."' AND st='1'");

                $precio_boleto = $_POST["txtpu"];
                if(count($data_descuento)){
                    $precio_boleto = $data_descuento[0]->descuento;
                }
                $arrSess=array("titulo"=>$post->varboletotitulo,"img"=>$post->varboletoimg,"txtfec"=>$_POST["txtfec"],"txtpu"=>$_POST["txtpu"],"sede"=>$_POST["sede"],"txtcant"=>$_POST["txtcant"],"sel"=>$_POST["sel"],"tipo"=>"T");
                $_SESSION["sess_cart"][]=$arrSess;					
            }				
            $content='<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-ticket fa-stack-1x fa-inverse "></i></span> '.$_POST["txtcant"].' tickets agregados al carrito</div><br>';
            $arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Tickets añadidos al carrito!","txtconfirm"=>"Continuar","txtcancel"=>"Agregar más tickets","content"=>$content,"urlconfirm"=>"?mod=list","urlcancel"=>""));
        }
    }
}elseif ($_POST["cmd"]=="delcart") {
    unset($_SESSION["sess_cart"][$_POST["xsel"]-1]);	
    $items=count($_SESSION["sess_cart"]);
    if(empty($items)){
        unset($_SESSION["sess_cart_sede"]);
    }
    $total = number_format(array_sum(array_column($_SESSION["sess_cart"],'txtpu')), 2,'.','');
    $igv=number_format(0.18 * $total, 2,'.','');
    $stotal=number_format($total-$igv, 2,'.','');		
    $arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Registro de Boletos","txtconfirm"=>"Aceptar","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=list","urlcancel"=>"","status"=>"ok"),"data"=>array("items"=>$items,"stotal"=>$stotal,"igv"=>$igv,"total"=>$total));

}elseif ($_POST["cmd"]=="regcart") {
 	if(count($_SESSION["sess_cart"])){
            $total_items = 0;
            foreach ($_SESSION["sess_cart"] as $key => $value) {			
                $_SESSION["sess_cart"][$key]['apepat']=$_POST["regapepat-".$key];
                $_SESSION["sess_cart"][$key]['apemat']=$_POST["regapemat-".$key];
                $_SESSION["sess_cart"][$key]['nombres']=$_POST["regname-".$key];
                $_SESSION["sess_cart"][$key]['usuario']=$_POST["regapepat-".$key]." ".$_POST["regapemat-".$key]." ".$_POST["regname-".$key];
                $_SESSION["sess_cart"][$key]['dni']=$_POST["regdni-".$key];
                $_SESSION["sess_cart"][$key]['telefono']=$_POST["regphone-".$key];
                if($value['tipo']=="T"){
                    $total_items++;
                }
            }
	}
	$content='<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse "></i></span>  '.$total_items.' Registros realizados</div><br>';
	$arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Registro de Boletos","txtconfirm"=>"Continuar","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=form-2","urlcancel"=>""));	

}elseif($_POST["cmd"]=="addreg"){
        //Actualizar datos del cliente
	$fnac = explode("/",$_POST["fnac"]);
	if($_SESSION["sess_user"]["idusuario"]){
		$post = Cliente::find($_SESSION["sess_user"]["idusuario"]);
		$post->sclieapel=$_POST["apepat"]." ".$_POST["apemat"];
		$post->sclieapepat=$_POST["apepat"];
		$post->sclieapemat=$_POST["apemat"];
		$post->scliename=$_POST["nombres"];
		$post->charclientedni=$_POST["dnival"];
		$post->scliemail=$_POST["emailval"];
		$post->sclietelf=$_POST["telefono"];
		$post->dnacmdate=$fnac[2]."-".$fnac[1]."-".$fnac[0];
		$post->sclieaddr=$_POST["dir"];
		//$post->scliename=$_POST[distrito];
		$post->varclienteclave=$_POST["rpassword"];
		$post->dateclientefreg=date("Y-m-d");
		//$post->intclientesocio="0";
		$post->save();
		$_SESSION["sess_user"]["usuario"]=$_POST["apepat"]." ".$_POST["apemat"];
		$_SESSION["sess_user"]["dni"]=$_POST["dnival"];
		$content='<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-user-plus fa-stack-1x fa-inverse "></i></span> Se actualizó con éxito su registro</div><br>';
	}else{
            //Primera vez que se registra.
		$lynkencriptada = encrypt($_POST["emailval"],$_POST["dnival"]);
		$cli = Cliente::find_by_sql("select (MAX(cClieCode) + 1) idcliente from CLIENTE");	
		$post = New Cliente();
		$post->ccliecode=$cli[0]->idcliente;
		$post->sclieapel=$_POST["apepat"]." ".$_POST["apemat"];
		$post->sclieapepat=$_POST["apepat"];
		$post->sclieapemat=$_POST["apemat"];
		$post->scliename=$_POST["nombres"];
		$post->charclientedni=$_POST["dnival"];
		$post->scliemail=$_POST["emailval"];
		$post->sclietelf=$_POST["telefono"];
		$post->dnacmdate=$fnac[2]."-".$fnac[1]."-".$fnac[0];
		$post->sclieaddr=$_POST["dir"];
		//$post->scliename=$_POST[distrito];
		$post->varclienteclave=$_POST["rpassword"];
		$post->dateclientefreg=date("Y-m-d");
		$post->varclientelink=$lynkencriptada;
		$post->intclientecmail="0";
		$post->intclientesocio="1";
		$post->save();
                
		$datoscuenta = "Apellidos: ". $_POST["apepat"]." ".$_POST["apemat"]."<br>";
		$datoscuenta .= "Nombre: " . $_POST["nombres"]."<br>";
		$datoscuenta .= "DNI: " . $_POST["dnival"]."<br>";
		$datoscuenta .= "Email: " . $_POST["emailval"]."<br>";
		$datoscuenta .= "Tel.: " . $_POST["telefono"]."<br>";
		$datoscuenta .= "Fecha de Nacimiento: " . $_POST["fnac"]."<br>";
		$datoscuenta .= "Direcci&oacute;n: " . $_POST["dir"]."<br>";
		$datoscuenta .= "Usuario: " . $_POST["dnival"]."<br>";
		$datoscuenta .= "Contrase&ntilde;a: " . substr($_POST["rpassword"],0,-3)."***<br>";

		$from="info@lagranjavilla.com";
                $name="La Granja Villa";
                $to=$_POST["emailval"];
                $cc="sistemas@lagranjavilla.com, sistemas.st@lagranjavilla.com";	    
                $subject=utf8_decode("Bienvenido: {$_POST["nombres"]}");
                $body=file_get_contents("template/link.html");	    
		$findtxt = array("{path}","{lynkencriptada}","{datoscuenta}");
		$newtxt  = array($path,$lynkencriptada,$datoscuenta);
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
                $mail->AddBCC($cc);
                $exito = $mail->Send();
                $intentos=1;
                while ((!$exito) && ($intentos < 2)) {
                    sleep(5);
                    $exito = $mail->Send();
                    $intentos=$intentos+1;  
                }
                if (!$exito){
                   $content="Mailer Error: " . $mail->ErrorInfo;
                } else {
                   $content='<br><div class="text-center">Por favor, verifique su correo para activar su cuenta. Luego inicie sesión</div><br>';
                } 
            }
        if(!empty($_SESSION["sess_cart"])){
            $arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Registro de Usuario","txtconfirm"=>"ok","txtcancel"=>"","content"=>$content,"urlconfirm"=>"?mod=login","urlcancel"=>"index.php"));
        }else{
            $arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Registro de Usuario","txtconfirm"=>"ok","txtcancel"=>"","content"=>$content,"urlconfirm"=>"?mod=list","urlcancel"=>"index.php"));
        }
	
        
        
}elseif ($_POST["cmd"]=="login"){
    $cli = Cliente::find_by_sql("select cClieCode,sclieapel,scliename,charclientedni,scliemail from CLIENTE where charClienteDni='{$_POST["dni"]}' and varClienteClave='{$_POST["password"]}' and intClienteCmail='1'");
    if($cli[0]->ccliecode){
        //alert de binevenida al usuario logeado
            $content='<br><div class="text-center"> Bienvenido '.$cli[0]->sclieapel.', '.$cli[0]->scliename.'</div><br>';
            $_SESSION["sess_user"]["idusuario"]=$cli[0]->ccliecode;
            $_SESSION["sess_user"]["usuario"]=$cli[0]->sclieapel.', '.$cli[0]->scliename;
            $_SESSION["sess_user"]["dni"]=$cli[0]->charclientedni;
            $_SESSION["sess_user"]["email"]=$cli[0]->scliemail;
            $arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Acceso a usuarios","txtconfirm"=>"Ok","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=form-2","urlcancel"=>""));
    }else{
        $content='<br><div class="text-center"> Usuario y/o password incorrectos </div><br>';
        $arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Acceso a usuarios","txtconfirm"=>"Ok","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"","urlcancel"=>""));
    }	
}
elseif ($_POST['cmd']=="save" && $_SESSION['sess_user'])
{
    if(!empty($_SESSION["sess_cart"])){
        do{		
            $creserva=RandomString(6,TRUE,TRUE,FALSE);
            $fcreserva=Cart::find_by_sql("select varCartCreserva from cart where varCartCreserva='{$creserva}'");
        }while(isset($fcreserva[0]->varcartcreserva));

        $total  = number_format(array_sum(array_column($_SESSION["sess_cart"],'txtpu')), 2,'.','');
        $igv    = number_format(0.18 * $total, 2,'.','');
        $stotal = number_format($total-$igv, 2,'.','');
        $tipo_pago = $_POST["tpago"];

	if($tipo_pago==2)// Pago con tarjeta VISA
	{
            $post = New Order();
            $post->intclienteid=$_SESSION["sess_user"]["idusuario"];
            $post->varcarttitulo=$_SESSION["sess_user"]["usuario"];
            $post->intcartcant=count($_SESSION["sess_cart"]);
            $post->deccartstotal=$stotal;
            $post->deccartigv=$igv;
            $post->deccarttotal=$total;
            $post->varcartcreserva=$creserva;
            $post->datecartfreg=date("Y-m-d H:i:s");
            $post->intcarttpago=$_POST["tpago"];
			if($_SESSION["boleto"]==6 || $_SESSION["boleto"]==11){
			$_SESSION["sess_cart_sede"]["idsede"]= 1;
			$_SESSION["sess_cart_sede"]["nombre"]=$sede[1];
			}
            $post->intcartsede=$_SESSION["sess_cart_sede"]["idsede"];
            $post->intcarttdoc=$_POST["tdoc"];	
            $post->varcartrsocial=$_POST["rsocial"];
            $post->charcartruc=$_POST["ruc"];
            $post->varcartdirec=$_POST["dir"];
            $post->intcartst="1";
            $post->save();
            $idcart = $post->intcartid;	

            if(count($_SESSION["sess_cart"])){
                foreach ($_SESSION["sess_cart"] as $key => $value) {
                    $n++;			
                    $datefreg =  explode("/",$value["txtfec"]);
                    $postdet = new Orderdet();			
                    $postdet->intcartid=$idcart;
                    $postdet->intboletoid=$value["sel"];
                    $postdet->cliente_ccliecode=$_SESSION["sess_user"]["idusuario"];			
                    $postdet->datecartdetfreg=$datefreg[2]."-".$datefreg[1]."-".$datefreg[0];
                    $postdet->deccartdetpu=$value["txtpu"];
                    $postdet->intcartdetcant=1;
                    $postdet->deccartdetstotal=$value["txtpu"] * 1;
                    $postdet->varcartdetapepat=$value["apepat"];
                    $postdet->varcartdetapemat=$value["apemat"];
                    $postdet->varcartdetnombres=$value["nombres"];
                    $postdet->charcartdetdni=$value["dni"];
                    $postdet->varcartdettelefono=$value["telefono"];
                    $postdet->charcartdettipo=$value["tipo"];
                    $postdet->intcartdetst="1";
                    $postdet->save();
                    $total = $total + $value["txtpu"];
                }
            }
            //unset($_SESSION["sess_cart"]);
            //unset($_SESSION["sess_cart_sede"]);

            $_SESSION["idorder"] = $idcart;

            $content='<br><div class="text-center"> ¿Desea continuar con el pedido? </div><br>';

            $arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Confirmar compra","txtconfirm"=>"Proceder","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=form-visa","urlcancel"=>""));
	}else {
            $data_cliente = Cliente::find($_SESSION["sess_user"]["idusuario"]);
            $post = New Cart();
            $post->intclienteid=$_SESSION["sess_user"]["idusuario"];
            $post->varcarttitulo=$_SESSION["sess_user"]["usuario"];
            $post->intcartcant=count($_SESSION["sess_cart"]);
            $post->deccartstotal=$stotal;
            $post->deccartigv=$igv;
            $post->deccarttotal=$total;
            $post->varcartcreserva=$creserva;
            $post->datecartfreg=date("Y-m-d H:i:s");
            $post->intcarttpago=$_POST[tpago];
            $post->intcartsede=$_SESSION["sess_cart_sede"]["idsede"];
            $post->intcarttdoc=$_POST["tdoc"];	
            $post->varcartrsocial=$_POST["rsocial"];
            $post->charcartruc=$_POST["ruc"];
            $post->varcartdirec=$_POST["dir"];
            $post->intcartst="1";
            $post->save();

		$idcart = $post->intcartid;	
		$td = "";
		if(count($_SESSION["sess_cart"])){
                    foreach ($_SESSION["sess_cart"] as $key => $value)
                    {			
                        if($value['sel'] && $value['sel']!="M1"){
                            $data_boleto = Boleto::find($value['sel']);
                        }			
                        $datefreg =  explode("/",$value["txtfec"]);
                        $fecha_reserva = $datefreg[2]."-".$datefreg[1]."-".$datefreg[0];
                        $postdet = new Cartdet();			
                        $postdet->intcartid=$idcart;
                        $postdet->intboletoid=$value["sel"];
                        $postdet->cliente_ccliecode=$_SESSION["sess_user"]["idusuario"];			
                        $postdet->datecartdetfreg = $fecha_reserva;
                        $postdet->deccartdetpu=$value["txtpu"];
                        $postdet->intcartdetcant=1;
                        $postdet->deccartdetstotal=$value["txtpu"] * 1;
                        $postdet->varcartdetapepat=$value["apepat"];
                        $postdet->varcartdetapemat=$value["apemat"];
                        $postdet->varcartdetnombres=$value["nombres"];
                        $postdet->charcartdetdni=$value["dni"];
                        $postdet->varcartdettelefono=$value["telefono"];
                        $postdet->charcartdettipo=$value["tipo"];
                        $postdet->intcartdetst="1";
                        $postdet->save();
                        //$total = $total + $value["txtpu"];
                        $td.="<tr>
                        <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".($value['sel'] && $value['sel']!="M1"?date("d-m-Y",strtotime($fecha_reserva)):"")."</td>";
                        if($value['sel'] && $value['sel']!="M1"){
                                $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletotitulo."<BR>SEDE:".($data_order->intcartsede==1?"GRANJA VILLA SUR":"GRANJA VILLA NORTE")."</td>
                        <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".$data_boleto->varboletonombre."</td>";
                        }else{
                                $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">MEMBRESIA GRANJA VILLA</td>
                        <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\"></td>";
                        }
                        $td.="<td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align: left;\">".ucwords($value["usuario"])."<BR>DNI:{$value["dni"]}</td>
                        <td style=\"border: 1px solid #dddddd;padding: 0.5rem;text-align:right;\">S/. ".number_format($value['txtpu'],2,".","")."</td>
                    </tr>";

                    }
		}

		/*$igv=$total*0.18;
		$stotal=$total - $igv;*/
		//unset($_SESSION[sess_user]);
		//unset($_SESSION["sess_cart"]);
		//unset($_SESSION["sess_cart_sede"]);
		$from="info@lagranjavilla.com";

		$name="La Granja Villa";

		$to = $data_cliente->scliemail;

		$cc="sistemas@lagranjavilla.com, sistemas.st@lagranjavilla.com";	    

		$subject=utf8_decode("Confirmación de Compra");

		$body=file_get_contents("template/reserva.html");

		$findtxt = array("{creserva}","{cliente}", "{dni}", "{fecha}","{cantidad}","{tpagado}","{td}","{stotal}","{igv}","{total}");

		$newtxt  = array($creserva, ucwords($_SESSION["sess_user"]["usuario"]),$_SESSION["sess_user"]["dni"],date("Y-m-d"),count($_SESSION["sess_cart"]),$stotal,$td,number_format($stotal,2,".",""),number_format($igv,2,".",""),number_format($total,2,".",""));



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

		if (!$exito){

			$content="Mailer Error: " . $mail->ErrorInfo;

		} else {

		   $content='<br><div class="text-center"> Su pedido se efectuó correctamente, en breve recibirá un mail de confirmación. </div><br>';

		}

		

		//unset($_SESSION["sess_cart"]);

		//unset($_SESSION["sess_cart_sede"]);

		

		$arr = array("msg"=>array("tipo"=>"alert","titulo"=>"Confirmación de compra","txtconfirm"=>"Ok","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=form-3","urlcancel"=>""));



	}
    }else{
        $content = '<br><div class="text-center"> Su carrito se encuentra vacio </div><br>';
        $arr = array(
            "msg" => array(
                "tipo"=>"alert",
                "titulo"=>"Check-Out",
                "txtconfirm"=>"Ok",
                "txtcancel"=>"",
                "content"=>$content,
                "urlconfirm"=>"index.php",
                "urlcancel"=>""
            ) );
    }
    

}elseif ($_POST["cmd"]=="socio"){



	$fnac=$_POST["nano"]."-".$_POST["nmes"]."-".$_POST["ndia"];



	$cli = Cliente::find_by_sql("select c.ccliecode,c.scliename,c.sclieapel,c.sClieMail,c.nPuntCant,t.ntarjnumb,c.dnacmdate,c.idlocal,c.charclientedni from CLIENTE as c, TARJETA as t where c.ccliecode=t.ccliecode and t.ntarjnumb='{$_POST["ntarjeta"]}' and c.dnacmdate='$fnac' and c.idlocal='{$_POST["sede"]}'");



	if($cli[0]->ccliecode){



		$content='<br><div class="text-center"> Bienvenido '.$cli[0]->sclieapel.' , '.$cli[0]->scliename.'</div><br>';



		$_SESSION["sess_user"]["idusuario"]=$cli[0]->ccliecode;



		$_SESSION["sess_user"]["usuario"]=$cli[0]->sclieapel.' , '.$cli[0]->scliename;



		$_SESSION["sess_user"]["dni"]=$cli[0]->charclientedni;



		$url="?mod=registro";



	}else{



		$content='<br><div class="text-center"> Usuario y/o password incorrectos </div><br>';



		$url="";



	}



	$arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Acceso a usuarios","txtconfirm"=>"Ok","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>$url,"urlcancel"=>""));	







}elseif ($_POST["cmd"]=="membresia"){



	$tipo = array_column($_SESSION["sess_cart"],'tipo');	



	$clave = array_search('M', $tipo);



	if(empty($clave)){



		if($_SESSION["sess_cart_sede"]["idsede"]){



			$arrSess=array("titulo"=>$_SESSION["sess_cart_membresia"]["txt"],"img"=>$_SESSION["sess_cart_membresia"]["img"],"txtfec"=>"","txtpu"=>$_SESSION["sess_cart_membresia"]["pu"],"sede"=>"","txtcant"=>1,"sel"=>$_SESSION["sess_cart_membresia"]["idf"],"tipo"=>"M");



			$_SESSION["sess_cart"][]=$arrSess;				



			$content='<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-ticket fa-stack-1x fa-inverse "></i></span> 1 Membresia agregado al carrito</div><br>';



			$arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Lista de pedidos","txtconfirm"=>"Continuar","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=list","urlcancel"=>"","status"=>"ok"));		



		}



	}else{



		$content='<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-ticket fa-stack-1x fa-inverse "></i></span> Sólo se puede agregar 1 Membresia al carrito</div><br>';



		$arr=array("msg"=>array("tipo"=>"confirm","titulo"=>"Lista de pedidos","txtconfirm"=>"Continuar","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"?mod=list","urlcancel"=>"","status"=>"ok"));		



	}







}elseif ($_POST["cmd"]=="recovery"){



	



	$cli = Cliente::find_by_sql("select cClieCode,sclieapel,scliename,charclientedni,scliemail,varClienteClave from CLIENTE where scliemail='{$_POST["emailrecovery"]}'");



	if($cli[0]->scliemail){



		$from="info@lagranjavilla.com";



		$name="La Granja Villa";



		$to=$cli[0]->scliemail;



		$cc="sistemas@lagranjavilla.com, sisetmas.st@lagranjavilla.com";	    



		$subject=utf8_decode("Información de clave");



		$body = "<p>Recibimos una solicitud de recordatorio de contrase&ntilde;a<br>Para ingresar a la tiendita deber&aacute; usar la siguiente: <strong>{$cli[0]->varclienteclave}</strong> <br><br><strong>La Granja Villa</strong></p>";  



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



	    $intentos=1;



	    while ((!$exito) && ($intentos < 2)) {



	        sleep(5);



	            $exito = $mail->Send();



	            $intentos=$intentos+1;  



	       }



	       if (!$exito){



	            $content="Mailer Error: " . $mail->ErrorInfo;



	       } else {



	           $content="<br><div class=\"text-center\"> Se enviaron los datos solicitados a su correo {$_POST["emailrecovery"]} </div><br>";



	    	}



    }else{



    	 $content="El email no se encuentra registrado";



    }     



	$arr=array("msg"=>array("tipo"=>"alert","titulo"=>"Recuperar clave","txtconfirm"=>"Ok","txtcancel"=>"Cancelar","content"=>$content,"urlconfirm"=>"","urlcancel"=>""));







}else{



	header("location:index.php");



}











echo json_encode($arr);







?>