<?include("inc.var.php")?>
<?if(!isset($_SESSION["session_socio"])){header("location:index.php");}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>La Granja Villa - Promociones</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script src="function.js" type="text/javascript"></script>
<style type="text/css">
<!--
#dhtmltooltip{
font-family: "Verdana";
font-size: 12px;
font-weight: normal;
color: #FFFFFF;
text-align: center;
position: absolute;
width: 150px;
border: 2px solid #FFFFFF;
padding: 7px;
background-color: #FFA81E;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}
.Estilo3 {
	/*font-size: 13px;*/
	font-size: 15px;
	font-weight: bold;
	color: #B12718;
}
.Estilo5 {font-size: 11px}
-->
</style>
<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=520,height=240");
   location.href="cupones.php";
} 
</script>
</head>

<body>
<div id="dhtmltooltip"></div>

<script type="text/javascript">
var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="bg_cab" align="center">

    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="320" valign="top">
    	<table border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td height="16"></td>
        </tr>
        <tr>
        <td width="197" height="223" class="logo_granja"></td>
        </tr>
        <tr>
        <td height="16"></td>
        </tr>
        </table>  
        
        <? include("inc_datos.php");?>
          
        
    </td>
    <td width="20"></td>
    <td width="553" valign="top">
    	<table border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td height="30"></td>
        </tr>
		<tr>
        <td><img src="iconos/titu_cupones.gif" border="0" alt="" /></td>
        </tr>
        <tr>
        <td bgcolor="#EDE0C4" background="iconos/bg_cuponera.jpg" height="465">
        	<table width="553" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="5"></td>
                </tr>
                <tr>
                <td colspan="3" class="txt_verdeclaro14" align="center"><!-- <span class="Estilo5">Imprime los cupones y ven a disfrutar de este gran beneficio. (Solo 1 impresi&oacute;n por cup&oacute;n)</span> --><span class="Estilo3"> MUY PRONTO NUEVAS PROMOCIONES</span></td>
                </tr>
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
                
                <div id="1" style="border:0px solid;overflow:auto;width:484px; height:415px">
				<br>
                <? 
$sql="select * from tbl_fotocupon where id_opc='$_SESSION[id_opc]' and int_stado='1'";
				$rsl=mysql_query($sql)or die(mysql_error());
				while($rs=mysql_fetch_array($rsl)){
					$fill=getCountReg("tbl_cuponsel","where id_fotocupon=$rs[id_fotocupon] and id_usuarios=$_SESSION[session_socio]");
					$fto=explode(".",$rs["txt_foto"]);$img=$fto[0]."_t.".$fto[1];
					if($fill==0){?>                    
               <a href="javascript:ventanaSecundaria('pop_cupon.php?idcp=<?=$rs["id_fotocupon"]?>')"> <img src="<?=UPLOAD_FOTOS_PUB.$img?>" style="background-image:url(iconos/bg_print_on.gif); padding: 10px 13px 47px 10px;" onMouseover="ddrivetip('<?=$rs["txt_titulo"]?>')";
 onMouseout="hideddrivetip()" hspace="12" vspace="10" width="185" height="85" alt="" border="0"></a>
			   
			   <? }else{ ?>
			   <a href="javascript:alert('El Cup&oacute;n ya fue impreso anteriormente, por favor seleccione otro.')"> <img src="<?=UPLOAD_FOTOS_PUB.$img?>" style="background-image:url(iconos/bg_print_off.gif); padding: 10px 13px 47px 10px;" onMouseover="ddrivetip('<?=$rs["txt_titulo"]?>')";
 onMouseout="hideddrivetip()" hspace="12" vspace="10" width="185" height="85" alt="" border="0"></a>
			   <? }}?>
               
