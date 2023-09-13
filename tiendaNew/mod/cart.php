<?php 
$total_items = 0;
$post = Boleto::find('all',array('select' => "*,DATE_FORMAT(dateboletofini, '%d/%m/%Y') fini,DATE_FORMAT(dateboletoffin, '%d/%m/%Y') ffin",'conditions'=>'intboletost=1'));
$total_items = count($post);
?>
<div class="container module-opt"  id="content-mod-center">      
    <div class="row container">
      <div class="col-md-3 no-padding"></div>
      <?php foreach($post as $k=>$v){$i++;?>
      <?php if($total_items > 1){ ?>
      <div class="col-md-3 no-padding">
      <?php }else{ ?>
      <div class="col-md-4 col-md-offset-1">
      <?php } ?>
     	 <div class="caption text-center">
            <h3><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->varboletonombre)))?></h3>            
          </div>      
        <div class="thumbnail" align="center">
        <?php if($v->varboletoicon){if(file_exists("Adminv2/uploads/{$v->varboletoicon}")){?>              
          <a href="?mod=calendario&sel=<?=$v->intboletoid?>"><img src="<?="Adminv2/uploads/{$v->varboletoicon}"?>" style="border: 6px solid #5c8c00;" class="opt<?=$v->intboletoid?>"></a>
        <?php }}?>
          <div class="caption text-center">         
            <a class="btn btn-danger" href="http://lagranjavilla.com/tienda/=<?=$v->intboletoid?>" style="font-size:18px;" role="button"><strong>COMPRAR ENTRADAS</strong></a>
            <?php
			if(isset($_SESSION['sess_cart']) && count($_SESSION['sess_cart'])){
			?>
            <a class="btn btn-success" href="?mod=list" style="font-size:18px;" role="button"><strong>VER CARRITO</strong></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php }?>      
      <div class="col-md-3 no-padding"></div>
    </div> 

</div>

