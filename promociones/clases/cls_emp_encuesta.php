<?
class cls_emp_encuesta{
var $id_encuesta;
var $txt_encuesta;
var $txt_fecha; 
var $int_stado;

function cls_emp_encuesta($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_encuesta where id_encuesta='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);						
		$this->set_id_encuesta($fila['id_encuesta']);
		$this->set_txt_encuesta($fila['txt_encuesta']);
		$this->set_txt_fecha($fila['txt_fecha']);
		$this->set_int_estado($fila['int_stado']);
	}else{
		$this->set_id_encuesta('');
		$this->set_txt_encuesta('');
		$this->set_txt_fecha('');
		$this->set_int_estado('');
	}		

}


function set_id_encuesta($id_encuesta){	$this->id_encuesta=$id_encuesta;}
function get_id_encuesta(){	return $this->id_encuesta;	}
 
function set_txt_encuesta($txt_encuesta){	$this->txt_encuesta=$txt_encuesta;}
function get_txt_encuesta(){	return $this->txt_encuesta;	} 

function set_txt_fecha($txt_fecha){	$this->txt_fecha=$txt_fecha;}
function get_txt_fecha(){	return $this->txt_fecha;	} 

function set_int_estado($int_estado){	$this->int_estado=$int_estado;}
function get_int_estado(){	return $this->int_estado;	} 

function guarda()

{
	$sql="insert tbl_encuesta(txt_encuesta, txt_fecha, int_stado) values('".
		$this->get_txt_encuesta()."','".
		$this->get_txt_fecha()."','".
		$this->get_int_estado()."');";	
	$id =conn_ejecuta($sql);
	$this->set_id_encuesta($id);
}

function reinicia(){
	$sql="update tbl_encuesta set  int_stado='0' ";
	$sql2="update tbl_encuesta set  int_stado='1' where id_encuesta='".$this->get_id_encuesta()."' ";
	conn_ejecuta($sql);	
	conn_ejecuta($sql2);		
}

function actualiza()
{
		 $sql="update tbl_encuesta set 
		 txt_encuesta='".$this->get_txt_encuesta()."',
		 txt_fecha='".$this->get_txt_fecha()."',
		 int_stado='".$this->get_int_estado()."' 
		 where id_encuesta='".$this->get_id_encuesta()."'";

	conn_ejecuta($sql);	
	

}



function elimina()
{
	$sql="delete from tbl_encuesta where id_encuesta='".$this->get_id_encuesta()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

