<? 
//$post = Boleto::find('all',array('select' => "*,DATE_FORMAT(dateboletofini, '%d/%m/%Y') fini,DATE_FORMAT(dateboletoffin, '%d/%m/%Y') ffin")); 
$post = Tarjeta::find_by_sql("select 
t.nTarjNumb,DATE_FORMAT(t.dEmisDate,'%d/%m/%Y') inidate,DATE_FORMAT(t.dCaduDate,'%d/%m/%Y') findate,t.IdLocal,t.cTarjActi,c.cClieCode,
CONCAT(c.sClieApel,' ',c.sClieName) socios,c.sClieMail,c.charClienteDni
from TARJETA t left JOIN CLIENTE c on t.cClieCode = c.cClieCode
order by t.nTarjNumb Desc");
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?=ucwords($_GET[smod]?$_GET[smod]:$_GET[mod])?></h3>
                  <div class="box-tools">
                     <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover display" width="100%" data-page-length="25">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Nro Tarjeta</th>
                        <th>Socio</th>
                        <th>F. Renovación</th>                                                
                        <th>F. Vencimiento</th>                        
                        <th>Acción</th>                        
                      </tr>
                    </thead>
                    <tbody>
                    <? foreach($post as $k=>$v){$i++;?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=$v->ntarjnumb?></td>
                        <td><?=$v->socios?></td>                                                
                        <td><?=$v->inidate?></td>
                        <td><?=$v->findate?></td>
                        <td>
                          <a href="?mod=<?=$_GET[mod]?>&smod=<?=$_GET[smod]?>&page=form&act=upt&idf=<?=$v->ntarjnumb?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                          <button data-href="mod/<?=$_GET[mod]?>/proc.php?mod=<?=$_GET[mod]?>&act=del&idf=<?=$v->ntarjnumb?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">
                          <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                     <? }?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
          </div>
</section>