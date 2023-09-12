<?php
if(!isset($_SESSION["sess_cart"])){    
    echo "<script>location.href='?mod=cart'</script>";
}
?>
<div class="container"  id="content-mod-center">

    <div class="stepwizard">

        <div class="stepwizard-row setup-panel">

            <div class="stepwizard-step">

                <a href="?mod=form-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>

                <p class="hidden-xs">Registros Boletos</p>

                <p class="visible-xs">Paso 1</p>

            </div>

            <div class="stepwizard-step">

                <a href="?mod=formval" type="button" class="btn btn-primary btn-circle">2</a>

                <p class="hidden-xs">Datos del Comprador</p>

                <p class="visible-xs">Paso 2</p>

            </div>

            <div class="stepwizard-step">

                <a href="?mod=form-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>

                <p class="hidden-xs">Elegir Tipo de Pago</p>

                <p class="visible-xs">Paso 3</p>

            </div>

            <div class="stepwizard-step">

                <a href="?mod=form-3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>

                <p class="hidden-xs">Finalizar y disfrutar</p>

                <p class="visible-xs">Paso 4</p>

            </div>

        </div>

    </div>

    <div class="row container">        

            <div id="login-overlay" class="modal-dialog">

              <div class="modal-content">

                  <div class="modal-header">

                      <!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->

                      <h4 class="modal-title" id="myModalLabel">Inicie Sessión</h4>

                  </div>

                  <div class="modal-body">

                      <div class="row">

                          <div class="col-md-6">

                              <div class="well">

                                  <form id="loginForm" method="POST" action="?mod=form-2" novalidate="novalidate">

                                      <div class="form-group">

                                          <label for="username" class="control-label">Dni</label>

                                          <!--<input type="text" class="form-control" id="username" name="username" value="" required="" title="Nro Tarjeta" placeholder="Nro Tarjeta">-->

                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span><input type="text" class="form-control required" placeholder="Dni"></div>

                                          <span class="help-block"></span>                                          

                                      </div>

                                      <div class="form-group">

                                          <label for="password" class="control-label">Password</label>

                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span><input type="text" class="form-control required" placeholder="Password"></div>

                                          <span class="help-block"></span>

                                      </div>

                                      <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>

                                      <div class="checkbox">

                                          <!--<label><input type="checkbox" name="remember" id="remember"> Remember login</label>

                                          <p class="help-block">(if this is a private computer)</p>-->

                                      </div>

                                      <button type="submit" class="btn btn-success btn-block">Iniciar Sessión</button>

                                      <a href="#" class="btn btn-default btn-block">Ayuda para iniciar sessión</a>

                                  </form>

                              </div>

                          </div>

                          <div class="col-md-6">

                              <p class="lead">Regístrate <span class="text-success">GRATIS</span></p>

                              <ul class="list-unstyled" style="line-height: 2">

                                  <li><span class="fa fa-check text-success"></span> Ver todos sus pedidos</li>

                                  <li><span class="fa fa-check text-success"></span> Reordenar rápida</li>

                                  <li><span class="fa fa-check text-success"></span> Guarde sus favoritos</li>

                                  <li><span class="fa fa-check text-success"></span> Pago y envío rápido</li>

                                  <li><span class="fa fa-check text-success"></span> Obtener un regalo <small>(sólo para nuevos clientes)</small></li>

                                  <!--<li><a href="/read-more/"><u>Lee mas</u></a></li>-->

                              </ul>

                              <p><a href="?mod=registro" class="btn btn-info btn-block">Regístrese ahora!</a></p>

                          </div>

                      </div>

                  </div>

              </div>

          </div>





    </div>

</div>