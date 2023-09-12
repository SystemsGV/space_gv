<title>Nivel de Infeccion</title>
<style>
.nivel {
  position: relative;
  width: 96%;
  max-width: 960px;
  margin: 0 auto;
  text-align: center;

}
.img1{
	position: relative;
  width: 96%;
  max-width: 960px;
  margin: 0 auto;
  text-align: center;
}

</style> 

<div id="nivel" style="width:100%">
<input type="submit" value="Ver Nivel de Infeccion" onclick="cambiar()"/>
</div>
<div id="img1" style="width:100%">
<img src="https://lagranjavilla.com/b1-off.jpg" name="ejemplo">
</div>
<script language="javascript">
imagen1=new Image
imagen1.src="https://lagranjavilla.com/banner_socio2016.jpg"
imagen2=new Image
imagen2.src="https://lagranjavilla.com/b2-off.jpg"
var i=1;
function cambiar() {
if (i == 1)
{
document.images['ejemplo'].src=imagen2.src
i=2;
}
else
{
document.images['ejemplo'].src=imagen1.src;
}
}
</script>
