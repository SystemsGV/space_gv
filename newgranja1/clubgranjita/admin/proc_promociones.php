<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_cupon.php");
//include("includes/db_connect.inc.php");


$id=1;
$op= $_GET['op'];
$codigo= $_GET['codigo'];
$file= $_GET['file'];

$cupon = new cls_emp_cupon();
$cupon->set_id_cupon($id);
$cupon->set_txt_des1($_POST['txt_des1']);
$cupon->set_txt_des2($_POST['txt_des2']);
$cupon->set_txt_des3($_POST['txt_des3']);
$cupon->set_txt_des4($_POST['txt_des4']);
$cupon->set_txt_des5($_POST['txt_des5']);
$cupon->set_fecha_impi($_POST['fechanac']);
$cupon->set_fecha_impf($_POST['fechanac2']);



// Dubir fotos

////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

		$hid_foto1=$_POST['hid_txt_imagen1'];
		if($_POST['chk_quitar1']==1)
		{
			$hid_foto1="";
		}
		$hid_foto2=$_POST['hid_txt_imagen2'];
		if($_POST['chk_quitar2']==1)
		{
			$hid_foto2="";
		}
		$hid_foto3=$_POST['hid_txt_imagen3'];
		if($_POST['chk_quitar3']==1)
		{
			$hid_foto3="";
		}
		$hid_foto4=$_POST['hid_txt_imagen4'];
		if($_POST['chk_quitar4']==1)
		{
			$hid_foto4="";
		}
		$hid_foto5=$_POST['hid_txt_imagen5'];
		if($_POST['chk_quitar5']==1)
		{
			$hid_foto5="";
		}
		
		echo "cupon 1 : ".$_FILES['txt_file1']['name']."<br>";
		if ($_FILES['txt_file1']['name']==NULL)
		{	$cupon->set_txt_val1($hid_foto1);	}
		else
		{
			$archivo = inc_cargar_cupon("txt_file1","../".UPLOAD_CUPON,"proc_promociones.php",$extensiones_imagenes,"1");
			echo "Nombre cupon 1 : ".$archivo."<br>";
			$cupon->set_txt_val1($archivo);		
		}
		if ($_FILES['txt_file2']['name']==NULL)
		{	$cupon->set_txt_val2($hid_foto2);	}
		else
		{
			$archivo = inc_cargar_cupon("txt_file2","../".UPLOAD_CUPON,"proc_promociones.php",$extensiones_imagenes,"2");
			$cupon->set_txt_val2($archivo);		
		}
		if ($_FILES['txt_file3']['name']==NULL)
		{	$cupon->set_txt_val3($hid_foto3);	}
		else
		{
			$archivo = inc_cargar_cupon("txt_file3","../".UPLOAD_CUPON,"proc_promociones.php",$extensiones_imagenes,"3");						
			$cupon->set_txt_val3($archivo);		
		}
		if ($_FILES['txt_file4']['name']==NULL)
		{	$cupon->set_txt_val4($hid_foto4);	}
		else
		{
			$archivo = inc_cargar_cupon("txt_file4","../".UPLOAD_CUPON,"proc_promociones.php",$extensiones_imagenes,"4");	
			$cupon->set_txt_val4($archivo);		
		}
		if ($_FILES['txt_file5']['name']==NULL)
		{	$cupon->set_txt_val5($hid_foto5);	}
		else
		{
			$archivo = inc_cargar_cupon("txt_file5","../".UPLOAD_CUPON,"proc_promociones.php",$extensiones_imagenes,"5");	
			$cupon->set_txt_val5($archivo);		
		}	

// fin 


			$cupon->actualiza();

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{	
//		header ("location: frm_promociones.php"); 
		echo "<script>location.href='frm_promociones.php'</script>";
		

}else{

echo "<script>location.href='frm_login.php?error=1'</script>";
//	header ("location: frm_login.php?error=1"); 

}

?>