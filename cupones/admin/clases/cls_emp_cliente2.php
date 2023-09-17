<?
class cls_emp_cliente{

var $id_cliente;
var $id_categoria;
var $txt_nombre;
var $txt_direccion;
var $txt_telefono;
var $txt_celular;
var $txt_email;
var $txt_proyecto;
var $txt_departamento;
var $txt_usuario;
var $txt_password;
var $int_stado;

function cls_emp_cliente($id=0)
{
	if($id!=0)
	{
		$sql="select * from tbl_cliente2 where id_cliente='".$id."' order by id_cliente";
		$fila = conn_consulta($sql);						
		$this->set_id_cliente($fila['id_cliente']);
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_txt_direccion($fila['txt_direccion']);				
		$this->set_txt_telefono($fila['txt_telefono']);
		$this->set_txt_celular($fila['txt_celular']);
		$this->set_txt_email($fila['txt_email']);
		$this->set_txt_proyecto($fila['txt_proyecto']);				
		$this->set_txt_departamento($fila['txt_departamento']);
		$this->set_txt_usuario($fila['txt_usuario']);
		$this->set_txt_password($fila['txt_password']);
		$this->set_int_stado($fila['int_stado']);
	}else{
		$this->set_id_cliente('');
		$this->set_id_categoria('');
		$this->set_txt_nombre('');
		$this->set_txt_direccion('');				
		$this->set_txt_telefono('');
		$this->set_txt_celular('');
		$this->set_txt_email('');
		$this->set_txt_proyecto('');				
		$this->set_txt_departamento('');
		$this->set_txt_usuario('');
		$this->set_txt_password('');
		$this->set_int_stado('');
	}		
}

function set_id_cliente($id_cliente){	$this->id_cliente=$id_cliente;}
function get_id_cliente(){	return $this->id_cliente;	}

function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	}

function set_txt_nombre($txt_nombre){	$this->txt_nombre=$txt_nombre;}
function get_txt_nombre(){	return $this->txt_nombre;	} 

function set_txt_direccion($txt_direccion){	$this->txt_direccion=$txt_direccion;}
function get_txt_direccion(){	return $this->txt_direccion;	}

function set_txt_telefono($txt_telefono){	$this->txt_telefono=$txt_telefono;}
function get_txt_telefono(){	return $this->txt_telefono;	}

function set_txt_celular($txt_celular){	$this->txt_celular=$txt_celular;}
function get_txt_celular(){	return $this->txt_celular;	}

function set_txt_email($txt_email){	$this->txt_email=$txt_email;}
function get_txt_email(){	return $this->txt_email;	} 

function set_txt_proyecto($txt_proyecto){	$this->txt_proyecto=$txt_proyecto;}
function get_txt_proyecto(){	return $this->txt_proyecto;	}

function set_txt_departamento($txt_departamento){	$this->txt_departamento=$txt_departamento;}
function get_txt_departamento(){	return $this->txt_departamento;	}

function set_txt_usuario($txt_usuario){	$this->txt_usuario=$txt_usuario;}
function get_txt_usuario(){	return $this->txt_usuario;	} 

function set_txt_password($txt_password){	$this->txt_password=$txt_password;}
function get_txt_password(){	return $this->txt_password;	} 

function set_int_stado($int_stado){	$this->int_stado=$int_stado;}
function get_int_stado(){	return $this->int_stado;	} 

function guarda()
{
	$sql="insert into tbl_cliente2(id_categoria, txt_nombre, txt_direccion, txt_telefono, txt_celular, txt_email, txt_proyecto,txt_departamento, txt_usuario, txt_password, int_stado)"
		 ." values('".$this->get_id_categoria()."', '".$this->get_txt_nombre()."', '".$this->get_txt_direccion()."', '".$this->get_txt_telefono()."', '".$this->get_txt_celular()."', '".$this->get_txt_email()."', '".$this->get_txt_proyecto()."', '".$this->get_txt_departamento()."', '".$this->get_txt_usuario()."', '".$this->get_txt_password()."', '".$this->get_int_stado()."');";
	$id = conn_ejecuta($sql);
	$this->set_id_cliente($id);				 
}

function actualiza()
{
		$sql="update tbl_cliente2 set id_categoria='".$this->get_id_categoria()."', "
		." txt_nombre='".$this->get_txt_nombre()."', "
		." txt_direccion='".$this->get_txt_direccion()."', "			
		." txt_telefono='".$this->get_txt_telefono()."', "
		." txt_celular='".$this->get_txt_celular()."', "
		." txt_email='".$this->get_txt_email()."', "
		." txt_proyecto='".$this->get_txt_proyecto()."', "
		." txt_departamento='".$this->get_txt_departamento()."', "
		." txt_usuario='".$this->get_txt_usuario()."', "
		." txt_password='".$this->get_txt_password()."', "
		." int_stado='".$this->get_int_stado()."'"
		." where id_cliente='".$this->get_id_cliente()."'";

	conn_ejecuta($sql);		
}

function elimina()
{
	$sql="delete from tbl_cliente2 where id_cliente='".$this->get_id_cliente()."'";
	conn_ejecuta($sql);			
}

## Validar socio

function valida_socio()
{
	$sql="select id_cliente from tbl_cliente2 where txt_usuario='".$this->get_txt_usuario()."' "
		    ." and txt_password='".$this->get_txt_password()."' ";
//echo $sql;

	$filas=conn_array($sql);
	if(count($filas)>0)
	{
		return $filas[0][0];
	}else
	{
		return 0;
	}
}


}//fin de la clase
?>


