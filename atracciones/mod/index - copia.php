<style>
	@charset "utf-8";
/* CSS Document */

@import url(//fonts.googleapis.com/css?family=Droid+Sans:400,700|Carrois+Gothic+SC);


.push {
  height: 174px;
}

.wrapper {
 min-height: 100%;
 height: auto !important;
 height: 100%;
 margin: 0 auto -174px;
}

a {
	color:#781d17;
	text-decoration:none;
/*	font-weight:bold;*/
}

a:hover {
	color:#e53222;
}

.alinDerecha{
	text-align:right;
}

hr{
	border:1px dashed #666;
	margin: 5px 0;

}

.textGrande{
	font-size: 1.25em;
}

.alinIzq{
	text-align: left;
}

.alinCentro{
	text-align: center;
}

ul {
	padding-left:30px;
	list-style: square;
}




/* General */
.contenedorgeneral{
	width:980px;
	position:relative;
	margin: 0 auto;	
}

.contenido{
	width:980px;
	position:relative;
	margin-top:240px;

}

.enlaceblanco{
	color:#FFF;
	text-decoration:none;
	cursor:pointer;
}

.enlaceblanco:hover{
	color:#fec210;
}

.enlacenegro{
	color:#000;
	text-decoration:none;
	cursor:pointer;
}

.enlacenegro:hover{
	color:#a58423;
}

.enlaceamarillo{
	color:#fec210;
	text-decoration:none;
}

.enlaceamarillo:hover{
	color:#fec210;
	text-decoration: underline;
}

.contenedorcabecera{
	text-align:center;
}

.justificado{
	text-align:justify;
}

.barramenu{
	background-color:#000;
	filter: alpha(opacity=90);
	opacity: .90;
	top: 137px;
	position:absolute;
	width:100%;
	height:31px;
	left: 0;
	min-width: 980px;
}

a:active{
	outline:none;
}

:focus {
	outline: none;
}


a img{
	border:0;
}

.logoim{
	height:110px;
	width:360px;
	margin-top:13px;
	z-index:115;
}

/* Pestañas */

.pestanaPrincipal{
	font-size:24px;
	font-weight:bold;
	background-color:#FFF;
	position:absolute;
	top: -55px;
	left: 0;
	z-index:0;
	padding: 7px 10px 20px 10px;
}

.pestanaPrincipal .trianguloBlanco{
	position: absolute;
	top: -8px;
	left: 16px;	
}

.pestanaMiga{
	font-size:10px;
	background-color:#FFF;
	position:absolute;
	top: -33px;
	right:0;
	z-index:0;
	padding: 5px 7px 12px 7px;
}

.pestanaMiga a{
	text-decoration:none;
	color:#000;	
}

.pestanaMiga a:hover{
	text-decoration: underline;
}

/* Barra superior*/

.barrasup{
	position:absolute;
	top: 7px;
	left:0;
	width: 980px;
	color:#FFF;
	font-size:10px;
	font-weight:bold;
}

.barrasup a{
	color:#FFF;
	text-decoration:none;
}

.barrasup a:hover{
	color:#fec210;
}

.barrasup .idiomas{
	position:relative;
	float: left;
	padding:4px 7px;
	background:#242424;
	filter: alpha(opacity=90);
	opacity: .90;
	z-index:100;
}
	
.barrasup .secundario{
	position:relative;
	float: right;
	padding:4px 7px;
	background:#242424;
	filter: alpha(opacity=90);
	opacity: .90;
	z-index:100;
}
	
/* Menu */
#menunav{
	top: 135px;
	position:absolute;
	left:0;
	width:980px;
	z-index:100;
	margin: 0 auto;
	clear: both;
}

/* remove the list style */
#nav {	
	color:#FFF;
	font-size:13px;
	line-height:20px;
	list-style: none;
	font-weight:700;
	position:relative;
	padding:0;
	float:left;
	margin: 0 auto;
	width:100%;
	display:block;
}   
     
    /* make the LI display inline */
    /* it's position relative so that position absolute */
    /* can be used in submenu */
#nav li a {
    z-index:500; 
	color: #FFF;
	text-decoration:none;
	cursor:pointer;
	background:url(../img/vacio.gif) no-repeat;
}

#nav li{
list-style: none;
display: -moz-inline-stack; /* FF2*/
display: inline-block;
vertical-align: top; /* BASELINE CORRECCIÓN*/
zoom: 1; /* IE7 (hasLayout)*/
*display: inline; /* IE */
padding: 8px 10px 8px 10px;
font-size:14px;
/*padding: 8px 6px 8px 5px;*/
position:relative;
}

