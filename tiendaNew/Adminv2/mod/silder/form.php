<? 
if($_GET[idf]){
  $post = File::find($_GET[idf]); 
}
?>
<section class="content">
  <div class="box box-primary">    
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>           
    <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype="multipart/form-data">    
    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
    <input type="hidden" name="act" value="<?=$_GET[act]?>">
    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">
                  <div class="box-body">
                   <div class="row form-group">
                      <div class="col-xs-12">                          
                        <input id="uploads" name="uploads" class="file" type="file" accept="image/*" data-title="<?=$post->txtfilesrc?$post->txtfilesrc:"imágen"?>" value="<?=$post->txtfilesrc?"image.php?src={$post->txtfilesrc}&w=600":"http://placehold.it/1000x300"?>" width="200px" height="100px">                        
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control input-sm" name="titulo" placeholder="Titulo" value="<?=$post->varfiletitulo?>" requerid>
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label>
                        <input type="checkbox" name="stado" class="minimal" value="1" <?if($post->intfilest){echo "checked";}?>/> Publico
                        </label> 
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <a href="?mod=<?=$_GET[mod]?>&page=index" class="btn btn-danger">Cancelar</a>
                  </div>
                </form>
  </div>
</section>
