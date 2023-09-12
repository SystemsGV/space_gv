<? 
if($_GET[idf]){
  $post = Producto::find($_GET[idf]);
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
          <label for="seccion">Sección</label>
          <select class="form-control input-sm" name="seccion" id="seccion">
            <option value="" disabled="disabled" selected="selected" class="disabled">- SECCIÓN -</option>            
            <option value="A" <? if($post->charproductoseccion=="A"){echo "selected";} ?>>Agricultura</option>
            <option value="M" <? if($post->charproductoseccion=="M"){echo "selected";} ?>>Mineria</option>
            <option value="E" <? if($post->charproductoseccion=="E"){echo "selected";} ?>>Edificación</option>
            <option value="S" <? if($post->charproductoseccion=="S"){echo "selected";} ?>>Saneamiento</option>
          </select> 
        </div>
      </div>      
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="titulo">Titulo</label>
                        <textarea name="titulo" class="form-control input-sm textarea-titulo" placeholder="Titulo">
                        <?=htmlspecialchars_decode(stripcslashes($post->varproductotitulo))?>
                        </textarea>                        
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-xs-12">
                        <label for="uploads">Imágen</label>
                        <input id="uploads" data-preview-file-type="text" name="uploads" class="allfile" type="file" data-title="<?=$post->varproductofile?$post->varproductofile:"pdf"?>" value="<?=$post->varproductofile?"uploads/".$post->varproductofile:""?>">
                      </div>                      
                    </div>                    
                    <div class="row form-group">                                            
                      <div class="col-xs-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="textarea" placeholder="Descripción" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=htmlspecialchars_decode(stripcslashes($post->txtproductodescrip))?></textarea>
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