<?php 
$total_items = 0;
$post = Boleto::find('all',array('select' => "*,DATE_FORMAT(dateboletofini, '%d/%m/%Y') fini,DATE_FORMAT(dateboletoffin, '%d/%m/%Y') ffin",'conditions'=>'intboletost=1'));
$total_items = count($post);
?>
<div class="container module-opt"  id="content-mod-center">      
    <div class="row container">
      <div class="col-md-1 no-padding"></div>	  
      <? foreach($post as $k=>$v){$i++;?>
      <?php if($total_items > 1){ ?>
      <div class="col-md-3 no-padding">
	    <?php }else{ ?>
      <div class="col-md-4 col-md-offset-1">
      <?php } ?>
     	 <div class="caption text-center">
            <h3><?=strip_tags(htmlspecialchars_decode(stripcslashes($v->varboletonombre)))?></h3>            
          </div>      
        <div class="thumbnail" align="center">
        <? if($v->varboletoicon){if(file_exists("Adminv2/uploads/{$v->varboletoicon}")){?>              
          <a href="?mod=calendario&sel=<?=$v->intboletoid?>"><img src="<?="Adminv2/uploads/{$v->varboletoicon}"?>" style="border: 6px solid #5c8c00;" class="opt<?=$v->intboletoid?>"></a>
        <? }}?>
          <div class="caption text-center">         
            <a class="btn btn-danger" href="?mod=calendario&sel=<?=$v->intboletoid?>" style="font-size:18px;" role="button"><strong>COMPRAR ENTRADAS</strong></a>
          </div>
        </div>
      </div>
      <? }?>
		<!--<div class="col-md-3 no-padding">-->
        <div class="col-md-4 col-md-offset-1">
	         	 <div class="caption text-center">
            <h3>Festival del Terror</h3>
          </div>      
        <div class="thumbnail" align="center">
                      
          <!--<a data-toggle="modal" data-target="#TerrorModal">--><a><img src="Adminv2/uploads/0962831001526570662.jpeg" style="border: 6px solid #5c8c00;"></a>
                  <div class="caption text-center">         
            <a disabled class="btn btn-danger" style="font-size:18px;" role="button" data-toggle="modal" data-target="#TerrorModal"><strong>COMPRAR ENTRADAS</strong></a>
          </div>
        </div>
      </div> 	  
    </div>
	
</div>
</div>

	<div class="modal fade" id="TerrorModal" tabindex="-1" role="dialog" aria-labelledby="Festival del Terror" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title" align="center">Festival del Terror</h3>

            </div>



    <div class="modal-body">
		 <div class="container module-opt">     
			<div class="row container">
        <div class="col-md-3 no-padding">
	        <div class="caption text-center">
            <h3>Entrada Full Terror</h3>            
          </div>      
          <div class="thumbnail" align="center">
                      
          <a href="?mod=calendario&sel=6"><img src="Adminv2/uploads/0583333001526596770.jpeg" style="border: 6px solid #5c8c00;" class="opt6"></a>
                  <div class="caption text-center">         
            <a class="btn btn-danger" href="?mod=calendario&sel=6" style="font-size:18px;" role="button"><strong>COMPRAR ENTRADAS</strong></a>
          </div>
        </div>
      </div>
                <!--<div class="col-md-3 no-padding">
	         	 <div class="caption text-center">
            <h3>Entrada Terror</h3>            
          </div>      
        <div class="thumbnail" align="center">
                      
          <a href="#"><img src="Adminv2/uploads/0802145001526597460.jpg" style="border: 6px solid #5c8c00;" class="opt11"></a>
                  <div class="caption text-center">         
            <button class="btn btn-danger" href="#" style="font-size:18px;" role="button"><strong>NO DISPONIBLE</strong></button>
          </div>
        </div>
      </div>-->
      <div class="col-md-3 no-padding">
             <div class="caption text-center">
            <h3>Entrada Terror</h3>            
          </div>      
        <div class="thumbnail" align="center">
                      
          <a href="?mod=calendario&sel=11"><img src="Adminv2/uploads/0802145001526597460.jpg" style="border: 6px solid #5c8c00;" class="opt11"></a>
                  <div class="caption text-center">         
            <a class="btn btn-danger" href="?mod=calendario&sel=11" style="font-size:18px;" role="button"><strong>COMPRAR ENTRADAS</strong></a>
          </div>
        </div>
      </div>

	</div>
	</div>
	</div> 	  

            </div>

        </div>

    </div>

</div>

