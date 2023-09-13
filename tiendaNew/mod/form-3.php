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

                <a href="?mod=formval" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>

                <p class="hidden-xs">Datos del Comprador</p>

                <p class="visible-xs">Paso 2</p>

            </div>

            <div class="stepwizard-step">

                <a href="?mod=form-3" type="button" class="btn btn-primary btn-circle">3</a>

                <p class="hidden-xs">Finalizar y disfrutar</p>

                <p class="visible-xs">Paso 3</p>

            </div>

            <!--<div class="stepwizard-step">

                <a href="?mod=form-3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>

                <p class="hidden-xs">Finalizar y disfrutar</p>

                <p class="visible-xs">Paso 4</p>

            </div>-->

        </div>

    </div>

    <div class="row container">

        <h3>GRACIAS POR SU PREFERENCIA</h3>

    </div>

</div>