<?php


?>
<section class="content">

<div class="row">
   <div class="col-xs-12">
    <div class="alert alert-success alert-dismissable" id="success" hidden>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
      <h4><i class="icon fa fa-check"></i> Listo</h4>
      <span>Entradas Generadas y Enviadas al Correo del Cliente</span>
    </div>
    <div class="alert alert-danger alert-dismissable" id="error" hidden>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
      <h4><i class="icon fa fa-exclamation-triangle "></i> Error</h4>
      <span>Error, Las Entradas No Se han Podido Generar</span>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Registro de Entradas Presesenciales
      </header>
      <div class="panel-body">
                                <form class="form-horizontal" id="registro_clientes" action="mod/epresencial/rpresencial.php">
                                  <fieldset title="Step1" class="step" id="default-step-0">
                                    <legend> </legend>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Apellido Paterno</label>
                                      <div class="col-lg-10">
                                        <input type="text" name="apaterno" id="1" class="form-control" placeholder="Apellido Paterno" required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Apellido Materno</label>
                                      <div class="col-lg-10">
                                        <input type="text" name="amaterno" id="2" class="form-control" placeholder="Apellido Materno" required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Nombres</label>
                                      <div class="col-lg-10">
                                        <input type="text" name="nombres" id="3" class="form-control" placeholder="Nombres" required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">DNI / Carné de Extranjería</label>
                                      <div class="col-lg-2">
                                        <input type="number" name="dni" id="4" class="form-control" placeholder="DNI / Carné de Extranjería" required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Email</label>
                                      <div class="col-lg-10">
                                        <input type="email" name="email" id="5" class="form-control" placeholder="Email" required />
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="control-label col-lg-2">Teléfono</label>
                                      <div class="col-lg-2">
                                        <input type="number" name="telefono" id="6" class="form-control" placeholder="Teléfono" required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Fecha Nacimiento (Dia/Mes/Año)</label>
                                      <div class="col-lg-2">
                                        <input type="date" name="fnacimiento" id="7" class="form-control" placeholder="Fecha Nacimiento" required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Dirección</label>
                                      <div class="col-lg-10">
                                        <textarea class="form-control" name="direccion" id="8" cols="60" rows="3" required></textarea>
                                      </div>
                                    </div>
									<div class="form-group">
									<label class="customcheck"><label class="control-label col-lg-2">Agregar Membresía&emsp;&emsp;</label>
									<div class="col-lg-2">
										<input type="checkbox" name="membresia" id="checkmembresia" value="1">
										<span class="checkmark"></span>
									</label>
									</div>
									</div>
									<div class="form-group">
                                      <label class="control-label col-lg-2">Tipo de Documento</label>
                                      <div class="col-lg-2">
                                        <select name="fob" id="19" class="form-control m-bot15" required>
                                          <option value="1">Boleta</option>
                                          <option value="2">Factura</option>                                          
                                        </select>
                                      </div>
                                    </div>
									<div id="fob">
									</div>
                                  </fieldset>
                                  <fieldset title="Step 2" class="step" id="default-step-1" >
                                    <legend> </legend>
									 <div class="form-group">
                                      <label class="control-label col-lg-2">Tipo de Entrada</label>
                                      <div class="col-lg-2">
                                        <select name="tboleto" id="23" class="form-control m-bot15" required>
                                          <option value="2">GVS</option>
                                          <option value="3">GVN</option>
                                          <option value="6">Full Terror</option>
										  <option value="11">Terror</option>                                            
                                        </select>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="control-label col-lg-2">Sede</label>
                                      <div class="col-lg-4">
                                        <input type="text" name="sede" id="24" class="form-control" placeholder="Sede" disabled required />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Cantidad de Entradas</label>
                                      <div class="col-lg-2">
                                        <select name="numentradas" id="9" class="form-control m-bot15" data-placeholder="Seleccione la cantidad de Entradas" required>
										  <option value=""></option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
										  <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
										  <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
										  <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
										  <option value="13">13</option>
                                          <option value="14">14</option>
                                          <option value="15">15</option>
										  <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
										  <option value="19">19</option>
                                          <option value="20">20</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div id="entradas">
                                      
                                    </div>
                                  </fieldset>
                                  <fieldset title="Step 3" class="step" id="default-step-2" >
                                    <legend> </legend>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Apellido Paterno</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="10">
                                        </p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Apellido Materno</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="11"></p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Nombres</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="12"></p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">DNI / Carné de Extranjería</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="13"></p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="14"></p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Teléfono</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="15">
                                        </p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Fecha Nacimiento (Dia/Mes/Año)</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="16">
                                        </p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Dirección</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="17">
                                        </p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Cantidad de Entradas</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="18">
                                        </p>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="col-lg-2 control-label">Subtotal S/.</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="28">
                                        </p>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="col-lg-2 control-label">IGV S/.</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="29">
                                        </p>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="col-lg-2 control-label">Total S/.</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="27">
                                        </p>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="col-lg-2 control-label">Tipo de Boleto</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="25">
                                        </p>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="col-lg-2 control-label">Sede</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="26">
                                        </p>
                                      </div>
                                    </div>
									<div class="form-group">
                                      <label class="col-lg-2 control-label">Membresía</label>
                                      <div class="col-lg-10">
                                        <p class="form-control-static" id="30">
                                        </p>
                                      </div>
                                    </div>
                                  </fieldset>
                                  <input type="submit" class="finish btn btn-danger" value="Finalizar"/>
                                </form>
                              </div>
                            </section>
                          </div>
                        </div>
                        <!-- page end-->

</section>