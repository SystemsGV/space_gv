<?
class cls_emp_usuarios{

var $id_usuarios;
var $txt_nombre;
var $txt_apellido;
var $txt_fecnac;
var $txt_telefono;
var $txt_direccion;
var $txt_distrito;
var $txt_email;
var $txt_usuario;
var $txt_password;
var $id_opc;

function cls_emp_usuarios($id=0)
{
	if($id!=0)
	{
		$sql="select * from tbl_usuarios where id_usuarios='".$id."' order by id_usuarios";
		$fila = conn_consulta($sql);						
		$this->set_id_usuarios($fila['id_usuarios']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_txt_apellido($fila['txt_apellido']);
		$this->set_txt_fecnac($fila['txt_fecnac']);
		$this->set_txt_telefono($fila['txt_telefono']);
		$this->set_txt_direccion($fila['txt_direccion']);				
		$this->set_txt_distrito($fila['txt_distrito']);	
		$this->set_txt_email($fila['txt_email']);
		$this->set_txt_usuario($fila['txt_usuario']);
		$this->set_txt_password($fila['txt_password']);
		$this->set_id_opc($fila['id_opc']);
	}else{
		$this->set_id_usuarios('');
		$this->set_txt_nombre('');
		$this->set_txt_apellido('');
		$this->set_txt_fecnac('');
		$this->set_txt_telefono('');
		$this->set_txt_direccion('');				
		$this->set_txt_distrito('');	
		$this->set_txt_email('');
		$this->set_txt_usuario('');
		$this->set_txt_password('');
		$this->set_id_opc('');
	}		
}

function set_id_usuarios($id_usuarios){	$this->id_usuarios=$id_usuarios;}
function get_id_usuarios(){	return $this->id_usuarios;	}

function set_txt_nombre($txt_nombre){	$this->txt_nombre=$txt_nombre;}
function get_txt_nombre(){	return $this->txt_nombre;	} 

function set_txt_apellido($txt_apellido){	$this->txt_apellido=$txt_apellido;}
function get_txt_apellido(){	return $this->txt_apellido;	} 

function set_txt_fecnac($txt_fecnac){	$this->txt_fecnac=$txt_fecnac;}
function get_txt_fecnac(){	return $this->txt_fecnac;	} 

function set_txt_telefono($txt_telefono){	$this->txt_telefono=$txt_telefono;}
function get_txt_telefono(){	return $this->txt_telefono;	}

function set_txt_direccion($txt_direccion){	$this->txt_direccion=$txt_direccion;}
function get_txt_direccion(){	return $this->txt_direccion;	}

function set_txt_distrito($txt_distrito){	$this->txt_distrito=$txt_distrito;}
function get_txt_distrito(){	return $this->txt_distrito;	}

function set_txt_email($txt_email){	$this->txt_email=$txt_email;}
function get_txt_email(){	return $this->txt_email;	} 

function set_txt_usuario($txt_usuario){	$this->txt_usuario=$txt_usuario;}
function get_txt_usuario(){	return $this->txt_usuario;	} 

function set_txt_password($txt_password){	$this->txt_password=$txt_password;}
function get_txt_password(){	return $this->txt_password;	} 

function set_id_opc($id_opc){	$this->id_opc=$id_opc;}
function get_id_opc(){	return $this->id_opc;	}

function guarda()
{
	$sql="insert into tbl_usuarios(txt_nombre, txt_apellido, txt_fecnac, txt_telefono, txt_direccion, txt_distrito, txt_email, txt_usuario, txt_password, id_opc)"
		 ." values('".$this->get_txt_nombre()."', '".$this->get_txt_apellido()."', '".$this->get_txt_fecnac()."', '".$this->get_txt_telefono()."', '".$this->get_txt_direccion()."', '".$this->get_txt_distrito()."', '".$this->get_txt_email()."', '".$this->get_txt_usuario()."', '".$this->get_txt_password()."', '".$this->get_id_opc()."');";
	$id = conn_ejecuta($sql);
	$this->set_id_usuarios($id);				 
}

function actualiza()
{
		$sql="update tbl_usuarios set txt_nombre='".$this->get_txt_nombre()."', "
		." txt_apellido='".$this->get_txt_apellido()."', "			
		." txt_fecnac='".$this->get_txt_fecnac()."', "
		." txt_telefono='".$this->get_txt_telefono()."', "
		." txt_direccion='".$this->get_txt_direccion()."', "
		." txt_distrito='".$this->get_txt_distrito()."', "
		." txt_email='".$this->get_txt_email()."', "
		." txt_usuario='".$this->get_txt_usuario()."', "
		." txt_password='".$this->get_txt_password()."', "
		." id_opc='".$this->get_id_opc()."'"
		." where id_usuarios='".$this->get_id_usuarios()."'";

	conn_ejecuta($sql);		
}

function elimina()
{
	$sql="delete from tbl_usuarios where id_usuarios='".$this->get_id_usuarios()."'";
	conn_ejecuta($sql);			
}

## Validar socio

function valida_socio()
{
	$sql="select id_usuarios from tbl_usuarios where txt_usuario='".$this->get_txt_usuario()."' "
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


