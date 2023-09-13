<?php

    $arr = array(); 

        //$post = Boleto::find("all",array('select' => "*,DATE_FORMAT(dateboletofini, '%y-%m-%d') fini,DATE_FORMAT(dateboletoffin, '%y-%m-%d') ffin",'conditions' => "intboletoid='{$_GET[sel]}'",'limit' => 1)); 

    $post = Boleto::find($_GET["sel"],array('select' => "*,DATE_FORMAT(dateboletofini, '%Y-%m-%d') finiall,DATE_FORMAT(dateboletofini, '%y-%m-%d') fini,DATE_FORMAT(dateboletoffin, '%y-%m-%d') ffin"));

    $calendar = Nodisponible::all(array('select' => "days_disabled", 'conditions' => 'st = ' . $_GET["sel"], 'order' => 'id desc'));

    $num_promocion = cartdet::find_by_sql("SELECT COUNT(*) as nboletos FROM `cartdet` WHERE `intBoletoId`='6' AND `dateCartdetFreg`='2018-05-26'");
    //$num_boletos = 1000;
    $restantes_promo = (100000 - $num_promocion[0]->nboletos);

    //echo "<pre>" . var_dump($calendar) . "</pre>";
    //foreach($post as $k=>$v){

    //echo "ver:".$post->finiall;

    //echo date("Y-m-d");

    //echo $mañana=mktime(0, 0, 0, date("m")  , date("d"), date("Y"));


    $_SESSION["boletoid"] = $_GET["sel"];


    //$dataMes=$post->fini;

    $fechaInicio=strtotime($post->fini);

    $fechaActual=strtotime(date("Y-m-d"));

    $fechaFin=strtotime($post->ffin);

    $dataDefault=explode("-",$post->finiall);

    if($fechaActual > $fechaInicio){

        $fechaRun = $fechaActual ;

        $dataDefault=explode("-",date("Y-m-d"));

    }else{

        $fechaRun = $fechaInicio;

        $dataDefault=explode("-",$post->finiall);

    }

    $dataAno = $dataDefault[0];

    $dataMes = $dataDefault[1];

    $dataDia = $dataDefault[2];
    $arrDay  = array();
    $blockeddays = array();
  
  
    //$blockeddays = array("2016-08-02", "2016-08-08", "2016-08-10");
    foreach($calendar as $k => $v){
        $new .= $v->days_disabled.", ";                
    } 
    $blockeddays = explode(", ", $new); 
    //echo var_dump($blocks);
  
    for($i=$fechaRun; $i<=$fechaFin; $i+=86400){     
        $date = date("Y-m-d", $i);
        array_push($arrDay, $date);        
    }  
    $endday = array_diff($arrDay, $blockeddays);
  
    foreach($endday as $date){
        $data_descuento = Descuento::find_by_sql("SELECT descuento FROM descuento WHERE tipo IN ({$_GET["sel"]}, 1) AND inicio <= '".$date."' AND fin >= '".$date."' AND st='1'");
        $data_normal = Descuento::find_by_sql("SELECT codigo FROM descuento WHERE tipo IN ({$_GET["sel"]}, 1) AND inicio <= '".$date."' AND fin >= '".$date."' AND st='1'");

        $precio_boleto = $post->decboletopu;
        if(count($data_descuento)){
            if($data_normal[0]->codigo>0){
            $precio_boleto = $data_descuento[0]->descuento."<span style='color:red;'>&emsp;&emsp;<strike>S/.".$data_normal[0]->codigo."</strike></span>";
            }else{
                $precio_boleto = $data_descuento[0]->descuento;
            }
        //$precio_boleto = $post->decboletopu - ($post->decboletopu * $data_descuento[0]->descuento);}
        }

        //echo var_dump($val);
        if (array_key_exists($date, $arr)) {
            //$pu = $arr[$date][precio];
            $arr[$date] = array("number"=>1,"precio"=>"{$precio_boleto}");
        }else{
            $arr[$date] = array("number"=>1,"precio"=>"{$precio_boleto}");
        }
    }
//}
?>

