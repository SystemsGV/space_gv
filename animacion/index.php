<html>
	<head>
		<title>Cambiar Imagen</title>
	</head>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script>
		function cambiarImagen() {
			$('#imgEjemplo').attr("src","https://images2.alphacoders.com/522/thumb-1920-522622.jpg");
		}
		
		function cambiarImagen1(){
			$('#imgEjemplo1').attr("src","https://images2.alphacoders.com/769/thumb-1920-769896.png");
		}
	</script>
	<body>
		<input type="submit" value="Aceptar" onclick="cambiarImagen()"/>
		<img src="https://images5.alphacoders.com/769/thumb-1920-769896.png" id="imgEjemplo" width="500" height="250"/>

        <img src="https://images2.alphacoders.com/522/thumb-1920-522622.jpg" id="imgEjemplo1" width="500" height="250"/>
	</body>
</html>