.navNovedad{
	position: absolute;
	top: -12px;
	height: 17px;
	width: 80%;
	background-color: #009FAD;
	color: #FFF;
	font-size: 9px;
	text-align: center;
	margin-top: -3px;
}
 
#nav li ul li{
 right:0;
}

#nav li ul li,   #nav li a {
	padding: 4px 7px 4px 3px;
}         
   
    /* this is the parent menu */
 
    #nav li a:hover {
	color: #fec210;
	text-decoration:none;
    }
     
 
        /* submenu, it's hidden by default */
#nav ul {
    margin:0 0 0 -1px; 
	display: none;
	position: absolute;
	top:33px;
	left:0;
	background: #000;
	filter: alpha(opacity=95);
	opacity: .95;
	padding: 2px 2px;
	text-align:left;
	width:150px;
	font-size:13px;
    }
         
 
        /* display block will make the link fill the whole area of LI */
        #nav ul a {
	display: block;
	color: #FFF;
	text-decoration:none;
	width: 134px;
			
        }
         
        #nav ul a:hover {
	background:#202020;
	color: #fec210;
        }
 
/* Contenido */

.barradestacados{
	width:980px;
	height:143px;
	margin: 10px 0 0 0;
	color:#FFF;
	overflow:hidden;
}

.destacgrande{
	font-size:1.5em;
	display:block;
	margin-bottom:5px;
}

.destacado{
	height:123px;
	width:224px;
	float:left;
	background-color: #000;
	padding:10px;
	position:relative;
}

.enlacedestacado{
	padding-top:60px;
	display:block;
}

.margenD1{
	margin-right:1px;
}

.dest_peq_fondo{
	position:absolute;
	top: 101px; left:0;
}

.dest_peq_letras{
	position:absolute;
	top: 0; left:0;
	padding: 114px 0 0 22px;
	width:205px;
	font-size:15px;
	text-align:center;
	font-family: 'Carrois Gothic SC', sans-serif;
	text-transform:uppercase;
}


.contenedorColumnas{
	overflow:auto;
	z-index: 10;
}

.contColumna{
	width: 478px;
	padding: 10px 6px 10px 6px;
	position:relative;
	float:left;
}

.contColumnaCalendario{
	width: 490px;
	padding: 10px 0;
	position:relative;
	float:left;
}


.contColumnaPestana{
	width: 457px;
	padding: 0 6px 10px 6px;
	position:relative;
	float:left;
}

.contColumnaAncha{
	width: 968px;
	padding: 0 6px;
	position:relative;
	float:left;
}

/* Barar azul */
.barraazul{
	width:950px;
	padding:15px;
	margin-top:25px;
	background:#00539f url(../img/fondobarraazul.jpg) no-repeat;
	z-index:1;
	overflow: hidden;
	color:#FFF;
	position: relative;
	min-height: 100px;
}

.azulMarginDestacados{
	margin-bottom:25px;
}
.contGlobalAzul {
	position: relative;
	display: block;
	margin: 35px 0px 15px 0px;
}

.contlogoZonaTransparente{
	position:absolute;
	overflow:hidden;
	height:100%;
	top: 0;
	left:670px;
	width:230px;	
}

.logoZonaTransparente{
	height:230px;
	width:230px;
}

.contGlobalTituloZona {
	position: absolute;
	z-index: 3;
	left: 312px;
	top: -15px;
}

.nombreZona, .nombreZona a{
	color:#FFF;
	font-size:17px;
	font-weight:bold;
	float: left;
	position:relative;
	margin:11px 0 0 5px;
}

.nombreZona a:hover{
	text-decoration:underline;
}

.contlogoZona{
	width:51px;
	height:51px;
	position:relative;
	float:left;
}

.contMinimapa{
	width:326px;
	height:190px;
	position: absolute;
	margin: -25px 5px -15px -20px;
	z-index: 3;
	top: 0;
	left: 0;
}

.minimapa{
	width:326px;
	height:190px;
}


ul.leyendamap{
	list-style:none;
	margin:0;
	padding-left:20px;
	padding-top:10px;

}

ul.leyendamap li{
float:left;
position: relative;
margin-right: 25px;
font-weight:bold;
}

ul.leyendamap li img{
	vertical-align:middle;
}
.contZona{
	width:660px;
	position:relative;
	margin-left: 300px;
	padding-top:25px;
	z-index: 10;
}

