<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_mantenimiento.php");

$id= $_GET['id'];
$op= $_GET['op'];

$mantenimiento = new cls_mantenimiento();
$mantenimiento->settipoca($_POST['tipoca']);
				

switch($op)
{
	case 1:	//guardar
			$mantenimiento->guarda();
			$id=$mantenimiento->getidmante();
	break;

	case 2://Actualizar	
			$mantenimiento->setidmante($id);	
			$mantenimiento->actualiza();
	break;

	case 3://Eliminar	
			$mantenimiento = new cls_mantenimiento($id);
			$mantenimiento->elimina();							
	break;

	case 4://verificar login
			$id = $mantenimiento->valida_administrator();
//die();

			if($id){
				$op=1;
				$_SESSION['session_administrator']=$id;
				$_SESSION['session_idioma']=1;
			}else{
				$op=0;			
			}
}

//fin del switch

if(($op==1) || ($op==2) || ($op==3))
{	
	header ("location: frm_tipocambio.php?id=1&msg=ok"); 
}else{
	header ("location: frm_login.php?error=1"); 
}
?>