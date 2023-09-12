<?php

$arr = array(); 

//$post = Boleto::find("all",array('select' => "*,DATE_FORMAT(dateboletofini, '%y-%m-%d') fini,DATE_FORMAT(dateboletoffin, '%y-%m-%d') ffin",'conditions' => "intboletoid='{$_GET[sel]}'",'limit' => 1)); 

$post = Boleto::find($_GET["sel"],array('select' => "*,DATE_FORMAT(dateboletofini, '%Y-%m-%d') finiall,DATE_FORMAT(dateboletofini, '%y-%m-%d') fini,DATE_FORMAT(dateboletoffin, '%y-%m-%d') ffin"));

$calendar = Nodisponible::all(array('select' => "days_disabled", 'conditions' => 'st = ' . $_GET["sel"], 'order' => 'id desc'));

$num_promocion = find_by_sql("SELECT COUNT(*) FROM `cartdet` WHERE `intBoletoId`='6' AND `dateCartdetFreg`='2018-05-26'");
$restantes_promo = (1000 - $num_promocion);

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
			$precio_boleto = $data_descuento[0]->descuento;
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

        <div class="well well-sm" style="margin:10px 0px 20px 0px;">Por favor seleccione un dia del calendario que se muestra aquí abajo. Los ahorros que se muestran son respecto al precio de los boletos en taquillas del parque</div>

        <div class="responsive-calendar  text-center">

          <p class="txtYear"><span data-head-year></span></p>

          <div class="row controls">

            <div class="col-xs-4"><a class="pull-left" data-go="prev"><div class="btn btn-primary"><i class="fa fa-chevron-left"></i></div></a></div>

            <div class="col-xs-4"><span data-head-month></span></div>

            <div class="col-xs-4"><a class="pull-right" data-go="next"><div class="btn btn-primary"><i class="fa fa-chevron-right"></i></div></a></div>

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

          <br>
		  <? if($_GET[sel]=="6"){?>
		  <p class="text-justify" align="justify" style="color:red; font-size:14px;"><?=strip_tags($restantes_promo)?> Boletos Restantes.</p>
		  <? } ?>
		  <br>

        </div>		
		<p class="text-justify" align="justify" style="color:red; font-size:14px;">Nota:</p>
        <br>
        <p class="text-justify" align="justify" style="font-size:14px;"><?=strip_tags(htmlspecialchars_decode(stripcslashes($post->txtcalendario)))?></p>     

      </div>

      <div class="col-md-5 module-info">

        <br>

        <h4><?=strip_tags(htmlspecialchars_decode(stripcslashes($post->varboletotitulo)))?></h4>

        <hr>

        <? if($post->varboletoimg){if(file_exists("Adminv2/uploads/{$post->varboletoimg}")){?>

          <img src="Adminv2/uploads/<?=$post->varboletoimg?>" class="img-responsive">

        <? }}?>     

        <!--<img src="img/calendarios/01.jpg" class="img-responsive" id="img-responsive">-->

        <br>

        <p class="text-justify" align="justify" style="font-size:14px;"><?=strip_tags(htmlspecialchars_decode(stripcslashes($post->txtboletodescrip)))?></p>     

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

                            <input type="text" class="form-control input-sm" readonly="readonly" name="txtfec" id="txtfec" placeholder="Fecha"  data-fv-notempty data-fv-notempty-message="Seleccione una fecha">

                        </div>

                      </div>                      

                    </div>

                    <div class="col-sm-6">

                      <div class="form-group">

                        <label>Precio:</label>

                        <div class="input-group">

                            <span class="input-group-addon">S/.</span>

                            <input type="text" class="form-control input-sm" name="txtpu" id="txtpu" placeholder="Precio" readonly="readonly" data-fv-notempty data-fv-notempty-message="Seleccione un precio">

                        </div>                        

                      </div>

                    </div>                    

                  </div>

                  <div class="row">

                    <div class="col-md-12">

                      <label>Elegir Sede:</label>                      

                        <div class="row">

							<? if($_GET[sel]=="2"){?>
                            <div class="col-md-6">

                              

                              <div class="funkyradio">

                                <div class="funkyradio-primary">

                                    <input type="radio" name="sede"  id="radio1"  value="1" checked="checked" />

                                    <label for="radio1">GRANJA VILLA SUR</label>

                                </div>

                              </div>

                              

                            </div>
                            
                            <? } ?>

                            <? if($_GET[sel]=="3"){?>

                            <div class="col-md-6">

                              <div class="funkyradio">

                                <div class="funkyradio-primary">

                                    <input type="radio" name="sede"  id="radio2"  value="2" checked="checked"/>

                                    <label for="radio2">GRANJA VILLA NORTE</label>

                                </div>

                              </div>

                            </div>

                            <? } ?>
							<? if($_GET[sel]=="6"){?>
                            <div class="col-md-6">

                              

                              <div class="funkyradio">

                                <div class="funkyradio-primary">

                                    <input type="radio" name="sede"  id="radio1"  value="6" checked="checked" />

                                    <label for="radio1">GRANJA VILLA SUR</label>

                                </div>

                              </div>

                              

                            </div>
                            
                            <? } ?>
							<? if($_GET[sel]=="11"){?>
                            <div class="col-md-6">

                              

                              <div class="funkyradio">

                                <div class="funkyradio-primary">

                                    <input type="radio" name="sede"  id="radio1"  value="11" checked="checked" />

                                    <label for="radio1">GRANJA VILLA SUR</label>

                                </div>

                              </div>

                              

                            </div>
                            
                            <? } ?>

                        </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-6"></div>                    

                    <div class="col-sm-3 pull-right">

                      <div class="form-group">

                        <label>Cantidad:</label>
						
                        <div class="input-group spinner">

                          <input type="text" class="form-control" name="txtcant" id="txtcant" value="1" min="1" max="999"  data-fv-notempty data-fv-notempty-message="Seleccione una cantidad">

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

</style>