.columnaAzul{
	position:relative;
	width:162px;
	margin-right:2px;
	margin-bottom:10px;
	float:left;	
}

.columnaAzul h3{
	padding:0;
	margin:0 0 7px 0;
	font-size:14px;
	font-weight:bold;
}

.columnaAzul ul, .columnaAzul ul a{
	padding:0;
	margin:0 0 7px 0;
	font-weight:bold;
	font-size:12px;
	color: #ffe38f;
	text-decoration:none;
}

.columnaAzul ul li, .columnaAzul ul li a{
	padding:0;
	margin:3px 0 0 0;
	color: #fec210;
	list-style:none;
	font-weight:bold;
	font-size:11px;
	line-height:100%;
	text-decoration:none;
}

.columnaAzul ul li a:hover,.columnaAzul ul a:hover {
	text-decoration:underline;
	color:#ffe906;
}

.columnaAzul ul li a:visited {
	text-decoration:underline;
	color:#e0a311;
}


.columna220{
	width:220px;
	float:left;
	margin:0 7px 0 8px;
	z-index:100;
	position:relative;
}

.columna220 ul, .columna220 ul li a{
	list-style:none;
	padding:0;
	color:#fec210;
	font-weight:bold;
	text-decoration:none;
	line-height:1.5em;
}

 .columna220 ul li a:hover{
	text-decoration:underline;
	color:#ffe906;
 }

.bordeIzquierdoAzul {
	border-left:#0059ae 2px dashed;

}
 
/* Apartados */

.barraApartado {
	width:464px;
	padding:6px;
	height:13px;
	color:#FFF;
	font-weight:bold;
	margin: 15px 0;
	position:relative;
	clear:both;
}

.barraApartadoPestana {
	width:445px;
	padding:6px;
	height:13px;
	color:#FFF;
	font-weight:bold;
	margin: 15px 0;
	position:relative;
	clear:both;
}

.barraApartadoAncha {
	width:956px;
	padding:6px;
	height:13px;
	color:#FFF;
	font-weight:bold;
	margin: 15px 0;
	position:relative;
	clear:both;
}

.apartadoRojo {
	background-color: #ef3e33;
}

.apartadoVerde {
	background-color: #2fb457;
}

.apartadoAzul {
	background-color: #00529e;
}

.apartadoMorado {
	background-color: #68008f;
}

.picoBarraApartado{
	position: absolute;
	left:19px;
	top:25px;
}

.letraApartado{
	font-size:11px;
	position:relative;
	margin:0;
	padding:0;
}

.moduloApartado{
	margin-bottom:15px;
	width:100%;
	position:relative;
}

.textoIconoApartado{
	position: relative;
	padding-left: 35px;
}

.iconoRestServi{
	height:30px;
	width: 30px;
	position: relative;
	float:left;
	font-size:30px;
	font-weight:700;
	text-align:center;
	color:#555;
}

.iconoIntensidad{
	height:15px;
	width: 30px;	
	position: relative;
	float:left;
}

.enlaceTituloApartado{
	color:#000;
	border-bottom: 1px dotted #333;
	text-decoration:none;
}

.enlaceTituloApartado:hover{
	color: #333;
	border-bottom: 0;
	text-decoration:none;
}


/* Galeria fotos y video*/

.galeriaPequena{
	height: 90px;
	width: 110px;
	float:left;
	position: relative;
}

.interioresMargin{
	margin-right:12px;
}


.imagenVideo{
	height:302px;
	width: 478px;
	position:relative;
	margin-top:12px;
	float:left;
}

/* Eventos */

.destacadoSinFloat{
	text-align:right;
	height:118px;
	width:300px;
	background-color: #000;
	padding:10px;
	font-weight:bold;
	margin-left:auto;
	margin-right:auto;
	text-shadow:#000 1px 1px 6px;
}


.columnaServicios{
	position:relative;
	width:230px;
	margin-right:15px;
	margin-bottom:10px;
	float:left;
}

.columnaPrimeraServicios{
	position:relative;
	width:390px;
	margin-right:15px;
	margin-bottom:10px;
	float:left;
}

.columnaServicios ul{
	padding:0;
	margin:0 0 7px 0;
	font-size:14px;
	font-weight:bold;
}

.columnaServicios ul li{
	padding:0;
	color: #af4722;
	list-style: inside;
	font-weight:bold;
	font-size:11px;
}

.contactoeventos{
	text-align:center;
	font-size:1.5em;
}

