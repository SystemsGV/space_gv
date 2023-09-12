<?
class cls_emp_socio{

var $id_socio;
var $txt_codsocio;
var $txt_codtarjeta;
var $txt_apellidos;
var $txt_nombres;
var $txt_direccion;
var $txt_telefono;
var $txt_email;
var $txt_fechanac;
var $txt_cantptos;
var $txt_cuni;
var $txt_tipo;
var $txt_usuario;
var $txt_psw;
var $int_stado;

function cls_emp_socio($id=0)
{
	if($id!=0)
	{
		$sql="select id_socio,txt_codsocio,txt_codtarjeta,txt_apellidos,txt_nombres,txt_direccion,txt_telefono,txt_email,txt_fechanac,txt_cantptos,txt_tipo,txt_usuario,txt_psw from tbl_socio where id_socio='".$id."' order by id_socio";
		$fila = conn_consulta($sql);						
		$this->set_id_socio($fila['id_socio']);		
		$this->set_txt_codsocio($fila['txt_codsocio']);
		$this->set_txt_codtarjeta($fila['txt_codtarjeta']);
		$this->set_txt_apellidos($fila['txt_apellidos']);
		$this->set_txt_nombres($fila['txt_nombres']);
		$this->set_txt_direccion($fila['txt_direccion']);
		$this->set_txt_telefono($fila['txt_telefono']);
		$this->set_txt_email($fila['txt_email']);
		$this->set_txt_fechanac($fila['txt_fechanac']);
		$this->set_txt_cantptos($fila['txt_cantptos']);		
		$this->set_txt_tipo($fila['txt_tipo']);		
		$this->set_txt_usuario($fila['txt_usuario']);				
		$this->set_txt_pws($fila['txt_psw']);				
	}else{
		$this->set_id_socio('');		
		$this->set_txt_apellidos('');
		$this->set_txt_nombres('');
		$this->set_txt_direccion('');
		$this->set_txt_telefono('');
		$this->set_txt_email('');
		$this->set_txt_fechanac('');
		$this->set_txt_cantptos('');		
		$this->set_txt_tipo('');		
		$this->set_txt_usuario('');				
		$this->set_txt_pws('');				
	}		
}

function set_id_socio($id_socio){	$this->id_socio=$id_socio;}
function get_id_socio(){	return $this->id_socio;	} 

function set_txt_codsocio($txt_codsocio){	$this->txt_codsocio=$txt_codsocio;}
function get_txt_codsocio(){	return $this->txt_codsocio;	} 

function set_txt_codtarjeta($txt_codtarjeta){	$this->txt_codtarjeta=$txt_codtarjeta;}
function get_txt_codtarjeta(){	return $this->txt_codtarjeta;	} 

function set_txt_apellidos($txt_apellidos){	$this->txt_apellidos=$txt_apellidos;}
function get_txt_apellidos(){	return $this->txt_apellidos;	} 

function set_txt_nombres($txt_nombres){	$this->txt_nombres=$txt_nombres;}
function get_txt_nombres(){	return $this->txt_nombres;	} 

function set_txt_direccion($txt_direccion){	$this->txt_direccion=$txt_direccion;}
function get_txt_direccion(){	return $this->txt_direccion;	}

function set_txt_telefono($txt_telefono){	$this->txt_telefono=$txt_telefono;}
function get_txt_telefono(){	return $this->txt_telefono;	}

function set_txt_email($txt_email){	$this->txt_email=$txt_email;}
function get_txt_email(){	return $this->txt_email;	}

function set_txt_fechanac($txt_fechanac){	$this->txt_fechanac=$txt_fechanac;}
function get_txt_fechanac(){	return $this->txt_fechanac;	}

function set_txt_cantptos($txt_cantptos){	$this->txt_cantptos=$txt_cantptos;}
function get_txt_cantptos(){	return $this->txt_cantptos;	}

function set_txt_tipo($txt_tipo){	$this->txt_tipo=$txt_tipo;}
function get_txt_tipo(){	return $this->txt_tipo;	} 

function set_txt_usuario($txt_usuario){	$this->txt_usuario=$txt_usuario;}
function get_txt_usuario(){	return $this->txt_usuario;	} 

function set_txt_pws($txt_pws){	$this->txt_pws=$txt_pws;}
function get_txt_pws(){	return $this->txt_pws;	} 

function guarda()
{
	$sql="insert into tbl_socio(txt_codsocio,txt_codtarjeta,txt_apellidos,txt_nombres,txt_direccion,txt_telefono,txt_email,txt_fechanac,txt_cantptos,txt_tipo,txt_usuario,txt_psw)"
		 ." values('".$this->get_txt_codsocio()."','".$this->get_txt_codtarjeta()."', '".$this->get_txt_apellidos()."', '".$this->get_txt_nombres()."', '".$this->get_txt_direccion()."', '".$this->get_txt_telefono()."', '".$this->get_txt_email()."', '".$this->get_txt_fechanac()."', '".$this->get_txt_cantptos()."', '".$this->get_txt_usuario()."', '".$this->get_txt_tipo()."', '".$this->get_txt_pws()."');";
	$id = conn_ejecuta($sql);
	$this->set_id_socio($id);				 
}

function actualiza()
{
	$sql="update tbl_socio set 
	   		txt_codsocio='".$this->get_txt_codsocio()."', "
	   	."	txt_codtarjeta='".$this->get_txt_codtarjeta()."', "
		."  txt_apellidos='".$this->get_txt_apellidos()."', "
		." txt_nombres='".$this->get_txt_nombres()."', "
		." txt_direccion='".$this->get_txt_direccion()."', "
		." txt_telefono='".$this->get_txt_telefono()."', "
		." txt_email='".$this->get_txt_email()."', "
		." txt_fechanac='".$this->get_txt_fechanac()."', "
		." txt_cantptos='".$this->get_txt_cantptos()."', "
		." txt_tipo='".$this->get_txt_tipo()."', "
		." txt_usuario='".$this->get_txt_usuario()."', "
		." txt_psw='".$this->get_txt_pws()."'"
		." where id_socio='".$this->get_id_socio()."'";
		$sql;
	conn_ejecuta($sql) or die("SQL Error UPDATE : ".$sql);		
}

function elimina()
{
	$sql="delete from tbl_socio where id_socio='".$this->get_id_socio()."'";
	conn_ejecuta($sql);			
}


## Validar socio

function valida_socio()
{
	$sql="select id_socio from tbl_socio where txt_usuario='".$this->get_txt_usuario()."' "
		    ." and txt_psw='".$this->get_txt_pws()."' ";
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

