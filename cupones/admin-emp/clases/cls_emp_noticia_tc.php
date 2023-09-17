<?
class cls_emp_noticia_tc{

var $id_noticia_tc;
var $txt_titulo;
var $txt_fecha;
var $txt_resumen;
var $txt_descripcion;
var $txt_foto;
var $int_estado;


function cls_emp_noticia_tc($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_noticia_tc where id_noticia_tc='".$id."'";

		$fila = conn_consulta($sql);						
		$this->set_id_noticia_tc($fila['id_noticia_tc']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_fecha($fila['txt_fecha']);
		$this->set_txt_resumen($fila['txt_resumen']);
		$this->set_txt_descripcion($fila['txt_descripcion']);
		$this->set_txt_foto($fila['txt_foto']);
		$this->set_int_estado($fila['int_estado']);



	}else{
		$this->set_id_noticia_tc('');
		$this->set_txt_titulo('');
		$this->set_txt_fecha('');
		$this->set_txt_resumen('');
		$this->set_txt_descripcion('');
		$this->set_txt_foto('');
		$this->set_int_estado('');
	}		

}

function set_id_noticia_tc($id_noticia_tc){	$this->id_noticia_tc=$id_noticia_tc;}
function get_id_noticia_tc(){	return $this->id_noticia_tc;	}

function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_fecha($txt_fecha){	$this->txt_fecha=$txt_fecha;}
function get_txt_fecha(){	return $this->txt_fecha;	}

function set_txt_resumen($txt_resumen){	$this->txt_resumen=$txt_resumen;}
function get_txt_resumen(){	return $this->txt_resumen;	}

function set_txt_descripcion($txt_descripcion){	$this->txt_descripcion=$txt_descripcion;}
function get_txt_descripcion(){	return $this->txt_descripcion;	} 

function set_txt_foto($txt_foto){	$this->txt_foto=$txt_foto;}
function get_txt_foto(){	return $this->txt_foto;	} 

function set_int_estado($int_estado){	$this->int_estado=$int_estado;}
function get_int_estado(){	return $this->int_estado;	} 

function guarda()
{
	$sql="insert tbl_noticia_tc(txt_titulo,txt_fecha,txt_resumen,txt_descripcion,txt_foto,int_estado) values('".$this->get_txt_titulo()."','".
		$this->get_txt_fecha()."','".
		$this->get_txt_resumen()."','".
		$this->get_txt_descripcion()."','".
		$this->get_txt_foto()."','".
		$this->get_int_estado()."');";
		conn_ejecuta($sql); 
}

function actualiza()
{
	$sql="update tbl_noticia_tc set txt_titulo='".$this->get_txt_titulo()."', 
			txt_fecha='".inc_caracteres_especiales($this->get_txt_fecha())."', 
			txt_resumen='".inc_caracteres_especiales($this->get_txt_resumen())."',
			txt_descripcion='".inc_caracteres_especiales($this->get_txt_descripcion())."', 
			txt_foto='".inc_caracteres_especiales($this->get_txt_foto())."', 
			int_estado='".$this->get_int_estado()."' 
		 where id_noticia_tc='".$this->get_id_noticia_tc()."'";
	conn_ejecuta($sql);		
}

function elimina()
{	
	$sql="delete from tbl_noticia_tc where id_noticia_tc='".$this->get_id_noticia_tc()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase

?>