.listaEspacios{
	list-style:none;
	font-weight:bold;
	font-size: 1.2em;
	line-height:1.5em;
	padding:0 0 0 10px;;
	margin:0 0 20px 0;
	}

.columna220 img{
	 margin-top:10px;
	}
	


.pestanaPDF{
	background-color:#FFF;
	position:absolute;
	right: -60px;
	top: 0;
	z-index:0;
	padding: 7px 10px 20px 10px;
}

/* Tarifas */

.tablaTarifas
{
	width:100%;
	border-collapse: collapse;
	text-align: left;
}

.tablaTarifas th
{
	color:#333;
	font-size:11px;
	font-weight:bold;
	font-variant:small-caps;
	height: 16px;
	text-align:left;
	border-bottom: 2px solid #6678b1;
}

.tablaTarifas td
{
	border-bottom: 1px solid #ccc;
	color: #000;
	font-weight:bold;
	padding: 6px 8px;

}


.tarIndividuales td{
	width:122px;
}

.tarGrupos td{
	width:122px;
}

.cuadroGris{
	width:450px;
	padding:15px;
	background:#e2dfdc;
	float:left;
	position: relative;
	margin-top: 15px;
}

.cuadroAzul{
	width:450px;
	padding:15px;
	background:#333;
	color:#fff;
	float: left;
	position: relative;
	margin-top:15px;
}



/* Zonas tematicas */


.unidadZona{
	width: 459px;
	height: 160px;
	overflow:hidden;
	position:relative;
	float: left;
	margin: 6px 5px;
}

.unidadZona img.fotoZona{
	position:absolute;
	top: -60px;
	z-index:1;
}

.tituloZona{
	width: 100%;
	height:32px;
	position:absolute;
	top:128px;
	background-color:#FFF;
	font-size:1.3em;
	font-weight: 700;
	padding-left: 60px;
	line-height:2.2em;
	z-index:10;
}

.tituloZona .trianguloBlanco{
	position: absolute;
	top: -8px;
	left: 60px;
	z-index: 15;	
}

.logodezona{
	position: absolute;
	top: -26px;
	left: 0;
	z-index: 20;	
	
}

/* Atracciones, tiendas, juegos, restaurantes */

.unidadColZona{
	width: 478px;
	position:relative;
	float: left;
	margin: 0 0 6px 0;
}

.barraApartadoZona {
	width:409px;
	padding:6px 6px 6px 63px;
	height:18px;
	color:#FFF;
	font-size:1.3em;
	font-weight:700;
	margin: 15px 0;
	position:relative;
}

.picoBarraApartadoZona{
	position: absolute;
	left:63px;
	top:30px;
}

.logodezonaBarra{
	position: absolute;
	top: -11px;
	left: 5px;
	z-index: 20;	
	
}

.unidadElemento{
	margin: 3px 3px 15px 3px;
	width:110px;
	height:110px;
	position:relative;
	float:left;
	font-weight:700;
}

.unidadElemento .contenedorimg{
	width:110px;
	height:75px;
	position:relative;
	margin-bottom:5px;
	overflow:hidden;
}

.unidadElemento .contenedorimg2{
	width:110px;
	height:90px;
	position:relative;
}


img.fotoelemento{
	position:absolute;
	top: 0;
	left: 0;
	width:110px;
	height:90px;
}

.unidadElemento .trianguloBlanco{
	position: absolute;
	top: 66px;
	left: 5px;
	z-index: 15;
	height:9px;
	width:19px;	
}

.bandaNovedad{
	position: absolute;
	top: 0;
	left: 0;
	z-index: 20;
	height:37px;
	width:51px;	
}


.tituloRecinto{
	width:475px;
	border-bottom: 2px solid #00529e;
	font-weight:700;
	font-size:1.15em;
	clear:both;
	height:17px;
	margin-left: 3px;
	margin-bottom: -3px;
	position:relative;
	color:#01539f;
}

.tituloRecinto .triangulo{
	position: absolute;
	left:13px;
	top:19px;
	z-index:50;	
}


/* Novedades */


.main_image {
    width: 600px;
    height: 521px;
    float: left;
    background: #333;
    position: relative;
    overflow: hidden; /*--Overflow hidden allows the description to toggle/tuck away as it slides down--*/
    color: #fff;
}
.main_image h2 {
    font-size: 2em;
    font-weight: 700;
    margin: 0 0 5px;
    padding: 10px;
}
.main_image p {
    font-size: 1.12em;
    line-height: 1.6em;
    padding: 10px;
    margin: 0;
}

.main_image small {
	display:none;}

