<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">




function isEmail (s)
{
    if (isWhitespace(s)) return false;

    var i = 1;
    var sLength = s.length;

    while ((i < sLength) && (s.charAt(i) != "@"))
    { i++
    }

   if ((i >= sLength) || (s.charAt(i) != "@"))  return false;
    else i += 2;

    while ((i < sLength) && (s.charAt(i) != "."))
    { i++
    }

    if ((i >= sLength - 1) || (s.charAt(i) != ".")) return false;
    else return true;
}
var dataOK=false



function numeric_check(p_val){
		var parm1 = p_val;
		for(i=0; i<parm1.length; i++){
			if (parm1.substring(i, i+1)<"0" || parm1.substring(i, i+1)>"9"){
				return false;
			}
		}
		return true;
	}

function isEmpty(s)
{   return ((s == null) || (s.length == 0))
}
function isWhitespace (s)

{   var i;
     var whitespace = " \t\n\r";
    if (isEmpty(s)) {return true;}
    for (i = 0; i < s.length; i++)
    {
        var c = s.charAt(i);
        // si el caracter en que estoy no aparece en whitespace,
        // entonces retornar falso
        if (whitespace.indexOf(c) == -1) return false;
    }
    return true;
}

var dataOK=false
function validar()
{
	if (document.formulario.Nombres.value.length == 0)
	{	
		alert("Por favor llene el valor del campo: Nombres");
		document.formulario.Nombres.focus();
		return;
	}
	if (document.formulario.Domicilio.value.length == 0)
	 {
		 alert(" Por favor ingresa tu Domicilio ");
		 document.formulario.Domicilio.focus();
		 return;
	 }
	if (document.formulario.Distrito.value.length == 0)
	 {
	 alert(" Por favor ingresa tu Distrito ");
	 document.formulario.Distrito.focus();
	 return;
	 }
	 if (document.formulario.Ciudad.value.length == 0)
	 {
	 alert(" Por favor ingresa tu ciudad");
	 document.formulario.Ciudad.focus();
	 return;
	 }
	 if (document.formulario.Pais.value.length == 0)
	 {
	 alert(" Por favor ingresa tu pais");
	 document.formulario.Pais.focus();
	 return;
	 }
	 if (document.formulario.Telefono.value.length == 0)
	 {
	 alert(" Por favor ingresa tu telefono");
	 document.formulario.Telefono.focus();
	 return;
	 }
	 if (document.formulario.Email.value.length == 0)
	  {
		alert("Por favor llene el valor del campo: Email");
		document.formulario.Email.focus();
		return;
	  }

	   //Verificamos direccion de correo
     if  (  ((document.formulario.Email.value != '') || (document.formulario.Email.length > 0 ))   )
     { //alert("Verifica direccion e_mail")
     mail=document.formulario.Email.value
     variable=isWhitespace(mail);
     if (variable  == false)
     { variable=isEmail(mail);
             if (variable == false)
             { alert("Debe ingresar una dirección de correo válida ")
			 document.formulario.Email.value = ''
             document.formulario.Email.focus();
             return;      }

     }

     }
	 if (document.formulario.Empresa.value.length == 0)
	 {
	 alert(" Por favor ingresa el nombre de tu empresa");
	 document.formulario.Empresa.focus();
	 return;
	 }
	 if (document.formulario.Cargo.value.length == 0)
	 {
	 alert(" Por favor ingresa tu cargo");
	 document.formulario.Cargo.focus();
	 return;
	 }
	 if (document.formulario.Direccion.value.length == 0)
	 {
	 alert(" Por favor ingresa tu direccion");
	 document.formulario.Direccion.focus();
	 return;
	 }
	 if (document.formulario.Telefax.value.length == 0)
	 {
	 alert(" Por favor ingresa tu telefax");
	 document.formulario.Telefax.focus();
	 return;
	 }
	 if (document.formulario.Correo.value.length == 0)
	 {
	 alert(" Por favor ingresa el correo de tu empresa");
	 document.formulario.Correo.focus();
	 return;
	 }
	 if(document.formulario.Mensaje.value.length == 0)
	 {
	 alert(" Por favor ingresa el mensaje");
	 document.formulario.Mensaje.focus();
	 return;
	 }
	 
	document.formulario.submit();
}

