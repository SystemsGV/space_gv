<?
class cls_emp_galeria{

var $id_galeria;
var $txt_titulo;
var $txt_titulo2;
var $txt_foto;
var $int_estado;


function cls_emp_galeria($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_galeria where id_galeria='".$id."'";

		$fila = conn_consulta($sql);						
		$this->set_id_galeria($fila['id_galeria']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_titulo2($fila['txt_titulo2']);		
		$this->set_txt_foto($fila['txt_foto']);
		$this->set_int_estado($fila['int_estado']);



	}else{
		$this->set_id_galeria('');
		$this->set_txt_titulo('');
		$this->set_txt_titulo2('');		
		$this->set_txt_foto('');
		$this->set_int_estado('');
	}		

}

function set_id_galeria($id_galeria){	$this->id_galeria=$id_galeria;}
function get_id_galeria(){	return $this->id_galeria;	}

function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_titulo2($txt_titulo2){	$this->txt_titulo2=$txt_titulo2;}
function get_txt_titulo2(){	return $this->txt_titulo2;	} 

function set_txt_foto($txt_foto){	$this->txt_foto=$txt_foto;}
function get_txt_foto(){	return $this->txt_foto;	} 

function set_int_estado($int_estado){	$this->int_estado=$int_estado;}
function get_int_estado(){	return $this->int_estado;	} 

function guarda()
{
	$sql="insert tbl_galeria(txt_titulo,txt_titulo2,txt_foto,int_estado) values('".inc_caracteres_especiales($this->get_txt_titulo())."','".
		inc_caracteres_especiales($this->get_txt_titulo2())."','".
		$this->get_txt_foto()."','".
		$this->get_int_estado()."');";
		conn_ejecuta($sql); 
}

function actualiza()
{
	$sql="update tbl_galeria set txt_titulo='".inc_caracteres_especiales($this->get_txt_titulo())."', 
			txt_titulo2='".inc_caracteres_especiales($this->get_txt_titulo2())."', 
			txt_foto='".inc_caracteres_especiales($this->get_txt_foto())."', 
			int_estado='".$this->get_int_estado()."' 
		 where id_galeria='".$this->get_id_galeria()."'";
	conn_ejecuta($sql);		
}

function elimina()
{	
	$sql="delete from tbl_galeria where id_galeria='".$this->get_id_galeria()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase

?>

