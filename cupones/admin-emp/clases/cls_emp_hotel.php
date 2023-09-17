<?
class cls_emp_foto0{

var $id_foto0;
var $id_cliente;
var $id_categoria;
var $txt_titulo;
var $txt_titulo2;
var $txt_titulo3;
var $txt_titulo4;
var $txt_titulo44;
var $txt_titulo5;
var $txt_titulo6;
var $txt_titulo7;
var $txt_foto;
var $int_stado;
var $int_stado0;
var $int_retoque;

function cls_emp_foto0($id=0)
{
	if($id!=495)

	{
		$sql="select * from tbl_hotel where id_foto0='".$id."'";
		$fila = conn_consulta($sql);						
		$this->set_id_foto0($fila['id_foto0']);
		$this->set_id_cliente($fila['id_cliente']);
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_titulo2($fila['txt_titulo2']);
		$this->set_txt_titulo3($fila['txt_titulo3']);
		$this->set_txt_titulo4($fila['txt_titulo4']);
		$this->set_txt_titulo44($fila['txt_titulo44']);
		$this->set_txt_titulo5($fila['txt_titulo5']);
		$this->set_txt_titulo6($fila['txt_titulo6']);
		$this->set_txt_titulo7($fila['txt_titulo7']);
		$this->set_txt_foto($fila['txt_foto']);
		$this->set_int_stado($fila['int_stado']);
		$this->set_int_stado0($fila['int_stado0']);
		$this->set_int_retoque($fila['int_retoque']);
	}else{
		$this->set_id_foto0('');
		$this->set_id_cliente('');
		$this->set_id_categoria('');
		$this->set_txt_titulo('');
		$this->set_txt_titulo2('');
		$this->set_txt_titulo3('');
		$this->set_txt_titulo4('');
		$this->set_txt_titulo44('');
		$this->set_txt_titulo5('');
		$this->set_txt_titulo6('');
		$this->set_txt_titulo7('');
		$this->set_txt_foto('');
		$this->set_int_stado('');
		$this->set_int_stado0('');
		$this->set_int_retoque('');	
	}		
}

function set_id_foto0($id_foto0){	$this->id_foto0=$id_foto0;}
function get_id_foto0(){	return $this->id_foto0;	}

function set_id_cliente($id_cliente){	$this->id_cliente=$id_cliente;}
function get_id_cliente(){	return $this->id_cliente;	}
 
function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	} 

function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_titulo2($txt_titulo2){	$this->txt_titulo2=$txt_titulo2;}
function get_txt_titulo2(){	return $this->txt_titulo2;	} 

function set_txt_titulo3($txt_titulo3){	$this->txt_titulo3=$txt_titulo3;}
function get_txt_titulo3(){	return $this->txt_titulo3;	} 

function set_txt_titulo4($txt_titulo4){	$this->txt_titulo4=$txt_titulo4;}
function get_txt_titulo4(){	return $this->txt_titulo4;	}

function set_txt_titulo44($txt_titulo44){	$this->txt_titulo44=$txt_titulo44;}
function get_txt_titulo44(){	return $this->txt_titulo44;	} 

function set_txt_titulo5($txt_titulo5){	$this->txt_titulo5=$txt_titulo5;}
function get_txt_titulo5(){	return $this->txt_titulo5;	} 

function set_txt_titulo6($txt_titulo6){	$this->txt_titulo6=$txt_titulo6;}
function get_txt_titulo6(){	return $this->txt_titulo6;	} 

function set_txt_titulo7($txt_titulo7){	$this->txt_titulo7=$txt_titulo7;}
function get_txt_titulo7(){	return $this->txt_titulo7;	} 

function set_txt_foto($txt_foto){	$this->txt_foto=$txt_foto;}
function get_txt_foto(){	return $this->txt_foto;	} 

function set_int_stado($int_stado){	$this->int_stado=$int_stado;}
function get_int_stado(){	return $this->int_stado;	}

function set_int_stado0($int_stado0){	$this->int_stado0=$int_stado0;}
function get_int_stado0(){	return $this->int_stado0;	}

function set_int_retoque($int_retoque){	$this->int_retoque=$int_retoque;}
function get_int_retoque(){	return $this->int_retoque;	} 


function guarda()

{
	    $sql="insert tbl_hotel(id_cliente,id_categoria,txt_titulo,txt_titulo2,txt_titulo3,txt_titulo4,txt_titulo44,txt_titulo5,txt_titulo6,txt_titulo7,txt_foto,int_stado,int_stado0,int_retoque) values('".
		$this->get_id_cliente()."','".
		$this->get_id_categoria()."','".
		inc_caracteres_especiales($this->get_txt_titulo())."','".
		inc_caracteres_especiales($this->get_txt_titulo2())."','".
		inc_caracteres_especiales($this->get_txt_titulo3())."','".
		inc_caracteres_especiales($this->get_txt_titulo4())."','".
		inc_caracteres_especiales($this->get_txt_titulo44())."','".
		inc_caracteres_especiales($this->get_txt_titulo5())."','".
		inc_caracteres_especiales($this->get_txt_titulo6())."','".
		inc_caracteres_especiales($this->get_txt_titulo7())."','".
		$this->get_txt_foto()."','".
		$this->get_int_stado()."','".
		$this->get_int_stado0()."','".
		$this->get_int_retoque()."')";	
		//echo $sql;
	conn_ejecuta($sql);
}

function actualiza()
{
		$sql="update tbl_hotel set id_cliente='".$this->get_id_cliente()."', "
		 ." id_categoria='".$this->get_id_categoria()."', "
		 ." txt_titulo='".inc_caracteres_especiales($this->get_txt_titulo())."', "
		 ." txt_titulo2='".inc_caracteres_especiales($this->get_txt_titulo2())."', "
		 ." txt_titulo3='".inc_caracteres_especiales($this->get_txt_titulo3())."', "
		 ." txt_titulo4='".inc_caracteres_especiales($this->get_txt_titulo4())."', "
		 //." txt_titulo44='".inc_caracteres_especiales($this->get_txt_titulo44())."', "
		 ." txt_titulo5='".inc_caracteres_especiales($this->get_txt_titulo5())."', "
		 ." txt_titulo6='".inc_caracteres_especiales($this->get_txt_titulo6())."', "
		 ." txt_titulo7='".inc_caracteres_especiales($this->get_txt_titulo7())."', "
		 ." txt_foto='".$this->get_txt_foto()."', "
		 ." int_stado='".$this->get_int_stado()."', "
		 ." int_stado0='".$this->get_int_stado0()."', "
		 ." int_retoque='".$this->get_int_retoque()."'"
		 ." where id_foto0='".$this->get_id_foto0()."'";

	conn_ejecuta($sql) or die(mysql_error());		

}



function elimina()
{
	$sql="delete from tbl_hotel where id_foto0='".$this->get_id_foto0()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

