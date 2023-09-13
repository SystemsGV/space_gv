            <table border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="304" height="361" background="iconos/bg_datos.jpg" valign="top">
            	
                <table width="304" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="2" height="115"></td>
                </tr>
                <tr>
                <td width="142"></td>
                <td width="162" align="left" class="txt_verde12"><?=getVal("tbl_usuarios","txt_apellido","where id_usuarios='$_SESSION[session_socio]'")?></td>
                </tr>
                <tr>
                <td colspan="2" height="20"></td>
                </tr>
                <tr>
                <td width="142"></td>
                <td width="162" align="left" class="txt_verde12"><?=getVal("tbl_usuarios","txt_nombre","where id_usuarios='$_SESSION[session_socio]'")?></td>
                </tr>
                </table>
            	
                <table width="304" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="5" height="50"></td>
                </tr>
              	<tr>
                <td width="23"></td>
                <td colspan="3" class="txt_verde14" align="left">La Granja Villa y su Mundo M&aacute;gico<br>tiene grandes beneficios para ti y<br>tus seres queridos.</td>
                <td width="23"></td>
              	</tr>
                <tr>
                <td colspan="5" height="18"></td>
                </tr>
                <tr>
                <td width="23"></td>
                <td width="75"></td>
                <td width="8"></td>
                <td width="175" align="right"><a href="index.php"><img src="iconos/bt_cerrarsesion.gif" alt="" border="0"></a></td>
                <td width="23"></td>
                </tr>
                </table>
                
        </td>
        </tr>
        </table>