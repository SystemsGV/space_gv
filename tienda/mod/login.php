<?php
if(!empty($_SESSION["sess_user"]["usuario"])){
    echo "<script>location.href='?mod=form-2'</script>";
}
?>
<div class="container"  id="content-mod-center">

    <div class="row container">
<div id="login-overlay" class="modal-dialog">

              <div class="modal-content">

                  <div class="modal-header">

                      <!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->

                      <h4 class="modal-title" id="myModalLabel">Inicie Sesión</h4>

                  </div>

                  <div class="modal-body">

                      <div class="row">

                          <div class="col-md-6">

                              <div class="well">

                                  <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">

                                      <div class="form-group">

                                          <label for="username" class="control-label">DNI</label>

                                          <!--<input type="text" class="form-control" id="username" name="username" value="" required="" title="Nro Tarjeta" placeholder="Nro Tarjeta">-->

                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span><input type="text" class="form-control required" name="dni" placeholder="DNI"  autocomplete="off"  data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" maxlength="15" data-fv-regexp-message="Porfavor ingrese un valor correcto."

                                          ></div>

                                          <span class="help-block"></span>                                          

                                      </div>

                                      <div class="form-group">

                                          <label for="password" class="control-label">Password</label>

                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control required" name="password" placeholder="Password" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>

                                          <span class="help-block"></span>

                                      </div>

                                      <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>

                                      <div class="checkbox">

                                          <!--<label><input type="checkbox" name="remember" id="remember"> Remember login</label>

                                          <p class="help-block">(if this is a private computer)</p>-->

                                      </div>

                                      <button type="submit" class="btn btn-success btn-block">Iniciar Sessión</button>

                                      <input type="hidden" name="cmd" value="login">

                                      <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal" style="margin-top:4px">Inicio sessión socio club granja</a>

                                  </form>

                              </div>

                          </div>

                          <div class="col-md-6">

                              <p class="lead">Regístrate <span class="text-success">AHORA</span></p>

                              <ul class="list-unstyled" style="line-height: 2">

                                  <!--<li><span class="fa fa-check text-success"></span> Ver todos sus pedidos</li>

                                  <li><span class="fa fa-check text-success"></span> Reordenar rápida</li>

                                  <li><span class="fa fa-check text-success"></span> Guarde sus favoritos</li>

                                  <li><span class="fa fa-check text-success"></span> Pago y envío rápido</li>

                                  <li><span class="fa fa-check text-success"></span> Obtener un regalo <small>(sólo para nuevos clientes)</small></li>

                                  -->

                              </ul>

                              <p><a href="?mod=registro" class="btn btn-info btn-block">Regístrese ahora!</a></p>

                          </div>

                      </div>

                  </div>

              </div>

            </div>

</div>
</div>            