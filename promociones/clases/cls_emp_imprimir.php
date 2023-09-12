<?
class cls_emp_imprimir{

var $id_imprimir;
var $id_cupon;
var $id_socio;
var $fecha_fimp1;
var $fecha_fimp2;
var $fecha_fimp3;
var $fecha_fimp4;
var $fecha_fimp5;

function cls_emp_imprimir($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_imprimir where id_imprimir='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);						
		$this->set_id_imprimir($fila['id_imprimir']);
		$this->set_id_cupon($fila['id_cupon']);
		$this->set_id_socio($fila['id_socio']);
		$this->set_fecha_fimp1($fila['fecha_fimp1']);
		$this->set_fecha_fimp2($fila['fecha_fimp2']);
		$this->set_fecha_fimp3($fila['fecha_fimp3']);
		$this->set_fecha_fimp4($fila['fecha_fimp4']);
		$this->set_fecha_fimp5($fila['fecha_fimp5']);
	}else{
		$this->set_id_imprimir('');
		$this->set_id_cupon('');
		$this->set_id_socio('');
		$this->set_fecha_fimp1('');
		$this->set_fecha_fimp2('');
		$this->set_fecha_fimp3('');
		$this->set_fecha_fimp4('');
		$this->set_fecha_fimp5('');
	}		

}


function set_id_imprimir($id_imprimir){	$this->id_imprimir=$id_imprimir;}
function get_id_imprimir(){	return $this->id_imprimir;	}
 
function set_id_cupon($id_cupon){	$this->id_cupon=$id_cupon;}
function get_id_cupon(){	return $this->id_cupon;	} 

function set_id_socio($id_socio){	$this->id_socio=$id_socio;}
function get_id_socio(){	return $this->id_socio;	} 

function set_fecha_fimp1($fecha_fimp1){	$this->fecha_fimp1=$fecha_fimp1;}
function get_fecha_fimp1(){	return $this->fecha_fimp1;	} 

function set_fecha_fimp2($fecha_fimp2){	$this->fecha_fimp2=$fecha_fimp2;}
function get_fecha_fimp2(){	return $this->fecha_fimp2;	} 

function set_fecha_fimp3($fecha_fimp3){	$this->fecha_fimp3=$fecha_fimp3;}
function get_fecha_fimp3(){	return $this->fecha_fimp3;	} 

function set_fecha_fimp4($fecha_fimp4){	$this->fecha_fimp4=$fecha_fimp4;}
function get_fecha_fimp4(){	return $this->fecha_fimp4;	} 

function set_fecha_fimp5($fecha_fimp5){	$this->fecha_fimp5=$fecha_fimp5;}
function get_fecha_fimp5(){	return $this->fecha_fimp5;	} 


function imprimir($fecha_fimp,$fecha)
{
	$campo="fecha_fimp$fecha_fimp";
	$sql="insert tbl_imprimir(id_cupon,id_socio,$campo) values('".
		$this->get_id_cupon()."','".
		$this->get_id_socio()."','".
		$fecha."')";	
	conn_ejecuta($sql);
}

function guarda()

{
	$sql="insert tbl_imprimir(id_cupon,id_socio,fecha_fimp1,fecha_fimp2,fecha_fimp3,fecha_fimp4,fecha_fimp5) values('".
		$this->get_id_cupon()."','".
		$this->get_id_socio()."','".
		$this->get_fecha_fimp1()."','".
		$this->get_fecha_fimp2()."','".
		$this->get_fecha_fimp3()."','".
		$this->get_fecha_fimp4()."','".
		$this->get_fecha_fimp5()."');";	
	conn_ejecuta($sql);
}



function actualiza()

{
	$sql="update tbl_imprimir set 
		 id_cupon='".$this->get_id_cupon()."',
		 id_socio='".$this->get_id_socio()."',
		 fecha_fimp1='".$this->get_fecha_fimp1()."',
		 fecha_fimp2='".$this->get_fecha_fimp2()."',
		 fecha_fimp3='".$this->get_fecha_fimp3()."',
		 fecha_fimp4='".$this->get_fecha_fimp4()."',
		 fecha_fimp5='".$this->get_fecha_fimp5()."'
		 where id_categoria='".$this->get_id_categoria()."'";
	
	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_imprimir where id_imprimir='".$this->get_id_imprimir()."';";
	conn_ejecuta($sql);			
}




}//fin de la clase


?>

