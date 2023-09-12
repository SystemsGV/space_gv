<?
$post = File::find('all', array('order' => 'intfileid desc',"conditions"=>"intFileTipo='1'")); 

?>
<section class="content">
          <div class="row">
            <div class="col-md-12">
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
                        <th>Multimedia</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? 
                      foreach($post as $k=>$v){$i++;                        
                        $pattern = '/[\w\-]+\.(jpg|png|gif|jpeg)/';
                        $subject = "uploads/{$v->txtfilesrc}";
                        $result = preg_match($pattern, $subject, $matches);                        
                      ?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=htmlspecialchars_decode(stripcslashes($v->varfiletitulo))?></td>
                        <td>
                        <div class="viewmultimedia">                        
                        <?
                          //echo "Ver: ".$v->get_id_youtube();
                          if(preg_match($pattern, $subject, $matches)){ 
                            if($v->txtfilesrc){
                              if(file_exists("uploads/{$v->txtfilesrc}")){?>
                            <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-picture-o fa-stack-1x fa-inverse"></i></span>
                            <a href="image.php?src=<?=$v->txtfilesrc?>" data-title="<?=$v->varfiletitulo?>" data-toggle="lightbox"><img src="image.php?src=<?=$v->txtfilesrc?>&w=220&h=120" class="img-responsive img-thumbnail"></a> 
                        <? 
                            }
                            }
                            }else{
                              if($v->get_id_youtube()){
                              //echo "id:".$v->get_id_youtube();
                              ?>
                            <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-play fa-stack-1x fa-inverse"></i></span>
                            <a href="<?=$v->txtfilesrc?>" data-title="<?=$v->varfiletitulo?>" data-toggle="lightbox"><img src="image.php?src=http://img.youtube.com/vi/<?=$v->get_id_youtube()?>/0.jpg&w=220&h=120" class="img-responsive img-thumbnail"></a>  
                            <?
                                //echo htmlspecialchars_decode(stripcslashes($v->txtfilesrc));
                              }}
                          ?>
                          </div>
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
<style>
.viewmultimedia{  
  width: 220px;
}
.viewmultimedia span{
  display: block;      
  position: absolute;
  margin-left: 178px;
  margin-top: 82px;
}
.viewmultimedia span i.fa-circle{
  opacity:0.6;filter:alpha(opacity=60);  
}

</style>