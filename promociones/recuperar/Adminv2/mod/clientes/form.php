<? if($_GET[idf]){$post = Cliente::find($_GET[idf]);}?>
<section class="content">
  <div class="box box-primary">
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>           
    <form data-toggle="validator" role="form" action="mod/<?php echo $_GET[mod]?>/proc.php" method="post" enctype='multipart/form-data'>
    <fieldset>
    <input type="hidden" name="mod" value="<?php echo $_GET[mod]?>">
    <input type="hidden" name="smod" value="<?php echo $_GET[smod]?>">
    <input type="hidden" name="act" value="<?php echo $_GET[act]?>">
    <input type="hidden" name="idf" value="<?php echo $_GET[idf]?>">
    <div class="box-body">
		<div class="row form-group">                      
          <div class="col-md-4">
            <label for="sclieapepat">Apellido Paterno</label>
            <input type="text" class="form-control input-sm" name="sclieapepat" id="sclieapepat" placeholder="Apellido paterno" value="<?php echo $post->sclieapepat; ?>">
          </div>
          <div class="col-md-4">
            <label for="sclieapemat">Apellido Materno</label>
            <input type="text" class="form-control input-sm" name="sclieapemat" id="sclieapemat" placeholder="Apellido materno" value="<?php echo $post->sclieapemat; ?>">
          </div>
          <div class="col-md-4">
            <label for="scliename">Nombres</label>
            <input type="text" class="form-control input-sm" name="scliename" id="scliename" placeholder="Nombres" value="<?php echo $post->scliename; ?>">
          </div>
        </div>
        <div class="row form-group">                      
          <div class="col-md-4">
            <label for="charclientedni">DNI</label>
            <input type="text" class="form-control input-sm" name="charclientedni" id="charclientedni" placeholder="DNI" value="<?php echo $post->charclientedni; ?>">
          </div>
          <div class="col-md-4">
            <label for="scliemail">Email</label>
            <input type="text" class="form-control input-sm" name="scliemail" id="scliemail" placeholder="Email" value="<?php echo $post->scliemail; ?>">
          </div>
          <div class="col-md-4">
            <label for="sclietelf">Teléfono</label>
            <input type="text" class="form-control input-sm" name="sclietelf" id="sclietelf" placeholder="Teléfono" value="<?php echo $post->sclietelf; ?>">
          </div>
        </div>
        <div class="row form-group">                      
          <div class="col-md-4">
            <label for="dnacmdate">Fecha Nacimiento (Dia/Mes/Año)</label>
            <input type="text" class="form-control input-sm" name="dnacmdate" id="dnacmdate" placeholder="dd/mm/yyyy" value="<?php echo date("d/m/Y",strtotime($post->dnacmdate)); ?>">
          </div>
          <div class="col-md-8">
            <label for="sclieaddr">Dirección</label>
            <input type="text" class="form-control input-sm" name="sclieaddr" id="sclieaddr" placeholder="Dirección" value="<?php echo $post->sclieaddr; ?>">
          </div>
        </div>                 
    </div>
    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Aceptar</button>
    <a href="?mod=<?php echo $_GET[mod]?>&smod=<?php echo $_GET[smod]?>&page=index" class="btn btn-danger">Cancelar</a>
    </div>
    </fieldset>
    </form>
  </div>
</section>