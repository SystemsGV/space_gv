<?php
if(!isset($_SESSION["sess_cart"])) {    
    echo "<script>location.href='?mod=list'</script>";
}
?>
<div class="container" id="content-mod-center">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="?mod=form-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p class="hidden-xs"><strong>Registro de Boletos</strong></p>                
                <p class="visible-xs">Paso 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="?mod=formval" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p class="hidden-xs">Datos del Comprador</p>
                <p class="visible-xs">Paso 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="?mod=form-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p class="hidden-xs">Finalizar y disfrutar</p>
                <p class="visible-xs">Paso 3</p>
            </div>
            <!--<div class="stepwizard-step">
                <a href="?mod=form-3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p class="hidden-xs">Elegir Tipo de PagoFinalizar y disfrutar</p>
                <p class="visible-xs">Paso 4</p>
            </div>-->
        </div>
    </div>
    <div class="row container">    
        <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">
            <input type="hidden" name="cmd" value="regcart">
            <h3>Registro de Boletos</h3>           
            <p>Los datos del cliente serán verificados por medio del DNI en el ingreso al parque.</p>                             
            <?php foreach ($_SESSION["sess_cart"] as $key => $value) {
               $i++;
               if($value["tipo"]=="T") {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Registro N° <?=$i?></strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if($value["img"]){if(file_exists("Adminv2/uploads/{$value["img"]}")){?>
                                <img src="Adminv2/uploads/<?=$value[img]?>" class="img-responsive">
                            <?php }}?>
                        </div>
                        <div class="col-md-4 text-left">
                            <h4><?=strip_tags(htmlspecialchars_decode(stripcslashes($value["titulo"])))?></h4>
                            <h4><?=$_SESSION["sess_cart_sede"]["nombre"]?><h4/>
                            <h4>Fecha <?=$value["txtfec"]?></h4>
                        </div>
                        <div class="col-md-4 text-right"><h1>S/. <?=number_format($value["txttotal"], 2,'.','')?></h1></div>
                    </div>                    
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Paterno</label>                                              
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-sm"  name="regapepat-<?=$key?>" value="<?=$value["apepat"]?>" placeholder="Apellidos Paterno" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-sm"  name="regapemat-<?=$key?>" value="<?=$value["apemat"]?>" placeholder="Apellidos Materno" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombres</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-sm"  name="regname-<?=$key?>" value="<?=$value["nombres"]?>" placeholder="Nombres" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>DNI / Carn&eacute; de Extranjer&iacute;a</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-ticket"></i></span>
                                    <input type="text" class="form-control input-sm"  name="regdni-<?=$key?>" value="<?=$value["dni"]?>" placeholder="DNI / Carne de Extranjeria" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" maxlength="15" data-fv-regexp-message="Porfavor ingrese un valor correcto.">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tel&eacute;fono</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control input-sm"  name="regphone-<?=$key?>" value="<?=$value["telefono"]?>" placeholder="Telefono" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-regexp="true"  data-fv-regexp-regexp="^[0-9_\.]+$" data-fv-regexp-message="Porfavor ingrese un valor correcto." data-fv-stringlength="true" data-fv-stringlength-min="6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }}
            ?>
            <div class="row">
                <div class="col-md-6">
                    <!--<a href="?mod=calendario" class="btn btn-primary btn-block">Agregar mas productos</a>-->
                </div>
                <div class="col-md-6">
                    <!--<a href="?mod=formval  " class="btn btn-success">Siguiente</a>-->
                    <input type="submit"  class="btn btn-success" value="Siguiente">
                </div>
            </div>
        </form>        
    </div>
</div>