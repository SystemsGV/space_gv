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
$administrador->setTipo($_POST['tipo']);
$administrador->setUsuario($_POST['usuario']);								
$administrador->setClave($_POST['clave']);				

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
//die();

			if($id){
				$op=0;
				$_SESSION['session_administrator']=$id;
				$_SESSION['session_idioma']=1;
			}else{ if ($id)
					{
							$op=1;
				$_SESSION['session_cliente']=$id;
				$_SESSION['session_idioma']=1;
					
					}else {
								
					$op=2;

					}
			}
}

//fin del switch

if(($op==0) || ($op==1)){	
	header ("location: inf_clientes.php?idcat=1"); 
	
}else{

	header ("location: inf_consultas.php?idcat=1"); 

	
}
?>