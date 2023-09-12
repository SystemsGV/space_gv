<?php
session_start();
if(!isset($_SESSION["sess_cart"])){

  echo "<script>location.href='index.php'</script>";

}



$post = Tarjeta::find_by_sql("select 

nTarjNumb,DATE_FORMAT(dEmisDate,'%d/%m/%Y') inidate,DATE_FORMAT(dCaduDate,'%d/%m/%Y') findate,DATEDIFF(dCaduDate,now()) as fdias

from TARJETA where ccliecode='{$_SESSION["sess_user"]["idusuario"]}'");

?>

<div class="container"  id="content-mod-center">

    <div class="stepwizard">

        <div class="stepwizard-row setup-panel">

            <div class="stepwizard-step">

                <a href="?mod=form-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>

                <p class="hidden-xs">Registro de Boletos</p>

                <p class="visible-xs">Paso 1</p>

            </div>

            <div class="stepwizard-step">

                <a href="?mod=formval" type="button" class="btn btn-primary btn-circle">2</a>

                <p class="hidden-xs"><strong>Datos del Comprador</strong></p>

                <p class="visible-xs">Paso 2</p>

            </div>

            <div class="stepwizard-step">

                <a href="?mod=form-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>

                <p class="hidden-xs">Finalizar y disfrutar</p>

                <p class="visible-xs">Paso 3</p>

            </div>

        </div>

    </div>

    <div class="row container">

    <?php if(!isset($_SESSION["sess_user"])){ ?>

        <div id="login-overlay" class="modal-dialog">

              <div class="modal-content">

                  <div class="modal-header">

                      <h4 class="modal-title" id="myModalLabel">Iniciar sesión</h4>

                  </div>

                  <div class="modal-body">

                      <div class="row">

                          <div class="col-md-6">

                              <div class="well">

                                  <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">

                                      <div class="form-group">

                                          <label for="username" class="control-label">DNI</label>

                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                          <input type="text" class="form-control required" name="dni" placeholder="DNI"  autocomplete="off"  data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"

                                             maxlength="15" data-fv-regexp-message="Porfavor ingrese un valor correcto."></div>

                                          <span class="help-block"></span>                                          

                                      </div>

                                      <div class="form-group">

                                          <label for="password" class="control-label">Contraseña</label>

                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control required" name="password" placeholder="Password" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>

                                          <span class="help-block"></span>

                                      </div>

                                      <button type="submit" class="btn btn-success btn-block">Iniciar sesión</button>

                                      <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModalRecovery" style="margin-top:4px">Recordar contraseña</a>

                                      <input type="hidden" name="cmd" value="login">

                                      <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal" style="margin-top:4px">Clave internet - Socios</a>

                                  </form>

                              </div>

                          </div>

                          <div class="col-md-6">

                              <p class="lead"><strong>Regístrese <span class="text-success">AHORA</span></strong></p>

                              <ul class="list-unstyled" style="line-height: 2">

                              </ul>

                              <p><a href="?mod=registro" class="btn btn-info btn-block">Click para registrarse</a></p>

                          </div>

                      </div>

                  </div>

              </div>

            </div>

     <?php }else{ ?>        

        <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">

            <h3>Datos de facturación</h3>

            <div class="panel panel-default">

                <div class="panel-heading"><strong>Información de Facturación</strong></div>

                <div class="panel-body">

                    <div class="row">

                       <div class="col-md-4">

                            <label>Apellidos y Nombres</label>

                            <p><?=strtoupper($_SESSION["sess_user"]["usuario"])?></p>

                        </div>

                        <div class="col-md-4">

                        	<?php if($_SESSION["sess_user"]["dni"]!=""){ ?>

                            <label>DNI</label>                                              

                            <p><?php echo $_SESSION["sess_user"]["dni"]; ?></p>

                            <?php } ?>

                        </div>

                        <div class="col-md-4">

                            <label>Fecha</label>

                            <p><?=date("d/m/Y")?></p>

                        </div>                                        

                    </div>                    

                </div>

            </div>

            <div>

              <div class="row">

                <div class="col-md-4 pull-right">

                  <?php if(empty($post[0]->ntarjnumb)){ ?>

                  <!--<a href="#" class="btn btn-info btn-block btn-addmembresia">Hacerte Nuevo Socio</a>-->

                  <?php }else{?>

                  <a href="#" class="btn btn-info btn-block btn-addmembresia">Faltan (<?=$post[0]->fdias?>) para renovar Membresía</a>

                  <?php }?>                  

                  <br>

                </div>

              </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading"><strong>Detalle de Facturación</strong></div>

                <div class="panel-body">

                    <div class="row">

                        <div class="box">

                            <div class="box-body no-padding">

                              <table class="table table-condensed">

                                <tr>

                                  <th style="width: 10px">Nro.</th>

                                  <th>F. Ticket</th>

                                  <th>Ticket</th>

                                  <th class="hidden-xs">Descripción</th>

                                  <th>Beneficiado</th>

                                  <th style="width: 40px">Precio</th>

                                </tr>

                                <?php foreach($_SESSION["sess_cart"] as $key => $value) {$i++;$stotal = $stotal + $value["txtpu"];?>

                                <tr>

                                  <td><?php echo $i; ?></td>

                                  <td><?php echo $value["txtfec"];

									$bboleto = $value["sel"]; ?>

                                  <td>

                                  <?php if($value["img"]){if(file_exists("Adminv2/uploads/{$value["img"]}")){?><img src="Adminv2/uploads/<?=$value["img"]?>" width="140px" class="img-responsive"><?php }}?>

                                  </td>

                                  <td class="hidden-xs">

								  <?php

                                  echo strip_tags(htmlspecialchars_decode(stripcslashes($value["titulo"])));

								  if($value["tipo"]=="T"){

								  	echo "<br><small>SEDE : {$_SESSION["sess_cart_sede"]["nombre"]}</small>";

								  }

								  ?>

                                  </td>

                                  <td>

								  <?php

									echo strtoupper($value["usuario"]);

									if($value["dni"]){

										echo "<br><small>DNI:{$value["dni"]}</small>";

									}

								  ?>

                                  </td>

                                  <td>S/.<?php echo number_format($value["txtpu"], 2,'.','')?></td>

                                </tr>

                                <?php } ?>

                              </table>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="panel-footer ">

                    <div class="row">

                        <div class="col-xs-6 text-right"> <strong>SUB TOTAL: S/.</strong></div>                 

                        <div class="col-xs-6"><?=number_format(($stotal-($stotal*0.18)), 2,'.','')?></div>

                    </div>

                    <div class="row">

                        <div class="col-xs-6 text-right"> <strong>IGV: S/.</strong></div>                 

                        <div class="col-xs-6"> <?=number_format(($stotal*0.18), 2,'.','')?></div>

                    </div>

                    <div class="row">

                        <div class="col-xs-6 text-right"> <strong>TOTAL: S/.</strong></div>                 

                        <div class="col-xs-6"><strong><?=number_format($stotal, 2,'.','')?></strong></div>

                    </div>                 

                 </div>

            </div>

            <div class="panel panel-success">

                <div class="panel-heading"><strong>Tipo de Documento</strong></div>

                <div class="panel-body">

                  <div class="row">

                    <div class="col-md-6">

                        <div class="funkyradio">

                          <div class="funkyradio-primary">

                            <input type="radio" class="btntdoc" name="tdoc" id="radiotdoc1" value="1" checked="checked" />

                            <label for="radiotdoc1">Boleta</label>

                          </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="funkyradio">

                          <div class="funkyradio-primary">

                            <input type="radio" class="btntdoc" name="tdoc" id="radiotdoc2" value="2"/>

                            <label for="radiotdoc2">Factura</label>

                          </div>

                        </div>

                    </div>

                  </div>                  

                    <div class="panel panel-default collapse" id="viewtdocfac">

                        <div class="panel-heading"><i class="fa fa-university"></i>Ingrese Datos para la facturación</div>

                        <div class="panel-body text-justify">

                          <div class="row">

                              <div class="col-md-4">

                                  <div class="form-group">

                                  <label>Razón Social</label>                                              

                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>

                                  <input type="text" class="form-control input-sm"  name="rsocial" placeholder="Razón Social" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" 
                 data-fv-stringlength="true" data-fv-stringlength-min="3" /></div>

                                  </div>

                              </div>

                              <div class="col-md-4">

                                  <div class="form-group">

                                  <label>RUC</label>

                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-ticket"></i></span>

                                  <input type="text" class="form-control input-sm" name="ruc" placeholder="RUC" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-regexp="true" data-fv-regexp-regexp="^[0-9_\.]+$" 

                                  maxlength="11" data-fv-regexp-message="Porfavor ingrese un valor correcto."></div>

                                  </div>

                              </div>

                              <div class="col-md-4">

                                  <div class="form-group">

                                  <label>Dirección</label>

                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>

                                  <input type="text" class="form-control input-sm" name="dir" placeholder="Dirección" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" 
                 data-fv-stringlength="true" data-fv-stringlength-min="2" ></div>

                                  </div>

                              </div>

                          </div>

                        </div>                                

                    </div>                  

                </div>

            </div>

            <div class="panel panel-success">

                <div class="panel-heading"><strong>Tipo de pago</strong></div>

                <div class="panel-body">

                  <div class="row">
				  

                    <div class="col-md-6">
                      <div class="funkyradio">
                        <div class="funkyradio-primary">
                          <input type="radio" class="btntpago" name="tpago" id="radiotpago2" checked="checked" value="2"/>
                          <label for="radiotpago2">TARJETA VISA</label>
                        </div>
                      </div>
                    </div>


					<div class="col-md-6">
                      <div class="funkyradio">
                        <div class="funkyradio-primary">
                          <input type="radio" class="btntpago" name="tpago" disabled="disabled" id="radiotpago1" value="1" />
                          <label for="radiotpago1">DEPOSITO BANCARIO (PROXIMAMENTE)</label>
                        </div>
                      </div>
                    </div>


                  </div>

                  <div class="panel panel-default collapse" id="viewtpagodep">

                                <div class="panel-heading"><i class="fa fa-university"></i> BBVA Continental</div>

                                <?php if($_SESSION["sess_cart_sede"]["idsede"]==1){ ?>

                                <div class="panel-body text-justify">

                                    <div class="row">

                                      <div class="col-md-12">

                                        <h5 class="tpago-titulo">Banca Por Internet:</h5>

                                        <ol class="list-all-tpago">

                                          <li>Ingrese a su cuenta, seleccione <strong>QUIERO REALIZAR TRANSFERENCIA A TERCEROS</strong>.</strong></li>

                                          <li>Ingrese el número de la cuenta en soles <strong>0011-0130-01-00046404</strong> a nombre de <strong>LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>

                                          <li>Ingrese el CODIGO DE RESERVA que automáticamente le enviaremos a su correo al finalizar la compra por la web.</li>
                                          
                                          <li>Ingrese el importe y confirme su transacción. Listo.</li>

                                        </ol>

                                      </div>                                                                           

                                    </div>

                                    <div class="row">

                                      <div class="col-md-12">

                                        <h5 class="tpago-titulo">En un Agente Express:</h5>

                                        <ol class="list-all-tpago">

                                          <li>Indique que va realizar una transferencia a terceros.</li>
                                          <li>Ingrese el número de cuenta en soles <strong>0011-0130-01-00046404</strong> a nombre de <strong>LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>
                                          <li>Ingrese el <strong>CODIGO DE RESERVA</strong> que automáticamente le enviaremos a su correo al finalizar la compra por la web.</li>
                                          <li>Indique el importe a pagar y la moneda.</li>
                                          <li>Verifique que el Boucher indique <strong>EMISORA: LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>


                                        </ol>

                                      </div>                                                                           

                                    </div>

                                    <div class="row">

                                      <div class="col-md-12">

                                        <h5 class="tpago-titulo">En una Agencia del BBVA</h5>

                                        <ol class="list-all-tpago">

                                          <li>Indique que va realizar un depósito a la cuenta en <strong>SOLES 0011-0130-01-00046404</strong> a nombre de <strong>LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>
                                          <li>Indique el importe a pagar y la moneda.</li>
                                          <li>Indique el <strong>CODIGO DE RESERVA</strong> que automáticamente le enviaremos a su correo al finalizar la compra por la web.</li>
                                          <li>Verificar que el Boucher indique <strong>EMISORA: LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>


                                        </ol>

                                      </div>                                                                           

                                    </div>                                    

                                </div>

                                <?php }elseif($_SESSION["sess_cart_sede"]["idsede"]==2){ ?>

                                <div class="panel-body text-justify">

                                    <div class="row">

                                      <div class="col-md-12">

                                        <h5 class="tpago-titulo">Banca Por Internet:</h5>

                                        <ol class="list-all-tpago">

                                          <li>Ingrese a su cuenta, seleccione <strong>QUIERO REALIZAR TRANSFERENCIA A TERCEROS</strong>.</li>
                                          <li>Ingrese el número de la cuenta en soles <strong>0011-0380-01-00044398</strong> a nombre de <strong>LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>
                                          <li>Ingrese el <strong>CODIGO DE RESERVA</strong> que automáticamente le enviaremos a su correo al finalizar la compra por la web.</li>
                                          <li>Ingrese el importe y confirme su transacción. Listo.</li>


                                        </ol>

                                      </div>                                                                           

                                    </div>

                                    <div class="row">

                                      <div class="col-md-12">

                                        <h5 class="tpago-titulo">En un Agente Express:</h5>

                                        <ol class="list-all-tpago">

                                          <li>Indique que va realizar una transferencia a terceros.</li>
                                          <li>Ingrese el número de cuenta en soles <strong>0011-0380-01-00044398</strong> a nombre de <strong>LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>
                                          <li>Ingrese el <strong>CODIGO DE RESERVA</strong> que automáticamente le enviaremos a su correo al finalizar la compra por la web.</li>
                                          <li>Indique el importe a pagar y la moneda.</li>
                                          <li>Verifique que el Boucher indique <strong>EMISORA: LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>

                                        </ol>

                                      </div>                                                                           

                                    </div>

                                    <div class="row">

                                      <div class="col-md-12">

                                        <h5 class="tpago-titulo">En una Agencia del BBVA</h5>

                                        <ol class="list-all-tpago">

                                          <li>Indique que va realizar un depósito a la cuenta en <strong>SOLES 0011-0380-01-00044398</strong> a nombre de <strong>LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>
                                          <li>Indique el importe a pagar y la moneda.</li>
                                          <li>Indique el <strong>CODIGO DE RESERVA</strong> que automáticamente le enviaremos a su correo al finalizar la compra por la web.</li>
                                          <li>Verificar que el Boucher indique <strong>EMISORA: LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>

                                        </ol>

                                      </div>                                                                           

                                    </div>                                    

                                </div>

                                <?php }?>

                    </div>

                    <div class="col-md-6 col-md-offset-3">                                         

                      <div class="panel panel-default credit-card-box collapse in" id="viewtpagotar">

                      <div class="panel-heading" >

                      <div class="row display-tr" >

                        <h3 class="panel-title display-td" ><img class="img-responsive pull-left" src="img/accepted_c22e0.jpg">&nbsp;&nbsp;&nbsp;<strong>Pago con VISA</strong></h3>

                        <div class="display-td" >                            

                            

                        </div>

                    </div>                    

                </div>

                <div class="panel-body">                    

                        <div class="row">

                            <div class="col-xs-12">Se procederá a realizar el pago con su tarjeta VISA para lo cual sera redireccionado a la zona segura de VISA para que consigne sus datos de tarjeta, gracias.<br>La Granja Villa</div>

                        </div>

                                            

                </div>

            </div>

            </div>            

</div>                    



                </div>



            <div class="row">

              <div class="form-group">
				  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-center"></div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">

					

                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#termsModal">Click para aceptar términos y condiciones</button>

                      <input type="hidden" name="agree" value="no" />

                  </div>
				  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-center"></div>

              </div>

            </div>            

            <div class="row">

              <div class="form-group">

                  <div class="col-xs-12 text-center">

                      <div id="messages"></div>

                  </div>

              </div>

            </div>

            <br>          

            <div class="row">

                  <div class="col-md-12 text-center">

                    <input type="hidden" name="cmd" value="save">

                    <input type="submit"  class="btn btn-success" value="Proceder con el pago">

                  </div>



            </div>                            



        </form>



        <?php } ?>     



    </div>



</div>





<!-- Terms and conditions modal -->

<?php if($bboleto==1||$bboleto==2||$bboleto==3){ ?>

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title">Términos y Condiciones</h3>

            </div>



            <div class="modal-body">

            <textarea class="form-control text-justify" readonly="readonly" rows="18">
• La pulsera mágica es personal e intransferible. Le permite al portador el ingreso a los juegos mecánicos, tours de animales silvestres, área de granja y zona acuática (solo en las fechas publicadas en nuestras plataformas digitales). Podrás ingresar a los juegos las veces que desees, siempre y cuando el horario, tu estatura y/o peso lo permitan. Niños a partir de los 80 cm de estatura deberán adquirir la pulsera mágica.
• Niños por debajo de los 80 cm de estatura pueden ingresar al parque sin pulsera y tendrán acceso al área de granja, tours de animales silvestres y zona acuática acompañados de un adulto con pulsera mágica (solo en las fechas publicadas en nuestras plataformas digitales). Si desea que el niño participe de los juegos, deberá adquirir su pulsera mágica. Dale click a este enlace para ver los juegos que le brindarán acceso ilimitado al niño, de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/. En caso el niño no porte la pulsera mágica, no tendrá acceso a los juegos.
• Una vez que se haya retirado de nuestras instalaciones, no podrá reingresar. Atendemos todos los días del año, desde las 10 am hasta las 6 pm (cierres parciales o totales del parque por eventos empresariales, serán publicados en nuestras plataformas digitales). 
• No se darán devoluciones del pago de entrada luego de realizar la compra. No se podrá cambiar la fecha ni sede de su visita una vez que lo haya elegido.
• La pulsera mágica le da acceso a ingresar una vez a La Granja Villa.
• El pago de la pulsera mágica de La Granja Villa incluye el cumplimiento de las normativas establecidas del parque. No estar de acuerdo con las normativas, no es motivo para pedir devolución del pago realizado.
• No está permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, inflables, instrumentos musicales, palos selfie, silbatos, trompetas, megáfonos, objetos que emitan sonido, triciclos, patinetas, patines, carritos, fósforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.
• En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio de la zona acuática, donde contamos con agua saludable certificada por DIGESA. Para mantener este estándar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con ropa de baño lycra o impermeable, indicado por la DS 007-2003-SA del 03 de Abril del 2003 – DISA.
• Es indispensable que el titular de la compra presente su DNI en físico el día de su visita. Asi mismo, debe presentar el código enviado por mail despues de la compra. En RRPP se le otorgarán las pulseras mágicas.
• Dale click a este link y coloca tu estatura: http://www.lagranjavilla.com/atracciones/ . Así podrás conocer los juegos que te brindan acceso ilimitado en cada una de las sedes.
• Si deseas ingresar al parque y tienes entre 13 y 17 años, necesitas una carta de responsabilidad y autorización firmada por tus padres o apoderados. Esta carta se firma en Relaciones Publicas, en el ingreso a La Granja Villa. Puedes encontrar más detalles aquí: http://lagranjavilla.com/protocolos/mod2/index.php
• La pulsera mágica no incluye alimentos, bebidas, juegos feriales ni el Bungy.
• Para ver las guías de seguridad de cada juego ingresa a: http://www.lagranjavilla.com/atracciones/
• Si la transacción se da con VISA, se realiza a través de Verified by Visa, lo que asegura la autenticidad y confiabilidad del procedimiento. Al confirmar las identidades de los tarjeta-habientes, se reducen las transacciones de comercio electrónico fraudulentas o en disputa, eliminando las inquietudes del consumidor con respecto a las compras en línea.
• Luego de realizar la compra, recibirá las entradas electrónicas en el correo registrado. El cliente acepta no divulgar ni compartir la información contenida en este correo por ningún medio, ya que podría afectar su ingreso al parque.
• LA GRANJA VILLA Y SU MUNDO MAGICO S. A. no se hace responsable por copias de la entrada electrónica que pudieran haber ingresado al evento paralelamente, ya que la entera responsabilidad por la confidencialidad del mismo corresponde al cliente. En caso de generarse duplicados de la entrada electrónica, el servicio de verificación de entradas sólo registrará la primera entrada electrónica que ingrese al parque, siendo todos los demás considerados copias divulgadas por el cliente.
Ante cualquier consulta, escríbanos a – atencionalcliente@lagranjavilla.com

</textarea>                              

            </div>



            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal">Acepto</button>

                <button type="button" class="btn btn-default" id="disagreeButton" data-dismiss="modal">No Acepto</button>

            </div>

        </div>

    </div>

</div>

<?php }elseif($bboleto==6||$bboleto==11||$bboleto==13){ ?>


<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title">Términos y Condiciones Féstival del Terror</h3>

            </div>



            <div class="modal-body">

            <textarea class="form-control text-justify" readonly="readonly" rows="18">
1. Los participantes deben presentar DNI. La edad mínima de ingreso al festival es de 7 años (sin las atracciones extremas). Solo las personas mayores de 10 años, pueden ingresar a las atracciones extremas.
2. El evento inicia a las 7:00 p.m. y termina a las 11:00 p.m.
3. Si no quieres asustarte, aléjate de las zonas de espanto y escenarios abominables. En la tienda de souvenirs, podrás adquirir un repelente anti-susto.
4. Los juegos mecánicos tienen límites de estatura y/o peso establecidos por sus fabricantes. La información está publicada en las guías de seguridad.
5. El uso de la pulsera es personal, indispensable e intransferible. Es necesario llevarla colocada para acceder a los beneficios. En caso de retirársela y/o perderla, deberá adquirir la reposición de la misma por un costo de S/. 5.00. De lo contrario, no podrá disfrutar de las atracciones.
6. La pulsera tiene validez solo por el día de su visita durante el tiempo que esté en nuestras instalaciones. Si se retira del festival, no podrá reingresar. 
7. El servicio de caras pintadas y tatuajes tiene un costo adicional, al igual que los juegos feriales.
8. Para disfrutar al máximo de las atracciones extremas (casas de terror) de forma segura,  solo se permite el ingreso UNA VEZ por noche a cada una, si el tiempo te lo permite. 
9. Si las criaturas poseídas se escapan de sus zonas, escucharás alarmas por todo el festival. ¡Corre y refúgiate en las zonas señalizadas!
10. Los ciclos de participación en todas las atracciones del festival concluyen a las 10:45 pm. Te recomendamos ingresar a todas las atracciones extremas apenas llegues. No garantizamos que puedas ingresar a todas las atracciones del festival.
11. Recuerda traer ropa que te proteja del viento. Las noches de Octubre son frías. 
12. No nos responsabilizamos por los cambios climáticos que puedan presentarse.
13. Por favor, respeta las normas del estacionamiento. El personal de seguridad lo orientará con la ubicación de su vehículo.
14. Por la privacidad de terceras personas, no tomes fotos ni videos de visitantes ajenos a tu grupo. 
15. No te apartes de tu grupo durante la noche. Si te pierdes, anda al restaurante La Palapa para ayudarte.
16. Si deseas alquilar una silla de ruedas, solicitarla en el ingreso. Tiene un consto de S/.20.00.
17. Respeta a las criaturas poseídas. No los golpees ni los insultes. Si los agredes, ya no podrás disfrutar de la noche de espantos.
18. En el juego mecánico “Disco Nazca”, no está permitido el ingreso con sandalias que no tengan correas ajustables que pasen por detrás del tobillo. Puedes comprar un sujetador en el kiosko si no traes un calzado ajustable.
19. No está permitido subir a los juegos mecánicos con objetos, como: carteras, canguros, gorras, mochilas, lentes, etc.
20. Si tienes entre 10 y 17 años y quieres ingresar sin la compañía de un adulto, el padre o apoderado deberá firmar un documento donde deje constancia que autoriza el ingreso del menor al festival.
21. No se permite el ingreso con disfraces, máscara o maquillaje.
22. Fumar está permitido en ciertas zonas del festival (pregunta por la zona de fumadores).
23. Si pagas con tarjeta de crédito es indispensable presentar DNI. En el caso de los extranjeros, deben presentar su pasaporte o carnet de extranjería.
24. Nuestro personal realizará una inspección de todas las mochilas y bolsos que ingresen al festival, esto nos brindará una noche completamente segura.
25. Por su seguridad, no se permite el ingreso de armas de fuego, objetos punzo cortantes, mascotas, coolers, cigarros, triciclos, bicicletas, scooters, skates, globos, pelotas, alimentos, bebidas y palo de selfie.
26. Los visitantes con yesos, férulas, prótesis y/o botas inmovilizadoras, no podrán ingresar a ciertos juegos mecánicos.
27. Si no gozas de buena salud, no podrás ingresar a todos los juegos mecánicos.
28. Por tu seguridad y la de tu bebé, no se permite el ingreso a mujeres gestantes.
29. No se permite el ingreso a visitantes con signos de alguna enfermedad eruptiva o infectocontagiosa. Debemos preservar la salud comunitaria y propia de cada visitante.
30. Es importante respetar las normas de seguridad que indica el operador de cada juego mecánico. De lo contrario, no podrás subirte más al juego.
31. No nos responsabilizamos por las pérdidas o robos de objetos personales y/o dejados dentro de los lockers. Te recomendamos no dejar dinero ni objetos de valor.
32. Si vas a utilizar los lockers, sigue las instrucciones colocadas en la parte frontal. El costo del servicio es de S/.1.00 cada vez que abras la puerta del locker. Si pierdes la llave, la penalidad es de S/. 20.00
33. Si deseas más información, no dudes en comunicarte con nosotros al 717-7771 o escríbenos por cualquiera de nuestras redes sociales o página web.
34. No se darán devoluciones del pago de entrada luego de realizar la compra. No se podrá cambiar la fecha una vez que la haya elegido, ni se podrán cambiar los datos de la persona inscrita en las entradas.
35. El pago de la pulsera del Festival del Terror incluye el cumplimiento de las normativas establecidas del festival. No estar de acuerdo con las normativas, no es motivo para pedir devolución del pago realizado.
36. Es indispensable que el titular de la compra presente su DNI en físico el día de su visita. Así mismo, debe presentar el código enviado por mail después de la compra. En RRPP se le otorgarán las pulseras.
37. Si la transacción se da con VISA, se realiza a través de Verified by Visa, lo que asegura la autenticidad y confiabilidad del procedimiento. Al confirmar las identidades de los tarjeta-habientes, se reducen las transacciones de comercio electrónico fraudulentas o en disputa, eliminando las inquietudes del consumidor con respecto a las compras en línea.
38. Luego de realizar la compra, recibirá las entradas electrónicas en el correo registrado. El cliente acepta no divulgar ni compartir la información contenida en este correo por ningún medio, ya que podría afectar su ingreso al festival.

</textarea>                              

            </div>



            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal">Acepto</button>

                <button type="button" class="btn btn-default" id="disagreeButton" data-dismiss="modal">No Acepto</button>

            </div>

        </div>

    </div>

</div>
<?php } ?>
