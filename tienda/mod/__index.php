<? $post = Boleto::find('all',array('select' => "*,DATE_FORMAT(dateboletofini, '%d/%m/%Y') fini,DATE_FORMAT(dateboletoffin, '%d/%m/%Y') ffin",'conditions'=>'intboletost=1')); ?>
<div class="container module-opt"  id="content-mod-center">      
    <div class="row container">
      <div class="col-md-3 no-padding"></div>      
      <? foreach($post as $k=>$v){$i++;?>
      <div class="col-md-3 no-padding">
        <div class="thumbnail">
        <? if($v->varboletoicon){if(file_exists("Adminv2/uploads/{$v->varboletoicon}")){?>              
          <img src="<?="Adminv2/uploads/{$v->varboletoicon}"?>" class="opt<?=$v->intboletoid?>">
        <? }}?>
          <div class="caption text-center">
            <h3><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->varboletonombre)))?></h3>            
            <a class="btn btn-danger" href="?mod=calendario&sel=<?=$v->intboletoid?>" role="button">Comprar</a>
          </div>
        </div>
      </div>
      <? }?>      
      <div class="col-md-3 no-padding"></div>
    </div> 

</div>

