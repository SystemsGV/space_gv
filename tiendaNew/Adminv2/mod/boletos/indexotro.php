<? $post = Boleto::find('all',array('select' => "*,DATE_FORMAT(dateboletofini, '%d/%m/%Y') fini,DATE_FORMAT(dateboletoffin, '%d/%m/%Y') ffin")); ?>
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
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Titulo</th>                                                
                        <th>P. Normal</th>
                        <th>P. Oferta</th>
                        <th>Fechas</th>                        
                        <th>Imágen</th>
                        <th>Icono</th>
                        <th>Acción</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=$v->charboletocodigo?></td>
                        <td><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->varboletonombre)))?></td>    
                        <td><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->varboletotitulo)))?></td>                                                
                        <td align="center"><?=$v->decboletopu?></td>
                        <td align="center"><?=$v->decboletopo?></td>
                        <td align="center"><?=$v->fini." Hasta ".$v->ffin?></td>                        
                        <td>
                          <? if($v->varboletoimg){if(file_exists("uploads/{$v->varboletoimg}")){?>

                            <!--<a href="<?="uploads/{$v->varboletoimg}"?>" data-title="<?=$v->varboletoimg?>" data-toggle="lightbox"><img src="image.php?src=<?=$v->varboletoimg?>&w=480&h=180" class="img-responsive"></a>--> 
							<a href="<?="uploads/{$v->varboletoimg}"?>" data-title="<?=$v->varboletoimg?>" data-toggle="lightbox"><img src="<?="uploads/{$v->varboletoimg}"?>" class="img-responsive"></a>
                          <? }}?>
                        </td>
                        <td>
                          <? if($v->varboletoicon){if(file_exists("uploads/{$v->varboletoicon}")){?>                            
							<a href="<?="uploads/{$v->varboletoicon}"?>" data-title="<?=$v->varboletoicon?>" data-toggle="lightbox"><img src="<?="uploads/{$v->varboletoicon}"?>" class="img-responsive" width="100"></a>
                          <? }}?>
                        </td>
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=upt&idf=<?=$v->intboletoid?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intboletoid?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
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