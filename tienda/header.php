<script type="text/javascript">
    var d = new Date();
    var xyear=d.getFullYear();
    var xmonth=d.getMonth();
    var xday=d.getDate();
    var xevento;
</script>
<header class="masthead"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <div class="container">
        <div class="row">
            <!--<div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4 text-right">
                <i class="fa fa-ticket"></i> 
                <a href="?mod=cart">ENTRADAS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i> 
                <a href="?mod=list">CARRITO (<?=count($_SESSION["sess_cart"])?>)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>
                <a href="?mod=registro"> CLUB GRANJA</a>          
            </div>
            </div>-->
            <div class="col-md-12">         
                <ul class="nav navbar-topall navbar-nav navbar-right">
                    <li style="background:#f6f6f6;">
                        <a href="http://lagranjavilla.com/tiendaNew/" style="color:#3b1a04;" id="btn_neww">
                            <i class="fa fa-ticket"></i> COMPRAR ENTRADAS
                        </a>
                    </li>
                    <li>
                        <a href="https://lagranjavilla.com/tiendaNew/?mod=list"><i class="fa fa-shopping-cart"></i> <span class="cart-items"><?=count($_SESSION["sess_cart"])?></span> - tickets</a>
                    </li>
                    <?php
                    if(isset($_SESSION["sess_user"])) {
                    ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido: <?=$_SESSION["sess_user"]["usuario"]?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">                            
                                <li><a href="?mod=registro"><i class="fa fa-tasks"></i> Perfil</a></li>
                                <li class="divider"></li>
    							<li><a href="?mod=entradas"><i class="fa fa-tasks"></i> Modificar Entradas</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php?true"><i class="icon-off"></i> Cerrar Sessión</a></li>
                            </ul>
                        </li>
                    <?php 
                    } else {
                    ?>
                        <li class="dropdown">
                            <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>   Ingresar<b class="caret"></b>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-default navbar-static" role="navigation" id="nav">
    <div class="container">        
        <div class="navbar-header">
            <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>-->
            <a class="navbar-brand visible-xs" href="#"><img src="img/logo.png" width="55" ></a>
        </div>        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-left">
    	        <!--<li><a href="http://www.lagranjavilla.com/organizacion.php">ORGANIZACIÓN</a></li>
    			<li><a href="http://www.lagranjavilla.com/servicios.php">SERVICIOS</a></li>
    			<li><a href="http://www.lagranjavilla.com/atracciones.php">ATRACCIONES</a></li>-->
    		</ul>
    		<a href="http://www.lagranjavilla.com" class="logo visible-lg visible-md"><img src="img/logo.png"></a>
    		<div id="brand" class="visible-lg visible-md">&nbsp;</div>
    		<ul class="nav navbar-nav nav-right">
    		    <!--<li><a href="http://www.lagranjavilla.com/instalaciones.php">INSTALACIONES</a></li>
    		    <li><a href="http://www.lagranjavilla.com/promociones/">PROMOCIONES</a></li>
                <li><a href="http://www.lagranjavilla.com/contactenos.php">CONTACTO</a></li>-->
    		</ul>          
        </div>
    </div>
</nav>
<?php
if($mod=="index") {
?>
    <!--<div id="home">
        <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" style="background: url(img/slider/01.jpg);"></div>
                <div class="item" style="background: url(img/slider/02.jpg);"></div>
                <div class="item" style="background: url(img/slider/03.jpg);"></div>
            </div>
            <a class="left carousel-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="right carousel-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
            <div class="pattern"></div>
        </div>
    </div>-->
<?php
} 
?>

<style>

ul.dropdown-cart{
    min-width:250px;
}

ul.dropdown-cart li .item{
    display:block;
    padding:3px 10px;
    margin: 3px 0;
    color:#3b3b3b;
    font-size:12px;
}

ul.dropdown-cart li .item:hover{
    background-color:#f3f3f3;
}

ul.dropdown-cart li .item:after{
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

ul.dropdown-cart li .item-left{
    float:left;
}

ul.dropdown-cart li .item-left img,
ul.dropdown-cart li .item-left span.item-info{
    float:left;
}

ul.dropdown-cart li .item-left span.item-info{
    margin-left:10px;   
}

ul.dropdown-cart li .item-left span.item-info span{
    display:block;
}

ul.dropdown-cart li .item-right{
    float:right;
}

ul.dropdown-cart li .item-right button{
    margin-top:14px;
}

</style>