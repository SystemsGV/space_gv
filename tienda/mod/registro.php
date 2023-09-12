<?php

//$cli = Cliente::find_by_sql("select MAX(cClieCode) idcliente from cliente");

//echo $_SESSION["sess_user"]["idusuario"];

if($_SESSION["sess_user"]["idusuario"]){

    $post = Cliente::find($_SESSION["sess_user"]["idusuario"],array('select' => "*,DATE_FORMAT(dnacmdate, '%d/%m/%Y') freg" ));

}

//echo "idcliente:".$post->ccliecode;

?>

<div class="container"  id="content-mod-center">

    <div class="row container" id="registro-cliente">

        <form class="formAll" role="form" name="frmSelTicket" id="frmSelTicket" action="prc.php" method="post">               

            <div class="panel panel-default">

                <div class="panel-heading"><strong>Información Personal</strong></div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Apellido Paterno</label>

                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input type="text" class="form-control required" name="apepat" value="<?=$post->sclieapel?>" placeholder="Apellido Paterno" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2"></div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Apellido Materno</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input type="text" class="form-control required" name="apemat" value="<?=$post->sclieapel?>" placeholder="Apellido Materno" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"

                            data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2"

                            ></div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Nombres</label>                                              

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input type="text" class="form-control required" name="nombres" value="<?=$post->scliename?>" placeholder="Nombres" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$" data-fv-stringlength="true" data-fv-stringlength-min="2"

                            ></div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>DNI / Carn&eacute; de Extranjer&iacute;a</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-ticket"></i></span><input type="text" class="form-control required" name="dnival" id="dnival" value="<?=$post->charclientedni?>" placeholder="DNI / Carne de Extranjeria" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" maxlength="15" data-fv-regexp-message="Porfavor ingrese un valor correcto." <?=$post->charclientedni?"readonly":$none?>></div>

                             </div>

                        </div>                                        

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Email</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope-o"></i></span><input type="text" class="form-control required" name="emailval" id="emailval" value="<?=$post->scliemail?>" placeholder="Email" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"

                            data-fv-emailaddress="true" data-fv-emailaddress-message="Porfavor ingrese un valor correcto."  <?=$post->scliemail?"readonly":$none?>></div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Telefono</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="text" class="form-control required" name="telefono" value="<?=$post->sclietelf?>" placeholder="Telefono" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"

                            data-fv-regexp="true" data-fv-regexp-regexp="^[0-9_\.]+$" data-fv-regexp-message="Porfavor ingrese un valor correcto."

                            ></div>

                            </div>

                        </div>                                        

                                                             

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Fecha Nacimiento (Dia/Mes/Año)</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control required"  name="fnac" id="fnac" value="<?=$post->freg?>" placeholder="DD/MM/YYYY"

                             data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" data-fv-date data-fv-date-format="DD/MM/YYYY" data-fv-date-message="La fecha no es valida"></div>

                            </div>

                        </div>

                        <div class="col-md-8">

                            <div class="form-group">

                            <label>Dirección</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-location-arrow"></i></span><input type="text" class="form-control required" name="dir" value="<?=$post->sclieaddr?>" placeholder="Dirección" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>

                            </div>     

                        </div>                                        

                        

                    </div> 

                </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading"><strong>Informaci&oacute;n Usuarios</strong></div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Usuario</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span><input type="text" class="form-control"  name="usuarioreg" id="usuarioreg" readonly value="<?=$post->charclientedni?>" placeholder="Usuario"></div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Contrase&ntilde;a</label>                                              

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control required" name="password" value="<?=$post->varclienteclave?>" placeholder="Contraseña" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"></div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                            <label>Confirmar Contrase&ntilde;a</label>

                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control required" name="rpassword" value="<?=$post->varclienteclave?>" placeholder="Confirmar Contraseña" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio" 

                            data-fv-identical="true"

                            data-fv-identical-field="password"

                            data-fv-identical-message="La contraseña y su confirmación no son los mismos"></div>

                            </div>

                        </div>                                        

                    </div>                    

                </div>

            </div>

            <?php if(!isset($_SESSION["sess_user"]["idusuario"])){ ?>

            <div class="row text-justify" style="padding:30px">  

                <div class="form-group">                    

                    <div class="col-xs-12">

                        <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">

                            <p><strong>TERMINOS Y CONDICIONES:</strong></p>
<ol> 
<li>El horario de atención es de lunes a domingo de 10:00am a 06:00pm. (consulta en el Facebook por ciertos cierres parciales o totales del parque en temporada de navidad o eventos empresariales). </li>
<li>El ingreso a La Granja Villa es únicamente con la Pulsera Mágica que le da acceso al parque, a los tours de animales y a los juegos mecánicos las veces que desee de pendiendo de su talla y peso, ya que nuestros juegos funcionan en base a tallímetros según las guías de seguridad del fabricante.* También podrá ingresar al área de piscinas en temporada de verano (de Diciembre a Mayo aproximadamente). http://www.lagranjavilla.com/atracciones/</li>
<li>Únicamente los niños que miden menos de ochenta centímetros pueden ingresar sin pulsera al parque, incluso tendrán acceso a los tours de animales y en verano al área de piscinas, mas no ingresan a los juegos mecánicos. </li>
<li>A la zona de piscinas únicamente se ingresa con ropa de baño de lycra o impermeable por salud e higiene. Guías de seguridad establecidos por DIGESA piscinas saludables. El ingreso a la zona de piscinas para menores de 18 años es en compañía de un adulto por niño. </li>
<li>Los niños menores de 0.80 centímetros que adquieran pulsera mágica tendrán acceso a los siguientes juegos: El pueblo, El Manú, Lonas Saltarinas, Carrusel y Barco Pirata. </li>
<li>La pulsera mágica es indispensable e intransferible. Es necesario tenerla colocada durante toda su visita. Si se retira la pulsera tendrá un costo adicional la reposición de la misma. La pulsera tiene validez solo el día que se adquiere. Si la persona se retira de nuestras instalaciones no podrá REINGRESAR. Cuide la pulsera durante su estadía, ya que es su comprobante para acceder a toda la diversión.* No incluye el Bungy, ni los juegos de destreza. </li>
<li>No se realizan devoluciones del pago de entradas una vez haya realizado la compra. </li>
<li>El pago de ingreso a La Granja Villa incluye el cumplimiento de las normativas y guías de seguridad del parque. Las cuales se indican en cada una de nuestras atracciones. Dependiendo del juego puede encontrar restricciones de talla o peso que son recomendadas por el fabricante en el manual de cada uno de estos. Vulnerar alguna de estas medidas implica retirarlo del juego.</li>
<li>Por seguridad no está permitido el ingreso de alimentos ni bebidas, ya que una vez que el visitante haya ingresado, La Granja Villa se hace responsable de su seguridad dentro del parque. Te invitamos a conocer más en nuestra página web http://www.lagranjavilla.com/servicios_parafamilias.php.</li>
<li>Por su seguridad y la de los demás visitantes no está permitido ingresar al parque con armas de fuego u objetos punzo cortantes, tampoco el ingreso de mascotas, coolers, termos, triciclos, bicicletas, scooter, skate, globos, pelotas, palo de selfie, inflables, flotadores, Juegos de propulsión a chorro (pistolas de agua en temporada de verano)  juguetes que puedan comprometer algún riesgo, envases de vidrio, silbatos, cornetas u objetos que hagan ruido y perturben la tranquilidad de nuestros animales, tampoco se permite ingresar cigarros.</li>
<li>Por motivos de seguridad y privacidad no está permitido las fotografías y filmaciones a personas que no sean de su entorno o desconocidos. </li>
<li>No está permitido subir a los juegos con artículos que puedan salir disparados o que no permitan que se cumpla una total seguridad en la operación del juego, por esto no está permitido acceder a los juegos con carteras, canguros, gorras, mochilas, lentes, etc. www.lagranjavilla.com/juegossur.html</li>
<li>En el juego Disco Nazca por seguridad no ingresaran con sandalias que no tengan correas reajustarles ya que estas podrían salir disparadas.</li>
<li>El ingreso a la Mansión embrujada es solo en una vez, por persona si mides más de 1.30.</li>
<li>Los Juegos como el Black hole, Tagadisco, Rio granjero, La mansión Embrujada y Vikingo se apertura los siguientes horarios: Lunes a Viernes de 12:30 pm a 2:30 pm y de 4:00 pm a 5:00 pm, y Sábados, Domingos y Feriados de 12:30 pm a 5:30 pm.</li>
<li>El ingreso a los recintos de animales debe ser en tranquilidad y sin hacer mucho ruido para evitar molestarlo a nuestros animalitos, así como  también para poder escuchar la explicación del guía. Se atiende según el cronograma de actividades indicado en los mapas repartidos en el ingreso.</li> 
<li>Está terminantemente prohibido alimentar a los animales con otras comidas que no seas los que recibe diariamente en su dieta, ya que estas podrían atentar contra su vida. Cada animal recibe un alimento especial balanceado de acuerdo a su especie y características especiales.</li>
<li>No está permitido alterar la tranquilidad o manipular a los animales que se encuentran sueltos en el parque.</li>
<li>La granja villa no se hace responsable por los cambios climáticos que puedan presentarse durante el día.</li>
<li>Es indispensable presentar su DNI al realizar cualquier pago con tarjeta de crédito, en el caso de extranjeros presentar pasaporte o carnet de extranjería.</li>
<li>Se emitirá una boleta electrónica la cual será enviada a su correo automáticamente después de su compra.</li>
<li>Agradecemos su comprensión por permitirle a nuestro personal la inspección de mochilas y bolsos que aseguran un día completamente seguro en nuestras instalaciones.</li>


                        </div>

                    </div>

                </div>

            </div>



            <div class="row text-center" style="padding:30px">                

                <div class="form-group">

                    <div class="col-xs-6 col-xs-offset-3">

                        <div class="checkbox">

                            <label>

                                <input type="checkbox" style="height:20px; width:20px;" name="cmdterminos" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"/>&nbsp;&nbsp;&nbsp;Acepto los términos y condiciones

                            </label>

                        </div>

                    </div>

                </div>

            </div>

            <?php } ?>

            <div class="row">

                  <div class="col-md-12 text-center">

                    <div class="form-group">

                    <!--<a href="?mod=form-2" class="btn btn-primary">Anterior</a>&nbsp;<a href="?mod=form-2" class="btn btn-success"> Aceptar </a>-->

                    <input type="submit" class="btn btn-success" value="Enviar Registro">

                    <input type="hidden" name="cmd" value="addreg">

                    </div>

                  </div>

            </div>                            

        </form> 

    </div>

</div>