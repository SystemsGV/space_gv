<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("includes/fc_global.php");
include("clases/cls_emp_encuesta.php");
include("clases/cls_emp_respuesta.php");
conn_abre();
$id= $_GET['id'];
$op= $_GET['op'];
$date=date("Y-m-d");
$encuesta = new cls_emp_encuesta();
$respuesta = new cls_emp_respuesta();
$encuesta->set_id_encuesta($id);
$encuesta->set_txt_encuesta($_POST['txt_encuesta']);
$encuesta->set_txt_fecha($date);
$encuesta->set_int_estado($_POST['int_estado']);

switch($op)
{
	case 1:	//guardar
			$encuesta->guarda();
			$id=$encuesta->get_id_encuesta();
			if($_POST['int_estado']==1){
				$encuesta->reinicia();
			}
			//echo "id : ".$id."<br>";
			for($i=1;$i<=6;$i++){
				$txt_respusta="txt_respuesta$i";
				$txt_color="color$i";				
				if($_POST[$txt_respusta]!=""){
					$respuesta->set_id_respuesta($id);
					$respuesta->set_txt_respuesta($_POST[$txt_respusta]);
					$respuesta->set_txt_color($_POST[$txt_color]);
					$respuesta->set_int_votos('0');
					$respuesta->guarda();
				}
				
			}
	break;
	case 2://Actualizar	
			$encuesta->actualiza();
			$tot=get_countRs("tbl_respuesta"," where id_encuesta='$id'");
			if($_POST['int_estado']==1){
				$encuesta->reinicia();
			}
			/*
			echo $tot;*/
			for($i=1;$i<=$tot;$i++){
				$txt_respusta="txt_respuesta$i";
				$id_respuesta="id_respuesta$i";
				$txt_color="color$i";					
				if($_POST[$txt_respusta]!=""){
					$respuesta->set_id_encuesta($id);
					$respuesta->set_id_respuesta($_POST[$id_respuesta]);
					$respuesta->set_txt_respuesta($_POST[$txt_respusta]);
					$respuesta->set_txt_color($_POST[$txt_color]);
					$respuesta->actualiza();
				}
				
			}
	break;



	case 3://Eliminar	
	
			$encuesta = new cls_emp_encuesta($id);
			$encuesta->elimina();							

	break;


}

//fin del switch

if(($op==1) || ($op==2) || ($op==3))

{	

	header ("location: inf_encuestas.php"); 

}else{

	header ("location: frm_login.php?error=1"); 

}

?>