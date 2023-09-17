<?
class cls_emp_categoria{

var $id_categoria;
var $int_zona;
var $txt_nombre;
var $txt_nombre2;
var $txt_terminos;
var $txt_terminos3;
var $txt_terminos4;
var $txt_terminos2;

function cls_emp_categoria($idcat=0)
{
	if($idcat!=0)
	{
		$sql="select * from tbl_categoria where id_categoria='".$idcat."' order by id_categoria";
		$fila = conn_consulta($sql);						
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_int_zona($fila['int_zona']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_txt_nombre2($fila['txt_nombre2']);
		$this->set_txt_terminos($fila['txt_terminos']);
		$this->set_txt_terminos3($fila['txt_terminos3']);
		$this->set_txt_terminos4($fila['txt_terminos4']);				
		$this->set_txt_terminos2($fila['txt_terminos2']);				
	}else{
		$this->set_id_categoria('');
		$this->set_int_zona('');
		$this->set_txt_nombre('');
		$this->set_txt_nombre2('');
		$this->set_txt_terminos('');
		$this->set_txt_terminos3('');
		$this->set_txt_terminos4('');
		$this->set_txt_terminos2('');				
	}		
}

function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	}

function set_int_zona($int_zona){	$this->int_zona=$int_zona;}
function get_int_zona(){	return $this->int_zona;	} 

function set_txt_nombre($txt_nombre){	$this->txt_nombre=$txt_nombre;}
function get_txt_nombre(){	return $this->txt_nombre;	} 

function set_txt_nombre2($txt_nombre2){	$this->txt_nombre2=$txt_nombre2;}
function get_txt_nombre2(){	return $this->txt_nombre2;	} 

function set_txt_terminos($txt_terminos){	$this->txt_terminos=$txt_terminos;}
function get_txt_terminos(){	return $this->txt_terminos;	}

function set_txt_terminos3($txt_terminos3){	$this->txt_terminos3=$txt_terminos3;}
function get_txt_terminos3(){	return $this->txt_terminos3;	}

function set_txt_terminos4($txt_terminos4){	$this->txt_terminos4=$txt_terminos4;}
function get_txt_terminos4(){	return $this->txt_terminos4;	}

function set_txt_terminos2($txt_terminos2){	$this->txt_terminos2=$txt_terminos2;}
function get_txt_terminos2(){	return $this->txt_terminos2;	}


function guarda()
{
	$sql="insert into tbl_categoria(int_zona, txt_nombre, txt_nombre2, txt_terminos, txt_terminos3, txt_terminos4, txt_terminos2)"
		 ." values('".$this->get_int_zona()."', '".$this->get_txt_nombre()."', '".$this->get_txt_nombre2()."', '".$this->get_txt_terminos()."', '".$this->get_txt_terminos3()."', '".$this->get_txt_terminos4()."', '".$this->get_txt_terminos2()."');";
	$id = conn_ejecuta($sql);
	$this->set_id_categoria($idcat);				 
}

function actualiza()
{
		$sql="update tbl_categoria set 
		int_zona='".$this->get_int_zona()."', 
		txt_nombre='".$this->get_txt_nombre()."', 
		txt_nombre2='".$this->get_txt_nombre2()."', 
		txt_terminos='".$this->get_txt_terminos()."', 
		txt_terminos3='".$this->get_txt_terminos3()."', 
		txt_terminos4='".$this->get_txt_terminos4()."', 
		txt_terminos2='".$this->get_txt_terminos2()."' 
		where id_categoria='".$this->get_id_categoria()."'";

	conn_ejecuta($sql);		
}

function elimina()
{
	$sql="delete from tbl_categoria where id_categoria='".$this->get_id_categoria()."'";
	conn_ejecuta($sql);			
}

## Validar socio

function valida_socio()
{
	$sql="select id_cliente from tbl_cliente where txt_usuario='".$this->get_txt_usuario()."' "
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