.block small { /*--We'll be using this same style on our thumbnail list--*/
    font-size: 1em;
}
.main_image .block small {margin-left: 10px;}
.main_image .desc{
    position: absolute;
    bottom: 0;
    left: 0; /*--Stick the desc class to the bottom of our main image container--*/
    width: 100%;
    display: none; /*--Hide description by default, if js is enabled, we will show this--*/
}
.main_image .block{
    width: 100%;
    background: #111;
    border-top: 1px solid #000;
}

.main_image a.show {background-position: left bottom;}


.image_thumb {
    float: left;
    width: 375px;
    background: #f0f0f0;
    border-right: 1px solid #fff;
    border-top: 1px solid #ccc;
}
.image_thumb img {
    border: 1px solid #ccc;
    padding: 3px;
    background: #fff;
    float: left;
}
.image_thumb ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.image_thumb ul li{
    margin: 0;
    padding: 12px 10px;
    background: #f0f0f0 ;
    width: 355px;
    float: left;
    border-bottom: 1px solid #ccc;
    border-top: 1px solid #fff;
    border-right: 1px solid #ccc;
}
.image_thumb ul li.hover { /*--Hover State--*/
    background: #ddd;
    cursor: pointer;
}
.image_thumb ul li.active { /*--Active State--*/
    background: #fff;
    cursor: default;
}
html .image_thumb ul li h2 {
    font-size: 1.5em;
    margin: 5px 0;
    padding: 0;
}
.image_thumb ul li .block {
    float: left;
    margin-left: 10px;
    padding: 0;
    width: 250px;
}
.image_thumb ul li p{display: none;}/*--Hide the description on the list items--*/

h3{
	font-weight:bold;
	font-size: 1.2em;
	margin: 0 0 5px 0;
}

/* Pie de pagina */
.piepagina{
	background-image:url(../img/pie.png);
	height:149px;
	width:980px;
	margin:25px auto 0 auto;
	position: relative;
	text-align:center;
}

.piepagina .logoimf{
	margin-top:13px;
	margin-bottom:8px;
	height:50px;
	width:177px;
}


.piepagina .telefono{
	font-weight:bold;
	color:#FFF;
}


.piepagina .izquierda{
	color:#b6b6b6;
	position:absolute;
	top:15px;
	padding-top:8px;
	left:30px;
	width:360px;
	height:105px;
	text-align:left;
}

.piepagina .izquierda a{
	color:#b6b6b6;
	text-decoration:none;
}

.contypatro{
	font-weight:bold;
	font-size: 1.1em;
}

.contypatro .icono{
	margin-right: 5px;
	vertical-align: middle;	
}

.izquierda .secundario{
	position:absolute;
	top: 40px;
	left:0;
	
}



.piepagina .izquierda a:hover{
	text-decoration:underline;
}
 
.piepagina .textaenor{
	font-size:9px;
	width:140px;
	position:absolute;
	top:95px;
	left:75px;
}

.piepagina .faceboton{

	width:140px;
	position:absolute;
	top:43px;
	left:0;
}

.piepagina .twitboton{

	width:64px;
	overflow:hidden;
	position:absolute;
	top:48px;
	left:155px;
}


.piepagina .gplusboton{

	width:80px;
	position:absolute;
	top:42px;
	left:270px;
}


.piepagina .suscribir{
	font-size:9px;
	width:110px;
	position:absolute;
	top:95px;
	left:0;
}

.piepagina .izquierda .imgaenor{
	position:absolute;
	width:63px;
	height:46px;
	top:69px;
	left:0px;
}

.piepagina .derecha{
	color:#b6b6b6;
	position:absolute;
	top:15px;
	left:625px;
	width:349px;
	height:105px;
	text-align:left;
}

.piepagina .derecha .botonred{
	margin-right:30px;
	height:27px;
}

.piepagina .derecha .formboletin{
	position:absolute;
	height:20px;
	width:220px;
	left:109px;
	top:95px;

}

.piepagina .derecha .formboletin .cajabol{
	border: 0px;
	color: #000;
	font-family: 'Droid Sans',  sans-serif;
	font-size: 12px;
	font-weight:bold;
	width:173px;
	height:14px;
	padding: 3px;
	float:left;
	margin-right:5px;
	background: url(../img/fondoboletin.gif) no-repeat transparent;
}

.patrocinadoresPop{
	position: relative;
	list-style:none;
}

.patrocinadoresPop li{
	float:left;
	position:relative;
	margin:5px;
}

