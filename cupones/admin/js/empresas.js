function mmostrarDatos(valor){
	$ajax({
		url:"http://lagranjavilla.com/cupones/adm/inf_clientes",
		type:"POST",
		data:{buscar:valor},
		success:function(respuesta){
			alert(respuesta);
		}
	});
}
