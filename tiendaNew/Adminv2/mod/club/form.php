<? 
if($_GET[idf]){
  $post = Maestro::find($_GET[idf]);
  $ubi = Ubigeo::find($post->intubigeoid);
}
 
  $dep = Ubigeo::find_by_sql("select DISTINCT charUbigeoIdep,varUbigeoTdep from ubigeo");
  $pro = Ubigeo::find_by_sql("select DISTINCT charUbigeoIpro,varUbigeoTpro from ubigeo where charUbigeoIdep='{$ubi->charubigeoidep}'");
  $dis = Ubigeo::find_by_sql("select intUbigeoId,charUbigeoIdis,varUbigeoTdis from ubigeo where charUbigeoIdep='{$ubi->charubigeoidep}' and charUbigeoIpro='{$ubi->charubigeoipro}'");
  $especialidad = Especialidad::find(all);
?>
<section class="content">
  <div class="box box-primary">    
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>           
    <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype="multipart/form-data">    
    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
    <input type="hidden" name="act" value="<?=$_GET[act]?>">
    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">
                  <div class="box-body">
                   <div class="row form-group">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <input id="uploads" name="uploads" class="file" type="file" accept="image/*" data-title="<?=$post->varmaestroimg?$post->varmaestroimg:"imágen"?>" value="<?=$post->varmaestroimg?"uploads/".$post->varmaestroimg:"http://placehold.it/350x350"?>">
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="row form-group">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <label for="nombres">Nombres</label>
                                <input type="text" class="form-control input-sm" name="nombres" placeholder="Nombres" value="<?=$post->varmaestronombres?>" requerid>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <label for="apellidos">Apellidos</label>
                              <input type="text" class="form-control input-sm" name="apellidos" placeholder="Apellidos" value="<?=$post->varmaestroapellidos?>">
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <label for="dni">Dni</label>
                              <input type="text" class="form-control input-sm" name="dni" placeholder="DNI" value="<?=$post->charmaestrodni?>">
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <label for="email">Email</label>
                              <div class="input-group">
                                <span class="input-group-addon">@</span>                                
                                <input type="email" class="form-control input-sm" name="email" placeholder="Email" value="<?=$post->varmaestroemail?>">
                              </div>                              
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <label for="contrasena">Contraseña</label>
                              <input type="text" class="form-control input-sm" name="contrasena" placeholder="Contraseña" value="<?=$post->varmaestroclave?>">
                          </div>
                        </div>
                      </div>
                  </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label for="dep">Departamento</label>
                        <select class="form-control input-sm" name="dep" id="dep">
                        <option value="" disabled="disabled" selected="selected" class="disabled">- DEPARTAMENTO -</option>
                        <? foreach ($dep as $value) {?>
                            <option value="<?=$value->charubigeoidep?>" <? if($value->charubigeoidep==$ubi->charubigeoidep){echo "selected";} ?>><?=$value->varubigeotdep?></option>
                        <? }?>
                          
                        </select>                        
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label for="pro">Provincia</label>
                        <select class="form-control input-sm" name="pro" id="pro">
                          <? foreach ($pro as $value) {?>
                            <option value="<?=$value->charubigeoipro?>" <? if($value->charubigeoipro==$ubi->charubigeoipro){echo "selected";} ?>><?=$value->varubigeotpro?></option>
                          <? }?>                          
                        </select>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label for="dis">Distrito</label>
                        <select class="form-control input-sm" name="dis" id="dis">
                           <? foreach ($dis as $value) {?>
                            <option value="<?=$value->intubigeoid?>" <? if($value->intubigeoid==$ubi->intubigeoid){echo "selected";} ?>><?=$value->varubigeotdis?></option>
                          <? }?>                          
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label for="direc">Dirección</label>
                        <input type="text" class="form-control input-sm" name="direc" placeholder="Dirección" value="<?=$post->varmaestrodireccion?>">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label for="especialidad">Especialidad</label>
                        <select class="form-control input-sm" name="especialidad">
                          <option value="" disabled="disabled" selected="selected" class="disabled">- ESPECIALIDAD -</option>
                           <? foreach ($especialidad as $value) {?>
                            <option value="<?=$value->intespecialidadid?>" <? if($value->intespecialidadid==$post->intespecialidadid){echo "selected";} ?>><?=$value->varespecialidadtitulo?></option>
                          <? }?>                          
                        </select>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label for="tel">Telefonos (Enter agregar nuevo numeros)</label>
                        <input type="text" class="form-control input-sm tokenfield" name="tel" placeholder="Telefono" value="<?=$post->varmaestrotelefono?>">
                      </div>                      
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                                                
                          <div class="form-group">
                            <label for="fnac">Fecha de Nacimiento (dia/mes/año)</label>
                            <input type="text" class="form-control input-sm datemask" name="fnac" placeholder="Fecha de Nacimiento" value="<?=$post->datemaestrofnac?>">                            
                          </div>                        
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                                                
                          <div class="form-group">
                            <label><input type="checkbox" name="stado" class="minimal" value="1" <?if($post->intmaestrost){echo "checked";}?>/>  Validar datos</label>                            
                          </div>                        
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        
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
