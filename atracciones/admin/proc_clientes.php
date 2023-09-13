<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_cliente.php");
include_once("clases/imageresize.class.php");
$id= $_GET['id'];
$idcat= $_GET['idcat'];
$op= $_GET['op'];
$codigo= $_GET['codigo'];
$sw_correo=$_POST['correo'];
$sw_usuario=$_POST['usuario'];

$cliente = new cls_emp_cliente();
$cliente->set_id_cliente($id);
$cliente->set_id_categoria($idcat);
$cliente->set_txt_nombre($_POST['nombres']);
$cliente->set_txt_direccion($_POST['direccion']);
$cliente->set_txt_telefono($_POST['telefono']);
$cliente->set_txt_celular($_POST['celular']);
$cliente->set_txt_email($_POST['txt_imagen']);
$cliente->set_txt_email2($_POST['condicion']);
$cliente->set_txt_proyecto($_POST['proyecto']);
$cliente->set_txt_departamento($_POST['departamento']);
$cliente->set_txt_usuario($_POST['usuario']);
$cliente->set_txt_usuario2($_POST['usuario2']);
$cliente->set_txt_password($_POST['clave']);
$cliente->set_int_stado($_POST['int_stado']);
////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

	$hid_foto=$_POST['hid_txt_imagen'];
		if($_POST['chk_quitar']==1)
		{
			$hid_foto="";
		}
		
		if ($_FILES['txt_imagen']['name']==NULL)
		{	$cliente->set_txt_email($hid_foto);	}
		else
		{
			$archivo = inc_cargar_datos("txt_imagen",UPLOAD_FOTOS,"proc_clientes.php",$extensiones_imagenes);						
			$oResize = new ImageResize(UPLOAD_FOTOS.$archivo);
			$oResize->resizeWidthHeight("300", "61");
			$trozos = explode(".", $archivo);
			$nombre=$trozos[0]."_t.".$trozos[1];
			$oResize->save(UPLOAD_FOTOS.$nombre);
			$cliente->set_txt_email($archivo);		
		}	

// fin 

switch($op)


{
	case 1:	//guardar
				$cliente->guarda();
	break;

	case 2://Actualizar
		$cliente->actualiza();	
	break;

	case 3://Eliminar	
			$cliente = new cls_emp_cliente($id);
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
	header ("location: inf_clientes.php?idcat=".$idcat); 
}else{
	header ("location: index.php?error=1"); 
}

?>