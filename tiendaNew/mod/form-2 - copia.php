<? if(!isset($_SESSION[sess_cart])){    echo "<script>location.href='?mod=cart'</script>";}?>
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
                <p class="hidden-xs">Finalizar y disfrutar</p>
                <p class="visible-xs">Paso 3</p>
            </div>
        </div>
    </div>
    <div class="row container">
    <? if(!isset($_SESSION[sess_user])){ ?>
        <div id="login-overlay" class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Inicie Sessión</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="well">
                                  <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">
                                      <div class="form-group">
                                          <label for="username" class="control-label">Dni</label>
                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                          <input type="text" class="form-control required" name="dni" placeholder="Dni"  autocomplete="off"  data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"
                                            data-fv-regexp="true" data-fv-regexp-regexp="^[0-9_\.]+$" maxlength="8" data-fv-regexp-message="Porfavor ingrese un valor correcto."></div>
                                          <span class="help-block"></span>                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label">Password</label>
                                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control required" name="password" placeholder="Password" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>
                                          <span class="help-block"></span>
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
                              </ul>
                              <p><a href="?mod=registro" class="btn btn-info btn-block">Regístrese ahora!</a></p>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
     <? }else{ ?>        
        <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">
            <h3>Datos de facturación</h3>
            <div class="panel panel-default">
                <div class="panel-heading">Información de Facturación</div>
                <div class="panel-body">
                    <div class="row">
                       <div class="col-md-4">
                            <label>Apellidos y Nombres</label>
                            <p><?=strtoupper($_SESSION[sess_user][usuario])?></p>
                        </div>
                        <div class="col-md-4">
                            <label>Dni</label>                                              
                            <p><?=$_SESSION[sess_user][dni]?></p>
                        </div>
                        <div class="col-md-4">
                            <label>Fecha</label>
                            <p><?=date("d/m/Y")?></p>
                        </div>                                        
                    </div>                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Detalle de Facturación</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="box">
                            <div class="box-body no-padding">
                              <table class="table table-condensed">
                                <tr>
                                  <th style="width: 10px">Item</th>
                                  <th>F. Ticket</th>
                                  <th>Ticket</th>
                                  <th class="hidden-xs">Descripción</th>
                                  <th>Beneficiado</th>
                                  <th style="width: 40px">Precio</th>
                                </tr>
                                <? foreach($_SESSION[sess_cart] as $key => $value) {$i++;$stotal = $stotal + $value[txtpu];?>
                                <tr>
                                  <td><?=$i?></td>
                                  <td><?=$value[txtfec]?></td>
                                  <td>
                                  <? if($value[img]){if(file_exists("Adminv2/uploads/{$value[img]}")){?><img src="Adminv2/uploads/<?=$value[img]?>" width="140px" class="img-responsive"><? }}?>
                                  </td>
                                  <td class="hidden-xs"><?=strip_tags(htmlspecialchars_decode(stripcslashes($value[titulo])))."<br><small>SEDE:{$value[sede]}</small>"?></td>
                                  <td><?=strtoupper($value[usuario])."<br><small>DNI:{$value[dni]}</small>"?></td>
                                  <td>S/.<?=number_format($value[txtpu], 2,'.',' ')?></td>
                                </tr>
                                <? } ?>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="row">
                        <div class="col-xs-6 text-right"> Sub Total: S/.</div>                 
                        <div class="col-xs-6"><?=number_format(($stotal-($stotal*0.18)), 2,'.',' ')?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-right"> Igv: S/.</div>                 
                        <div class="col-xs-6"> <?=number_format(($stotal*0.18), 2,'.',' ')?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-right"> Total: S/.</div>                 
                        <div class="col-xs-6"><?=number_format($stotal, 2,'.',' ')?></div>
                    </div>                 
                 </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Tipo de Documento</div>
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
                                  <input type="text" class="form-control input-sm"  name="rsocial" placeholder="Razón Social" data-fv-regexp="true"
                      data-fv-regexp-regexp="^[a-zA-Z\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2"/></div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                  <label>RUC</label>
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-ticket"></i></span>
                                  <input type="text" class="form-control input-sm" name="ruc" placeholder="RUC" data-fv-regexp="true" data-fv-regexp-regexp="^[0-9_\.]+$" 
                                  maxlength="11" data-fv-regexp-message="Porfavor ingrese un valor correcto."></div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                  <label>Dirección</label>
                                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                  <input type="text" class="form-control input-sm" name="dir" placeholder="Dirección"></div>
                                  </div>
                              </div>
                          </div>
                        </div>                                
                    </div>                  
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Tipo de pago</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="funkyradio">
                        <div class="funkyradio-primary">
                          <input type="radio" class="btntpago" name="tpago" id="radiotpago1" value="1" checked="checked" />
                          <label for="radiotpago1">DEPOSITO BANCARIO</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="funkyradio">
                        <div class="funkyradio-primary">
                          <input type="radio" class="btntpago" name="tpago" id="radiotpago2" value="2"/>
                          <label for="radiotpago2">TARJETA VISA MASTERCARD</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default collapse in" id="viewtpagodep">
                                <div class="panel-heading"><i class="fa fa-university"></i> BBVA Cotinental</div>
                                <? if($_SESSION[sess_cart_sede][idsede]==1){ ?>
                                <div class="panel-body text-justify">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h5 class="tpago-titulo">Banca Por Internet:</h5>
                                        <ol class="list-all-tpago">
                                          <li>Ingrese a su cuenta, seleccione <strong>QUIERO REALIZAR TRANSFERENCIA A TERCEROS.</strong></li>
                                          <li>Ingrese la cuenta <strong>EN SOLES 0011-0130-0100046404-28 a nombre de LA GRANJA VILLA Y SU MUNDO MÁGICO S.A </strong></li>
                                          <li>Ingrese el importe y confirme su transacción. Listo.</li>
                                        </ol>
                                      </div>                                                                           
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h5 class="tpago-titulo">En un Agente Express:</h5>
                                        <ol class="list-all-tpago">
                                          <li>Indique que va realizar un transferencia a tercero.</li>
                                          <li>Ingrese el número de cuenta <strong>EN SOLES 0011-0130-0100046404-28 a nombre de LA GRANJA VILLA Y SU MUNDO MÁGICO S.A </strong>, el importe a pagar y la moneda.</li>
                                          <li>Verifique que el voucher indique <strong>EMISORA: LA GRANJA VILLA Y SU MUNDO MÁGICO S.A.</strong></li>
                                        </ol>
                                      </div>                                                                           
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h5 class="tpago-titulo">En una Agencia del BBVA</h5>
                                        <ol class="list-all-tpago">
                                          <li>Indique que va realizar un depósito a la cuenta en <strong>EN SOLES 0011-0130-0100046404-28 a nombre de LA GRANJA VILLA Y SU MUNDO MÁGICO S.A </strong></li>
                                          <li>Indique el importe a pagar y la moneda </li>
                                          <li>Verificar que el voucher indique <strong>EMISORA: LA GRANJA VILLA Y SU MUNDO MÁGICO S.A </strong></li>
                                        </ol>
                                      </div>                                                                           
                                    </div>                                    
                                </div>
                                <? }elseif($_SESSION[sess_cart_sede][idsede]==2){ ?>
                                <div class="panel-body text-justify">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h5 class="tpago-titulo">Banca Por Internet:</h5>
                                        <ol class="list-all-tpago">
                                          <li>Ingrese a su cuenta, seleccione <strong>QUIERO REALIZAR TRANSFERENCIA A TERCEROS.</strong></li>
                                          <li>Ingrese la cuenta <strong>EN SOLES 0011-0380-0100016920-39 a nombre de GIVA SAC </strong></li>
                                          <li>Ingrese el importe y confirme su transacción. Listo.</li>
                                        </ol>
                                      </div>                                                                           
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h5 class="tpago-titulo">En un Agente Express:</h5>
                                        <ol class="list-all-tpago">
                                          <li>Indique que va realizar un transferencia a tercero.</li>
                                          <li>Ingrese el número de cuenta <strong>EN SOLES 0011-0380-0100016920-39 a nombre de GIVA SAC</strong>, el importe a pagar y la moneda.</li>
                                          <li>Verifique que el voucher indique <strong>EMISORA: GIVA SAC.</strong></li>
                                        </ol>
                                      </div>                                                                           
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h5 class="tpago-titulo">En una Agencia del BBVA</h5>
                                        <ol class="list-all-tpago">
                                          <li>Indique que va realizar un depósito a la cuenta en <strong>EN SOLES 0011-0380-0100016920-39 a nombre de GIVA SAC.</strong></li>
                                          <li>Indique el importe a pagar y la moneda </li>
                                          <li>Verificar que el voucher indique <strong>EMISORA: GIVA SAC.</strong></li>
                                        </ol>
                                      </div>                                                                           
                                    </div>                                    
                                </div>
                                <? }?>
                    </div>
                    <div class="col-md-6 col-md-offset-3">                                         
                      <div class="panel panel-default credit-card-box collapse" id="viewtpagotar">
                      <div class="panel-heading" >
                      <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Detalles del pago</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="img/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">                    
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">NÚMERO DE TARJETA</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="cardNumber" placeholder="Número de Tarjeta Válida" autocomplete="cc-number"  />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">FECHA</span><span class="visible-xs-inline">EXP</span> VENCIMIENTO</label>
                                    <input type="tel" class="form-control"  name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp"  />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" />
                                </div>
                            </div>
                        </div>                    
                </div>
            </div>
            </div>            
</div>                    

                </div>

            </div>
            <div class="row">
              <div class="form-group">
                  <div class="col-xs-12 text-center">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#termsModal">De acuerdo con los términos y condiciones</button>
                      <input type="hidden" name="agree" value="no" />
                  </div>
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
                    <input type="submit"  class="btn btn-success" value="Siguiente">
                  </div>

            </div>                            

        </form>

        <? } ?>     

    </div>

