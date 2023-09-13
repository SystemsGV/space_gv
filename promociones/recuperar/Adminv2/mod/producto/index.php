<? $post = Producto::find_by_sql("select *,
case charProductoSeccion when 'A' then 'Agricultura' when 'M' then 'Mineria'  when 'E' then 'Edificación'  when 'S' then 'Saneamiento' end as seccion 
from producto order by intProductoId desc");?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Producto</h3>
                  <div class="box-tools">
                     <a href="?mod=<?=$_GET[mod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Sección</th>                   
                        <th>Titulo</th>
                        <th>File</th>
                        <th>Sumilla</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=$v->seccion?></td>                      
                        <td><?=htmlspecialchars_decode(stripcslashes($v->varproductotitulo))?></td>
                        <td>
                          <? if($v->varproductofile){?>
                            <a href="uploads/<?=$v->varproductofile?>" target="_blank" ><h2><i class='fa fa-file-pdf-o'></i></h2></a> 
                          <? }?>
                       </td>
                        <td><?=htmlspecialchars_decode(stripcslashes($v->txtproductodescrip))?></td>
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&page=form&act=upt&idf=<?=$v->intproductoid?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intproductoid?>" class="btn btn-default btn-delete">
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