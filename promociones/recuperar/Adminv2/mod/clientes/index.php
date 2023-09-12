<? 
// $post = Cliente::find_by_sql('select ccliecode,sclieapel,scliename,sclietelf,scliemail from cliente'); 
 //$post = Cliente::find_by_sql('select cClieCode,sClieApel,sClieName,sClieTelf,sClieMail from CLIENTE limit 0,100');
 $post = Cliente::find_by_sql('select cClieCode, sClieApel, sClieName, sClieTelf, sClieMail, dateClienteFreg from CLIENTE ORDER BY dateClienteFreg DESC'); 
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?=ucwords($_GET[smod]?$_GET[smod]:$_GET[mod])?></h3>
                  <div class="box-tools">
                     <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover display" width="100%" data-page-length="25">
                    <thead>
                      <tr>
                        <th>Item</th>                        
                        <th>Apellidos</th>                        
                        <th>Nombres</th>
                        <th>Telefono</th>
                        <th>Email</th>                        
                        <th>F. Registro</th>
                        <th>Acción</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>                        
                        <td><?=$v->sclieapel?></td>
                        <td><?=$v->scliename?></td>
                        <td><?=$v->sclietelf?></td>
                        <td><?=$v->scliemail?></td>
                        <td><?php echo date("d/m/Y", strtotime($v->dateclientefreg)); ?></td>
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=upt&idf=<?=$v->ccliecode?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->ccliecode?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
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