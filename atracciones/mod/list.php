<?
/*echo $_POST[mm];
echo "<br>";
echo $_POST[cm];*/
if($_POST[mm] || $_POST[cm]) {

	if($_POST[mm]==0 && $_POST[cm]==0){

	}else{
		$where="where '{$_POST[mm]}.{$_POST[cm]}' >= txt_telefono  and '{$_POST[mm]}.{$_POST[cm]}' <= txt_celular and txt_usuario2='{$_POST[ss]}'";
		$sql="select * from tbl_cliente {$where}";	
		$grid=conn_array ($sql);	
	}

	
}

?>

<style>

a{

	text-decoration: none;

	color: #000;

}

a:hover{

	color: #000;

	text-decoration: none;

}

</style>

<div class="container">

	      <h2>Restricciones por altura</h2>

	      <p>Ten en cuenta que por motivos de seguridad y recomendaci&oacute;n de los  fabricantes de cada juego o m&aacute;quina, algunas atracciones tienen otras  restricciones adem&aacute;s de la altura (edad, constituci&oacute;n f&iacute;sica, etc.) por lo que  es posible que no puedas acceder a algunas de las atracciones que aparecen a  continuaci&oacute;n. Puedes consultar m&aacute;s detalles en el tel&eacute;fono 996 319 026  o tambi&eacute;n a  trav&eacute;s del formulario de contacto.</p>

<br>

			  <div class="container">

			  <i class="fa fa-user"></i>&nbsp;&nbsp; Podr&aacute;s ingresar solo.&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-group"></i>&nbsp;&nbsp;Es necesario ingresar acompa&ntilde;ado de un adulto.&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-thumbs-up"></i>&nbsp;&nbsp; Sin restricciones de altura maxima.			  </div>

<br>  

	      <div class="table-responsive">          
	      <table class="table table-striped">

	        <thead>

	          <tr bgcolor="green">

	            <th width="5%">&nbsp;</th>

	            <th width="10%"><span style="color:#FFFFFF;">Nombres</span></th>       

	            <th width="5%"><span style="color:#FFFFFF;">Intensidad</span></th>

	            <th width="40%"><span style="color:#FFFFFF;">Estaturas Permitidas</span></th>

	            <th width="40%"><span style="color:#FFFFFF;">Otras Restricciones</span></th>

	          </tr>

	        </thead>

	        <tbody>

	        <? if(count($grid)){foreach ($grid as $key => $value) {

	        	if($value[txt_email2]=="0"){

	        		$ico ='<i class="fa fa-user"></i>';	

	        	}elseif($value[txt_email2]=="1"){

	        		$ico ='<i class="fa fa-users"></i>';

	        	}if($value[txt_email2]=="2"){

	        		$ico ='<i class="fa fa-thumbs-up"></i>';

	        	}

	        	if($value[txt_usuario]=="0"){

	        		$int="Baja";
					$textcolor="#0caa00";
	        	}elseif($value[txt_usuario]=="1"){

	        		$int="Media";
					$textcolor="#f19f00";
	        	}elseif($value[txt_usuario]=="2"){

	        		$int="Alta";
					$textcolor="#d40000";	
	        	}



			?>	          

	          <tr>

	            <td><?=$ico?></td>

	            <td><a href="?mod=view&idf=<?=$value[id_cliente]?>"><span style="color:#ff0000;"><b><?=$value[txt_nombre]?></b></span></a></td>

	            <td><a href="?mod=view&idf=<?=$value[id_cliente]?>"><span style="color:<?=$textcolor?>;"><b><?=$int?></b></span></a></td>

	            <?
                $numcar=strlen($value[txt_proyecto]);
				if($numcar>130){
				$cadena=substr($value[txt_proyecto], 0, 130)."... <span style='color:#589afc'>Ver m&aacute;s</span>"; } else {
				$cadena=$value[txt_proyecto]; }
				?>
	            <td><a href="?mod=view&idf=<?=$value[id_cliente]?>" style="color:#4e4e4e;"><?=$cadena;?></a></td>

	            <td><a href="?mod=view&idf=<?=$value[id_cliente]?>" style="color:#4e4e4e;"><?=substr($value[txt_departamento], 0, 150)."... <span style='color:#589afc'>Ver m&aacute;s</span>";?></a></td>

	          </tr>	          

	          <? }} ?>

	        </tbody>

	      </table>
	      </div>
		<br><br>
	    </div>