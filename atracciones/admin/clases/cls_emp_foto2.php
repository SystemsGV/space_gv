<?
class cls_emp_foto{

var $id_foto;
var $id_cliente;
var $id_categoria;
var $txt_titulo;
var $txt_foto;
var $int_stado;
var $int_retoque;

function cls_emp_foto($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_foto2 where id_foto='".$id."'";
		$fila = conn_consulta($sql);						
		$this->set_id_foto($fila['id_foto']);
		$this->set_id_cliente($fila['id_cliente']);
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_foto($fila['txt_foto']);
		$this->set_int_stado($fila['int_stado']);
		$this->set_int_retoque($fila['int_retoque']);
	}else{
		$this->set_id_foto('');
		$this->set_id_cliente('');
		$this->set_id_categoria('');
		$this->set_txt_titulo('');
		$this->set_txt_foto('');
		$this->set_int_stado('');
		$this->set_int_retoque('');	
	}		
}

function set_id_foto($id_foto){	$this->id_foto=$id_foto;}
function get_id_foto(){	return $this->id_foto;	}

function set_id_cliente($id_cliente){	$this->id_cliente=$id_cliente;}
function get_id_cliente(){	return $this->id_cliente;	}
 
function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	} 

function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_foto($txt_foto){	$this->txt_foto=$txt_foto;}
function get_txt_foto(){	return $this->txt_foto;	} 

function set_int_stado($int_stado){	$this->int_stado=$int_stado;}
function get_int_stado(){	return $this->int_stado;	}

function set_int_retoque($int_retoque){	$this->int_retoque=$int_retoque;}
function get_int_retoque(){	return $this->int_retoque;	} 


function guarda()

{
	    $sql="insert tbl_foto2(id_cliente,id_categoria,txt_titulo,txt_foto,int_stado,int_retoque) values('".
		$this->get_id_cliente()."','".
		$this->get_id_categoria()."','".
		inc_caracteres_especiales($this->get_txt_titulo())."','".
		$this->get_txt_foto()."','".
		$this->get_int_stado()."','".
		$this->get_int_retoque()."')";	
		//echo $sql;
	conn_ejecuta($sql);
}

function actualiza()
{
		$sql="update tbl_foto2 set 
		 id_cliente='".$this->get_id_cliente()."',
		 id_categoria='".$this->get_id_categoria()."',
		 txt_titulo='".inc_caracteres_especiales($this->get_txt_titulo())."',
		 txt_foto='".$this->get_txt_foto()."',
		 int_stado='".$this->get_int_stado()."',
		 int_retoque='".$this->get_int_retoque()."'
		 where id_foto='".$this->get_id_foto()."'";

	conn_ejecuta($sql) or die(mysql_error());		

}



function elimina()
{
	$sql="delete from tbl_foto2 where id_foto='".$this->get_id_foto()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

