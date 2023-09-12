<?
include("../admin/includes/inc_header.php");
include("../admin/includes/constantes.php");
include("../admin/includes/funciones.php");
include("../admin/includes/fc_global.php");
include("../admin/clases/cls_emp_socio.php");
include("../admin/clases/cls_emp_cupon.php");
include("../admin/clases/cls_emp_usuarios.php");
include("../admin/clases/cls_emp_cuponsel.php");
include("../admin/clases/charts.class.php");
?>

<?php
session_start();
ini_set("session.cookie_lifetime", "7200");
ini_set("session.gc_maxlifetime", "7200");

require_once __DIR__ . '/Adminv2/libs/ActiveRecord.php';

define('DB_HOST','localhost');
define('DB_USER','lagranja_gv');
define('DB_PASS','150613$server');
define('DB_NAME','lagranja_gv');
define('DB_ENGINE','mysql');
define('DB_CHAR','utf8');

/*define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','granjavilla');
define('DB_ENGINE','mysql');
define('DB_CHAR','utf8');*/


class Administrador extends ActiveRecord\Model {	
	static $table_name = 'administrador';		
}
class Noticia extends ActiveRecord\Model {	
	static $table_name = 'noticia';	
	static $primary_key = 'intnoticiaid';	
}
class Ubigeo extends ActiveRecord\Model {	
	static $table_name = 'ubigeo';	
	static $primary_key = 'intubigeoid';		
}

class File extends ActiveRecord\Model {	
	static $table_name = 'file';	
	static $primary_key = 'intfileid';	
	public function get_id_youtube(){
        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $this->txtfilesrc, $parte);
        if (false !== $array) {
            return $parte[1];
        }
        return false;        
    }
}
class Setup extends ActiveRecord\Model {	
	static $table_name = 'setup';	
	static $primary_key = 'intsetupid';	
}
class Cart extends ActiveRecord\Model {	
	static $table_name = 'cart';	
	static $primary_key = 'intcartid';		
}

class Cartdet extends ActiveRecord\Model {	
	static $table_name = 'cartdet';	
	static $primary_key = 'intcartdetid';		
}
class Order extends ActiveRecord\Model {	
	static $table_name = 'order';	
	static $primary_key = 'intcartid';		
}

class Orderdet extends ActiveRecord\Model {	
	static $table_name = 'orderdet';	
	static $primary_key = 'intcartdetid';		
}
class Boleto extends ActiveRecord\Model {	
	static $table_name = 'boleto';	
	static $primary_key = 'intboletoid';		
}
class Cliente extends ActiveRecord\Model {	
	static $table_name = 'tbl_usuarios';	
	static $primary_key = 'id_usuarios';		
}
class Tarjeta extends ActiveRecord\Model {  
  static $table_name = 'TARJETA'; 
  static $primary_key = 'id';    
}

class LogVisa extends ActiveRecord\Model {
    static  $table_name = 'logvisa';
    static $primary_key = 'id';
}

class Descuento extends ActiveRecord\Model {  
  static $table_name = 'descuento'; 
  static $primary_key = 'id';    
}class Nodisponible extends ActiveRecord\Model {    static $table_name = 'nodisponible';   static $primary_key = 'id';    }
//ActiveRecord\Config::$datetime_format = 'Y-m-d H:i:s';
//ActiveRecord\Connection::$datetime_format = 'Y-m-d H:i:s';
//echo ActiveRecord\Config::instance()->get_date_format();


ActiveRecord\Config::initialize(function($cfg){
    $cfg->set_model_directory('.');    
    $cfg->set_connections(array('development'=>'mysql://' . DB_USER . ':' . DB_PASS . '@127.0.0.1/' . DB_NAME.'?charset=utf8'));
    //$cfg->get_date_format();
    //$cfg->set_date_format( "Y-m-d H:i:s" );
});

function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){
    //$source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            //mt_srand(microtime() * 1000000);
            $rand = (double)microtime()*1000000;
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}


function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
if (! function_exists('array_column')) {
    function array_column(array $input, $columnKey, $indexKey = null) {
        $array = array();
        foreach ($input as $value) {
            if ( ! isset($value[$columnKey])) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            }else{
                if ( ! isset($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }if ( ! is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }
}
$_SESSION["sess_cart_membresia"]["idf"]="M1";
$_SESSION["sess_cart_membresia"]["txt"]="MEMBRESIA GENERAL";
$_SESSION["sess_cart_membresia"]["pu"]="10";
?>