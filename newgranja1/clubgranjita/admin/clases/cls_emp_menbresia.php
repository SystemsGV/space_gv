<?
class cls_emp_menbresia{

var $id_menbresia;
var $id_socio;
var $fecha_fnac;
var $int_local;
var $txt_op;
var $fecha_fpago;

function cls_emp_menbresia($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_menbresia where id_menbresia='".$id."'";
		$fila = conn_consulta($sql);						
		$this->set_id_menbresia($fila['id_menbresia']);
		$this->set_id_socio($fila['id_socio']);
		$this->set_fecha_fnac($fila['fecha_fnac']);
		$this->set_int_local($fila['int_local']);
		$this->set_txt_op($fila['txt_op']);
		$this->set_fecha_fpago($fila['fecha_fpago']);
	}else{
		$this->set_id_menbresia('');
		$this->set_id_socio('');
		$this->set_fecha_fnac('');
		$this->set_int_local('');
		$this->set_txt_op('');
		$this->set_fecha_fpago('');
	}		

}


function set_id_menbresia($id_menbresia){	$this->id_menbresia=$id_menbresia;}
function get_id_menbresia(){	return $this->id_menbresia;	}
 
function set_id_socio($id_socio){	$this->id_socio=$id_socio;}
function get_id_socio(){	return $this->id_socio;	}

function set_fecha_fnac($fecha_fnac){	$this->fecha_fnac=$fecha_fnac;}
function get_fecha_fnac(){	return $this->fecha_fnac;	}

function set_int_local($int_local){	$this->int_local=$int_local;}
function get_int_local(){	return $this->int_local;	}

function set_txt_op($txt_op){	$this->txt_op=$txt_op;}
function get_txt_op(){	return $this->txt_op;	} 

function set_fecha_fpago($fecha_fpago){	$this->fecha_fpago=$fecha_fpago;}
function get_fecha_fpago(){	return $this->fecha_fpago;	} 

function guarda()

{
	    $sql="insert tbl_menbresia(id_socio,fecha_fnac,int_local,txt_op,fecha_fpago) values(".
		$this->get_id_socio().",'".
		$this->get_fecha_fnac()."',".
		$this->get_int_local().",'".
		$this->get_txt_op()."','".
		$this->get_fecha_fpago()."');";	
	conn_ejecuta($sql);
}



function actualiza()

{
	$sql="update tbl_menbresia set 
		 id_socio='".$this->get_id_socio()."',
		 txt_op='".$this->get_txt_op()."',
		 fecha_fpago='".$this->get_fecha_fpago()."' 
		 where id_menbresia='".$this->get_id_menbresia()."'";

	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_menbresia where id_menbresia='".$this->get_id_menbresia()."';";
	conn_ejecuta($sql);			
}

/*function maximo_galeria()
{
	$sql="select max(pk_noticia)+1 as pk_noticia from tbl_categoria";
	$max=conn_columna($sql);
	$this->setpk_noticia($max[0]);				 
}*/



/*function actualiza_orden()

{

		$sql="update tbl_categoria set int_orden=".$this->getint_orden()." where pk_noticia=".$this->getpk_noticia();

		conn_ejecuta ($sql);				

}*/


}//fin de la clase





?>

