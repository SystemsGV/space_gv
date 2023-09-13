<div class="container module-opt">      
    <div class="row container">
      <div class="col-md-7">
        <div class="responsive-calendar">
          <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Anterior</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Siguiente</div></a>
          </div><hr/>
          <div class="day-headers">
            <div class="day header">Lun</div>
            <div class="day header">Mar</div>
            <div class="day header">Mie</div>
            <div class="day header">Jue</div>
            <div class="day header">Vie</div>
            <div class="day header">Sab</div>
            <div class="day header">Dom</div>
          </div>
          <div class="days" data-group="days"></div>
        </div>  
      </div>
      <div class="col-md-5 module-info">
        <br>
        <h4>ADMISIÓN GENERAL DE LUNES A VIERNES</h4>
        <hr>        
        <img src="img/calendarios/01.jpg" class="img-responsive">
        <br>
        <p class="text-justify">
        Después de pagar tu “Experiencia V.I.P.” y entrar al parque deberás presentar tu boleto de compra en el Centro de Activación, ubicado frente al juego Fiesta de las Tazas en el Pueblo Mexicano, en ese momento se te colocara un brazalete, el cual deberás de mostrar en todos los Juegos Mecánicos y Teatros para obtener acceso.
        </p>
        <br><br>
        <div class="box box-primary">        
        <!-- form start -->
          <form role="form" name="frmSelTicket" id="frmSelTicket">
            <div class="box-body">
              <div class="box box-danger">
                <div class="box-body">
                  <!--<div class="row form-group" style="border:0px solid red">
                      <label for="txtfec" class="col-sm-1 control-label">Fecha</label>
                      div class="col-sm-3"><input type="text" class="form-control input-sm" id="txtfec" placeholder="0"></div>
                      <div class="col-sm-3 input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                      </div>
                      <label for="txtpu" class="col-sm-2 control-label">Precio</label>
                      <div class="col-sm-2"><input type="text" class="form-control input-sm" id="txtpu" placeholder="0"></div>
                      <label for="txtcan" class="col-sm-2 control-label">Cantidad</label>
                      <div class="col-sm-2"><input type="text" class="form-control input-sm" id="txtcan" placeholder="0"></div>
                  </div>-->
                    <div class="row">
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Fecha Seleccionada</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control input-sm" id="txtfec" placeholder="Fecha" readonly>
                        </div>
                      </div>                      
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio</label>
                        <div class="input-group">
                            <span class="input-group-addon">S/.</span>
                            <input type="text" class="form-control input-sm" id="txtpu" placeholder="Precio"  readonly>
                        </div>                        
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Cantidad</label>
                        <!--<div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-ticket"></i></span>
                            <input type="text" class="form-control input-sm" id="txtcant" placeholder="1">
                        </div>-->
                        <div class="input-group input-append spinner" data-trigger="spinner">
                            <input type="text" class="form-control input-sm" value="1" data-rule="quantity">
                            <div class="input-group-addon add-on">
                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                                      
            </div><!-- /.box-body -->
            <div class="box-footer"><br><br>
                
              <button type="submit" class="btn btn-primary">Añadir Carrito</button>
              <br><br>
            </div>
          </form>
        </div><!-- /.box -->                  
      </div>
    </div> 
</div>
