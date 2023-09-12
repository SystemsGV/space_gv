<?
class cls_emp_cuponsel{
var $id_cuponsel;
var $id_usuarios;
var $id_fotocupon; 
var $fecha_reg;

function cls_emp_cuponsel($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_cuponsel where id_cuponsel='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);						
		$this->set_id_cuponsel($fila['id_cuponsel']);
		$this->set_id_usuarios($fila['id_usuarios']);
		$this->set_id_fotocupon($fila['id_fotocupon']);
		$this->set_fecha_reg($fila['fecha_reg']);
	}else{
		$this->set_id_cuponsel('');
		$this->set_id_usuarios('');
		$this->set_id_fotocupon('');
		$this->set_fecha_reg('');
	}		

}


function set_id_cuponsel($id_cuponsel){	$this->id_cuponsel=$id_cuponsel;}
function get_id_cuponsel(){	return $this->id_cuponsel;	}
 
function set_id_usuarios($id_usuarios){	$this->id_usuarios=$id_usuarios;}
function get_id_usuarios(){	return $this->id_usuarios;	} 

function set_id_fotocupon($id_fotocupon){	$this->id_fotocupon=$id_fotocupon;}
function get_id_fotocupon(){	return $this->id_fotocupon;	} 

function set_fecha_reg($fecha_reg){	$this->fecha_reg=$fecha_reg;}
function get_fecha_reg(){	return $this->fecha_reg;	} 

function guarda()

{
	$sql="insert tbl_cuponsel(id_usuarios, id_fotocupon, fecha_reg, estado) values('".
		$this->get_id_usuarios()."','".
		$this->get_id_fotocupon()."',now(), '0');";	
	$id =conn_ejecuta($sql);
	$this->set_id_cuponsel($id);
}

function reinicia(){
	$sql="update tbl_cuponsel set  fecha_reg='0' ";
	$sql2="update tbl_cuponsel set  fecha_reg='1' where id_cuponsel='".$this->get_id_cuponsel()."' ";
	conn_ejecuta($sql);	
	conn_ejecuta($sql2);		
}

function actualiza()
{
		 $sql="update tbl_cuponsel set 
		 id_usuarios='".$this->get_id_usuarios()."',
		 id_fotocupon='".$this->get_id_fotocupon()."',
		 fecha_reg='".$this->get_fecha_reg()."' 
		 where id_cuponsel='".$this->get_id_cuponsel()."'";

	conn_ejecuta($sql);	
	

}



function elimina()
{
	$sql="delete from tbl_cuponsel where id_cuponsel='".$this->get_id_cuponsel()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

