<?php
session_start();

?>

<div class="container"  id="content-mod-center">

    <div class="row container" id="registro-cliente">
<br>
        <section class="panel">
                  <header class="panel-heading">
                      Listado de Entradas Web
                  </header>
                  <!--<div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Herramientas <i class="fa fa-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a tabindex="0" aria-controls="example">Guardar en PDF</a></li>
                                      <li><a href="#">Exportar a Excel</a></li>
                                  </ul>
                              </div>
                          </div>-->
                          <div class="space15"></div>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Boleto</th>
						<th>&nbsp;&nbsp;Fecha&nbsp;&nbsp;</th>
						<th>Precio</th>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>DNI</th>
						<th>Teléfono</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>&nbsp;&nbsp;&nbsp;Boleto</th>
						<th>&nbsp;&nbsp;&nbsp;Fecha&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;Precio</th>
						<th>&nbsp;&nbsp;&nbsp;Nombres</th>
						<th>&nbsp;Apellido Paterno</th>
						<th>&nbsp;Apellido Materno</th>
						<th>&nbsp;&nbsp;&nbsp;DNI</th>
						<th>&nbsp;&nbsp;&nbsp;Teléfono</th>
					</tr>
				</tfoot>
			</table>
	</section>

    </div>

</div>