.patrocinadoresPop li img{
	width: 176px;
	height: 120px;

}

/* Varios */

.carta{
	font-style:italic;
	font-weight:bold;
	color:#606060;	
}

/* Popup Patrocinadores*/

.popup_block{
	background: #000;
	width: 800px;
	padding: 20px;
	font-size: 1.2em;
	overflow:hidden;
}


/* Pestañas */

.pestanas {
position:relative;
float:left;
margin-top: 20px;
padding:0;
}

.tabnav{
		padding:0;
		margin:0;
		position:relative;
}

.tabnav li {
	float: left;
	height: 31px;
	line-height: 31px;
	border: 1px solid #999;
	border-bottom:none;
	margin-bottom: -1px;
	background: #e0e0e0;
	overflow: hidden;
	position: relative;
}

.tabnav li a {
	text-decoration: none;
	color: #000;
	display: block;
	font-size: 1.2em;
	padding: 0 20px;
	border: 1px solid #fff;
	outline: none;
}
	
.tabnav li a:hover {
	background: #ccc;
}	

.tabnav li.ui-tabs-selected  {
	background: #fff;
	border-bottom: 1px solid #fff;
}

.tabdiv {
	border: 1px solid #999;
	clear: both;
	overflow:hidden;
	width: 938px;
	background: #fff;
	padding: 20px;
}
	
.ui-tabs-hide {
    display: none;
}

/* Prensa */

.iconoDescarga{
	float:right;
	position:relative;
	height:18px;
	width:18px;
	margin-top:-2px;
	margin-left:5px;
}

.archivoNoticia{
	position:relative;
	margin-bottom:13px;
	border-bottom: dotted 1px #CCC;
	padding-bottom:13px;
	font-weight:700;
	
}

.noticiaReciente{
	position:relative;
	margin-bottom:13px;
	border-bottom: dotted 1px #CCC;
	padding-bottom:13px;
	overflow:hidden;
}

.fotoNoticia{
	float: right;
	margin: 0 0 10px 10px;
	position:relative;	
}

.lupa{
	position:absolute;
	bottom:10px;
	right:0;
	z-index: 50;
	
}

.fechaNoticia{
	color:#666;
	font-weight:400;
	font-size:0.9em;
}

/* Escolares */

.ventajasEsc{
	padding-left:19px;
	margin-bottom:25px;
}

.ventajasEsc li{
	margin-bottom:10px;
}

.ventajasEsc li li{
	margin-bottom: 0;
}

.tabdivCol {
	border: 1px solid #999;
	clear: both;
	float: left; 
	width: 421px;
	background: #fff;
	padding: 20px;
}

.descPrograma{
	text-align: center;
	height:110px;
	width:433px;
	background: #FFF no-repeat;
	font-weight:bold;
	margin:15px auto 0 auto;
	text-shadow:#000 1px 1px 6px;
	position:relative;
	clear:both;
}
.descPrograma img{
	float:right;
	margin:0;
	position:relative;	
}


.enlacedescargaProg{
	padding-top:40px;
	padding-right:5px;
	display:block;
	color:#FFF;
	float:right;
	position:relative;
}

.tablaMenus{
	width:100%;
	float: left;
}

.tablaMenusCeliacos{
	width:60%;
	margin-top: 20px;
	float: left;
	margin-bottom:20px;
}
.tablaMenus td, .tablaMenusCeliacos td{
	border: 1px solid #FFF;	
	padding: 5px;
}

.tablaMenus ul, .tablaMenusCeliacos ul{
	padding-left: 15px;
}

.tablaMenus li, .tablaMenusCeliacos li{
	list-style: circle;
}

.tablaMenus td.titulo, .tablaMenusCeliacos td.titulo, .escDestacado{
	text-align:center;
	font-weight:700;
	font-size:1.1em;
}

.imgMenus{
	float: left;
	margin: 20px 0 20px 18px;	
}

.oferta15anos{
	background:#8e0b3e url(../escolares/img/fondoOferta.jpg) no-repeat;
	width:96%;
	padding:2%;
	margin-top:15px;
	color: #FFF;
	text-align:center;
	font-size:0.95em;
}

.of1{
	background:#000;
	font-weight:700;
	padding:3px;
	display:block;
	font-size:1.05em;	
}
	
.of2{
	color:#FC3;
	font-weight:700;
	font-size:1.7em;
	text-shadow:#000 1px 1px 6px;
}

/* Pases */

.parqueGratis{
	margin-bottom: 5px;
	width:100%;	
	position: relative;
	clear:both;
	padding-top: 10px;
}

