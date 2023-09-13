<section class="sidebar"> 
    <div class="user-panel">
            <div class="pull-left image"><!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />--></div>
            <div class="pull-left info">
                <p><?php echo $_SESSION[sess_admin][titulo]?></p> <a href="prc.php?out=true"><i class="fa fa-circle text-success"></i> Cerrar Sesión</a></div>  
    </div>
    <ul class="sidebar-menu">   
        <li class="header">MODULOS</li> <!--<li <?php if($mod=="membresia"){echo 'class="active"';}?>><a href="?mod=membresia&page=index"><i class="fa fa-tags"></i><span>Membresia</span></a></li>-->	
            <?php if($_SESSION['sess_admin']['tipo']==1){ ?>    
            <li <?php if($mod=="boletos"){echo 'class="active"';}?>><a href="?mod=boletos&page=index"><i class="fa fa-ticket"></i><span>ENTRADAS</span></a></li>
	<?php } ?>   
        <?php if($_SESSION['sess_admin']['tipo']==1 || $_SESSION['sess_admin']['tipo']==2){ ?>    
        <li <?php if($mod=="cart"){echo 'class="active"';}?>>
            <a href="?mod=cart&page=index"><i class="fa fa-shopping-cart"></i><span>PEDIDOS</span></a></li>	
        <?php } ?>   
        <?php if($_SESSION['sess_admin']['tipo']==2){ ?>    
        <li <?php if($mod=="clientes"){echo 'class="active"';}?>><a href="?mod=clientes&page=index"><i class="fa fa-users"></i><span>CLIENTES</span></a></li>   
        <?php } ?>	
        <?php if($_SESSION['sess_admin']['tipo']==1){ ?>    
        <li <?php if($mod=="administrador"){echo 'class="active"';}?>><a href="?mod=administrador&page=index"><i class="fa fa-th"></i> <span>ADMINISTRADORES</span></a></li>    
        <?php } ?>
        <?php if($_SESSION['sess_admin']['tipo']==1){ ?>
        <li <?php if($mod=="descuento"){echo 'class="active"';}?>><a href="?mod=descuento&page=index"><i class="fa fa-th"></i> <span>DESCUENTOS</span></a></li>
        <?php } ?>
        <?php if($_SESSION['sess_admin']['tipo']==1){ ?>
        <li <?php if($mod=="nodisponibles"){echo 'class="active"';}?>><a href="?mod=nodisponibles&page=index"><i class="fa fa-th"></i> <span>NO DISPONIBLES</span></a></li>
        <?php } ?>  
        <?php if($_SESSION['sess_admin']['tipo']==1){ ?>
        <!--li><a href="logvisa.php"><i class="fa fa-th"></i> <span>Log Visa</span></a></li-->
        <?php } ?> 
    </ul>
</section>        