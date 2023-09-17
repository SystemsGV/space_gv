<?

	$sql="select * from tbl_galeria order by id_galeria desc";

	$resultado=conn_array ($sql);

	//var_dump($resultado);					

?>

<div id="mobile-bar">

	<div class="col-xs-4">

		<a class="menu-trigger" href="#mobilemenu"><i class="fa fa-bars fa-2x"></i></a>

	</div>

	<div class="col-xs-4">

		<h1 class="mob-title">INICIO</h1>

	</div>

	<div class="col-xs-4" style="margin-top:-10px">

		<div class="pull-right"><img src="images/logo-mob.png"></div>

	</div>	

</div>



<div id="page">

	<header id="header"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

		<div class="container">

			<div class="row">

				<div class="col-lg-10 col-lg-offset-1">					

					<nav class="nav row">

						<div class="col-sm-5">

							<ul class="navigation left-nav" style="border:#ffffff 1px solid; height:40px; padding-top:5px; background-color:green;">

							<!--<li><a href="http://www.lagranjavilla.com/organizacion.php">Organizaci&oacute;n</a></li>-->

                                <li><a href="http://www.lagranjavilla.com/servicios.php">Servicios</a></li>
                    
                                <li class='current'><a class='current' href="http://www.lagranjavilla.com/atracciones/">Atracciones</a></li>

							</ul>

						</div>

						<div class="col-sm-2">

							<h1 class="logo"><a class='current' href="index.html"><img src="images/logo.png" alt=""></a></h1>

						</div>

						<div class="col-sm-5">

							<ul class="navigation right-nav" style="border:#ffffff 1px solid; height:40px; padding-top:5px; background-color:green;">

								<li><a href="http://www.lagranjavilla.com/instalaciones.php">Instalaciones</a></li>

                                <li><a href="http://www.lagranjavilla.com/promociones/">Promociones</a></li>
                    
                                <li><a href="http://www.lagranjavilla.com/contactenos.php">Cont&aacute;cto</a></li>					

							</ul>

						</div>

					</nav>

					<div id="mobilemenu">

						<ul>

							<li><a href="http://www.lagranjavilla.com/organizacion.php">Organizaci&oacute;n</a></li>

							<li><a href="http://www.lagranjavilla.com/servicios.php">Servicios</a></li>

							<li class='current'><a class='current' href="http://www.lagranjavilla.com/atracciones/">Atracciones</a></li>

							<li><a href="http://www.lagranjavilla.com/instalaciones.php">Instalaciones</a></li>

							<li><a href="http://www.lagranjavilla.com/promociones/">Promociones</a></li>
                    
                            <li><a href="http://www.lagranjavilla.com/contactenos.php">Cont&aacute;ctenos</a></li>

						</ul>

					</div>

				</div> <!-- main container -->

			</div>

		</div>

	</header>



	<div id="slider" class="flexslider loading">

		<ul class="slides">

			<?

			if($mod=="view" && isset($_GET[idf])){			

			$arrBan=conn_array("select * from tbl_cliente where id_cliente='{$_GET[idf]}'");

			$foto=UPLOAD_FOTOS_PUB.$arrBan[0][txt_email];	

			?>			

			<li style="background: url('<?=$foto?>') no-repeat top center"></li>

			<? }else{ ?>

			<? foreach ($resultado as $key => $value) {				

				$foto=UPLOAD_GALERIA_PUB.$value[txt_foto];



				?>

				<li style="background: url('<?=$foto?>') no-repeat top center"></li>	

			<? }}?>			

		</ul>

	</div> <!-- #slider -->



	<div class="booking-wrap"  style="background:green">

		<div class="container" style="background:green">

		  <div class="row"  style="background:green">
				<? if($mod=="view"){
					$sql="select * from tbl_cliente where id_cliente='{$_GET[idf]}'";
					$resultado=conn_array($sql);
					?>
					<div class="title" style="color:#fff; padding:5px 20px 0px 20px; font-size:30px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 700; letter-spacing: -0.04em;"><?=$resultado[0][txt_nombre]?></div>
                    <?
                    if($resultado[0][txt_usuario2]==0){
					$sede="GRANJA SUR"; }
					if($resultado[0][txt_usuario2]==1){
					$sede="GRANJA NORTE"; }
					?>              
                    <div style="color:#fff; font-size:15px; padding:0px 20px 20px 20px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 300; letter-spacing: -0.04em;">Sede: <?=$sede;?></div>
				<? }else{ ?>
                
                
			<div class="col-lg-7" style="width:100%; padding-bottom:40px;">
			  <div style="color:#fff; font-size:24px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 600; letter-spacing: -0.04em;"><img src="images/ic_ruler.png" />&nbsp;&nbsp;Introduce tu altura: </div>
                    <div style="color:#fff; font-size:14px; padding-bottom:15px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 50; letter-spacing: -0.04em;">Por motivos de seguridad, dependiendo de los niveles de sensación, tamaño y sujeciones, el acceso a algunas atracciones está restringido en función de la altura del usuario.</div>
                    
					<form class="b-form group" method="post" action="?mod=list">
						
                        <div><span style="color:#fff; font-size:15px; font-family: Montserrat, sans-serif; font-weight: 300; letter-spacing: -0.04em;">Metros: </span><br></div>
					  <div class="departure group" style="width:10%;">
							
						<select name="mm" id="mm" style="height:35px; width:100%; color:#333333;">

								<option value="0" <? if($_POST[mm]=="0"){?>selected<?}?>>0</option>

								<option value="1" <? if($_POST[mm]=="1"){?>selected<?}?>>1</option>

								<option value="2" <? if($_POST[mm]=="2"){?>selected<?}?>>2</option>			

						</select>

					  </div>
						
                        
                        <div><span style="color:#fff; font-size:15px; font-family: Montserrat, sans-serif; font-weight: 300; letter-spacing: -0.04em;">Cent&iacute;metros: </span><br></div>
					  <div class="departure group" style="width:10%;">

						<select name="cm" id="cm" style="height:35px; width:100%; color:#333333;">


								<? for ($i=0; $i <= 99; $i++) {?>

								<option value="<?=$i?>"  <? if(isset($_POST[cm]) && $_POST[cm]==$i){?>selected<?}?> ><?=$i?></option>

								<? }?>								

						</select>

					  </div>
						
                        <div><span style="color:#fff; font-size:15px; font-family: Montserrat, sans-serif; font-weight: 300; letter-spacing: -0.04em;">Sede: </span><br></div>
					  <div class="departure group" style="width:10%;">
							
						<select name="ss" id="ss" style="height:35px; width:100%; color:#333333;">

						  <option value="0" <? if($_POST[ss]=="0"){?>selected<?}?>>Chorrillos</option>

						  <option value="1" <? if($_POST[ss]=="1"){?>selected<?}?>>Comas</option>
                          
                          <option value="2" <? if($_POST[ss]=="2"){?>selected<?}?>>Ambas Sedes</option>	

						</select>

					  </div>
					<!--<h2 class="title" style="color:#fff">Quieres saber en qu&eacute; atracciones puedes subir ?</h2>

					<p>Por motivos de seguridad, dependiendo de los niveles de sensaci&oacute;n, tama&ntilde;o y sujeciones, el acceso a algunas atracciones est&aacute; restringido en funci&oacute;n de la altura del usuario.</p>
					-->

					
                        
					  <div class="bookbtn group">

							<button type="submit" style="height:35px;">Consultar</button>

							<!--<a href="prc.php?ajax=true&amp;width=400&amp;height=160" rel="prettyPhoto[ajax]">Consultar</a>-->

					  </div>

					</form>
			</div>	
				<style>
				.booking-wrap {
			    	position:relative;
				}    
				.booking-wrap:before {
			        /*position:absolute;
			        font-family: FontAwesome;
			        font-size: 60px;
			        top:20px;
			        right:50px;
			        content: "\f0d0"; <--- this is your text. You can also use UTF-8 character codes as I do here*/
			    }
				</style>
			    <span class="row" style="background:green">
			    <? }?>
		    </span></div>

		</div>
	</div>

	<style>
	.dk {
		border:2px solid #fff;
		padding: 8px;
		color: #fff;
		background: transparent;
		min-width: 100px;		
    	-webkit-appearance: none;		
	}
	select.dk option {
    margin:40px;
    background: rgba(239,239,239,0.2);
    color:#9E9E9E;
    text-shadow:0 1px 0 rgba(0,0,0,0.4);
	}
	select.inpSelect {
		  //Remove original arrows
		  -webkit-appearance: none; 
		  //Use png at assets/selectArrow.png for the arrow on the right
		  //Set the background color to a BadAss Green color 
		  background: url(assets/selectArrow.png) no-repeat right #BADA55;
		}
	</style>