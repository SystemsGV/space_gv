<?
class cls_emp_fotocupon{

var $id_fotocupon;
var $id_opc;
var $txt_titulo;
var $txt_foto;
var $int_stado;

function cls_emp_fotocupon($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_fotocupon where id_fotocupon='".$id."'";
		$fila = conn_consulta($sql);						
		$this->set_id_fotocupon($fila['id_fotocupon']);
		$this->set_id_opc($fila['id_opc']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_foto($fila['txt_foto']);
		$this->set_int_stado($fila['int_stado']);
	}else{
		$this->set_id_fotocupon('');
		$this->set_id_opc('');
		$this->set_txt_titulo('');
		$this->set_txt_foto('');
		$this->set_int_stado('');	
	}		
}

function set_id_fotocupon($id_fotocupon){	$this->id_fotocupon=$id_fotocupon;}
function get_id_fotocupon(){	return $this->id_fotocupon;	}

function set_id_opc($id_opc){	$this->id_opc=$id_opc;}
function get_id_opc(){	return $this->id_opc;	}

function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_foto($txt_foto){	$this->txt_foto=$txt_foto;}
function get_txt_foto(){	return $this->txt_foto;	} 

function set_int_stado($int_stado){	$this->int_stado=$int_stado;}
function get_int_stado(){	return $this->int_stado;	}


function guarda()

{
	    $sql="insert tbl_fotocupon(id_opc,txt_titulo,txt_foto,int_stado) values('".
		$this->get_id_opc()."','".
		inc_caracteres_especiales($this->get_txt_titulo())."','".
		$this->get_txt_foto()."','".
		$this->get_int_stado()."')";	
		//echo $sql;
	conn_ejecuta($sql);
}

function actualiza()
{
		$sql="update tbl_fotocupon set 
		 id_opc='".$this->get_id_opc()."',
		 txt_titulo='".inc_caracteres_especiales($this->get_txt_titulo())."',
		 txt_foto='".$this->get_txt_foto()."',
		 int_stado='".$this->get_int_stado()."'
		 where id_fotocupon='".$this->get_id_fotocupon()."'";

	conn_ejecuta($sql) or die(mysql_error());		

}



function elimina()
{
	$sql="delete from tbl_fotocupon where id_fotocupon='".$this->get_id_fotocupon()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

