<?

/*
* New Media Corp.
* Blockbuster
* Version: 1.0
*
* Iniciado: 07 / 04 / 2005
* Modificado: 04 / 05 / 2005
* Descripción: Clase que controla la paginacion 
*/

class cls_tbl_paginar{
	
	var $pagina_pag;	//indica la pagina actual a mostrar
	var $nro_paginas_pag;	//obtiene el numero de enlaces a mostrar en la navegacion
	var $resultado_pag;		//almacena el contenido de los registros a mostrar
	var $filasxpagina_pag;	//indica el numero de registros a visualizar por pagina
	var $nro_filas_pag;	//indica el total de registros existente
	var $parametros_pag;	//almacen los parametros adicionales a enviar entre paginas
	var $estilos_pag;		//almacena los estilos a asignar a la paginacion
	var $pos_inicial_pag;	//marca la posicion inicial de la pagina actual
	var $pos_final_pag;		//marca la posicion final de la pagina actual	
	var $grupo_actual_pag;
	var $bloque_actual_pag;
//fin de variables

//CONSTRUCTOR
//parametros
//$p_resultado= es el array que contiene el campo principal de una tabla
//$p_filasxpagina= es el numero de registros por pagina a visualizar
//$pagina_pag = indica la pagina actual
function cls_tbl_paginar ($p_resultado,$p_filasxpagina,$pagina_pag,$bloque_actual_pag="")
{

	if (empty($pagina_pag))	{    $this->pagina_pag=1;  }
	else					{    $this->pagina_pag=$pagina_pag;  }
	
	if (!empty($bloque_actual_pag)) {	$this->bloque_actual_pag=$bloque_actual_pag;	}				
	else							{   $this->bloque_actual_pag=1;					    }				

//	echo "dentro de clase : ".$this->bloque_actual_pag;
	
	$this->resultado_pag = $p_resultado;
	$this->nro_filas_pag=count($p_resultado);	
	$this->filasxpagina_pag=$p_filasxpagina;		
	$this->nro_paginas_pag=$this->inc_obtiene_nropaginas();
	$this->pos_inicial_pag=$this->inc_avanza_cursor();
	$this->pos_final_pag=$this->pos_inicial_pag + $p_filasxpagina;

}

//*******************************************************************************
function inc_obtiene_nropaginas()
{
			if ( (($this->nro_filas_pag) % ($this->filasxpagina_pag)) == 0 )		
			{	$nro_enlaces=($this->nro_filas_pag/$this->filasxpagina_pag); 						}
			else			
			{	$nro_enlaces=round(($this->nro_filas_pag/$this->filasxpagina_pag) + 0.5); 			}						

			return $nro_enlaces;
}

//*******************************************************************************
function inc_avanza_cursor()
{		
		$a=1;	
		for ($j=0 ; $j < ($this->pagina_pag-1)*($this->filasxpagina_pag); $j++ )
		{	$a=$a+1;														   }	
		return $a;		
}

//parametros: 
//$p_estilos	: es un arreglo de estilos 
//$p_parametros	: es un arreglo de parametros
function inc_muestra_paginacion($p_estilos="",$p_parametros="",$p_tamanio="")
{

//rescata los estilos
for($i=0;$i<count($p_estilos);$i++)
{
	if(!empty($p_estilos[$i]))
	{   $this->estilos_pag[$i]=$p_estilos[$i];	 }
}

//rescata los parametros
for($i=0;$i<count($p_parametros);$i++)
{
	if(!empty($p_parametros[$i]))
	{    $this->parametros_pag=$this->parametros_pag."&amp;".$p_parametros[$i];		}
}

if(strlen($p_tamanio)==0)
{
	$p_tamanio=430;
}
//*****************************************************************************************************
	$bloquexpagina_pag=25;
	
//********************PAGINACION X GRUPOS

	if ( (($this->nro_paginas_pag) % ($bloquexpagina_pag)) == 0 )		
	{	$nro_bloques_pag=($this->nro_paginas_pag/$bloquexpagina_pag); 						}
	else			
	{	$nro_bloques_pag=round(($this->nro_paginas_pag/$bloquexpagina_pag) + 0.5); 			}					


	 $bloque_actual=$this->bloque_actual_pag;
	 
	 switch ($bloque_actual)
	 {
	 case 1    : $pagina_inicial_pag=1;
				 $limite_pag=$bloquexpagina_pag;
				 $pagina_anterior_pag=1;
				 $pagina_posterior_pag=$bloquexpagina_pag+1;
				 break;
																										  
	 default :   $pagina_inicial_pag=(($bloquexpagina_pag)*($bloque_actual-1))+1;
				 $limite_pag=$bloquexpagina_pag*($bloque_actual);
				 $pagina_anterior_pag=$pagina_inicial_pag-1;
				 $pagina_posterior_pag=$limite_pag+1;
				 break;
	 }	
	 
/*	 echo "<br>num bloques : ".$nro_bloques_pag;
	 echo "<br>bloque actual : ".$bloque_actual;
	 echo "<br>Pagina Inicial : ".$pagina_inicial_pag;
	 echo "<br>Limite : ".$limite_pag;
	 echo "<br>Pagina anterior : ".$pagina_anterior_pag;
	 echo "<br>Pagina posterior : ".$pagina_posterior_pag;
*/
//*****************************FIN DE PAGINACION POR GRUPOS
	if($this->nro_paginas_pag>0)
	{
				echo   "<table width='".$p_tamanio."' border='0' align='center' cellpadding='1' cellspacing='0'>";
				echo   "<tr>"; 

		  			if($bloque_actual>1)
					{
						echo    "<td align='right' width='100'  class='".$this->estilos_pag[2]."'  valign='top'>";					
						$prev=$bloque_actual-1;
						$cad= "&nbsp;<a href='".$PHP_SELF."?pagina_pag=".$pagina_anterior_pag."&amp;bloque_actual_pag=".$prev."".$this->parametros_pag."' target='_top' class='".$this->estilos_pag[1]."'>"; 						
						echo $cad."<b>Anterior</b>"."</a>&nbsp;&nbsp;";		
						echo "&nbsp;</td>";					
					}			
				
				
				//echo   "<td align='right'  valign='middle'><span class='".$this->estilos_pag[2]."'>Pág.&nbsp;</span>";
				echo   "<td align='right'  valign='middle'><span class='txt_gris10'>P&aacute;g.&nbsp;</span>";
				
				$i=$pagina_inicial_pag;
				
				 while(($i<=$limite_pag) && ($i<$this->nro_paginas_pag+1))
				 {				 
						  if ($this->pagina_pag==$i) 
						  {	  echo "<span class='txt_gris10'>&nbsp;<b>".$i."</b>&nbsp;</span>";  }
						  else
						  {
							  if (empty($this->pagina_pag) && $i==1) 
							   { echo "<span class='txt_gris10'>&nbsp;".$i."&nbsp;</span>"; }	
							  else
							   { echo "&nbsp;<a href='".$PHP_SELF."?pagina_pag=$i&amp;bloque_actual_pag=".$bloque_actual.$this->parametros_pag."' target='_top' class='txt_gris10'>".$i."</a>&nbsp;"; }
						  }					  
						  
					$i++;
				 }//fin del for ($i=1 ; $i<$this->nro_paginas_pag+1; $i++)
								
				echo	"     &nbsp;</td>";				
	

		  			if($bloque_actual<$nro_bloques_pag)
					{
					echo    "<td align='left' width='100'  class='".$this->estilos_pag[2]."'  valign='top'>&nbsp;&nbsp;";					
					$next=$bloque_actual+1;
					$cad="";
					$cad= "&nbsp;<a href='".$PHP_SELF."?pagina_pag=".$pagina_posterior_pag."&amp;bloque_actual_pag=".$next." ".$this->parametros_pag."' target='_top' class='".$this->estilos_pag[1]."'>"; 						
					echo $cad."<b>Siguiente</b>"."</a>&nbsp;";		
					echo "</td>";							
					}			
				
				
				echo    "</tr>";
				echo  "</table>";
	}			
//*****************************************************************************************************
}//fin de la funcion

}//fin de clase

?>