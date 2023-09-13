<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p><?=$resultado[0][txt_direccion]?></p>
			<br>
                <div style="background-color:#FF9900; border-radius: 8px;">&nbsp;&nbsp;<img src="images/ic_regla.png" style="padding-top:3px; padding-bottom:3px;" />&nbsp;&nbsp;&nbsp;<span style="color:#FFFFFF; font-size:20px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 700; letter-spacing: -0.04em;"><strong>Estaturas Permitidas</strong></span></div>

			<p>
			<div><?=nl2br($resultado[0][txt_proyecto])?></div>
            <?
            if($resultado[0][txt_usuario]=="0"){
        		$int="Baja";
				$textcolor="#0caa00";
        	}elseif($resultado[0][txt_usuario]=="1"){
        		$int="Media";
				$textcolor="#f19f00";
        	}elseif($resultado[0][txt_usuario]=="2"){
        		$int="Alta";
				$textcolor="#d40000";
        	}
			?>
            <div><i class='fa fa-heartbeat'></i>&nbsp;&nbsp;<b><span style="color:<?=$textcolor?>;">Intensidad <?=$int?></span></b></div>
            <?
            if($resultado[0][txt_email2]=="0"){
        		$ico ="<i class='fa fa-user'></i>";	
				$textmontar="Podr&aacute;s ingresar solo.";
        	}elseif($resultado[0][txt_email2]=="1"){
        		$ico ="<i class='fa fa-users'></i>";
				$textmontar="Es necesario ingresar acompa&ntilde;ado de un adulto.";
        	}if($resultado[0][txt_email2]=="2"){
        		$ico ="<i class='fa fa-thumbs-up'></i>";
				$textmontar="Sin restricciones de altura maxima.";
        	}
			?>
            <div><?=$ico?>&nbsp;&nbsp;<b><?=$textmontar?></span></b></div>
			</p>
            
            <br>
			<div style="background-color:#f8720d; border-radius: 8px;">&nbsp;&nbsp;<img src="images/ic_atencion.png" style="padding-top:3px; padding-bottom:3px;" />&nbsp;&nbsp;&nbsp;<span style="color:#FFFFFF; font-size:20px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 700; letter-spacing: -0.04em;"><strong>Restricciones Generales</strong></span></div>

			<div style="padding-top:15px;"><p><?=nl2br($resultado[0][txt_departamento])?></p></div>

			<br>

			<br>

		</div>

		<div class="col-md-6">

			<div class="fotorama" data-width="700" data-ratio="700/467" data-max-width="100%" data-nav="thumbs" data-allowfullscreen="native" >

			<?

			$arrImg = conn_array("select * from tbl_foto where id_cliente='{$_GET[idf]}' order by id_foto DESC");

			foreach ($arrImg as $key => $value) {?>

			  <img src="<?=UPLOAD_FOTOS_PUB.$value[txt_foto]?>">



			<?

			}

			$arrVdo = conn_array("select * from tbl_video where id_cliente='{$_GET[idf]}' order by id_video DESC");		

			foreach ($arrVdo as $key => $value) {

				$ulrPuro=explode("&",$value[txt_url]);

				$idYoutube=explode("=",$ulrPuro[0]);

			?>

			<a href="<?=$value[txt_url]?>">

				<img src="http://img.youtube.com/vi/<?=$idYoutube[1]?>/maxresdefault.jpg">

			</a>

			<? }?>

			</div>

			<br>

			<br>
            
            <div>
            <?
            if($_GET[idf]==9){
			$img_small="images/banner_det0.jpg";
			$img_big="images/informacion0.jpg";
			} else {
			$img_small="images/banner_det.jpg";
			$img_big="images/informacion.jpg";
			}
			?>
            <a href="<?=$img_big;?>" target="_blank"><img src="<?=$img_small;?>" alt="" /></a></div>
            <br><br>

		</div>

	</div>

</div>



