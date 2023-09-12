<?
$post = Maestro::find('all', array('order' => 'intMaestroId desc'));
//$layer = ImageWorkshop::initFromPath('0203836001425422714.jpg');
//$norwayLayer = ImageWorkshop::initFromPath('0203836001425422714.jpg');
//$group = ImageWorkshop::initVirginLayer(300, 200);
//$pinguLayer = ImageWorkshop::initFromPath(__DIR__.'0203836001425422714.jpg');


?>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Club Maestro</h3>
                  <div class="box-tools">
                     <a href="?mod=<?=$_GET[mod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>
                     
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombres y Apellidos</th>
                        <th>Ubicación / Zona de Trabajo</th>
                        <th>Telefonos</th>
                        <th>Imágen</th>
                        <th>Estado</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <? 
                    if($post){
                    foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=$v->varmaestronombres.", ".$v->varmaestroapellidos?></td>
                        <td><?=$v->varmaestrodireccion?></td>
                        <td><?=$v->varmaestrotelefono?></td>
                        <td><a href="uploads/<?=$v->varmaestroimg?>" data-title="<?=strtoupper($v->varmaestronombres.", ".$v->varmaestroapellidos)?>" data-toggle="lightbox"><img src="resize.php?img=<?=$v->varmaestroimg?>&w=50"></a></td>
                        <td><? if($v->intmaestrost){?><?}else{?><span class="label label-success">NUEVO</span><?}?></td>
                        <td>
                         <a href="?mod=<?=$_GET[mod]?>&page=form&act=upt&idf=<?=$v->intmaestroid?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->intmaestroid?>" class="btn btn-default btn-delete">
                          <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <?}}?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
          </div>
</section>