.parqueGratis img{
	float:left;
	margin: 0 5px 5px 0;
	position: relative;
	margin-top: -10px;
}

.contenedor-comollegar {
width: 477px; overflow: hidden;
margin-bottom:15px;
}
.contenedor-comollegar-izquierdo {
width: 45px; float: left;
}
.contenedor-comollegar-derecho {
width: 421px; float: right; border-left: #999999 1px solid; padding: 0px 0px 0px 10px;
}

/* Express */

.atracc_express{
	height:40px;
	width:470px;
	font-size:16px;
	font-weight:700;
	overflow:hidden;
	position:relative;
	margin-bottom:5px;
	padding-top:20px;
	border-bottom:#CCC dotted 1px;
}

.atracc_express img{
	height: 90px;
	widows:110px;
	position:relative;
	float:left;
	margin-right:15px;
	margin-top:-20px;
}

.creditos {
	color:#F63;	
}

/* Normas */

.enumNormas{
	padding: 0 0 0 20px;
}

.enumNormas li{
	margin-bottom: 1.2em;
}

/* Guia visita */

.barraGris{
	width:100%;
	background-color:#f5f5f5;
	border: 1px solid #e5e5e5;
	position:relative;
	overflow:hidden;
	padding:15px 0 8px 0;
}

.grandeNegrita{
	font-size:1.4em;
	font-weight:bold;
}

.botonFormulario{
    display: inline-block;
    background-color:#d4d0ce;
    border:1px solid #bbb;
    border-top:1px solid #ddd;
    border-left:1px solid #ddd;
	font-family:"Droid Sans", sans-serif;
    line-height:130%;
    text-decoration:none;
    font-weight:bold;
    color: #333;
    cursor:pointer;
    padding:6px 10px 6px 10px; /* Links */
    width:auto;
    overflow:visible;
	vertical-align:middle;
}

.botonFormulario:hover{
    background:#fbe3e4;
    border:1px solid #fbc2c4;
    color:#d12f19;
}
.botonFormulario:active{
    background-color:#d12f19;
    border:1px solid #d12f19;
    color:#fff;
}

.cintaMetrica{
	background:transparent url(../preparatuvisita/img/guia/metro.png) no-repeat top right;
}

.tablaMedidas{
	width:100%;	
}

.tablaMedidas tr th{
	font-weight:bold;
	background-color: #333;
	color:#FFF;
	text-align:center;
	padding:4px;
}

.tablaMedidas tr td{
	padding:4px 10px;
}

/* Calendario y horarios */

.cabeceraHorarios{
	margin: 0;
	padding: .3em 0;
	background: #333;
	color:#FFF;
	font-weight:bold;
}

.tablaHorarios{
	width:100%;
	text-align:center;
	font-weight:bold;
}


.tablaHorarios td {
	border: 1px #FFF solid;
	margin: 0;
	padding: .3em 6px;

}

.aviso_importante{
	background-color:#F5A9A9;
	border: 2px dashed #FF0000;
	padding:0.4em;
	margin: 10px 0;
}

.aviso_importante li{
	padding-left:10px;
	list-style:none;
}
</style>
<style type="text/css">
	@charset "utf-8";
/* CSS Document */


.ei_menu{
  /*  background:#111;*/
    width:100%;
    overflow:hidden;
	margin-top:15px;
	position:relative;
}

.ei_menu ul{
    height:500px;
    position:relative;
    display:block;
	padding:0;
}

.ei_menu ul li{
    float:left;
    width:75px;
    height:500px;
    position:relative;
    overflow:hidden;
    border-right:2px solid #FFF; 
}

.ei_preview{
    width:56px;
    height:480px;
	padding-top:20px;
	padding-left:19px;
    cursor:pointer;
    position:absolute;
    top:0px;
    left:0px;
    background:transparent url(img/guia/bw.jpg) no-repeat top left;
	border-left:1px solid #000;
}

.ei_image{
    position:absolute;
    left:75px;
    top:0px;
    width:75px;
    height:500px;
    opacity:0.8;
    background:transparent  url(img/guia/color.jpg) no-repeat top left;
	border-left:1px solid #000;
}

.pos1 span{
    background-position:0px 0px;
}
.pos2 span{
    background-position:-75px 0px;
}
.pos3 span{
    background-position:-152px 0px;
}
.pos4 span{
    background-position:-227px 0px;
}
.pos5 span{
    background-position:-302px 0px;
}
.pos6 span{
    background-position:-377px 0px;
}

