<? 
if($_GET[idf]){
  $post = File::find($_GET[idf]);
  $pattern = '/[\w\-]+\.(jpg|png|gif|jpeg)/';
  $subject = "uploads/{$post->txtfilesrc}";
  $swfile=preg_match($pattern, $subject, $matches);
  if(preg_match($pattern, $subject, $matches)){
    if($post->txtfilesrc){
      if(file_exists("uploads/{$post->txtfilesrc}")){
        $fileimg="uploads/".$post->txtfilesrc;
        $titimg=$post->txtfilesrc;
      }else{
        $fileimg="http://placehold.it/860x480";
        $titimg="Imágen";
      }
    }
    
    $filevdo="";
    $chkimg="active";
    $chkimghtml="checked"; 
  }else{
    $filevdo=$post->txtfilesrc;
    $filevdoiframe=$post->get_id_youtube()?"<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/{$post->get_id_youtube()}\" frameborder=\"0\" class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\" allowfullscreen></iframe>":$none;
    $fileimg="http://placehold.it/860x480";
    $titimg="Imágen";
    $chkvdo="active";
    $chkvdohtml="checked";
  }

}else{
  $chkimg="active";
  $fileimg="http://placehold.it/860x480";
  $titimg="Imágen";
}
?>
<style>
.content-radio{
  display: none;
}
.content-radio.active{
  display: block;
}
</style>
<section class="content">
  <div class="box box-primary">    
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>               
    <form data-toggle="validator" role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype='multipart/form-data'>   
    <fieldset>
    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
    <input type="hidden" name="smod" value="<?=$_GET[smod]?>">
    <input type="hidden" name="act" value="<?=$_GET[act]?>">
    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">
                  <div class="box-body">
                    <div class="row form-group">
                      <div class="col-md-12">                        
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default <?=$chkimg?>"><input type="radio" name="opt"value="img" <?=$chkimghtml?>> <i class="fa fa-picture-o"></i> Imágen</label>
                          <label class="btn btn-default <?=$chkvdo?>"><input type="radio" name="opt" value="vdo" <?=$chkvdohtml?>> <i class="fa fa-film"></i> Multimedia</label>                          
                        </div>
                        <div id="img" class="content-radio <?=$chkimg?>">
                          <label for="uploads">&nbsp;</label>
                          <input id="uploads" name="uploads" class="file" type="file" accept="image/*" data-title="<?=$titimg?>" value="<?=$fileimg?>" data-preview-file-type="image" >
                        </div>
                        <div id="vdo" class="content-radio <?=$chkvdo?>">
                          <label for="txtmultimedia">Url Video YouTube</label>
                          <input type="text" class="form-control input-sm" id="txtmultimedia" name="txtmultimedia" placeholder="Url Video YouTube" value="<?=$filevdo?>"><br>
                          <?=$filevdoiframe?>
                        </div>
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-md-12">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control input-sm required" name="titulo" placeholder="Titulo" value="<?=$post->varfiletitulo?>">
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-md-12">
                        <label>
                        <input type="checkbox" name="stado" class="minimal" value="1" <?if($post->intfilest || $_GET[act]=="new"){echo "checked";}?>/> Publico
                        </label> 
                      </div>
                    </div>
                  </div>                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <a href="?mod=<?=$_GET[mod]?>&page=index" class="btn btn-danger">Cancelar</a>
                  </div>
                  </fieldset>
                </form>
  </div>
</section>