<div class="container module-opt" id="content-mod-center">
    <div class="row container">
        <div class="col-md-7 module-info">        
            <div class="well well-sm" style="margin:10px 0px 20px 0px;">
                Por favor, seleccione el d&iacute;a que desea visitarnos en el calendario de abajo. Los precios que observa, son solo para compras online.
            </div>
            <div class="responsive-calendar  text-center">
                <p class="txtYear"><span data-head-year></span></p>
                <div class="row controls">
                    <div class="col-xs-4">
                        <a class="pull-left" data-go="prev">
                            <div class="btn btn-primary"><i class="fa fa-chevron-left"></i></div>
                        </a>
                    </div>
                    <div class="col-xs-4"><span data-head-month></span></div>
                    <div class="col-xs-4">
                        <a class="pull-right" data-go="next">
                            <div class="btn btn-primary"><i class="fa fa-chevron-right"></i></div>
                        </a>
                    </div>
                </div>          
                <div class="day-headers">
                    <div class="day header">Lun</div>
                    <div class="day header">Mar</div>
                    <div class="day header">Mie</div>
                    <div class="day header">Jue</div>
                    <div class="day header">Vie</div>
                    <div class="day header">Sab</div>
                    <div class="day header">Dom</div>
                </div>
                <div class="days" data-group="days"></div>
                <!--<? //if($_GET[sel]=="6"){
                    //if($restantes_promo<=0){?>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon" style="color:red; font-size:15px; font-weight:bold;">Boletos Agotados.</span>
                                <input type="hidden" class="form-control input-sm" name="restantes" id="restantes" value="Boletos Agotados." style="color:red; font-size:15px; font-weight:bold;" readonly="readonly">
                            </div> 
                        </div>  
                    <? //}else{ ?>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon" style="color:#36a0e2; font-size:15px; font-weight:bold;">Boletos Restantes:</span>
                                <input type="text" class="form-control input-sm" name="restantes" id="restantes" value="<? //echo $restantes_promo; ?>" style="color:#36a0e2; font-size:15px; font-weight:bold;" readonly="readonly">
                            </div> 
                        </div>            
                        <!--<p class="text-justify" align="justify" style="color:blue; font-size:14px;">--><?//=strip_tags($restantes_promo)?> <!--Boletos Restantes.</p>-->
                    <? //} ?>
                <? //} ?>
                <!--<br>-->
                <!--<br>-->
            </div>  
            <p class="text-justify" align="justify" style="color:red; font-size:14px;">Nota:</p>
            <p class="text-justify" align="justify" style="font-size:14px; ">
                <strong><?=htmlspecialchars_decode(stripcslashes($post->txtmensaje))?></strong>
            </p>
            <p class="text-justify" align="justify" style="font-size:14px;">
                <?=strip_tags(htmlspecialchars_decode(stripcslashes($post->txtcalendario)))?>
            </p>
            <div id="seguro" hidden>
                <p class="text-justify" align="justify" style="font-size:14px;"><b>Seguro:</b> Por un pago adicional de S/. 5.00 por entrada, podrás cambiar la fecha o sede de tu visita, si así lo deseas. Cabe recalcar, que la fecha solo podrá cambiarse a otro día con el mismo valor de entrada. De caso contrario, tendrás que depositar la diferencia. 
                Por otro lado, si una persona no puede asistir en la fecha elegida  y ya está inscrita en la entrada, el seguro cubre el cambio de nombre completo, por lo que la entrada será transferida a la nueva persona que asistirá a la visita programada.
                    <p class="text-justify" align="justify" style="font-size:14px; color:red;">
                        <b>* No se realiza devolución de dinero.</b>
                    </p>
                    <p class="text-justify" align="justify" style="font-size:14px; color:red;">
                        <b>* Los cambios de fecha no son válidos para días de exclusividad por eventos corporativos.</b>
                    </p>
                </p>
            </div>
            <p id="seguro4" class="text-justify" align="justify" style="font-size:14px; ">*La zona de piscinas permanecerá cerrada, hasta que el gobierno lo autorice.</p>
            <p id="seguro3" class="text-justify" align="justify" style="font-size:14px; color:red;"><b>* No se realiza devolución de dinero.</b></p>
            <p id="seguro2" class="text-justify" align="justify" style="font-size:14px; "><b>SISTEMA INTELIGENTE DENTRO DEL PARQUE: .</b></p>
            <p id="seguro4" class="text-justify" align="justify" style="font-size:14px; ">¡El futuro es hoy! Para poder vivir esta experiencia sin contacto, es necesario portar tu pulsera inteligente durante toda tu estadía. 
            La pulsera tiene un costo de S/10.00 y es tuya, ¡te servirá para todas las veces que nos visites! 

            El uso del sistema inteligente es intransferible, personal e indispesable para poder ingresar al parque y disfrutar de las atracciones. Permite que puedas agregar saldo y adquirir lo que desees en todos los puntos de venta del parque. Podrá ser, también, la llave digital para el alquiler de locker si así lo deseas.
            Además, tendrás tu historial de acceso a juegos y compras.
            El costo de la pulsera inteligente es aparte del precio de entradas y demás servicios que se ofrecen dentro del parque.</p>
        </div>
        <div class="col-md-5 module-info"><br>
            <h4><?=strip_tags(htmlspecialchars_decode(stripcslashes($post->varboletotitulo)))?></h4><hr>
            <? if($post->varboletoimg){if(file_exists("Adminv2/uploads/{$post->varboletoimg}")){?>
                <img src="Adminv2/uploads/<?=$post->varboletoimg?>" class="img-responsive">
            <? }}?>     
            <!--<img src="img/calendarios/01.jpg" class="img-responsive" id="img-responsive">-->
            <br>
            <p class="text-justify" align="justify" style="font-size:14px;"><?=htmlspecialchars_decode(stripcslashes($post->txtboletodescrip))?></p>
            <div class="box box-primary">
                <!-- form start -->
                <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">
                    <input type="hidden" name="cmd" id="cmd" value="addcart">
                    <input type="hidden" name="sel" id="sel" value="<?=$_GET[sel]?>">
                        <div class="box-body">
                        <div class="box box-danger">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Fecha Seleccionada:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control input-sm" readonly name="txtfec" id="txtfec" placeholder="Fecha"  data-fv-notempty data-fv-notempty-message="Seleccione una fecha">
                                            </div>
                                        </div>                      
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Precio:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">S/.</span>
                                                <input type="text" class="form-control input-sm" name="txtpu" id="txtpu" placeholder="Precio" readonly data-fv-notempty data-fv-notempty-message="Seleccione un precio">
                                            </div>                        
                                        </div>
                                    </div>                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                					              <div class="form-group">
                                            <label>Elegir Sede:</label>     
                  							            <? if($_GET[sel]=="2"){?>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-primary">
                                                            <input type="radio" name="sede"  id="radio1"  value="1" checked="checked" />
                                                            <label for="radio1">GRANJA VILLA SUR</label>
                                                        </div>
                                                    </div>
                                            <? } ?>
                                            <? if($_GET[sel]=="3"){?>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-primary">
                                                            <input type="radio" name="sede"  id="radio2"  value="2" checked="checked"/>
                                                            <label for="radio2">GRANJA VILLA NORTE</label>
                                                        </div>
                                                    </div>
                                            <? } ?>
                                  					<? if($_GET[sel]=="6"){?>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-primary">
                                                            <input type="radio" name="sede"  id="radio1"  value="6" checked="checked" />
                                                            <label for="radio1">GRANJA VILLA SUR</label>
                                                        </div>
                                                    </div>
                                            <? } ?>
                                  					<? if($_GET[sel]=="11"){?>
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-primary">
                                                            <input type="radio" name="sede"  id="radio1"  value="11" checked="checked" />
                                                            <label for="radio1">GRANJA VILLA SUR</label>
                                                        </div>
                                                    </div>
                                            <? } ?>
                                  					<? if($_GET[sel]=="13"){?>
                                                    <div class="col-md-6">
                                                        <div class="funkyradio">
                                                            <div class="funkyradio-primary">
                                                                <input type="radio" name="sede"  id="radio1"  value="13" checked="checked" />
                                                                <label for="radio1">GRANJA VILLA SUR</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <? } ?>
                                        </div>
                                    </div>
				                        </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="customcheck">Agregar Seguro
                                                    <input type="checkbox" name="seguro" id="checkseguro" value="1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">S/.</span>
                                                <input type="text" class="form-control input-sm" name="Seguro2" id="Seguro2" placeholder="Seguro" readonly>
                                            </div>                        
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label style="margin-top :2px">Accesorios</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select name="" id="" class="form-control" style="width:100%;">
                                                        <option value="">Seleccione</option>
                                                        <option value="">Pulsera</option>
                                                        <option value="">Tarjeta</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">S/.</span>
                                                <input type="text" class="form-control input-sm" name="Pulsera2" id="Pulsera2" placeholder="Pulsera" readonly>
                                            </div>                        
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-3 pull-right">
                                        <div class="form-group">
                                            <label>Cantidad:</label>
                                            <div class="input-group spinner">
                                    						<? if($_GET[sel]=="6"){ ?>
                                    							 <input type="text" class="form-control" name="txtcant" id="txtcant" value="1" min="1" max="<? echo $restantes_promo; ?>"  data-fv-notempty data-fv-notempty-message="Seleccione una cantidad">
                                    						<? }else{ ?>
                                    							 <input type="text" class="form-control" name="txtcant" id="txtcant" value="1" min="1" max="9999"  data-fv-notempty data-fv-notempty-message="Seleccione una cantidad">
                                    						<? } ?>
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                    <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                                </div>
                                            </div>                        
                                        </div>
                                    </div>
                                </div>                  
                            </div>
                        </div>                                      
                    </div><!-- /.box-body -->
      <? if($_GET[sel]=="6"){
        if($restantes_promo>0){ ?>

            <div class="box-footer text-right" style="margin:10px 0px 13px 0px">

              <div class="row">

                  <div class="col-sm-6 col-xs-6">

                  <!--<button type="button" class="btn btn-default btn-addcart btn-block">Atras</button>-->

                  </div>

                  <div class="col-sm-6 col-xs-6">

                    <!--<button type="submit" class="btn btn-success btn-addcart btn-block">Añadir al Carrito</button>-->

                    <input type="submit" class="btn btn-success btn-addcart btn-block" value="Añadir al Carrito"><br />
<!--<div class="adv" align="left" style="font-size:18px"><b>¡IMPORTANTE! El número máximo permitido es de 9 entradas por transacción, en caso de exceder se invalidará la compra.</b></div>-->  
                  </div>

              </div>                                         

            </div>
      <? }
      }else{ ?>
      
      <div class="box-footer text-right" style="margin:10px 0px 13px 0px">

              <div class="row">

                  <div class="col-sm-6 col-xs-6">

                  <!--<button type="button" class="btn btn-default btn-addcart btn-block">Atras</button>-->

                  </div>

                  <div class="col-sm-6 col-xs-6">

                    <!--<button type="submit" class="btn btn-success btn-addcart btn-block">Añadir al Carrito</button>-->

                    <input type="submit" class="btn btn-success btn-addcart btn-block" value="Añadir al Carrito"><br />
<!--<div class="adv" align="left" style="font-size:18px"><b>¡IMPORTANTE! El número máximo permitido es de 9 entradas por transacción, en caso de exceder se invalidará la compra.</b></div>-->  
                  </div>

              </div>                                         

            </div>
      <? } ?>

          </form>

        </div><!-- /.box -->                  

      </div>

    </div> 

</div>

<script type="text/javascript">

  var d = new Date();

  var xyear = <?=$dataAno?>;

  var xmonth = <?=$dataMes?>;

  var xday = <?=$dataDia?>;  

  var xevento =<?=json_encode($arr,JSON_FORCE_OBJECT);?>;

</script>


<style>

.spinner input {

  text-align: right;

}



.input-group-btn-vertical {

  position: relative;

  white-space: nowrap;

  width: 2%;

  vertical-align: middle;

  display: table-cell;

}



.input-group-btn-vertical > .btn {

  display: block;

  float: none;

  width: 100%;

  max-width: 100%;

  padding: 8px;

  margin-left: -1px;

  position: relative;

  border-radius: 0;

}



.input-group-btn-vertical > .btn:first-child {

  border-top-right-radius: 4px;

}



.input-group-btn-vertical > .btn:last-child {

  margin-top: -2px;

  border-bottom-right-radius: 4px;

}



.input-group-btn-vertical i {

  position: absolute;

  top: 0;

  left: 4px;

}


/* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #02cf32;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>