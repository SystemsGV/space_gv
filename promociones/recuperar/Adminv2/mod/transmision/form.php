<? $post = Setup::first('all',array('conditions'=>'varSetupCodigo = "transmision"')); ?>
<section class="content">
  <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Formulario</h3>
                </div>           
                <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post">
                <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
                  <div class="box-body">
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="cktransmision">Transmisión</label>
                        <textarea id="cktransmision" name="cktransmision" class="textarea" placeholder="Transmisión"><?=htmlspecialchars_decode(stripcslashes($post->txtsetupdescrip))?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                  </div>
                </form>
  </div>
</section>