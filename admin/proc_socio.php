<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_socio.php");

##modificado 24.04.09

## modificado condicion de gurardar y modificar


$id= $_GET['id'];
$op= $_GET['op'];
$codigo= $_GET['codigo'];
$sw_correo=$_POST['correo'];
$sw_usuario=$_POST['usuario'];

$socio = new cls_emp_socio();
$socio->set_id_socio($id);
$socio->set_txt_nombres($_POST['nombres']);
$socio->set_txt_telefono($_POST['telefono']);
$socio->set_txt_direccion($_POST['direccion']);
$socio->set_txt_fechanac($_POST['fechanac']);
$socio->set_txt_email($_POST['correo']);
$socio->set_txt_tipo($_POST['cbo_tipo']);
$socio->set_txt_usuario($_POST['usuario']);
$socio->set_txt_pws($_POST['clave']);




$url="&nombres=".$_POST['nombres']."&dni=".$_POST['dni']."&cuni=".$_POST['cuni']."&telefono=".$_POST['telefono']."&direccion=".$_POST['direccion']."&fechanac=".$_POST['fechanac']."&correo=".$_POST['correo']."&cbo_tipo=".$_POST['cbo_tipo']."&usuario=".$_POST['usuario']."&psw=".$_POST['psw'];


switch($op)

{
	case 1:	//guardar

//			$codigo_prod = new cls_emp_productos::validar($codigo);
		$sql="select * from  tbl_socio where txt_usuario='".$socio->get_txt_usuario()."'";
		$sqlmail="select * from  tbl_socio where txt_email='".$socio->get_txt_email()."'";
		$resultado=conn_array ($sql);
		$resultadomail=conn_array ($sqlmail);
		$num_elementos=count($resultado);
		$num_elementosmail=count($resultadomail);

			if ($num_elementos>0){			
				$xvalidacion="1";
			}else{
				$xvalidacion="0";
			}
			if($num_elementosmail>0){
				$xvalidacionmail="1";					
			}else{
				$xvalidacionmail="0";
			}
			//echo "usuario (".$xvalidacion.")<br>";
			//echo "mail (".$xvalidacionmail.")<br>";
			if($xvalidacion=="0" && $xvalidacionmail=="0"){
				echo "Guardando... ";
				$socio->guarda();
			}
//			die();
		
	break;
	case 2://Actualizar
	
	$filsocio="select txt_email,txt_usuario from  tbl_socio where id_socio='".$socio->get_id_socio()."'";
	$rs = conn_consulta($filsocio);
	$correo=$rs['txt_email'];
	$usuario=$rs['txt_usuario'];
	if($correo<>$socio->get_txt_email()){
			$sqlmail="select * from  tbl_socio where txt_email='".$socio->get_txt_email()."'";
			$resultadomail=conn_array ($sqlmail);
			$num_elementosmail=count($resultadomail);
			if($num_elementosmail>0){
				$xvalidacionmail="1";					
			}else{
				$xvalidacionmail=0;	
			}
	}else{
				$xvalidacionmail="0";
	}
	if($usuario<> $socio->get_txt_usuario()){
			$sql="select * from  tbl_socio where txt_usuario='".$socio->get_txt_usuario()."'";	
					
			$resultado=conn_array ($sql);
			$num_elementos=count($resultado);
			if ($num_elementos>0){			
				$xvalidacion="1";
			}else{
				$xvalidacion="0";
			}
	}else{
					$xvalidacion="0";
	}
	//echo "mail 		: ".$xvalidacionmail."<br>";
	//echo "usuario 	: ".$xvalidacion."<br>";
	if($xvalidacion=="0" && $xvalidacionmail=="0"){
		$socio->actualiza();
	}				
	
	break;



	case 3://Eliminar	

			$socio = new cls_emp_socio($id);
			$socio->elimina();							

	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{	
	if ($xvalidacion=="1" || $xvalidacionmail=="1") {
		$_SESSION['validacion']=1;
		header ("location: frm_socios.php?msg1=".$xvalidacionmail."&msg2=".$xvalidacion.$url); 
	}else{
		header ("location: inf_socios.php"); 
		$_SESSION['validacion']="";
	}
	
//	die("<br>q codigo: ".$xvalidacion);
	
//		header ("location: inf_productos.php"); 
}else{

	header ("location: frm_login.php?error=1"); 

}

?>