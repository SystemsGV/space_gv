<?php
$post = Administrador::find_by_sql('select * from administrador ORDER BY varAdministradorTitulo ASC'); 
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
                        <th width="5%">Item</th>                        
                        <th width="40%">Nombres</th>                        
                        <th width="20%">Tipo</th>
                        <th width="20%">Usuario</th>
                        <th width="15%"><center>Acción</center></th>                        
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?php echo $i?></td>                        
                        <td><?php echo $v->varadministradortitulo?></td>
                        <td>
						<?php 
						echo ($v->tipo==1?"Super Administrador":"Administrador");
						?>
                        </td>
                        <td><?php echo $v->varadministradorusuario; ?></td>
                        <td>
                        	<center>
                          <a href="?mod=<?php echo $_GET[mod]; ?>&smod=<?php echo $_GET[smod]; ?>&page=form&act=upt&idf=<?php echo $v->intadministradorid?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                         <?php if($_SESSION['sess_admin']['id']!=$v->intadministradorid){ ?> 
                          <button data-href="mod/<?php echo $_GET[mod]?>/proc.php?mod=<?php echo $_GET[mod]?>&act=del&idf=<?php echo $v->intadministradorid; ?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
                          <i class="fa fa-trash"></i>
                          </button>
                          <?php } ?>
                          	</center>
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