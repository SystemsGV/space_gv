<?php 
$post   = Descuento::find_by_sql('select * from descuento where st>"0" ORDER BY fecha DESC'); 
$boleto = Boleto::all();
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo ucwords($_GET[smod]?$_GET[smod]:$_GET[mod])?></h3>
                  <div class="box-tools">
                     <a href="?mod=<?php echo $_GET[mod]?>&smod=<?php echo $_GET[smod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover display" width="100%" data-page-length="25">
                    <thead>
                      <tr>
                        <th>Item</th>                        
                        <th>Fecha inicio</th>                        
                        <th>Fecha fin</th>
                        <th>Precio Descuento</th>
						<th>Precio Normal</th>
                        <th>Tipo</th>                        
                        <th>Acción</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?php echo $i?></td>                        
                        <td><?php echo date("d/m/Y",strtotime($v->inicio)); ?></td>
                        <td><?php echo date("d/m/Y",strtotime($v->fin)); ?></td>
                        <td><?php echo $v->descuento; ?></td>
						<td><?php echo $v->codigo; ?></td>
						<?php foreach($boleto as $allBoleto):
							$name = ($v->tipo==$allBoleto->intboletoid)?strip_tags(htmlspecialchars_decode(stripcslashes($allBoleto->varboletotitulo))):"";
							if(!empty($name))
								break;
						 endforeach;?>	
						<td><?php echo ($name);?></td>
                        <td>
                          <a href="?mod=<?php echo $_GET[mod]?>&smod=<?php echo $_GET[smod]?>&page=form&act=upt&idf=<?php echo $v->id?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?php echo $_GET[mod]?>/proc.php?mod=<?php echo $_GET[mod]?>&act=del&idf=<?php echo $v->id?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
                          <i class="fa fa-trash"></i>
                          </button>
                        </td>
                        </tr>
                     <? }?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
          </div>
</section>