//-->
</script>
<table width="464" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC" width="1"></td>
    <td bgcolor="#F2F2F2"><table width="462" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" bgcolor="#333333" style="font-size:11px"><font face="Trebuchet MS" color="#FFFFFF">
          <div style="padding-left:12px">Formulario de Cont&aacute;cto</div>
        </font></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td class="txt_11negro">&nbsp;&nbsp;Por favor ingrese sus datos para poder brindarle un mejor servicio.</td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
    </table>
    	<form action="procesar.php" method="post" name="formulario" id="formulario"  >
      <table width="380" border="0" align="center" cellpadding="0" cellspacing="0" class="txt_11plomo">
        <tr>
          <td width="192" align="left">Nombre y Apellidos:</td>
          <td width="10">&nbsp;</td>
          <td width="178">E-mail:</td>
        </tr>
        <tr>
          <td align="left">
            <input name="Nombres" type="text" class="estilotextarea2" id="Nombres" />
          </td>
          <td>&nbsp;</td>
          <td><span class="dos">
            <input name="Email" type="text" class="estilotextarea2" id="Email" />
          </span></td>
        </tr>
        <tr>
          <td align="left">Domicilio:</td>
          <td>&nbsp;</td>
          <td>Empresa:</td>
        </tr>
        <tr>
          <td align="left"><span class="dos">
            <input name="Domicilio" type="text" class="estilotextarea2" id="Domicilio" />
          </span></td>
          <td>&nbsp;</td>
          <td><span class="dos">
            <input name="Empresa" type="text" class="estilotextarea2" id="Empresa" />
          </span></td>
        </tr>
        <tr>
          <td align="left">Distrito:</td>
          <td>&nbsp;</td>
          <td>Cargo:</td>
        </tr>
        <tr>
          <td align="left"><span class="dos">
            <input name="Distrito" type="text" class="estilotextarea2" id="Distrito" />
          </span></td>
          <td>&nbsp;</td>
          <td><span class="dos">
            <input name="Cargo" type="text" class="estilotextarea2" id="Cargo" />
          </span></td>
        </tr>
        <tr>
          <td align="left">Ciudad:</td>
          <td>&nbsp;</td>
          <td>Direcci&oacute;n:</td>
        </tr>
        <tr>
          <td align="left"><span class="dos">
            <input name="Ciudad" type="text" class="estilotextarea2" id="Ciudad" />
          </span></td>
          <td>&nbsp;</td>
          <td><span class="dos">
            <input name="Direccion" type="text" class="estilotextarea2" id="Direccion" />
          </span></td>
        </tr>
        <tr>
          <td align="left">Pa&iacute;s:</td>
          <td>&nbsp;</td>
          <td>Telefax:</td>
        </tr>
        <tr>
          <td align="left"><span class="dos">
            <input name="Pais" type="text" class="estilotextarea2" id="Pais" />
          </span></td>
          <td>&nbsp;</td>
          <td><span class="dos">
            <input name="Telefax" type="text" class="estilotextarea2" id="Telefax" />
          </span></td>
        </tr>
        <tr>
          <td align="left">Tel&eacute;fono:</td>
          <td>&nbsp;</td>
          <td>Correo Web:</td>
        </tr>
        <tr>
          <td align="left"><span class="dos">
            <input name="Telefono" type="text" class="estilotextarea2" id="Telefono" />
          </span></td>
          <td>&nbsp;</td>
          <td><span class="dos">
            <input name="Correo" type="text" class="estilotextarea2" id="Correo" />
          </span></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Consultas o mensaje:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="left"><span class="dos">
            <textarea name="Mensaje" class="estilotextarea1" id="Mensaje"></textarea>
          </span></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><input name="borrar" type="reset" id="borrar" value="borrar" / class="estiloenviar" />
          <input name="enviar" type="button" id="enviar" value="enviar" onclick="return validar()" class="estiloenviar" /></td>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
    </table>
    	</form>
    </td>
    <td bgcolor="#CCCCCC" width="1"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
</table>