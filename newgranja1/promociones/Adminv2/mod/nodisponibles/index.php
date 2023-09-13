<?php 
$post = Nodisponible::find_by_sql('select * from nodisponible where st > "0" ORDER BY id DESC');
$boleto = Boleto::all();
foreach ($boleto as $b=>$val):
    $name[$val->intboletoid] = $val->varboletonombre;
endforeach;
?>
<section class="content">          
    <div class="row">            
        <div class="col-xs-12">              
            <div class="box">                
                <div class="box-header">                  
                    <h3 class="box-title"><?php echo ucwords($_GET["smod"]?$_GET["smod"]:$_GET["mod"])?></h3>                  
                    <div class="box-tools">                     
                        <a href="?mod=<?php echo $_GET["mod"]?>&smod=<?php echo $_GET["smod"]?>&page=form&act=new" class="btn btn-block btn-default"><i class="fa fa-plus"></i> Agregar</a>                  
                    </div>                
                </div>                
                <div class="box-body">                  
                    <table id="example1" class="table table-bordered table-hover display" width="100%" data-page-length="25">                    
                        <thead>                      
                            <tr>                        
                                <th>Item</th>
                                <th>Boleto</th>
                                <th>Fecha no disponibles</th>                        
                                <th>Acción</th>                                              
                            </tr>                    
                        </thead>                    
                        <tbody>                    
                            <?php foreach($post as $k=>$v): $i++;?>                      
                            <tr>                        
                                <td><?php echo $i?></td>                                 
                                <td><?php echo htmlspecialchars_decode(stripcslashes($name[$v->st])) ;?></td>
                                <td><?php echo $v->days_disabled; ?></td>
                                <td>                          
                                    <a href="?mod=<?php echo $_GET["mod"]?>&smod=<?php echo $_GET["smod"]?>&page=form&act=upt&idf=<?php echo $v->id?>" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>                          
                                    <button data-href="mod/<?php echo $_GET["mod"]?>/proc.php?mod=<?php echo $_GET["mod"]?>&act=del&idf=<?php echo $v->id?>" class="btn btn-default btn-delete" data-toggle="tooltip" title="Eliminar">                          
                                        <i class="fa fa-trash"></i>                          
                                    </button>                        
                                </td>                        
                            </tr>                     
                                <?php endforeach; ?>                    
                        </tbody>                                      
                    </table>                
                </div>              
            </div>            
        </div>          
    </div>
</section>