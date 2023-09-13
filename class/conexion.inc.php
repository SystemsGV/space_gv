<?
class Conexion
{

var $db;
var $host;
var $user;
var $pwd;
var $link;
       function Conexion()
        {
        $this->db="admingr_villa";
        #$this->host="mysql2.onnetsecure.net";
	$this->host="localhost";
        $this->user="admingr_villa";
        $this->pwd="gv1234";
        }

        function Conectar()
        {
        if(!($this->link=mysql_connect($this->host,$this->user,$this->pwd)))
        {die("error no se pudo conectar con el servidor<br>");}
        else
        {
          if(!(mysql_select_db($this->db,$this->link)))
            {die("error no se pudo Selecionar database".mysql_error($this->link));}
            else
                {
                  return $this->link;
                }
        }
        }
}

?>
