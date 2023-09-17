<?php
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");	
	include("clases/cls_emp_foto2.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_emp_administrador.php");
	$cliente= new cls_emp_cliente($_GET['idcl']);
	include("clases/cls_paginador_.php");
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	$idcat=$_GET['idcat'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />


	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});
                        
                        $(".status").on('click', function(){
                            var datacup = $(this).data('id');
                            var estado = $(this).data('status');
                            if(estado == 0){
                                var r = confirm("Desea actualizar el estado del cupon?");
                                if (r == true) {
                                   $.post('controller/prc_status_cupon.php', 
                                        {id:datacup},
                                        function(data){
                                            console.log(data);                                           
                                            if($.trim(data) == 1){
                                                $("#"+datacup).data('status', data);
                                                $("#"+datacup).html("<img src='iconos/si.png' alt='' border=''>");
                                            }else{
                                                $("#"+datacup).html("<img src='iconos/no.png' alt='' border=''>");
                                            }
                                    }); 
                                }else{
                                   
                                }
                            } else {
                                alert("No puede modificar su estado."); 
                            }
                        });


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
<!--<script>
function eliminar(id,img,idcl,idcat)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_foto2.php?op=3&idcl="+idcl+"&id="+id+"&img="+img+"&idcat="+idcat;
	}
}
</script>-->
<style>
.myButton2 {
	-moz-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	box-shadow:inset 0px 1px 0px 0px #fce2c1;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffb357), color-stop(1, #eb8100));
	background:-moz-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-webkit-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-o-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-ms-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:linear-gradient(to bottom, #ffb357 5%, #eb8100 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffb357', endColorstr='#eb8100',GradientType=0);
	background-color:#ffb357;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #db8b00;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:10px 18px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b36e00;
}
.myButton2:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #eb8100), color-stop(1, #ffb357));
	background:-moz-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-webkit-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-o-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-ms-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:linear-gradient(to bottom, #eb8100 5%, #ffb357 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eb8100', endColorstr='#ffb357',GradientType=0);
	background-color:#eb8100;
}
.myButton2:active {
	position:relative;
	top:1px;
}
.myButton4 {
	-moz-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
	background:-moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
	background-color:#fc8d83;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:9px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.myButton4:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
	background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
	background-color:#e4685d;
}
.myButton4:active {
	position:relative;
	top:1px;
}

</style>
</head>

<body>
<div align="center" width="100%">
<br>
<table bgcolor="#FFFFFF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#8f9fb4" colspan="3" width="100%" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="100%">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<?php include("cabeceracliente.php")?>
	<tr>
	<td>

			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td width="100%" height="4"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="5"></td>
				  </tr>
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
					<td height="30"><table width="100%" class="titu_secc"><tr><td align="left">&nbsp;Cupones - <?=strtoupper($cliente->get_txt_nombre())?></td><td align="right"><a href="inf_clientes.php?idcat=<?=$idcat?>" class="myButton4">< REGRESAR</a></td></tr></table></td>
				  </tr>
				  <tr>
					<td height="10" align="right"></td>
				  </tr>
				</table>
					<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					<td width="67" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
					<td width="150" align="center" valign="middle" bgcolor="#949494" class="titus_tablas">VER CUPON</td>
					<td width="464" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">CODIGO CUPON</td>
					<td width="464" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NOMBRE</td>
					<td width="464" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">CORREO</td>
					<td width="211" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO CUPON</div></td>
					<? if($objcat0->getTipo()>=0){?><td width="139" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td><?}?>
					</tr>
					<tr>
					<td colspan="7" height="2"></td>
				    </tr>
					<?php
						$sql="select id_foto from tbl_foto2 where id_cliente='$_GET[idcl]' order by id_foto DESC";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,50,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
					//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$datos= new cls_emp_foto($registro[0]);
									if($color=="#e8e8e8")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#e8e8e8";
									}
					  ?>
					<tr class="bg_fila" valign="middle" bgcolor="<?=$color?>">
					<td height="95" class="texto_02" align="center"><?php echo $contador?></td>
                                        <td align="center" class="texto_02"><a href="../controller/download/<?=$datos->get_int_retoque()?>.pdf" target="_blank"><img src='iconos/ic_inf.png' alt='' border=''></a></td>
					<td align="left" class="texto_02"><strong><?=urldecode($datos->get_int_retoque())?></strong></td>
					                                       
					<td align="left" class="texto_02"><?=urldecode($datos->get_id_categoria())?></td>
					<!--AGREGANDO CORREO 07-02-2019   -->
					 <td align="left" class="texto_02"><?=urldecode($datos->get_txt_email())?></td>
					<?php
                                            if($datos->get_int_stado()==1){
                                                $imgpublicado="<img src='iconos/si.png' height='45' alt='' border=''>";
                                            }else{
                                                $imgpublicado="<img src='iconos/no.png' height='45' alt='' border=''>";
                                            }
					  ?>
                                        <td style="cursor: pointer;" align="left" class="texto_02">
                                        
                                        
                                        <div id="<? if(($objcat0->getTipo()==0) || ($objcat0->getTipo()==1)){?><?=$datos->get_id_foto();?>" data-id="<?=$datos->get_id_foto();?>" data-status="<?=$datos->get_int_stado();?>" class="status" align="center"><?=$imgpublicado?><?}?>
                                        <? if($objcat0->getTipo()==2){?> class="status" align="center"><?=$imgpublicado?><?}?>
                                        
                                        
                                        </div>
                                        
                                        
                                        </td>
					<? if($objcat0->getTipo()>=0){?><td align="left"><div align="center"><a href="javascript:eliminar('<?=$datos->get_id_foto()?>','<?=$foto?>','<?=$_GET['idcl']?>','<?=$idcat?>')"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a></div></td><?}?>
                    <tr>
                    <td colspan="7" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
					</tr>
					<?php
					}
					$contador++;
					}?>
				  	</table>
					<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"></td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
					  
						<td width="205" align="left"></td>
						<td width="465" align="right"><?php
							$param[0]="idcl=".$_GET['idcl'];$css[1]="txt_gris10";$css[2]="txt_gris10";
							$param[1]="";
							$paginador->inc_muestra_paginacion($css,$param,400);
							?>
						</td>
					  </tr>
				  </table>
				  
				  </td>
			  </tr>			
			</table>

	</td>
	</tr>
	<tr>
	<td height="30"></td>
	</tr>
	<tr>
	<td height="2" bgcolor="#3b587a"></td>
	</tr>
	<tr>
	<td height="30" bgcolor="#607b9b">&nbsp;&nbsp;&nbsp;&nbsp;<a href="" target="_blank" class="pie">Granja Villa 2019</a></td>
	</tr>
	</table>
	
  </td>
  <td width="1" bgcolor="#8f9fb4"></td>
  </tr>
  <tr>
  <td colspan="3" width="910" height="1" bgcolor="#8f9fb4"></td>
  </tr>
  
</table>

</div>
</body>
</html>
