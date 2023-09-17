<?
class cls_emp_video{

var $id_video;
var $id_cliente;
var $txt_titulo;
var $txt_url;
var $txt_descripcion;
var $int_stado;

function cls_emp_video($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_video2 where id_video='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);						
		$this->set_id_video($fila['id_video']);
		$this->set_id_cliente($fila['id_cliente']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_url($fila['txt_url']);
		$this->set_txt_descripcion($fila['txt_descripcion']);
		$this->set_int_stado($fila['int_stado']);
	}else{
		$this->set_id_video('');
		$this->set_id_cliente('');
		$this->set_txt_titulo('');
		$this->set_txt_url('');
		$this->set_txt_descripcion('');
		$this->set_int_stado('');
	}		

}


function set_id_video($id_video){	$this->id_video=$id_video;}
function get_id_video(){	return $this->id_video;	}

function set_id_cliente($id_cliente){	$this->id_cliente=$id_cliente;}
function get_id_cliente(){	return $this->id_cliente;	}
 
function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_url($txt_url){	$this->txt_url=$txt_url;}
function get_txt_url(){	return $this->txt_url;	}

function set_txt_descripcion ($txt_descripcion ){	$this->txt_descripcion =$txt_descripcion ;}
function get_txt_descripcion (){	return $this->txt_descripcion ;	}

function set_int_stado($int_stado){	$this->int_stado=$int_stado;}
function get_int_stado(){	return $this->int_stado;	} 

function guarda()

{
		$sql="insert tbl_video2(id_cliente,txt_titulo,txt_url,txt_descripcion,int_stado) values('".
		$this->get_id_cliente()."','".
		$this->get_txt_titulo()."','".
		$this->get_txt_url()."','".
		$this->get_txt_descripcion()."','".
		$this->get_int_stado()."');";	
		//echo $sql;
	conn_ejecuta($sql);
}



function actualiza()
{
		 $sql="update tbl_video2 set 
		 id_cliente='".$this->get_id_cliente()."',
		 txt_titulo='".$this->get_txt_titulo()."',
		 txt_url='".$this->get_txt_url()."',
		 txt_descripcion='".$this->get_txt_descripcion()."',
		 int_stado='".$this->get_int_stado()."' 
		 where id_video='".$this->get_id_video()."'";

	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_video2 where id_video='".$this->get_id_video()."'";
	conn_ejecuta($sql);			
}

}//fin de la clase





?>


