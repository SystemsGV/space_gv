<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_categoria.php");
$idcat= $_GET['idcat'];
$op= $_GET['op'];
$codigo= $_GET['codigo'];
$sw_correo=$_POST['correo'];
$sw_usuario=$_POST['usuario'];

$cliente = new cls_emp_categoria();
$cliente->set_id_categoria($idcat);
$cliente->set_int_zona($_POST['zona']);
$cliente->set_txt_nombre(addslashes($_POST['nombres']));
$cliente->set_txt_nombre2(addslashes($_POST['nombres2']));
$cliente->set_txt_terminos(addslashes($_POST['terminos']));
$cliente->set_txt_terminos3(addslashes($_POST['terminos3']));
$cliente->set_txt_terminos4(addslashes($_POST['terminos4']));
$cliente->set_txt_terminos2(addslashes($_POST['terminos2']));

switch($op)

{
	case 1:	//guardar
				$cliente->guarda();
	break;

	case 2://Actualizar
		$cliente->actualiza();	
	break;

	case 3://Eliminar	
			$cliente = new cls_emp_categoria($idcat);
			$cliente->elimina();
			//mysql_query($sql)or die(mysql_error());
	break;

	case 4://verificar login
			$id = $cliente->valida_socio();
//die();

			if($id){
				$op=1;
				$_SESSION['session_cliente']=$id;
				$_SESSION['session_cliente']=1;
			}else{
				$op=0;			
			}

}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{
	header ("location: inf_categoria.php"); 
}else{
	header ("location: ../clientes.php?error=1"); 
}

?>