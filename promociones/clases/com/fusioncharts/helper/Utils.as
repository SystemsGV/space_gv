class com.fusioncharts.helper.Utils
{
    function Utils()
    {
    } // End of the function
    static function getFirstValue()
    {
        for (var _loc2 = 0; _loc2 < arguments.length; ++_loc2)
        {
            if (arguments[_loc2] != null && arguments[_loc2] != undefined && arguments[_loc2] != "")
            {
                return (arguments[_loc2]);
            } // end if
        } // end of for
        return ("");
    } // End of the function
    static function getFirstNumber()
    {
        for (var _loc2 = 0; _loc2 < arguments.length; ++_loc2)
        {
            if (arguments[_loc2] != null && arguments[_loc2] != undefined && arguments[_loc2] != "" && isNaN(Number(arguments[_loc2])) == false)
            {
                return (Number(arguments[_loc2]));
            } // end if
        } // end of for
        return (0);
    } // End of the function
    static function createText(simulationMode, strText, targetMC, depth, xPos, yPos, rotation, objStyle, wrap, width, maxHeight)
    {
        var _loc3 = new TextFormat();
        _loc3.font = objStyle.font;
        _loc3.size = objStyle.size;
        _loc3.color = parseInt(objStyle.color, 16);
        _loc3.bold = objStyle.bold;
        _loc3.italic = objStyle.italic;
        _loc3.underline = objStyle.underline;
        _loc3.leftMargin = objStyle.leftMargin;
        _loc3.letterSpacing = objStyle.letterSpacing;
        var _loc5 = objStyle.align;
        var _loc8 = objStyle.vAlign;
        _loc5 = rotation == 315 ? ("RIGHT") : (_loc5);
        var _loc1;
        if (wrap == true)
        {
            var _loc12 = _loc3.getTextExtent(strText, width);
            _loc1 = targetMC.createTextField("Text_" + depth, depth, xPos, yPos, width, Math.min(_loc12.textFieldHeight, maxHeight));
            _loc3.align = _loc5;
            _loc1.wordWrap = true;
        }
        else
        {
            var _loc16;
            var _loc14;
            _loc1 = targetMC.createTextField("Text_" + depth, depth, xPos, yPos, _loc16, _loc14);
            _loc1.autoSize = _loc5;
        } // end else if
        _loc1.multiLine = true;
        _loc1.selectable = false;
        if (objStyle.borderColor != "")
        {
            _loc1.border = true;
            _loc1.borderColor = parseInt(objStyle.borderColor, 16);
        } // end if
        if (objStyle.bgColor != "")
        {
            _loc1.background = true;
            _loc1.backgroundColor = parseInt(objStyle.bgColor, 16);
        } // end if
        _loc1.html = objStyle.isHTML;
        if (objStyle.isHTML)
        {
            strText = com.fusioncharts.extensions.StringExt.replace(strText, "<BR>", "\n");
            strText = com.fusioncharts.extensions.StringExt.replace(strText, "&lt;BR&gt;", "\n");
        } // end if
        if (objStyle.isHTML)
        {
            _loc1.htmlText = strText;
        }
        else
        {
            _loc1.text = strText;
        } // end else if
        _loc1.setTextFormat(_loc3);
        var _loc10 = _loc1._height;
        if (rotation != null && rotation != undefined && rotation != 0)
        {
            _loc1.embedFonts = true;
            _loc1._rotation = rotation;
        } // end if
        if (!simulationMode)
        {
            if (rotation == 0 || rotation == null || rotation == undefined)
            {
                switch (_loc8.toUpperCase())
                {
                    case "TOP":
                    {
                        _loc1._y = _loc1._y - _loc1._height;
                        break;
                    } 
                    case "MIDDLE":
                    {
                        _loc1._y = _loc1._y - _loc1._height / 2;
                        break;
                    } 
                    case "BOTTOM":
                    {
                        break;
                    } 
                } // End of switch
                if (wrap == true)
                {
                    switch (_loc5.toUpperCase())
                    {
                        case "LEFT":
                        {
                            break;
                        } 
                        case "CENTER":
                        {
                            _loc1._x = _loc1._x - _loc1._width / 2;
                            break;
                        } 
                        case "RIGHT":
                        {
                            _loc1._x = _loc1._x - _loc1._width;
                            break;
                        } 
                    } // End of switch
                } // end if
            }
            else if (rotation == 270)
            {
                switch (_loc5.toUpperCase())
                {
                    case "LEFT":
                    {
                        switch (_loc8.toUpperCase())
                        {
                            case "TOP":
                            {
                                break;
                            } 
                            case "MIDDLE":
                            {
                                _loc1._y = _loc1._y + _loc1._height / 2;
                                break;
                            } 
                            case "BOTTOM":
                            {
                                _loc1._y = _loc1._y + _loc1._height;
                                break;
                            } 
                        } // End of switch
                        break;
                    } 
                    case "CENTER":
                    {
                        _loc1._x = _loc1._x - _loc1._width / 2;
                        switch (_loc8.toUpperCase())
                        {
                            case "TOP":
                            {
                                _loc1._y = _loc1._y - _loc1._height / 2;
                                break;
                            } 
                            case "MIDDLE":
                            {
                                break;
                            } 
                            case "BOTTOM":
                            {
                                _loc1._y = _loc1._y + _loc1._height / 2;
                                break;
                            } 
                        } // End of switch
                        break;
                    } 
                    case "RIGHT":
                    {
                        _loc1._x = _loc1._x - _loc1._width;
                        switch (_loc8.toUpperCase())
                        {
                            case "TOP":
                            {
                                _loc1._y = _loc1._y - _loc1._height;
                                break;
                            } 
                            case "MIDDLE":
                            {
                                _loc1._y = _loc1._y - _loc1._height / 2;
                                break;
                            } 
                            case "BOTTOM":
                            {
                                break;
                            } 
                        } // End of switch
                        break;
                    } 
                } // End of switch
            }
            else if (rotation == 315)
            {
                var _loc11 = 1.420000E+000;
                _loc1._x = _loc1._x - _loc10 / _loc11 / 2;
                _loc1._y = _loc1._y - 4;
            } // end else if
        } // end else if
        var _loc6 = new Object();
        _loc6.width = _loc1._width;
        _loc6.height = _loc1._height;
        if (_loc6.height <= 4)
        {
            _loc6.height = objStyle.font * 2;
        } // end if
        _loc6.tf = _loc1;
        false;
        false;
        return (_loc6);
    } // End of the function
} // End of Class
