<?php if($_GET[idf]){

  $post = Cart::find($_GET[idf],array('select' => "*,DATE_FORMAT(datecartfreg, '%d/%m/%Y') freg,





CASE intCartSede

      WHEN 1 THEN 'GRANJA VILLA SUR'

      WHEN 2 THEN 'GRANJA VILLA NORTE'

END as sede,

CASE intCartTdoc

      WHEN 1 THEN 'Boleta'

      WHEN 2 THEN 'Factura'

END as tipodoc



    " ));
}

$dni = Cliente::find_by_sql("select CONCAT(sClieName, ' ', sClieApel) as nombre, charClienteDni as dni from CLIENTE where cClieCode=(SELECT intClienteId FROM cart WHERE intCartId='{$_GET[idf]}')
");  


?>

<section class="content">

  <div class="box box-primary">

    <div class="box-header"><h3 class="box-title">Formulario</h3></div>           

    <form data-toggle="validator" role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype='multipart/form-data'>

    <fieldset>

    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">

    <input type="hidden" name="smod" value="<?=$_GET[smod]?>">

    <input type="hidden" name="act" value="<?=$_GET[act]?>">

    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">

    <div class="box-body">

                    <div class="row form-group">                      

                      <div class="col-md-2">

                        <label for="pu">Nro Pedido</label>

                       <p><?=$post->intcartid?></p>

                      </div>

                      <div class="col-md-2">

                        <label for="mes">F. Registro</label>

                        <p><?=$post->freg?></p>

                      </div>
					<?foreach($dni as $a=>$b){$i++;?>
                      <div class="col-md-2">

                        <label for="mes">Comprador</label>

                        <p><?=strtoupper($b->nombre)?></p>

                      </div>
					  
					  <div class="col-md-2">

                        <label for="mes">DNI</label>

                        <p><?=$b->dni?></p>

                      </div>
					<?}?>
                      <div class="col-md-2">

                        <label for="mes">Sede</label>

                        <p><?=$post->sede?></p>

                      </div>

                      <div class="col-md-2">

                        <label for="mes">Codigo Reserva</label>

                        <p><?=$post->varcartcreserva?></p>

                      </div>

                    </div>

                    <div class="row form-group">                                            

                      <div class="col-md-12">                        

                        <div class="box">

                            <div class="box-header with-border">

                              <h3 class="box-title">Detalle Facturación</h3>

                            </div><!-- /.box-header -->

                            <div class="box-body">

                              <div class="row text-center">

                                <p>Tipo de Documento : <?=$post->tipodoc?></p>

                              </div>

                              <? if($post->intcarttdoc=="2"){ ?>

                              <div class="row">

                                <div class="col-md-4">

                                  <label for="pu">Razon Social</label>

                                  <p><?=$post->varcartrsocial?></p>

                                </div>

                                <div class="col-md-4">

                                  <label for="pu">RUC</label>

                                  <p><?=$post->charcartruc?></p>

                                </div>

                                <div class="col-md-4">

                                  <label for="pu">Dirección</label>

                                  <p><?=$post->varcartdirec?></p>

                                </div>

                              </div>

                              <? }?>

                            </div><!-- /.box-body -->                            

                          </div><!-- /.box -->

                      </div>                      

                    </div>

                    <div class="row form-group">                                            

                      <div class="col-md-12">                        

                        <div class="box">

                            <div class="box-header with-border">

                              <h3 class="box-title">Detalle Pedido</h3>

                            </div><!-- /.box-header -->

                            <div class="box-body">

                              <table class="table table-bordered">

                                <tr>                                  

                                  <th>Nro Detalle Pedido</th>

                                  <th>Tipo</th>

                                  <th>Estado Ticket</th>

                                  <th>F. Consumo</th>

                                  <th>Beneficiado</th>

                                  <th><p align="center">Seguro</p></th>                                

                                  <th><p align="center">P. Unitario</p></th>

                                  <th>Cant</th>

                                  <th>Total</th>                                  

                                </tr>

                              <?                               

                              //$postdet = Cartdet::find("all",array('select' => "*,DATE_FORMAT(datecartdetfreg, '%d/%m/%Y') freg" ,"conditions" => "intcartid = '{$post->intcartid}'"));

                              $postdet = Cartdet::find_by_sql("select 

cd.intCartdetId,cd.charCartdetTipo,cd.ticketstatus, cd.ticketdateuse, 

CASE cd.charCartdetTipo

      WHEN 'T' THEN 'TICKET'

      WHEN 'M' THEN 'MEMBRESIA'

END as tipoped,

CASE varCartdetseguro

      WHEN true THEN 'Sí'

      ELSE 'No'

END as seguro,


b.charBoletoCodigo,b.varBoletoTitulo,DATE_FORMAT(cd.datecartdetfreg, '%d/%m/%Y') freg,concat(cd.varCartdetApemat,' ',cd.varCartdetApepat,' ',cd.varCartdetNombres) beneficiado,

charcartdetdni,varcartdettelefono,decCartdetPu,intCartdetCant,decCartdetStotal

from cartdet cd

LEFT JOIN boleto b ON cd.intBoletoId=b.intBoletoId

WHERE cd.intcartid = '{$post->intcartid}'

");

                              foreach($postdet as $k=>$v){$i++;?>

                                <tr>                                  

                                  <td><?=$v->intcartdetid?></td>

                                  <td><?=$v->tipoped?></td>

                                  <td>

								  <?php

								  if($v->charcartdettipo=="T"){

                                  	if($v->ticketstatus=="1"){

										echo "USADO";

									}else{

										echo "PENDIENTE DE  USO";

									}

								  }

								  ?>

                                  </td>

                                  <td><?=$v->freg?></td>  

                                  <td><?

                                    if($v->charcartdettipo=="T"){
										
										if($v->freg=="26/05/2018"){
											
											echo strtoupper($v->beneficiado)."<br>"."Noche de Espantos"."<br>DNI:".$v->charcartdetdni."<br>TELEFONO:".$v->varcartdettelefono;
											
										}else{

                                      echo strtoupper($v->beneficiado)."<br>".$v->varboletotitulo."<br>DNI:".$v->charcartdetdni."<br>TELEFONO:".$v->varcartdettelefono;

                                    }}

                                   ?></td>
								   
								  <? if($v->seguro=="No"){?>
								   
								   <td align="center"><p class="label bg-red" style="font-size:14px;"><?php echo $v->seguro; ?></p></td>
								   
								   <td align="right">S/.&ensp;<?php echo number_format($v->deccartdetpu,2,".",""); ?></td>
								   
								  <? }else{?>
								   
								   <td align="center"><p class="label bg-green" style="font-size:14px;"><?php echo $v->seguro; ?></p></td>
								   
								   <td align="right"><p>Boleto:&emsp;S/.&ensp;<?php echo number_format(($v->deccartdetpu-5),2,".",""); ?></p>
								   <p>Seguro:&emsp;&emsp;S/.&ensp;5</p>
								   </td>
								   
								   <? }?>

                                    <td><?=$v->intcartdetcant?></td>

                                  <td align="right">S/.&ensp;<?php echo number_format($v->deccartdetstotal,2,".",""); ?></td>

                                </tr>

                                <?  }?>

                              </table>

                            </div><!-- /.box-body -->

                            <div class="box-footer clearfix">

                              <div class="row">

                                <div class="col-md-6 text-right">Sub Total </div>

                                <div class="col-md-6">S/. <?php echo number_format($post->deccartstotal,2,".",""); ?></div>

                              </div>

                              <div class="row">

                                <div class="col-md-6 text-right">Igv</div>

                                <div class="col-md-6">S/. <?php echo number_format($post->deccartigv,2,".",""); ?></div>

                              </div>

                              <div class="row">

                                <div class="col-md-6  text-right">Total</div>

                                <div class="col-md-6">S/. <?php echo number_format($post->deccarttotal,2,".",""); ?></div>

                              </div>                            

                            </div>

                          </div><!-- /.box -->

                      </div>                      

                    </div>

                    <div class="row form-group">                      

                      <div class="col-md-6 ">

                        <label for="pu">Estado</label>

                        <p>

                        <select class="form-control input-sm" name="stado">

                          <option value="1" <? if($post->intcartst=="1"){echo "selected";} ?>>Pedido</option>

                          <option value="2" <? if($post->intcartst=="2"){echo "selected";} ?>>Pagado</option>

                          <option value="3" <? if($post->intcartst=="3"){echo "selected";} ?>>Cancelado</option>

                        </select>

                        </p> 

                      </div>

                      <div class="col-md-6 text-right">

                        <!--<a class="btn btn-app"><i class="fa fa-ticket"></i> Generar Ticket</a>

                        <a class="btn btn-app"><i class="fa fa-envelope-o"></i> Enviar Ticket</a>-->

                      </div>                     

                    </div>

                    

                    <!--<div class="row form-group">                      

                      <div class="col-md-6">

                        <label><input type="checkbox" name="public" id="public" class="minimal " value="1"/> Publico</label> 

                      </div>                      

                    </div>-->                   

    </div>

    <div class="box-footer text-center">

    <? if($post->intcartst=="1"){?>

    <button type="submit" class="btn btn-primary">Aceptar</button><? }?>

    <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=index" class="btn btn-danger">Cancelar</a>

    </div>

    </fieldset>

    </form>

  </div>

</section>