<?php 
    $days_disabled = "";
    if($_GET["idf"]){    
        $post = Nodisponible::find($_GET["idf"]);    
        if($post->id != ""){        
            $days_disabled = $post->days_disabled;
            $idboleto      = $post->st;
        }
    }
    $boleto = Boleto::all();
?>
<section class="content">  
    <div class="box box-primary">    
        <div class="box-header">
            <h3 class="box-title">Formulario - <?php echo $_GET["act"] == "new"? "Nuevo * Fechas no disponibles para boleto *" : "Actualizar fechas no disponibles para los boletos ";  ?></h3>
        </div>               
        <form data-toggle="validator" role="form" action="mod/<?php echo $_GET["mod"]?>/proc.php" method="post" enctype='multipart/form-data'>    
            <fieldset>    
                <input type="hidden" name="mod" value="<?php echo $_GET["mod"]?>">    
                <input type="hidden" name="smod" value="<?php echo $_GET["smod"]?>">    
                <input type="hidden" name="act" value="<?php echo $_GET["act"]?>">    
                <input type="hidden" name="idf" value="<?php echo $_GET["idf"]?>">    
                <div class="box-body"> 
                    <div class="form-group">
                        <select class="form-control col-md-4" name="boleto" <?php echo ($idboleto != $v->intboletoid)?"disabled":"";?> >
                            <option value="">Seleccione boleto</option>
                            <?php foreach ($boleto as $k=>$v):?>
                            <option value="<?php echo $v->intboletoid; ?>" <?php echo ($idboleto == $v->intboletoid)?"selected":"";?>><?php echo htmlspecialchars_decode(stripcslashes($v->varboletonombre));?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="row form-group">          
                        <div class="col-md-12">            
                            <label for="inicio">Selecciones los dias NO disponibles: (Ejem: 2016-07-28, 2016-10-21, 2016-10-03)</label>            
                            <input type="text" id="from-disabled" class="form-control input-sm" name="inicio" id="inicio" placeholder="dd/mm/yyyy" value="<?php echo $days_disabled; ?>">          
                        </div>                  
                    </div>                           
                </div>    
                <div class="box-footer">    
                    <button type="submit" class="btn btn-primary">Aceptar</button>    
                    <a href="?mod=<?php echo $_GET["mod"]?>&smod=<?php echo $_GET["smod"]?>&page=index" class="btn btn-danger">Cancelar</a>    
                </div>    
            </fieldset>    
        </form>  
    </div>
</section>