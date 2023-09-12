<?php 
$fecha_inicio = "";
$fecha_fin    = "";
$boleto = Boleto::all();
if($_GET["idf"]){
	$post   = Descuento::find($_GET["idf"]);
	if($post->inicio != "" && $post->inicio  != "0000-00-00")
		$fecha_inicio = date("d/m/Y",strtotime($post->inicio));
	
	if($post->fin!="" && $post->fin!="0000-00-00")
		$fecha_fin = date("d/m/Y",strtotime($post->fin));
}

?>
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
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control input-sm">				
				<option value="">Seleccione un boleto</option>
				<?php foreach ($boleto as $k=>$v):?>				
				<option value="<?php echo $v->intboletoid; ?>" <?php echo ($post->tipo == $v->intboletoid)?"selected":"";?>><?php echo htmlspecialchars_decode(stripcslashes($v->varboletonombre));?></option>				
				<?php endforeach;?>
              <!---<option value="2"<?php //echo ($post->tipo==2?"selected":""); ?>>Código</option>-->
            </select>
          </div>
          <div class="col-md-4">
            <label for="inicio">Fecha inicio (Dia/Mes/Año)</label>
            <input type="text" class="form-control input-sm" name="inicio" id="inicio" placeholder="dd/mm/yyyy" value="<?php echo $fecha_inicio; ?>">
          </div>
          <div class="col-md-4">
            <label for="fin">Fecha fin (Dia/Mes/Año)</label>
            <input type="text" class="form-control input-sm" name="fin" id="fin" placeholder="dd/mm/yyyy" value="<?php echo $fecha_fin; ?>">
          </div>
        </div>
        <div class="row form-group">                      
          <!--<div class="col-md-6">
            <label for="codigo">Código</label>
            <input type="text" class="form-control input-sm" name="codigo" id="codigo" placeholder="Código" value="<?php //echo $post->codigo; ?>">
          </div>-->
          <div class="col-md-6">
            <label for="scliemail">Precio</label>
            <input type="text" class="form-control input-sm" name="descuento" id="descuento" placeholder="0.00" value="<?php echo $post->descuento; ?>">
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