</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="formAll" role="form" name="frmSocio" id="frmSocio" action="prc.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Socios</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
            <label>Local de Afiliación</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="funkyradio">
                    <div class="funkyradio-primary"><input type="radio" name="sede" id="radio1" value="1" checked="checked" /><label for="radio1">GRANJA VILLA SUR</label></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="funkyradio">
                    <div class="funkyradio-primary"><input type="radio" name="sede" id="radio2" value="2" /><label for="radio2">GRANJA VILLA NORTE</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">            
            <div class="form-group">
                <label for="ntarjeta" class="control-label">Usuario (Numero de Tarjeta):</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span><input type="text" class="form-control required" name="ntarjeta" placeholder="Numero de Tarjeta" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>
                <span class="help-block"></span>                                          
            </div>
          </div>
          <div class="col-md-12">            
            <label>Fecha de Nacimiento</label>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">                    
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control required" name="ndia" placeholder="Dia" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>
                    <span class="help-block"></span>                                          
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">                    
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control required" name="nmes" placeholder="Mes" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>
                    <span class="help-block"></span>                                          
                  </div>   
                </div>
                <div class="col-md-4">
                  <div class="form-group">                    
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control required" name="nano" placeholder="Año" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>
                    <span class="help-block"></span>                                          
                  </div>   
                </div>
            </div>

          </div>          

      </div>

      <div class="modal-footer" style="border:0px solid red; overflow:hidden">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Aceptar</button>

        <input type="hidden" name="cmd" value="socio">

      </div>

      </form>

    </div>

  </div> 