.ei_descr{
    position:absolute;
    width:720px;
    height:460px;
    padding:20px;
    left:75px;
    top:0px;
    background:#fff;
}



.barraApartadoGuia {
	width:330px;
	padding:6px;
	height:13px;
	color:#FFF;
	font-weight:bold;
	margin: 15px 0;
	position:relative;
}

.colGuia{
	width: 340px;
	padding: 0 5px;
	position:relative;
	float:left;
}

.colGuia2{
	width: 360px;
	padding: 0 0 0 0;
	position:relative;
	float:left;
	text-align:center;
	font-size:1.3em;
	font-weight:bold;
	color: #666;

}

.tituloGuia{
	clear:both;
	width:100%;
	display:block;
	position:relative;
	font-size:2em;
	margin-left:5px;
	
}

.derechaGuia{
	position:absolute;
	top:10px;
	left:250px;
	width:720px;
}
</style>
<div class="container">
<div id="ei_menu" class="ei_menu">
	<div class="derechaGuia">
		<div class="colGuia2">
	    <img src="img/guia/flecha.png" alt="&lt;" style="vertical-align:middle;"  />Elige el perfil que más se adapte a ti<br /><br />                        
	    <img src="img/guia/ilustracion.jpg" alt="" />                                                                                               
		</div>		                                	
	    <div class="colGuia" style="padding-top:0px;">                                
	    	<div class="barraApartadoGuia apartadoAzul redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_azul.gif" />Atracciones</div>
	    	<div class="barraApartadoGuia apartadoVerde redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_verde.gif" />Restaurantes</div>
	 		<div class="barraApartadoGuia apartadoRojo redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_rojo.gif" />Horarios</div>
	    	<div class="barraApartadoGuia apartadoMorado redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_morado.gif" />Más información</div>
	    </div>
	</div>
	<ul>
		<li>
								<a href="#" class="pos1"><span class="ei_preview"><img alt="joven" src="img/guia/joven_es.png" /></span><span class="ei_image"></span></a>
								<div class="ei_descr">							
									<h2 class="tituloGuia">JOVEN</h2>                                
	                                <div class="colGuia">                                
		 								<div class="barraApartadoGuia apartadoAzul redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_azul.gif" />Atracciones</div>
										<div class="barraApartadoGuia apartadoRojo redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_rojo.gif" />Espectáculos</div>
	                                </div>		                                	
	                                <div class="colGuia">
		                                <div class="barraApartadoGuia apartadoVerde redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_verde.gif" />Restaurantes</div>
		                                <div class="barraApartadoGuia apartadoMorado redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_morado.gif" />Otros</div>
	                                </div>	

								</div>
		</li>
		<li>
								<a href="#" class="pos2"><span class="ei_preview"><img alt="familiar" src="img/guia/familiar_es.png" /></span><span class="ei_image"></span></a>
								<div class="ei_descr">
									<h2 class="tituloGuia">FAMILIAR</h2>                                
	                                <div class="colGuia">
	                                	<div class="barraApartadoGuia apartadoAzul redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_azul.gif" />Atracciones</div>
	                                	<div class="barraApartadoGuia apartadoVerde redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_verde.gif" />Restaurantes</div>                                      
									</div>		                                	
	                                <div class="colGuia">                                    
	 									<div class="barraApartadoGuia apartadoRojo redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_rojo.gif" />Espectáculos</div>
	                                 	<div class="barraApartadoGuia apartadoMorado redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_morado.gif" />Otros</div>
									</div>
								</div>
		</li>
		<li>
								<a href="#" class="pos3"><span class="ei_preview"><img alt="senior" src="img/guia/senior_es.png" /></span><span class="ei_image"></span></a>
								<div class="ei_descr">
									<h2 class="tituloGuia">SENIOR</h2>
	                                <div class="colGuia">
	 									<div class="barraApartadoGuia apartadoAzul redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_azul.gif" />Atracciones</div>
	                                	<div class="barraApartadoGuia apartadoRojo redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_rojo.gif" />Espectáculos</div>
	                                </div>		                                                                    
	                                <div class="colGuia">
	                                	<div class="barraApartadoGuia apartadoVerde redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_verde.gif" />Restaurantes</div>
	                                	<div class="barraApartadoGuia apartadoMorado redondo8"><img class="picoBarraApartado" alt="" src="img/triangulo_morado.gif" />Otros</div>                                
									</div>	
								</div>
		</li>	
	</ul>				
 </div>
 </div>