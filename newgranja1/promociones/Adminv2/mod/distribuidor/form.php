<? 
if($_GET[idf]){
  $post = Distribuidor::find($_GET[idf]);
}

?>
<section class="content">
  <div class="box box-primary">
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>           
    <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype='multipart/form-data'>
    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
    <input type="hidden" name="act" value="<?=$_GET[act]?>">
    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">
    <div class="box-body">      
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="titulo">Titulo</label>
                        <textarea name="titulo" class="form-control input-sm textarea-titulo" placeholder="Titulo">
                        <?=htmlspecialchars_decode(stripcslashes($post->txtdistribuidortitulo))?>
                        </textarea>                        
                      </div>
                    </div>                    
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="mapa">Mapa</label>
                        <input type="text" class="form-control input-sm" name="mapa" id="mapa" placeholder="Mapa" value="<?=htmlspecialchars_decode(stripcslashes($post->txtdistribuidorsrc))?>">                        
                        <? if($post->txtdistribuidorsrc){?>
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="<?=htmlspecialchars_decode(stripcslashes($post->txtdistribuidorsrc))?>"></iframe>
                        </div>                        
                        <? }?>
                      </div>
                    </div>
                    <div class="row form-group">                                            
                      <div class="col-xs-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="textarea" placeholder="Descripción" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=htmlspecialchars_decode(stripcslashes($post->txtdistribuidordescrip))?></textarea>
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