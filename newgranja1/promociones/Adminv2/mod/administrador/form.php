<?php if($_GET[idf]){$post = Administrador::find($_GET[idf]);}?>
 <section class="content">
  <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Formulario</h3>
                </div>           
                <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post">
                <input type="hidden" name="mod" value="<?php echo $_GET[mod]?>">
    			<input type="hidden" name="smod" value="<?php echo $_GET[smod]?>">
    			<input type="hidden" name="act" value="<?php echo $_GET[act]?>">
    			<input type="hidden" name="idf" value="<?php echo $_GET[idf]?>">
                  <div class="box-body">
                    <div class="row form-group">                      
                      <div class="col-xs-6">
                        <label for="titulo">Nombres</label>
                        <input type="text" class="form-control input-sm" name="titulo" id="titulo" placeholder="Nombres" value="<?=$post->varadministradortitulo?>">
                      </div>
                      <div class="col-xs-6">
                        <label for="titulo">Tipo</label>
                        <select class="form-control input-sm" name="tipo">
                          <option value="1" <? if($post->tipo==1){echo "selected";} ?>>Super Administrador</option>
                          <option value="2" <? if($post->tipo==2){echo "selected";} ?>>Administrador</option>
                        </select>
                      </div>                      
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-6">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control input-sm" name="usuario" id="usuario" placeholder="Usuario" value="<?=$post->varadministradorusuario?>">
                      </div>
                      <div class="col-xs-6">
                        <label for="contrasena">Contraseña</label>
                        <input type="text" class="form-control input-sm" name="contrasena" id="contrasena" placeholder="Contraseña" value="<?=$post->varadministradorpsw?>">
                      </div>                      
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                  </div>
                </form>
  </div>
</section>