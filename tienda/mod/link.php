<?php

if(!$_GET['l']){  
    echo "<script>location.href='?mod=cart'</script>";
}else{
	$url = explode("link&l=",$_SERVER['REQUEST_URI']);
	$link = $url[1];
    $cli = Cliente::find('all', array('conditions' => "varClienteLink='".$link."'"));
    if($cli[0]->intclientecmail==0){
        $email = decrypt($link,$cli[0]->charclientedni);
        $obj = Cliente::find($cli[0]->ccliecode);
        if($obj->scliemail == $email){    
            $obj->intclientecmail=1;
            $obj->save();
            $msg="GRACIAS! SU CUENTA ESTA ACTIVADA PUEDE <a href=\"?mod=login\">INICIAR SESSION </a>";
        }else{
            $msg="HUBO PROBLEMAS AL ACTIVAR SU CUENTA";
        }
    }else{
        $msg="SU CUENTA YA ESTA ACTIVADA";
    }
    
}
?>

<div class="container"  id="content-mod-center">

    <div class="row container">

        <h3 class="text-center"><?=$msg?></h3>
    </div>

</div>