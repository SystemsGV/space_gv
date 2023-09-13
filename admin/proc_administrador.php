<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_administrador.php");

$id= $_GET['id'];
$op= $_GET['op'];

$administrador = new cls_administrador();
$administrador->setNombres($_POST['nombres']);
$administrador->setCorreo($_POST['correo']);
$administrador->setUsuario($_POST['usuario']);								
$administrador->setClave($_POST['clave']);
$administrador->setInttipo($_POST['cbotipo']);				

switch($op)
{
	case 1:	//guardar
			$administrador->guarda();
			$id=$administrador->getId_administrador();
	break;

	case 2://Actualizar	
			$administrador->setId_administrador($id);	
			$administrador->actualiza();
	break;

	case 3://Eliminar	
			$administrador = new cls_administrador($id);
			$administrador->elimina();							
	break;

	case 4://verificar login
			$id = $administrador->valida_administrator();
			if($id){
				$op=4;
				$_SESSION['session_administrator']=$id;
				$_SESSION['session_idioma']=1;
				$datos = new cls_administrador($id);
				$_SESSION['session_opt']=$datos->getInttipo();
				if($_SESSION['session_opt']==1){
					$page="administrador";
				}elseif($_SESSION['session_opt']==2){
					$page="usuarios";
				}
			}else{
				$op=0;			
			}
}

//fin del switch
//echo $page
if(($op==1) || ($op==2) || ($op==3) || ($op==4)){	
	
	if($op==4){header("location: inf_$page.php");}else{header ("location: inf_administrador.php");}
}else{
	header ("location: frm_login.php?error=1"); 
}
?>