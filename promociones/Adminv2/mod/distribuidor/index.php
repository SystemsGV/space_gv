<?
//$post = Noticia::find('all', array('order' => 'intNoticiaId desc'));

$post = Distribuidor::find("all");

 ?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?=ucwords($_GET[mod])?></h3>
                  <div class="box-tools">
                     <a href="?mod=<?=$_GET[mod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>                        
                        <th>Titulo</th>
                        <!--<th>Mapa</th>-->
                        <th>Sumilla</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>                        
                        <td><?=htmlspecialchars_decode(stripcslashes($v->txtdistribuidortitulo))?></td>
                        <!--<td><?=htmlspecialchars_decode(stripcslashes($v->txtdistribuidorsrc))?></td>-->
                        <td><?=htmlspecialchars_decode(stripcslashes($v->txtdistribuidordescrip))?></td>
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&page=form&act=upt&idf=<?=$v->intdistribuidorid?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intdistribuidorid?>" class="btn btn-default btn-delete">
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