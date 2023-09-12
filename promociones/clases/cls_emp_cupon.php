<?
class cls_emp_cupon{

var $id_cupon;
var $txt_val1;
var $txt_val2;
var $txt_val3;
var $txt_val4;
var $txt_val5;
var $txt_des1;
var $txt_des2;
var $txt_des3;
var $txt_des4;
var $txt_des5;
var $fecha_impi;
var $fecha_impf;

function cls_emp_cupon($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_cupon where id_cupon='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);						
		$this->set_id_cupon($fila['id_cupon']);
		$this->set_txt_val1($fila['txt_val1']);
		$this->set_txt_val2($fila['txt_val2']);
		$this->set_txt_val3($fila['txt_val3']);
		$this->set_txt_val4($fila['txt_val4']);
		$this->set_txt_val5($fila['txt_val5']);
		$this->set_txt_des1($fila['txt_des1']);
		$this->set_txt_des2($fila['txt_des2']);
		$this->set_txt_des3($fila['txt_des3']);
		$this->set_txt_des4($fila['txt_des4']);
		$this->set_txt_des5($fila['txt_des5']);
		$this->set_fecha_impi($fila['fecha_impi']);
		$this->set_fecha_impf($fila['fecha_impf']);
	}else{
		$this->set_id_cupon('');
		$this->set_txt_val1('');
		$this->set_txt_val2('');
		$this->set_txt_val3('');
		$this->set_txt_val4('');
		$this->set_txt_val5('');
		$this->set_txt_des1('');
		$this->set_txt_des2('');
		$this->set_txt_des3('');
		$this->set_txt_des4('');
		$this->set_txt_des5('');
		$this->set_fecha_impi('');
		$this->set_fecha_impf('');
	}		

}


function set_id_cupon($id_cupon){	$this->id_cupon=$id_cupon;}
function get_id_cupon(){	return $this->id_cupon;	}
 
function set_txt_val1($txt_val1){	$this->txt_val1=$txt_val1;}
function get_txt_val1(){	return $this->txt_val1;	} 

function set_txt_val2($txt_val2){	$this->txt_val2=$txt_val2;}
function get_txt_val2(){	return $this->txt_val2;	} 

function set_txt_val3($txt_val3){	$this->txt_val3=$txt_val3;}
function get_txt_val3(){	return $this->txt_val3;	} 

function set_txt_val4($txt_val4){	$this->txt_val4=$txt_val4;}
function get_txt_val4(){	return $this->txt_val4;	} 

function set_txt_val5($txt_val5){	$this->txt_val5=$txt_val5;}
function get_txt_val5(){	return $this->txt_val5;	} 

function set_txt_des1($txt_des1){	$this->txt_des1=$txt_des1;}
function get_txt_des1(){	return $this->txt_des1;	} 

function set_txt_des2($txt_des2){	$this->txt_des2=$txt_des2;}
function get_txt_des2(){	return $this->txt_des2;	} 

function set_txt_des3($txt_des3){	$this->txt_des3=$txt_des3;}
function get_txt_des3(){	return $this->txt_des3;	} 

function set_txt_des4($txt_des4){	$this->txt_des4=$txt_des4;}
function get_txt_des4(){	return $this->txt_des4;	}

function set_txt_des5($txt_des5){	$this->txt_des5=$txt_des5;}
function get_txt_des5(){	return $this->txt_des5;	} 

function set_fecha_impi($fecha_impi){	$this->fecha_impi=$fecha_impi;}
function get_fecha_impi(){	return $this->fecha_impi;	} 

function set_fecha_impf($fecha_impf){	$this->fecha_impf=$fecha_impf;}
function get_fecha_impf(){	return $this->fecha_impf;	} 

function guarda()

{
	$sql="insert tbl_cupon(id_cupon,txt_val1,txt_val2,txt_val3,txt_val4,txt_val5,txt_des1,txt_des2,txt_des3,txt_des4,txt_des5,fecha_impi,fecha_impf) values('".
		$this->get_id_cupon()."','".
		$this->get_txt_val1()."','".
		$this->get_txt_val2()."','".
		$this->get_txt_val3()."','".
		$this->get_txt_val4()."','".
		$this->get_txt_val5()."','".
		$this->get_txt_des1()."','".
		$this->get_txt_des2()."','".
		$this->get_txt_des3()."','".
		$this->get_txt_des4()."','".
		$this->get_txt_des5()."','".
		$this->get_fecha_impi()."','".
		$this->get_fecha_impf()."');";
	//echo $sql;
	conn_ejecuta($sql);
}



function actualiza()

{
	echo $sql="update tbl_cupon set 
		 id_cupon='".$this->get_id_cupon()."',
		 txt_val1='".$this->get_txt_val1()."',
 		 txt_val2='".$this->get_txt_val2()."',
		 txt_val3='".$this->get_txt_val3()."',
		 txt_val4='".$this->get_txt_val4()."',
		 txt_val5='".$this->get_txt_val5()."',
		 txt_des1='".$this->get_txt_des1()."',
		 txt_des2='".$this->get_txt_des2()."',
		 txt_des3='".$this->get_txt_des3()."',
		 txt_des4='".$this->get_txt_des4()."',
		 txt_des5='".$this->get_txt_des5()."',
		 fecha_impi='".$this->get_fecha_impi()."',
		 fecha_impf='".$this->get_fecha_impf()."'
		 where id_cupon='".$this->get_id_cupon()."'";
	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_cupon where id_cupon='".$this->get_id_menbresia()."';";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>

