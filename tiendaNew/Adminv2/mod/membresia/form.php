<? 

if($_GET[idf]){
  //$post = Tarjeta::find($_GET[idf],array('select' => "*,DATE_FORMAT(dEmisDate, '%d/%m/%Y') fini,DATE_FORMAT(dCaduDate, '%d/%m/%Y') ffin"));
  $post = Tarjeta::find_by_sql("select 
t.nTarjNumb,DATE_FORMAT(t.dEmisDate,'%d/%m/%Y') inidate,DATE_FORMAT(t.dCaduDate,'%d/%m/%Y') findate,t.IdLocal,t.cTarjActi,c.cClieCode,
CONCAT(c.sClieApel,' ',c.sClieName) socios,c.sClieMail,c.charClienteDni
from TARJETA t left JOIN CLIENTE c on t.cClieCode = c.cClieCode
where t.nTarjNumb='{$_GET[idf]}'
order by t.nTarjNumb Desc");
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
      <h2>TARJETA</h2>
      <div class="row form-group">                      
        <div class="col-md-3">
          <label for="codigo">Nro</label>
          <p><?=$post[0]->ntarjnumb?></p>
        </div>
        <div class="col-md-3">
          <label for="pu">Local</label>
          <p><?=$post[0]->idlocal?></p>
        </div>
        <div class="col-md-3">
          <label for="pu">Activado</label>
          <p><?=$post[0]->ctarjacti?></p>
        </div>
        <div class="col-md-3">
          <label for="mes">TIEMPO DE VALIDEZ</label>                        
            <div class="input-daterange input-group" id="datepicker">
              <input type="text" class="input-sm form-control" id="start" name="start"  value="<?=$post[0]->inidate?>" disabled/>                          
              <span class="input-group-addon"> Hasta </span>
              <input type="text" class="input-sm form-control" id="end" name="end" value="<?=$post[0]->findate?>" disabled/>
            </div>
          </div>
        </div>
        <h2>SOCIO</h2>
        <div class="row form-group">                      
          <div class="col-md-3">
            <label for="pu">COD. CLIENTE</label>
            <p><?=$post[0]->ccliecode?></p>
          </div>
          <div class="col-md-3">
            <label for="codigo">APELLIDOS Y NOMBRES</label>
            <p><?=$post[0]->socios?></p>
          </div>
          <div class="col-md-3">
            <label for="pu">EMAIL</label>
            <p><?=$post[0]->scliemail?></p>
          </div>
          <div class="col-md-3">
            <label for="pu">DNI</label>
            <p><?=$post[0]->charclientedni?></p>
          </div>
        </div>
    </div>
    <div class="box-footer">
    <!--<button type="submit" class="btn btn-primary">Aceptar</button>-->
    <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=index" class="btn btn-danger">Cancelar</a>
    </div>
    </fieldset>
    </form>
  </div>
</section>