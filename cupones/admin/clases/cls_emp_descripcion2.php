<?
class cls_emp_descripcion{

var $id_descripcion;
var $id_cliente;
var $txt_descripcion;
var $txt_info;
var $int_stado;

function cls_emp_descripcion($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_descripcion2 where id_cliente='".$id."'";
		$fila = conn_consulta($sql);						
		$this->set_id_descripcion($fila['id_descripcion']);
		$this->set_id_cliente($fila['id_cliente']);
		$this->set_txt_descripcion($fila['txt_descripcion']);
		$this->set_txt_info($fila['txt_info']);
		$this->set_int_stado($fila['int_stado']);
	}else{
		$this->set_id_descripcion('');
		$this->set_id_cliente('');
		$this->set_txt_descripcion('');
		$this->set_txt_info('');
		$this->set_int_stado('');
	}		

}


function set_id_descripcion($id_descripcion){	$this->id_descripcion=$id_descripcion;}
function get_id_descripcion(){	return $this->id_descripcion;	}

function set_id_cliente($id_cliente){	$this->id_cliente=$id_cliente;}
function get_id_cliente(){	return $this->id_cliente;	}
 
function set_txt_descripcion($txt_descripcion){	$this->txt_descripcion=$txt_descripcion;}
function get_txt_descripcion(){	return $this->txt_descripcion;	} 

function set_txt_info($txt_info){	$this->txt_info=$txt_info;}
function get_txt_info(){	return $this->txt_info;	}

function set_int_stado($int_stado){	$this->int_stado=$int_stado;}
function get_int_stado(){	return $this->int_stado;	} 

function guarda()

{
		$sql="insert tbl_descripcion2(id_cliente,txt_descripcion,txt_info,int_stado) values('".
		$this->get_id_cliente()."','".
		$this->get_txt_descripcion()."','".
		$this->get_txt_info()."','".
		$this->get_int_stado()."');";	
		//echo $sql;
	conn_ejecuta($sql);
}



function actualiza()
{
		 $sql="update tbl_descripcion2 set 
		 id_cliente='".$this->get_id_cliente()."',
		 txt_descripcion='".$this->get_txt_descripcion()."',
		 txt_info='".$this->get_txt_info()."',
		 int_stado='".$this->get_int_stado()."' 
		 where id_cliente='".$this->get_id_cliente()."'";
//echo $sql;
	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_descripcion2 where id_descripcion='".$this->get_id_descripcion()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>


