<? 
$smod["opinion"]="OP";
$smod["director"]="DI";
$smod["entrevista"]="EN";
$smod["noticia"]="NO";
$smod["programacion"]="PR";
$smod["transmision"]="TR";

$post = Noticia::find_by_sql("select *,
CASE charNoticiaSec
  WHEN 'LO' THEN 'LOCAL'
  WHEN 'NA' THEN 'NACIONAL'
  WHEN 'IN' THEN 'INTERNACIONAL'   
END as seccion,
CASE charNoticiaTipo
  WHEN 'PO' THEN 'POLITICA'
  WHEN 'EC' THEN 'ECONOMIA'
  WHEN 'EN' THEN 'ENTRETENIMIENTO'
  WHEN 'DE' THEN 'DEPORTE'    
END as tipo ,DATE_FORMAT(dateNoticiaFreg, '%d/%m/%Y %r') fregistro from noticia where charNoticiaGrupo='{$smod[$_GET[smod]]}' order by intnoticiaid desc");
?>
<section class="content">
          <div class="row">
            <div class="col-md-12">
            <!--<div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Leyenda</h4>
                </div>
                <div class="box-body no-padding">                  
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-waring pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                  </ul>
                </div>
              </div>-->
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
                        <th>Titulo</th>
                        <th>Sumilla</th>
                        <th>Imágen</th>
                        <th>Fecha Registro</th>                        
                        <!--<th>Estado</th>-->
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>                        
                        <td><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->varnoticiatitulo)))?></td>
                        <td><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->txtnoticiasumilla)))?></td>
                        <td>
                          <? if($v->varnoticiaurl){if(file_exists("uploads/{$v->varnoticiaurl}")){?>
                            <a href="image.php?src=<?=$v->varnoticiaurl?>" data-title="<?=$v->varnoticiaurl?>" data-toggle="lightbox"><img src="image.php?src=<?=$v->varnoticiaurl?>&w=280&h=180" class="img-responsive"></a> 
                          <? }}?>
                       </td>
                       <td><?=$v->fregistro?></td>                                              
                        <!--<td>
                        <span data-toggle="tooltip" title="3 New Messages" class='badge bg-light-blue'>3</span>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                        </td>-->
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=upt&idf=<?=$v->intnoticiaid?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intnoticiaid?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
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