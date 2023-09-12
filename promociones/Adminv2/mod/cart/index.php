<?php
$post = Cart::find('all',array(
  'select' => "*,DATE_FORMAT(datecartfreg, '%d/%m/%Y') freg,CASE intCartSt WHEN 1 THEN 'Pedido' WHEN 2 THEN 'Pagado' WHEN 3 THEN 'Cancelado' END as estado",
  'order' => 'intCartId desc',
  ));
$estado[1]="bg-orange";
$estado[2]="bg-green";
$estado[3]="bg-red";
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?=ucwords($_GET[smod]?$_GET[smod]:$_GET[mod])?></h3>
                  <div class="box-tools">
                     <!--<a href="?mod=<?php //echo $_GET[mod]?>&smod=<?php //echo $_GET[smod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>-->
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover display" width="100%" data-page-length="25">
                    <thead>
                      <tr>
                        <th>Item</th>                        
                        <th>Nro Pedido</th>                        
                        <th>Comprador</th>                        
                        <th>Cant.</th>
                        <th>Total</th>
                        <th>C. Reserva</th>
                        <th>F. Registro</th>
                        <th>Estado</th>
                        <th>Acción</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
					foreach($post as $k=>$v){
						$i++;
						//Saber si el pedido incluye membresía
						$postdet = Cartdet::find_by_sql("SELECT COUNT(intCartId) AS membresia FROM cartdet WHERE intCartId = ".$v->intcartid." AND charCartdetTipo='M'");
						//var_dump($postdet);
						$membresia = "";
						if($postdet[0]->membresia > 0){
							$membresia = " (1M)";
						}
					?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v->intcartid; ?></td>
                        <td><?php echo $v->varcarttitulo; ?></td>
                        <td><?php echo $v->intcartcant.$membresia; ?></td>                        
                        <td align="right">S/.<?php echo number_format($v->deccarttotal,2,".",""); ?></td>
                        <td><?php echo $v->varcartcreserva; ?></td>
                        <td><?php echo $v->freg; ?></td>
                        <td class="text-center"><small class="label <?=$estado[$v->intcartst]?>"><?=$v->estado?></small></td>
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=upt&idf=<?=$v->intcartid?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                          <?php if($_SESSION['sess_admin']['tipo']==1){ ?>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intcartid?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
                          <i class="fa fa-trash"></i>
                          </button>
                          <?php } ?>
                        </td>
                      </tr>
                     <?php
					 }
					 ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
          </div>
</section>