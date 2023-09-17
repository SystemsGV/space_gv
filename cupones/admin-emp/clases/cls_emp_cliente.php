<?
class cls_emp_cliente{

var $id_cliente;
var $id_categoria;
var $txt_nombre;
var $txt_nombre2;
var $txt_nombre3;
var $txt_nombre4;
var $txt_nombre5;
var $txt_nombre6;
var $txt_nombre7;
var $txt_nombre8;
var $txt_direccion;
var $txt_traslados;
var $txt_alojamiento;
var $txt_dias;
var $txt_noches;
var $txt_adicionales;
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
		
		$sql="select * from tbl_cliente where id_cliente='".$id."' order by id_cliente";
		
		$fila = conn_consulta($sql);						
		$this->set_id_cliente($fila['id_cliente']);
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_txt_nombre2($fila['txt_nombre2']);
		$this->set_txt_nombre3($fila['txt_nombre3']);
		$this->set_txt_nombre4($fila['txt_nombre4']);
		$this->set_txt_nombre5($fila['txt_nombre5']);
		$this->set_txt_nombre6($fila['txt_nombre6']);
		$this->set_txt_nombre7($fila['txt_nombre7']);
		$this->set_txt_nombre8($fila['txt_nombre8']);
		$this->set_txt_direccion($fila['txt_direccion']);
		$this->set_txt_traslados($fila['txt_traslados']);
		$this->set_txt_alojamiento($fila['txt_alojamiento']);
		$this->set_txt_dias($fila['txt_dias']);
		$this->set_txt_noches($fila['txt_noches']);
		$this->set_txt_adicionales($fila['txt_adicionales']);				
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
		$this->set_txt_nombre2('');
		$this->set_txt_nombre3('');
		$this->set_txt_nombre4('');
		$this->set_txt_nombre5('');
		$this->set_txt_nombre6('');
		$this->set_txt_nombre7('');
		$this->set_txt_nombre8('');
		$this->set_txt_direccion('');	
		$this->set_txt_traslados('');	
		$this->set_txt_alojamiento('');	
		$this->set_txt_dias('');	
		$this->set_txt_noches('');	
		$this->set_txt_adicionales('');				
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

function set_txt_nombre2($txt_nombre2){	$this->txt_nombre2=$txt_nombre2;}
function get_txt_nombre2(){	return $this->txt_nombre2;	} 

function set_txt_nombre3($txt_nombre3){	$this->txt_nombre3=$txt_nombre3;}
function get_txt_nombre3(){	return $this->txt_nombre3;	} 

function set_txt_nombre4($txt_nombre4){	$this->txt_nombre4=$txt_nombre4;}
function get_txt_nombre4(){	return $this->txt_nombre4;	} 

function set_txt_nombre5($txt_nombre5){	$this->txt_nombre5=$txt_nombre5;}
function get_txt_nombre5(){	return $this->txt_nombre5;	} 

function set_txt_nombre6($txt_nombre6){	$this->txt_nombre6=$txt_nombre6;}
function get_txt_nombre6(){	return $this->txt_nombre6;	} 

function set_txt_nombre7($txt_nombre7){	$this->txt_nombre7=$txt_nombre7;}
function get_txt_nombre7(){	return $this->txt_nombre7;	} 

function set_txt_nombre8($txt_nombre8){	$this->txt_nombre8=$txt_nombre8;}
function get_txt_nombre8(){	return $this->txt_nombre8;	} 

function set_txt_direccion($txt_direccion){	$this->txt_direccion=$txt_direccion;}
function get_txt_direccion(){	return $this->txt_direccion;	}

function set_txt_traslados($txt_traslados){	$this->txt_traslados=$txt_traslados;}
function get_txt_traslados(){	return $this->txt_traslados;	}

function set_txt_alojamiento($txt_alojamiento){	$this->txt_alojamiento=$txt_alojamiento;}
function get_txt_alojamiento(){	return $this->txt_alojamiento;	}

function set_txt_dias($txt_dias){	$this->txt_dias=$txt_dias;}
function get_txt_dias(){	return $this->txt_dias;	}

function set_txt_noches($txt_noches){	$this->txt_noches=$txt_noches;}
function get_txt_noches(){	return $this->txt_noches;	}

function set_txt_adicionales($txt_adicionales){	$this->txt_adicionales=$txt_adicionales;}
function get_txt_adicionales(){	return $this->txt_adicionales;	}

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
	$sql="insert into tbl_cliente(id_categoria, txt_nombre, txt_nombre2, txt_nombre3, txt_nombre4, txt_nombre5, txt_nombre6, txt_nombre7, txt_nombre8, txt_direccion, txt_traslados, txt_alojamiento, txt_dias, txt_noches, txt_adicionales, txt_telefono, txt_celular, txt_email, txt_proyecto,txt_departamento, txt_usuario, txt_password, int_stado)"
		 ." values('".$this->get_id_categoria()."',
		  '".$this->get_txt_nombre()."', 
		  '".$this->get_txt_nombre2()."', 
		  '".$this->get_txt_nombre3()."', 
		  '".$this->get_txt_nombre4()."', 
		  '".$this->get_txt_nombre5()."', 
		  '".$this->get_txt_nombre6()."', 
		  '".$this->get_txt_nombre7()."', 
		  '".$this->get_txt_nombre8()."', 
		  '".$this->get_txt_direccion()."', 
		  '".$this->get_txt_traslados()."', 
		  '".$this->get_txt_alojamiento()."', 
		  '".$this->get_txt_dias()."', 
		  '".$this->get_txt_noches()."', 
		  '".$this->get_txt_adicionales()."', 
		  '".$this->get_txt_telefono()."', 
		  '".$this->get_txt_celular()."', 
		  '".$this->get_txt_email()."', 
		  '".$this->get_txt_proyecto()."', 
		  '".$this->get_txt_departamento()."', 
		  '".$this->get_txt_usuario()."', 
		  '".$this->get_txt_password()."', 
		  '".$this->get_int_stado()."');";
	$id = conn_ejecuta($sql);
	$this->set_id_cliente($id);				 
}

function actualiza()
{
		$sql="update tbl_cliente set id_categoria='".$this->get_id_categoria()."', "
		." txt_nombre='".$this->get_txt_nombre()."', "
		." txt_nombre2='".$this->get_txt_nombre2()."', "
		." txt_nombre3='".$this->get_txt_nombre3()."', "
		." txt_nombre4='".$this->get_txt_nombre4()."', "
		." txt_nombre5='".$this->get_txt_nombre5()."', "
		." txt_nombre6='".$this->get_txt_nombre6()."', "
		." txt_nombre7='".$this->get_txt_nombre7()."', "
		." txt_nombre8='".$this->get_txt_nombre8()."', "
		." txt_direccion='".$this->get_txt_direccion()."', "
		." txt_traslados='".$this->get_txt_traslados()."', "
		." txt_alojamiento='".$this->get_txt_alojamiento()."', "
		." txt_dias='".$this->get_txt_dias()."', "
		." txt_noches='".$this->get_txt_noches()."', "
		." txt_adicionales='".$this->get_txt_adicionales()."', "			
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
	$sql="delete from tbl_cliente where id_cliente='".$this->get_id_cliente()."'";
	conn_ejecuta($sql);			
}

## Validar socio

function valida_socio()
{
	$sql="select id_cliente from tbl_cliente where txt_usuario='".$this->get_txt_usuario()."' "
		    ." and txt_password='".$this->get_txt_password()."' and int_stado='0'";
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


