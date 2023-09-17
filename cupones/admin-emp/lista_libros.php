<?
	include("../includes/inc_header.php");
	
	include("../includes/constantes.php");
	include("../includes/funciones.php");
	include("../clases/cls_emp_cliente.php");
	include("../clases/cls_emp_categoria.php");
	include("../clases/cls_emp_administrador.php");
	include("../clases/cls_paginador_.php");
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	$idcat= $_GET['idcat'];
	$objcat = new cls_emp_categoria($_GET['idcat']);
	$idcats= $objcat->get_id_categoria().trim(strtolower(preg_replace('([^A-Za-z0-9])', '',$objcat->get_txt_nombre())));
	$txt_criterio10=0;
	if ($_POST["txt_criterio10"]=="" || $_POST["txt_criterio10"]==1){
		$txt_criterio10=1;
	}
	else {
		$txt_criterio10=0;
	}
	
	if ($_POST["txt_criterio11"]<>""){
		$txt_criterio11 = $_POST["txt_criterio11"];
	}elseif ($_GET["txt_criterio11"]<>""){
		$txt_criterio11 = $_GET["txt_criterio11"];	
	}
	
	if ($_POST["txt_criterio12"]<>""){
		$txt_criterio12 = $_POST["txt_criterio12"];
	}elseif ($_GET["txt_criterio12"]<>""){
		$txt_criterio12 = $_GET["txt_criterio12"];	
	}
	
	if ($_POST["txt_criterio13"]<>""){
		$txt_criterio13 = $_POST["txt_criterio13"];
	}elseif ($_GET["txt_criterio13"]<>""){
		$txt_criterio13 = $_GET["txt_criterio13"];	
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS CUPONES</title>

    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
    <link rel="stylesheet"  href="styles/estilos.css"type="text/css">
	<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id,idcat)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_clientes.php?op=3&id="+id+"&idcat="+idcat;
	}
}
</script>
<style>
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
	background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
	background-color:#007dc1;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:9px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0061a7), color-stop(1, #007dc1));
	background:-moz-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-webkit-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-o-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-ms-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0061a7', endColorstr='#007dc1',GradientType=0);
	background-color:#0061a7;
}
.myButton:active {
	position:relative;
	top:1px;
}

.myButton2 {
	-moz-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	box-shadow:inset 0px 1px 0px 0px #fce2c1;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffb357), color-stop(1, #eb8100));
	background:-moz-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-webkit-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-o-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-ms-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:linear-gradient(to bottom, #ffb357 5%, #eb8100 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffb357', endColorstr='#eb8100',GradientType=0);
	background-color:#ffb357;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #db8b00;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:10px 18px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b36e00;
}
.myButton2:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #eb8100), color-stop(1, #ffb357));
	background:-moz-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-webkit-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-o-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-ms-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:linear-gradient(to bottom, #eb8100 5%, #ffb357 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eb8100', endColorstr='#ffb357',GradientType=0);
	background-color:#eb8100;
}
.myButton2:active {
	position:relative;
	top:1px;
}


</style>
</head>
 
<body onload="lista_libros('');">
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <?include("cabecera.php")?>
        </div>

        
    </nav>
    <div class="container">
         <div class="row form-horizontal">
            <ul class="nav nav-tabs">
              <!--<li class="active"><a href="#tab_consultar" data-toggle="tab">Tab A</a></li>
              <li><a href="#tab_registrar" data-toggle="tab">Tab B</a></li>-->
              
            </ul>
        </div>
        </br>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">MODULO CUPONES</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4  text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>
                                </div>
                                <div class="col-xs-4">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_libros(this.value);" placeholder="Ingrese nombre o descripcion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_registrar">
                <h4>Pane B</h4>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                    ac turpis egestas.</p>
            </div>
                
        </div><!-- tab content -->
    </div>
    <script src="../Resources/js/jquery-1.11.2.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script src="../Resources/js/libros.js"></script>
</body>
</html>

    