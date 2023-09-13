<?php
//var_dump($_SESSION["sess_cart"]);

//print_r(array_sum($_SESSION["sess_cart"][txtpu]));

//print_r($_SESSION["sess_cart"][txtpu]);

//echo $value = array_sum(array_column($_SESSION["sess_cart"],'txtpu'));

//echo "<br>".count($_SESSION["sess_cart"]);

//unset($_SESSION["sess_cart"]);
$post = array();
if($_SESSION["sess_user"]["idusuario"]){
	$post = Tarjeta::find_by_sql("select 
	nTarjNumb,DATE_FORMAT(dEmisDate,'%d/%m/%Y') inidate,DATE_FORMAT(dCaduDate,'%d/%m/%Y') findate,DATEDIFF(dCaduDate,now()) as fdias
	from TARJETA where ccliecode='{$_SESSION["sess_user"]["idusuario"]}'");
}
?>
<div class="container"  id="content-mod-center">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default widget">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <h3 class="panel-title">Carrito de compras (<span class="cart-items"><?=count($_SESSION["sess_cart"])?></span>) producto</h3>
                    <!--<span class="label label-info">78</span>-->
                </div>
                <?php
				if(isset($_SESSION["sess_cart"]) && count($_SESSION["sess_cart"])){
                ?>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php    
                        if(count($_SESSION["sess_cart"])){
                        foreach ($_SESSION["sess_cart"] as $key => $value) {                            
                            $stotal = $stotal + $value[txtpu];
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-1 text-center"><a href="#delete-<?=$key+1?>" class="btn-del-cart"><i class="fa fa-times-circle fa-3x"></i></a></div>                      
                                <div class="col-md-3 hidden-xs">                                    
                                    <?php if($value["img"]){if(file_exists("Adminv2/uploads/{$value["img"]}")){?>
                                      <img src="Adminv2/uploads/<?=$value["img"]?>" class="img-responsive">
                                    <?php }}?>
                                </div>
                                <div class="col-md-5">
                                    <div><?=strip_tags(htmlspecialchars_decode(stripcslashes($value["titulo"])))?></div>
                                    <?php
                                    if($value["tipo"]=="M")
									{
										echo '<div>GRANJA VILLA</div>';
									}else{
									?>
                                    <div><?=$_SESSION["sess_cart_sede"]["nombre"]?></div>
                                    <div>Fecha <?=$value["txtfec"]?></div>
                                    <?php
									}
									?>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-right"><h2>S/. <?=number_format($value["txtpu"], 2,'.',' ')?></h2></div>                                    
                                </div>
                            </div>
                        </li>
                        <?php }} ?>
                        <?php 
                        $tipo = array_column($_SESSION["sess_cart"],'tipo');  
                        $clave = array_search('M', $tipo);
                        if(empty($clave)){
                          if(empty($post[0]->ntarjnumb)){
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-1 text-center"></div>                                
                                <div class="col-md-8"><a href="#" class="btn-addmembresia btn-block text-center"><span class="glyphicon glyphicon-user"></span> <strong>Nuevo Socio</strong> - Agregar Membresía</a></div>
                                <div class="col-md-3">
                                    <div class="form-group text-right"><!--<h2>S/. <?=number_format($_SESSION["sess_cart_membresia"]["pu"], 3,'.',' ')?>--></h2></div>	
                                </div>
                            </div>
                        </li>
                        <?php  }else{?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-1 text-center"></div>                                
                                <div class="col-md-8"><a href="#" class="btn-addmembresia">Faltan (<?=$post[0]->fdias?>) para renovar Membresía</a></div>
                                <div class="col-md-3">
                                    <div class="form-group text-right"><!--<h2>S/. <?=number_format($_SESSION["sess_cart_membresia"]["pu"], 3,'.',' ')?></h2>--></div>
                                </div>
                            </div>
                        </li>
                        <?php  }}?>
                    </ul>                
                </div>
                <div class="panel-footer">
                    <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3 hidden-xs"></div>
                                <div class="col-md-5"></div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                      <label for="inputEmail3" class="col-sm-7 col-xs-7 control-label text-right">Sub Total</label>
                                      <div class="col-sm-5 col-xs-5 text-right" style="padding:0px;"> S/. <span class="cart-stotal"><?=number_format(($stotal-($stotal*0.18)), 2,'.','')?></span></div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-7 col-xs-7 control-label text-right">IGV</label>
                                      <div class="col-sm-5 col-xs-5 text-right" style="padding:0px;"> S/. <span class="cart-igv"><?=number_format(($stotal*0.18), 2,'.','')?></span></div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-7 col-xs-7 control-label text-right">Total</label>
                                      <div class="col-sm-5 col-xs-5 text-right" style="padding:0px;"> S/. <span class="cart-total"><?=number_format($stotal, 2,'.','')?></span></div>
                                    </div>
                                </div>
                    </div>
                </div>
                <?php
                }else{
				?>
                <div class="panel-body">
                	<div class="empty-cart">Su carrito de compras está vacío.</div>
                </div>
                <?php
                }
				?>
            </div>
            <div class="row">
                  <div class="col-md-6">
                  <a href="http://lagranjavilla.com/tienda/" class="btn btn-primary btn-block">Agregar más productos</a>
                  </div>
                  <div class="col-md-6">
                  <?php  if(count($_SESSION["sess_cart"])){ ?>
                  <a href="?mod=form-1  " class="btn btn-success btn-addform btn-block">Continuar</a>    
                  <?php }?>
                  </div>
              </div>
        </div>        
    </div>   
<br><br><br><br>
</div>    