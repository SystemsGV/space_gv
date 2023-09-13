<?
class cls_emp_respuesta{
var $id_respuesta;
var $id_encuesta;
var $txt_respuesta;
var $txt_color;
var $int_votos;

function cls_emp_respuesta($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_respuesta where id_respuesta='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);		
		$this->set_id_respuesta($fila['id_respuesta']);
		$this->set_id_encuesta($fila['id_encuesta']);
		$this->set_txt_respuesta($fila['txt_respuesta']);
		$this->set_txt_color($fila['txt_color']);
		$this->set_int_votos($fila['int_votos']);
	}else{
		$this->set_id_respuesta('');
		$this->set_id_encuesta('');
		$this->set_txt_respuesta('');
		$this->set_txt_color('');
		$this->set_int_votos('');
	}		

}

function set_id_encuesta($id_encuesta){	$this->id_encuesta=$id_encuesta;}
function get_id_encuesta(){	return $this->id_encuesta;	}

function set_id_respuesta($id_respuesta){	$this->id_respuesta=$id_respuesta;}
function get_id_respuesta(){	return $this->id_respuesta;	}
 
function set_txt_respuesta($txt_respuesta){	$this->txt_respuesta=$txt_respuesta;}
function get_txt_respuesta(){	return $this->txt_respuesta;	} 

function set_txt_color($txt_color){	$this->txt_color=$txt_color;}
function get_txt_color(){	return $this->txt_color;	} 

function set_int_votos($int_votos){	$this->int_votos=$int_votos;}
function get_int_votos(){	return $this->int_votos;	} 

function guarda()

{
	$sql="insert into tbl_respuesta(id_encuesta,txt_respuesta,txt_color,int_votos) values('".
		$this->get_id_respuesta()."','".
		$this->get_txt_respuesta()."','".
		$this->get_txt_color()."','".
		$this->get_int_votos()."');";	
	conn_ejecuta($sql);
}



function actualiza()

{
	$sql="update tbl_respuesta set 
		 txt_respuesta='".$this->get_txt_respuesta()."',
		 txt_color='".$this->get_txt_color()."'		
		 where id_respuesta='".$this->get_id_respuesta()."';";
	conn_ejecuta($sql);		

}

/*function votos($id){
		$sql="select sum(int_votos) from tbl_respuesta where id_encuesta='$id'";
		$rsl=mysql_query($sql);
		$resSuma=mysql_result($rsl,0,0);
		echo $resSuma; 	
}*/
function ing_voto(){	
	$sql="update tbl_respuesta set int_votos='".$this->get_int_votos()."' where id_respuesta='".$this->get_id_respuesta()."'";
	conn_ejecuta($sql);	
}
function elimina()
{
	$sql="delete from tbl_respuesta where id_respuesta='".$this->get_id_respuesta()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

