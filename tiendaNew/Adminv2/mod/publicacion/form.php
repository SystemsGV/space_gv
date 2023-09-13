<? 
if($_GET[idf]){
  $post = Noticia::find($_GET[idf]);
}
$smod["opinion"]="OP";
$smod["director"]="DI";
$smod["entrevista"]="EN";
$smod["noticia"]="NO";
$smod["programacion"]="PR";
$smod["transmision"]="TR";
?>
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
      <!--<div class="row form-group">                      
        <div class="col-xs-6">
          <label for="seccion">Sección</label>
          <select class="form-control input-sm" name="seccion" id="seccion">
            <option value="" disabled="disabled" selected="selected" class="disabled">- SECCIÓN -</option>            
            <option value="LO" <? if($post->charnoticiasec=="LO"){echo "selected";} ?>>LOCAL</option>
            <option value="NA" <? if($post->charnoticiasec=="NA"){echo "selected";} ?>>NACIONAL</option>
            <option value="IN" <? if($post->charnoticiasec=="IN"){echo "selected";} ?>>INTERNACIONAL</option>
          </select>
        </div>
        <div class="col-xs-6">
          <label for="tipo">Tipo</label>
          <select class="form-control input-sm" name="tipo" id="tipo">
            <option value="" disabled="disabled" selected="selected" class="disabled">- Tipo -</option>            
            <option value="PO" <? if($post->charnoticiatipo=="PO"){echo "selected";} ?>>POLITICA</option>
            <option value="EC" <? if($post->charnoticiatipo=="EC"){echo "selected";} ?>>ECONOMIA</option>
            <option value="DE" <? if($post->charnoticiatipo=="DE"){echo "selected";} ?>>DEPORTES</option>
            <option value="EN" <? if($post->charnoticiatipo=="EN"){echo "selected";} ?>>ENTRETENIMIENTO</option>            
          </select>
        </div>                      
      </div>-->
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="cktitulo">Titulo</label>
                        <textarea id="cktitulo" name="cktitulo" data-maxlen="100" class="form-control input-sm textarea-titulo required" placeholder="Titulo">
                        <?=htmlspecialchars_decode(stripcslashes($post->varnoticiatitulo))?>
                        </textarea>                        
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-xs-12">
                        <label for="uploads">Imágen</label>
                        <input id="uploads" name="uploads" class="file" type="file" accept="image/*" data-title="<?=$post->varnoticiaurl?$post->varnoticiaurl:"imágen"?>" value="<?=$post->varnoticiaurl?"uploads/".$post->varnoticiaurl:"http://placehold.it/860x480"?>" data-preview-file-type="image" >
                      </div>                      
                    </div>                    
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="cksumilla">Sumilla</label>
                        <textarea id="cksumilla" name="cksumilla" data-maxlen="150" class="textarea required" placeholder="Sumilla" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=htmlspecialchars_decode(stripcslashes($post->txtnoticiasumilla))?></textarea>
                      </div>
                    </div>
                    <div class="row form-group">                                            
                      <div class="col-xs-12">
                        <label for="ckdescripcion">Descripción</label>
                        <textarea id="ckdescripcion" name="ckdescripcion" class="textarea required" placeholder="Descripción" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=htmlspecialchars_decode(stripcslashes($post->txtnoticiadescrip))?></textarea>
                      </div>                      
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-6">
                        <label><input type="checkbox" name="destacado" id="destacado" class="minimal" value="1" <?if($post->intnoticiadestacado){echo "checked";}?>/> Destacado</label> 
                      </div>
                      <div class="col-xs-6">
                        <label><input type="checkbox" name="public" id="public" class="minimal" value="1" <?if($post->intnoticiast){echo "checked";}?>/> Publico</label> 
                      </div>
                    </div>                   
    </div>
    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Aceptar</button>
    <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=index" class="btn btn-danger">Cancelar</a>
    </div>
    </fieldset>
    </form>
  </div>
</section>