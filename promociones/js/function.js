
function viewFla(ruta,ancho,alto)
{	document.write("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0' width='" + ancho + "' height='" +  alto + "'>");
    document.write("<param name='movie' value='" + ruta + "'>");
    document.write("<param name='quality' value='high'>");
    document.write("<param name='wmode' value='transparent'>");
    document.write("<embed src='" + ruta + "' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='" + ancho + "' height='" +  alto + "'></embed>");
    document.write("</object>");
}
