//Desarrollado por Jesus Liñán
//webmaster@ribosomatic.com
//ribosomatic.com
//Puedes hacer lo que quieras con el código
//pero visita la web cuando te acuerdes

function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}



function pedirDatos(){
	//donde se mostrará el resultado
	divResultado = document.getElementById('resultado');
	//tomamos el valor de la lista desplegable
	id_cate=document.form1.txt_id_categoria.value;

	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "mostrar_producto.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id_cate="+id_cate)
}


function verifica_codigo(){
	//donde se mostrará el resultado
	divResultado = document.getElementById('validar_codigo');
	//tomamos el valor de la lista desplegable
	codigo=document.form1.txt_codigo.value;

	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "validar_codigo.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("codigo="+codigo)
}
