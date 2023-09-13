class com.fusioncharts.helper.ToolTip
{
    var parent, sX, sY, sWidth, sHeight, yPadding, tf, tFormat, font, size, color, bgColor, borderColor, isHTML, dropShadow, txt;
    function ToolTip(target, sX, sY, sWidth, sHeight, yPadding)
    {
        parent = target;
        this.sX = sX;
        this.sY = sY;
        this.sWidth = sWidth;
        this.sHeight = sHeight;
        this.yPadding = yPadding;
        var _loc3;
        var _loc2;
        tf = parent.createTextField("ToolTipTF", parent.getNextHighestDepth(), 0, 0, _loc3, _loc2);
        tFormat = new TextFormat();
        tf._visible = false;
    } // End of the function
    function setParams(font, size, color, bgColor, borderColor, isHTML, dropShadow)
    {
        this.font = font;
        this.size = size;
        this.color = color;
        this.bgColor = bgColor;
        this.borderColor = borderColor;
        this.isHTML = isHTML;
        this.dropShadow = dropShadow;
        tFormat.font = this.font;
        tFormat.size = this.size;
        tFormat.color = parseInt(this.color, 16);
        if (this.borderColor != "" && this.borderColor != undefined && this.borderColor != null)
        {
            tf.border = true;
            tf.borderColor = parseInt(this.borderColor, 16);
        } // end if
        if (this.bgColor != "" && this.bgColor != undefined && this.bgColor != null)
        {
            tf.background = true;
            tf.backgroundColor = parseInt(this.bgColor, 16);
        } // end if
        tf.autoSize = "center";
        tf.multiLine = true;
        tf.wordWrap = false;
        tf.selectable = false;
        tf.html = this.isHTML;
        if (dropShadow)
        {
            var _loc2 = new flash.filters.DropShadowFilter(3, 45, 6710886, 8.000000E-001, 4, 4, 1, 1, false, false, false);
            parent.filters = [_loc2];
        } // end if
        tf._x = -100;
        tf._y = -100;
    } // End of the function
    function setText(strText)
    {
        if (isHTML)
        {
            strText = com.fusioncharts.extensions.StringExt.replace(strText, "<BR>", "\n");
            strText = com.fusioncharts.extensions.StringExt.replace(strText, "&lt;BR&gt;", "\n");
        } // end if
        txt = strText;
        if (isHTML)
        {
            tf.htmlText = txt;
        }
        else
        {
            tf.text = txt;
        } // end else if
        tf.setTextFormat(tFormat);
    } // End of the function
    function show()
    {
        tf._visible = true;
        this.rePosition();
    } // End of the function
    function hide()
    {
        tf._visible = false;
    } // End of the function
    function rePosition()
    {
        if (tf._visible)
        {
            if (_ymouse - tf._height - yPadding > sY)
            {
                tf._y = _ymouse - tf._height - yPadding;
            }
            else
            {
                tf._y = _ymouse + yPadding + 15;
            } // end else if
            if (_xmouse + tf._width / 2 > sWidth + sX)
            {
                tf._x = _xmouse - tf._width;
            }
            else if (_xmouse - tf._width / 2 < sX)
            {
                tf._x = _xmouse;
            }
            else
            {
                tf._x = _xmouse - tf._width / 2;
            } // end else if
        } // end else if
    } // End of the function
    function visible()
    {
        return (tf._visible);
    } // End of the function
    function destroy()
    {
        tf.removeTextField();
        delete this.tFormat;
    } // End of the function
} // End of Class