</div>
<!-- Terms and conditions modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Términos y Condiciones</h3>
            </div>

            <div class="modal-body">
            <textarea class="form-control text-justify" rows="18">“La pulsera Mágica es el distintivo personal e intransferible que le permite al portador, tanto niños como adultos, ingresar a los juegos, a los diferentes Tours de Animales, Granjita Interactiva, zona acuática y  zona de piscinas en la temporada de Verano, y El Pueblo todas las veces que desee siempre que la talla, peso y horario se lo permita. Niños menores de edad que superen los 80 cm de estatura  pagaran  su entrada (pulsera mágica). Los niños que midan menos de 0.80 cm. podrán ingresar libremente a parque con acceso únicamente a granjita, tour de animales y piscinas en temporada de Verano acompañados de un adulto que porte pulsera. Sin pulsera el menor de edad no tendrá acceso a los juegos, ni a El Pueblo a menos que el padre o apoderado adquiera una para el menor. Una vez que se haya retirado de nuestras instalaciones no podrá reingresar. Atendemos todos los días del año desde las 10 am. hasta las 6 pm (Consulte en nuestro facebook por ciertos cierres parciales o totales del parque en temporada Navideña por eventos empresariales). No se realizan devoluciones del pago de entrada una vez haya realizado la compra.  El pago de la pulsera mágica (entrada al parque) le da acceso a ingresar en una ocasión. El pago del ingreso a las sedes de Granja Villa incluye el cumplimiento de las normativas de los parques, por lo que no estar de acuerdo con estas normas no es motivo para pedir devolución del pago realizado. No esta permitido el ingreso de ningún tipo de alimentos, bebidas, mascotas, armas, pelotas, inflables, instrumentos musicales, palos de sefie, ni envases de vidrio al parque. Para contar con piscinas saludables, antes de ingresar a las piscinas debemos ducharnos e ingresar solo con ropa de baño (mujeres - licra y hombres ropa de baño impermeable), indicado por DS 007-2003-SA Del 03 de Abril del 2003 – DISA. No es necesaria reserva. Es imprescindible que el titular de la compra presente su DNI físico e  indique el código que se envía por mail una vez realizada la compra y en taquilla se cambia por la pulsera mágica; sin la pulsera no se puede ingresar al parque. Para una mejor planificación de la visita y saber a que juegos podrán acceder de acuerdo a las tallas pueden ingresar a http://www.lagranjavilla.com/atracciones/. La pulsera es válida para niños que midan 80 cm o más y para adultos. Menores de 18 años deben entrar acompañados de un adulto. Prohibido el ingreso de alimentos y bebidas a las instalaciones. No está permitido el ingreso de pelotas, triciclos, patinetas, patines, carritos, armas de fuego, envases de vidrio, silbatos, trompetas, megáfonos u otros objetos de ruido, cigarros, fósforos u objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes. La entrada no incluye juegos feriales ni el Derby (costo S/. 4.00) ni Bungy (costo S/. 6.50. La pulsera mágica no incluye ningún tipo de alimentos ni bebidas. Para ver las recomendaciones del parque sobre la visita ingresar a http://www.lagranjavilla.com/servicios_parafamilias.php. Para ver las guías de seguridad de cada juego ingresar a http://www.lagranjavilla.com/atracciones/. “</textarea>                              
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal">Acepto</button>
                <button type="button" class="btn btn-default" id="disagreeButton" data-dismiss="modal">No Acepto</button>
            </div>
        </div>
    </div>
</div>