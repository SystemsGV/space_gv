<? 

if($_GET[idf]){
  $post = Boleto::find($_GET[idf],array('select' => "*,DATE_FORMAT(dateboletofini, '%d/%m/%Y') fini,DATE_FORMAT(dateboletoffin, '%d/%m/%Y') ffin"));
}

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

                    <div class="row form-group">                      
                      <div class="col-md-6">
                        <label for="cknombre">Nombre</label>
                        <textarea id="cknombre" name="cknombre" data-maxlen="100" class="form-control input-sm textarea-titulo required" placeholder="Nombre"><?=htmlspecialchars_decode(stripcslashes($post->varboletonombre))?></textarea>
                      </div>
                      <div class="col-md-6">
                        <label for="cktitulo">Titulo</label>
                        <textarea id="cktitulo" name="cktitulo" data-maxlen="100" class="form-control input-sm textarea-titulo required" placeholder="Titulo"><?=htmlspecialchars_decode(stripcslashes($post->varboletotitulo))?></textarea>
                      </div>

                    </div>

                    <div class="row form-group">                                            

                      <div class="col-md-12">

                        <label for="ckdescripcion">Descripción</label>

                        <textarea id="ckdescripcion" name="ckdescripcion" class="textarea required  input-sm" placeholder="Descripción" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=htmlspecialchars_decode(stripcslashes($post->txtboletodescrip))?></textarea>

                      </div>                      

                    </div>
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label for="icon">Icono</label>
                        <input id="icon" name="icon" class="file2" type="file" accept="image/*" data-title="<?=$post->varboletoicon?$post->varboletoicon:"icono"?>" value="<?=$post->varboletoicon?"uploads/".$post->varboletoicon:"http://placehold.it/860x480"?>" data-preview-file-type="image" >
                      </div>
                      <div class="col-md-6">
                        <label for="uploads">Imágen</label>
                        <input id="uploads" name="uploads" class="file" type="file" accept="image/*" data-title="<?=$post->varboletoimg?$post->varboletoimg:"imágen"?>" value="<?=$post->varboletoimg?"uploads/".$post->varboletoimg:"http://placehold.it/860x480"?>" data-preview-file-type="image" >
                      </div>     
                    </div>                   
                    <div class="row form-group">                      
                    <div class="col-md-4">
                        <label for="codigo">Codigo</label>
                        <input type="text" class="form-control input-sm" name="codigo" id="codigo" placeholder="Codigo" value="<?=$post->charboletocodigo?>">
                      </div>
                      <div class="col-md-4">

                        <label for="pu">Precio Unitario</label>

                        <input type="text" class="form-control input-sm" name="pu" id="pu" placeholder="Precio Unitario" value="<?=$post->decboletopu?>">

                      </div>

                      <div class="col-md-4">

                        <label for="mes">Asignar Rango de fechas</label>                        

                        <div class="input-daterange input-group" id="datepicker">

                          <input type="text" class="input-sm form-control" id="start" name="start"  value="<?=$post->fini?>"/>                          

                          <span class="input-group-addon"> Hasta </span>

                          <input type="text" class="input-sm form-control" id="end" name="end" value="<?=$post->ffin?>" />

                        </div>

                      </div>

                    </div>

                    <div class="row form-group">                      

                      <div class="col-md-6">

                        <label><input type="checkbox" name="public" id="public" class="minimal " value="1" <? if($post->intboletost){echo "checked";}?>/> Publico</label> 

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