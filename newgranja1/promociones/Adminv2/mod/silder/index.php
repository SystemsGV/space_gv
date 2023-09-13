<?$post = File::find('all', array('order' => 'intfileid desc',"conditions"=>"intFileTipo='2'")); ?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Slider</h3>
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
                        <th>Imágen</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=htmlspecialchars_decode(stripcslashes($v->varfiletitulo))?></td>
                        <td>
                          <?                          
                           if($v->txtfilesrc){
                              if(file_exists("uploads/{$v->txtfilesrc}")){
                          ?>
                            <a href="image.php?src=<?=$v->txtfilesrc?>" data-title="<?=$v->txtfilesrc?>" data-toggle="lightbox"><img src="image.php?src=<?=$v->txtfilesrc?>&w=300&h=100" class="img-responsive"></a> 
                          <? }}?>
                       </td>                        
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&page=form&act=upt&idf=<?=$v->intfileid?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intfileid?>" class="btn btn-default btn-delete">
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