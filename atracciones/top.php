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

	<header id="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<div class="container">

			<div class="row">

				<div class="col-lg-10 col-lg-offset-1">					

					<nav class="nav row">

						<div class="col-sm-5">

							<ul class="navigation left-nav" style="border:#ffffff 1px solid; height:40px; padding-top:5px; background-color:green;">

							<!--	<li><a href="https://www.lagranjavilla.com/organizacion.php">Organizaci&oacute;n</a></li>-->

                                <li><a href="https://www.lagranjavilla.com/servicios.html">Servicios</a></li>
                    
                                <li class='current'><a class='current' href="https://www.lagranjavilla.com/atracciones">Atracciones</a></li>
                                <li><a href="https://www.lagranjavilla.com/instalaciones.html">Instalaciones</a></li>

							</ul>

						</div>

						<div class="col-sm-2">

							<h1 class="logo"><a class='current' href="http://www.lagranjavilla.com/"><img src="images/logo.png" alt=""></a></h1>

						</div>

						<div class="col-sm-5">

							<ul class="navigation right-nav" style="border:#ffffff 1px solid; height:40px; padding-top:5px; background-color:green;">

								

                                <li><a href="https://www.lagranjavilla.com/promociones/">Promociones</a></li>
                    	<li><a href="https://sites.google.com/view/mapagv/p%C3%A1gina-principal">Mapa Granja Villa</a></li>
                                <li><a href="https://lagranjavilla.com/contactos.html">Cont&aacute;cto</a></li>					

							</ul>

						</div>

					</nav>

					<div id="mobilemenu">

						<ul>

							<li><a href="https://www.lagranjavilla.com/organizacion.php">Organizaci&oacute;n</a></li>

							<li><a href="https://www.lagranjavilla.com/servicios.html">Servicios</a></li>

							<li class='current'><a class='current' href="https://www.lagranjavilla.com/atracciones.php">Atracciones</a></li>

							<li><a href="https://www.lagranjavilla.com/instalaciones.html">Instalaciones</a></li>

							<li><a href="https://www.lagranjavilla.com/promociones">Promociones</a></li>
                    
                            <li><a href="https://lagranjavilla.com/contactos.html">Cont&aacute;ctenos</a></li>

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
					$sede="CHORRILLOS"; }
					/*if($resultado[0][txt_usuario2]==1){
					$sede="COMAS"; }*/
					?>              
                    <div style="color:#fff; font-size:15px; padding:0px 20px 20px 20px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 300; letter-spacing: -0.04em;">Sede: <?=$sede;?></div>
				<? }else{ ?>
                
                
			<div class="col-lg-7" style="width:100%; padding-bottom:40px;">
			  <div style="color:#fff; font-size:24px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 600; letter-spacing: -0.04em;"><img src="images/ic_ruler.png" />&nbsp;&nbsp;Introduce tu altura: </div>
                    <div style="color:#fff; font-size:14px; padding-bottom:15px; vertical-align:middle; font-family: Montserrat, sans-serif; font-weight: 50; letter-spacing: -0.04em;">Por motivos de seguridad, dependiendo de los niveles de sensaci&oacute;n, tama&ntilde;o y sujeciones, el acceso a algunas atracciones est&aacute; restringido en funci&oacute;n de la altura del usuario.</div>
                    
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

								<option value="00" <? if(isset($_POST[cm]) && $_POST[cm]=='00'){?>selected<? } ?> >00</option>
                                <option value="01" <? if(isset($_POST[cm]) && $_POST[cm]=='01'){?>selected<? } ?> >01</option>
                                <option value="02" <? if(isset($_POST[cm]) && $_POST[cm]=='02'){?>selected<? } ?> >02</option>
                                <option value="03" <? if(isset($_POST[cm]) && $_POST[cm]=='03'){?>selected<? } ?> >03</option>
                                <option value="04" <? if(isset($_POST[cm]) && $_POST[cm]=='04'){?>selected<? } ?> >04</option>
                                <option value="05" <? if(isset($_POST[cm]) && $_POST[cm]=='05'){?>selected<? } ?> >05</option>
                                <option value="06" <? if(isset($_POST[cm]) && $_POST[cm]=='06'){?>selected<? } ?> >06</option>
                                <option value="07" <? if(isset($_POST[cm]) && $_POST[cm]=='07'){?>selected<? } ?> >07</option>
                                <option value="08" <? if(isset($_POST[cm]) && $_POST[cm]=='08'){?>selected<? } ?> >08</option>
                                <option value="09" <? if(isset($_POST[cm]) && $_POST[cm]=='09'){?>selected<? } ?> >09</option>
                                <option value="10" <? if(isset($_POST[cm]) && $_POST[cm]==10){?>selected<? } ?> >10</option>
                                <option value="11" <? if(isset($_POST[cm]) && $_POST[cm]==11){?>selected<? } ?> >11</option>
                                <option value="12" <? if(isset($_POST[cm]) && $_POST[cm]==12){?>selected<? } ?> >12</option>
                                <option value="13" <? if(isset($_POST[cm]) && $_POST[cm]==13){?>selected<? } ?> >13</option>
                                <option value="14" <? if(isset($_POST[cm]) && $_POST[cm]==14){?>selected<? } ?> >14</option>
                                <option value="15" <? if(isset($_POST[cm]) && $_POST[cm]==15){?>selected<? } ?> >15</option>
                                <option value="16" <? if(isset($_POST[cm]) && $_POST[cm]==16){?>selected<? } ?> >16</option>
                                <option value="17" <? if(isset($_POST[cm]) && $_POST[cm]==17){?>selected<? } ?> >17</option>
                                <option value="18" <? if(isset($_POST[cm]) && $_POST[cm]==18){?>selected<? } ?> >18</option>
                                <option value="19" <? if(isset($_POST[cm]) && $_POST[cm]==19){?>selected<? } ?> >19</option>
                                <option value="20" <? if(isset($_POST[cm]) && $_POST[cm]==20){?>selected<? } ?> >20</option>
                                <option value="21" <? if(isset($_POST[cm]) && $_POST[cm]==21){?>selected<? } ?> >21</option>
                                <option value="22" <? if(isset($_POST[cm]) && $_POST[cm]==22){?>selected<? } ?> >22</option>
                                <option value="23" <? if(isset($_POST[cm]) && $_POST[cm]==23){?>selected<? } ?> >23</option>
                                <option value="24" <? if(isset($_POST[cm]) && $_POST[cm]==24){?>selected<? } ?> >24</option>
                                <option value="25" <? if(isset($_POST[cm]) && $_POST[cm]==25){?>selected<? } ?> >25</option>
                                <option value="26" <? if(isset($_POST[cm]) && $_POST[cm]==26){?>selected<? } ?> >26</option>
                                <option value="27" <? if(isset($_POST[cm]) && $_POST[cm]==27){?>selected<? } ?> >27</option>
                                <option value="28" <? if(isset($_POST[cm]) && $_POST[cm]==28){?>selected<? } ?> >28</option>
                                <option value="29" <? if(isset($_POST[cm]) && $_POST[cm]==29){?>selected<? } ?> >29</option>
                                <option value="30" <? if(isset($_POST[cm]) && $_POST[cm]==30){?>selected<? } ?> >30</option>
                                <option value="31" <? if(isset($_POST[cm]) && $_POST[cm]==31){?>selected<? } ?> >31</option>
                                <option value="32" <? if(isset($_POST[cm]) && $_POST[cm]==32){?>selected<? } ?> >32</option>
                                <option value="33" <? if(isset($_POST[cm]) && $_POST[cm]==33){?>selected<? } ?> >33</option>
                                <option value="34" <? if(isset($_POST[cm]) && $_POST[cm]==34){?>selected<? } ?> >34</option>
                                <option value="35" <? if(isset($_POST[cm]) && $_POST[cm]==35){?>selected<? } ?> >35</option>
                                <option value="36" <? if(isset($_POST[cm]) && $_POST[cm]==36){?>selected<? } ?> >36</option>
                                <option value="37" <? if(isset($_POST[cm]) && $_POST[cm]==37){?>selected<? } ?> >37</option>
                                <option value="38" <? if(isset($_POST[cm]) && $_POST[cm]==38){?>selected<? } ?> >38</option>
                                <option value="39" <? if(isset($_POST[cm]) && $_POST[cm]==39){?>selected<? } ?> >39</option>
                                <option value="40" <? if(isset($_POST[cm]) && $_POST[cm]==40){?>selected<? } ?> >40</option>
                                <option value="41" <? if(isset($_POST[cm]) && $_POST[cm]==41){?>selected<? } ?> >41</option>
                                <option value="42" <? if(isset($_POST[cm]) && $_POST[cm]==42){?>selected<? } ?> >42</option>
                                <option value="43" <? if(isset($_POST[cm]) && $_POST[cm]==43){?>selected<? } ?> >43</option>
                                <option value="44" <? if(isset($_POST[cm]) && $_POST[cm]==44){?>selected<? } ?> >44</option>
                                <option value="45" <? if(isset($_POST[cm]) && $_POST[cm]==45){?>selected<? } ?> >45</option>
                                <option value="46" <? if(isset($_POST[cm]) && $_POST[cm]==46){?>selected<? } ?> >46</option>
                                <option value="47" <? if(isset($_POST[cm]) && $_POST[cm]==47){?>selected<? } ?> >47</option>
                                <option value="48" <? if(isset($_POST[cm]) && $_POST[cm]==48){?>selected<? } ?> >48</option>
                                <option value="49" <? if(isset($_POST[cm]) && $_POST[cm]==49){?>selected<? } ?> >49</option>
                                <option value="50" <? if(isset($_POST[cm]) && $_POST[cm]==50){?>selected<? } ?> >50</option>
                                <option value="51" <? if(isset($_POST[cm]) && $_POST[cm]==51){?>selected<? } ?> >51</option>
                                <option value="52" <? if(isset($_POST[cm]) && $_POST[cm]==52){?>selected<? } ?> >52</option>
                                <option value="53" <? if(isset($_POST[cm]) && $_POST[cm]==53){?>selected<? } ?> >53</option>
                                <option value="54" <? if(isset($_POST[cm]) && $_POST[cm]==54){?>selected<? } ?> >54</option>
                                <option value="55" <? if(isset($_POST[cm]) && $_POST[cm]==55){?>selected<? } ?> >55</option>
                                <option value="56" <? if(isset($_POST[cm]) && $_POST[cm]==56){?>selected<? } ?> >56</option>
                                <option value="57" <? if(isset($_POST[cm]) && $_POST[cm]==57){?>selected<? } ?> >57</option>
                                <option value="58" <? if(isset($_POST[cm]) && $_POST[cm]==58){?>selected<? } ?> >58</option>
                                <option value="59" <? if(isset($_POST[cm]) && $_POST[cm]==59){?>selected<? } ?> >59</option>
                                <option value="60" <? if(isset($_POST[cm]) && $_POST[cm]==60){?>selected<? } ?> >60</option>
                                <option value="61" <? if(isset($_POST[cm]) && $_POST[cm]==61){?>selected<? } ?> >61</option>
                                <option value="62" <? if(isset($_POST[cm]) && $_POST[cm]==62){?>selected<? } ?> >62</option>
                                <option value="63" <? if(isset($_POST[cm]) && $_POST[cm]==63){?>selected<? } ?> >63</option>
                                <option value="64" <? if(isset($_POST[cm]) && $_POST[cm]==64){?>selected<? } ?> >64</option>
                                <option value="65" <? if(isset($_POST[cm]) && $_POST[cm]==65){?>selected<? } ?> >65</option>
                                <option value="66" <? if(isset($_POST[cm]) && $_POST[cm]==66){?>selected<? } ?> >66</option>
                                <option value="67" <? if(isset($_POST[cm]) && $_POST[cm]==67){?>selected<? } ?> >67</option>
                                <option value="68" <? if(isset($_POST[cm]) && $_POST[cm]==68){?>selected<? } ?> >68</option>
                                <option value="69" <? if(isset($_POST[cm]) && $_POST[cm]==69){?>selected<? } ?> >69</option>
                                <option value="70" <? if(isset($_POST[cm]) && $_POST[cm]==70){?>selected<? } ?> >70</option>
                                <option value="71" <? if(isset($_POST[cm]) && $_POST[cm]==71){?>selected<? } ?> >71</option>
                                <option value="72" <? if(isset($_POST[cm]) && $_POST[cm]==72){?>selected<? } ?> >72</option>
                                <option value="73" <? if(isset($_POST[cm]) && $_POST[cm]==73){?>selected<? } ?> >73</option>
                                <option value="74" <? if(isset($_POST[cm]) && $_POST[cm]==74){?>selected<? } ?> >74</option>
                                <option value="75" <? if(isset($_POST[cm]) && $_POST[cm]==75){?>selected<? } ?> >75</option>
                                <option value="76" <? if(isset($_POST[cm]) && $_POST[cm]==76){?>selected<? } ?> >76</option>
                                <option value="77" <? if(isset($_POST[cm]) && $_POST[cm]==77){?>selected<? } ?> >77</option>
                                <option value="78" <? if(isset($_POST[cm]) && $_POST[cm]==78){?>selected<? } ?> >78</option>
                                <option value="79" <? if(isset($_POST[cm]) && $_POST[cm]==79){?>selected<? } ?> >79</option>
                                <option value="80" <? if(isset($_POST[cm]) && $_POST[cm]==80){?>selected<? } ?> >80</option>
                                <option value="81" <? if(isset($_POST[cm]) && $_POST[cm]==81){?>selected<? } ?> >81</option>
                                <option value="82" <? if(isset($_POST[cm]) && $_POST[cm]==82){?>selected<? } ?> >82</option>
                                <option value="83" <? if(isset($_POST[cm]) && $_POST[cm]==83){?>selected<? } ?> >83</option>
                                <option value="84" <? if(isset($_POST[cm]) && $_POST[cm]==84){?>selected<? } ?> >84</option>
                                <option value="85" <? if(isset($_POST[cm]) && $_POST[cm]==85){?>selected<? } ?> >85</option>
                                <option value="86" <? if(isset($_POST[cm]) && $_POST[cm]==86){?>selected<? } ?> >86</option>
                                <option value="87" <? if(isset($_POST[cm]) && $_POST[cm]==87){?>selected<? } ?> >87</option>
                                <option value="88" <? if(isset($_POST[cm]) && $_POST[cm]==88){?>selected<? } ?> >88</option>
                                <option value="89" <? if(isset($_POST[cm]) && $_POST[cm]==89){?>selected<? } ?> >89</option>
                                <option value="90" <? if(isset($_POST[cm]) && $_POST[cm]==90){?>selected<? } ?> >90</option>
                                <option value="91" <? if(isset($_POST[cm]) && $_POST[cm]==91){?>selected<? } ?> >91</option>
                                <option value="92" <? if(isset($_POST[cm]) && $_POST[cm]==92){?>selected<? } ?> >92</option>
                                <option value="93" <? if(isset($_POST[cm]) && $_POST[cm]==93){?>selected<? } ?> >93</option>
                                <option value="94" <? if(isset($_POST[cm]) && $_POST[cm]==94){?>selected<? } ?> >94</option>
                                <option value="95" <? if(isset($_POST[cm]) && $_POST[cm]==95){?>selected<? } ?> >95</option>
                                <option value="96" <? if(isset($_POST[cm]) && $_POST[cm]==96){?>selected<? } ?> >96</option>
                                <option value="97" <? if(isset($_POST[cm]) && $_POST[cm]==97){?>selected<? } ?> >97</option>
                                <option value="98" <? if(isset($_POST[cm]) && $_POST[cm]==98){?>selected<? } ?> >98</option>
                                <option value="99" <? if(isset($_POST[cm]) && $_POST[cm]==99){?>selected<? } ?> >99</option>						

						</select>

					  </div>
						
                        <div style="display: none;"><span style="color:#fff; font-size:15px; font-family: Montserrat, sans-serif; font-weight: 300; letter-spacing: -0.04em;">Sede: </span><br></div>
					  <div class="departure group" style="width:10%; display: none;">
							
						<select name="ss" id="ss" style="height:35px; width:100%; color:#333333;">

						  <option value="0" <? if($_POST[ss]=="0"){?>selected<?}?>>Chorrillos</option>

						  <!--<option value="1" <? if($_POST[ss]=="1"){?>selected<?}?>>Comas</option>-->

						</select>

					  </div>
					<!--<h2 class="title" style="color:#fff">Quieres saber en qu&eacute; atracciones puedes subir ?</h2>

					<p>Por motivos de seguridad, dependiendo de los niveles de sensaci&oacute;n, tama&ntilde;o y sujeciones, el acceso a algunas atracciones est&aacute; restringido en funci&oacute;n de la altura del usuario.</p>
					-->

					
                        
					  <div class="bookbtn group">

							<button type="submit" style="height:35px;">Consultar</button>

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