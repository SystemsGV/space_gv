
	<tr>
	<td align="center" bgcolor="#e8e8e8"><img src="../iconos/icon_cabecera.png" alt="" border="0" /></td>
	</tr>

	<tr>
	<td height="1" bgcolor="#bac5d2"></td>
	</tr>
    <tr>
    <td height="35" bgcolor="#025700" align="center">
    	<table class="txt_menu12" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td height="35"><div align="center" style="padding-left:20px; padding-right:20px;"><a href="../inf_clientes.php?idcat=1"><table><tr><td><img src="iconos/ic_new.png" alt="" border="0" /></td><td class="txt_menu12">&nbsp;<strong>MODULO CUPONES</strong></td></tr></table></a></div></td>
        <td><div align="center">|</div></td>
        <!-- <td height="35"><div align="center" style="padding-left:20px; padding-right:20px;"><a href="main.php"><table><tr><td><img src="iconos/ic_busqueda.png" alt="" border="0" /></td><td class="txt_menu12">&nbsp;<strong>BUSCAR CUPONES</strong></td></tr></table></a></div></td>
        <td><div align="center">|</div></td> -->
        <?
        if($objcat0->getTipo()==0){
		?>
        <td height="35"><div align="center" style="padding-left:20px; padding-right:20px;"><a href="../inf_administrador.php"><table><tr><td><img src="iconos/ic_users.png" alt="" border="0" /></td><td class="txt_menu12">&nbsp;<strong>USUARIOS</strong></td></tr></table></a></div></td>        
        <td><div align="center">|</div></td>
        <?
		}
		?>
        <td height="35"><div align="center" style="padding-left:20px; padding-right:20px;"><a href="../frm_login.php?op=salir"><table><tr><td><img src="iconos/ic_off.png" alt="" border="0" /></td><td class="txt_menu12">&nbsp;<strong>CERRAR SESION</strong></td></tr></table></a></div></td>
        
        </tr>
        </table>
    </td>
    </tr>
	<tr>
	
	</tr>