<!--               <a href="proc_cuponsel.php?idcp=<?=$rs["id_fotocupon"]?>">-->
                <!--<table width="462" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td width="220" height="160" valign="top" align="left" class="bg_cupon">
                	<table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="2" height="9"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><img src="iconos/cupon_mini.gif" width="185" height="85" alt="" border="0"></td>
                    </tr>
                    <tr>
                    <td colspan="2" height="16"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><a href="javascript:ventanaSecundaria('pop_cupon.php')""><img src="iconos/bt_print.gif" width="150" height="28" hspace="16" alt="Imprimir Cup&oacute;n" border="0"></a></td>
                    </tr>
                    </table>
                </td>
                <td width="220" height="160" valign="top" align="left" class="bg_cupon">
                	<table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="2" height="9"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><img src="iconos/cupon_mini.gif" width="185" height="85" alt="" border="0"></td>
                    </tr>
                    <tr>
                    <td colspan="2" height="16"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><a href="javascript:ventanaSecundaria('pop_cupon.php')""><img src="iconos/bt_print.gif" width="150" height="28" hspace="16" alt="Imprimir Cup&oacute;n" border="0"></a></td>
                    </tr>
                    </table>
                </td>
                </tr>
                
                <tr>
                <td width="220" height="160" valign="top" align="left" class="bg_cupon">
                	<table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="2" height="9"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><img src="iconos/cupon_mini.gif" width="185" height="85" alt="" border="0"></td>
                    </tr>
                    <tr>
                    <td colspan="2" height="16"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><a href="javascript:ventanaSecundaria('pop_cupon.php')""><img src="iconos/bt_print.gif" width="150" height="28" hspace="16" alt="Imprimir Cup&oacute;n" border="0"></a></td>
                    </tr>
                    </table>
                </td>
                <td width="220" height="160" valign="top" align="left" class="bg_cupon">
                	<table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="2" height="9"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><img src="iconos/cupon_mini.gif" width="185" height="85" alt="" border="0"></td>
                    </tr>
                    <tr>
                    <td colspan="2" height="16"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><a href="javascript:ventanaSecundaria('pop_cupon.php')""><img src="iconos/bt_print.gif" width="150" height="28" hspace="16" alt="Imprimir Cup&oacute;n" border="0"></a></td>
                    </tr>
                    </table>
                </td>
                </tr>
                
                <tr>
                <td width="220" height="160" valign="top" align="left" class="bg_cupon">
                	<table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="2" height="9"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><img src="iconos/cupon_mini.gif" width="185" height="85" alt="" border="0"></td>
                    </tr>
                    <tr>
                    <td colspan="2" height="16"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><a href="javascript:ventanaSecundaria('pop_cupon.php')""><img src="iconos/bt_print.gif" width="150" height="28" hspace="16" alt="Imprimir Cup&oacute;n" border="0"></a></td>
                    </tr>
                    </table>
                </td>
                <td width="220" height="160" valign="top" align="left" class="bg_cupon">
                	<table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="2" height="9"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><img src="iconos/cupon_mini.gif" width="185" height="85" alt="" border="0"></td>
                    </tr>
                    <tr>
                    <td colspan="2" height="16"></td>
                    </tr>
                	<tr>
                    <td width="12"></td>
                    <td><a href="javascript:ventanaSecundaria('pop_cupon.php')""><img src="iconos/bt_print.gif" width="150" height="28" hspace="16" alt="Imprimir Cup&oacute;n" border="0"></a></td>
                    </tr>
                    </table>
                </td>
                </tr>

                </table>-->
                </div>
                
			</td>
            <td width="37"></td>
            </tr>
            </table>
        </td>
        </tr>
        <tr>
        <td background="iconos/titu_registro_abajo.gif" height="30" class="txt_blanco10">* Revisar su impresora antes de imprimir, si el cup&oacute;n carece de fecha de vencimiento o no esta impreso en forma completa, no tendr&aacute; validez.</td>
        </tr>
        </table>
    </td>
    </tr>
    </table>

</td>
</tr>
</table>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3340021-9");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
