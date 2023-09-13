<?php

include("modelo.php");
session_start();
include("inc.var.php");
if($_GET['op']=="cerrar"){
	session_unregister("session_socio");
	session_unregister("session_nomsocio");
	session_unregister("error");
	header("location:index.php");	
}else{
	/*$socio = new cls_emp_socio();
	$socio->set_txt_usuario($_POST['txt_usuario']);
	$socio->set_txt_pws($_POST['txt_psw']);
	$id = $socio->valida_socio();
	$socio->set_id_socio($id);*/
//	$sql="select cClieCode from CLIENTE as c, TARJETA as t where c.cClieCode=t.cClieCode and nTarjNumb='".$_POST['txt_usuario']."' "
//		    ." and txt_psw='".$_POST['txt_psw']."' ";
	$fnac=$_POST['txt_psw3']."-".$_POST['txt_psw2']."-".$_POST['txt_psw1'];
	$usuario = $_POST['txt_usuario'];
	$local = $_POST['local'];
	//$sql="select c.ccliecode,c.scliename,c.sclieapel,c.sClieMail,c.nPuntCant 
		//from CLIENTE as c, TARJETA as t where c.ccliecode=t.ccliecode and t.ntarjnumb='".$_POST['txt_usuario']."'
		//and c.dnacmdate='$fnac' and c.idlocal='".$_POST['local']."'";
	$sql="SELECT c.ccliecode,c.scliename,t.ntarjnumb,c.sclieapel,c.scliemail,c.nPuntCant,c.charclientedni,t.dcadudate FROM CLIENTE as c, TARJETA as t WHERE c.ccliecode=t.ccliecode AND t.ntarjnumb='$usuario' AND c.dnacmdate='$fnac'";

	$rsl=mysqli_query($database,$sql) or die(mysqli_error($database));
	$rs=mysqli_fetch_array($rsl);
	$id=$rs['ccliecode'];
	$email=$rs['scliemail'];
	$tarjeta=$rs['ntarjnumb'];
	$nombre=$rs['scliename'];
	$apellido=$rs['sclieapel'];
	$documento=$rs['charclientedni'];
	$fcaducidad=$rs['dcadudate'];


		if($id){
			$_SESSION['session_socio']=$id;
			$_SESSION['session_sociofnac']=$fnac;
			$_SESSION['session_tarjeta']=$tarjeta;
			$_SESSION['session_name']=$nombre;
			$_SESSION['session_surname']=$apellido;
			$_SESSION['session_documento']=$documento;
			$_SESSION['session_fcaducidad']=$fcaducidad;
			
			//$_SESSION['session_socioidlocal']=$_POST['local'];
			/*$sql="select scliename,sclieapel from CLIENTE where ccliecode=".$id." order by ccliecode";
			$rsl=mysql_query($sql)or die(mysql_error());
			$rs=mysql_fetch_array($rsl);*/
			//$fila = conn_consulta($sql);
			$_SESSION['session_nomsocio']=$rs['scliename']." ".$rs['sclieapel'];
			$_SESSION['session_email']=$email;
			//$_SESSION['session_sociopuntos']=$rs['nPuntCant'];
			$_SESSION['error']=0;
			

		}else{
			$_SESSION['error']=1;
			$_SESSION['msg']="Sus datos son incorrectos";
			header("location:msg.php.php?msg=1&page=".$_SERVER['HTTP_REFERER']);

		}	
}
if(isset($_SESSION['session_socio'])){
	header("location:socios.php");
}else{
	//$_SESSION['msg']="Sus datos son incorrectos";
	//header("location:msg.php.php?msg=1&page=".$_SERVER['HTTP_REFERER']);
	header("location:".$_SERVER['HTTP_REFERER']);
}

?>