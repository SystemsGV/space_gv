class com.fusioncharts.core.StyleManager
{
    var chartIns, styles, objectStyle, styleType, TYPE, continueTo, onMotionFinished;
    function StyleManager(chartIns)
    {
        this.chartIns = chartIns;
        styles = new com.fusioncharts.helper.HashTable();
        objectStyle = new Array();
        styleType = new Array();
        TYPE = new com.fusioncharts.helper.FCEnum("FONT", "ANIMATION", "SHADOW", "BLUR", "GLOW", "BEVEL");
    } // End of the function
    function addStyle(strStyleName, intStyleType, objStyle)
    {
        strStyleName = com.fusioncharts.extensions.StringExt.replace(strStyleName, " ", "");
        strStyleName = strStyleName.toUpperCase();
        objStyle.name = strStyleName;
        objStyle.type = intStyleType;
        styles.put(strStyleName, objStyle);
        styleType[strStyleName] = intStyleType;
        return (true);
    } // End of the function
    function associateStyle(chartObject, strStyleName)
    {
        strStyleName = com.fusioncharts.extensions.StringExt.replace(strStyleName, " ", "");
        strStyleName = strStyleName.toUpperCase();
        if (!this.isValidStyle(strStyleName))
        {
            throw new com.fusioncharts.helper.FCError("Invalid Style Name in Style Definition", "Style \"" + strStyleName + "\" has not been defined and as such cannot be associated with a chart object.", com.fusioncharts.helper.Logger.LEVEL.ERROR);
            return (false);
        } // end if
        var _loc3;
        _loc3 = objectStyle[chartObject];
        if (_loc3 == undefined)
        {
            objectStyle[chartObject] = new Array(strStyleName);
        }
        else
        {
            var _loc5 = false;
            var _loc2;
            for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
            {
                if (strStyleName == _loc3[_loc2])
                {
                    _loc5 = true;
                    break;
                } // end if
            } // end of for
            if (!_loc5)
            {
                objectStyle[chartObject].push(strStyleName);
            } // end if
        } // end else if
    } // End of the function
    function overrideAssociation(chartObject, strOldStyleName, strStyleName)
    {
        var _loc3;
        _loc3 = objectStyle[chartObject];
        var _loc2;
        for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
        {
            if (_loc3[_loc2] == strOldStyleName)
            {
                _loc3[_loc2] = strStyleName;
            } // end if
        } // end of for
        objectStyle[chartObject] = _loc3;
    } // End of the function
    function getStyleTypeId(strStyleType)
    {
        strStyleType = strStyleType.toUpperCase();
        var _loc2;
        _loc2 = TYPE[strStyleType];
        if (_loc2 == undefined)
        {
            _loc2 = -1;
            throw new com.fusioncharts.helper.FCError("Invalid Style Type", "Invalid Style type \"" + strStyleType + "\" specified. Only possible values for Style type are FONT, ANIMATION, SHADOW, BEVEL, GLOW & BLUR.", com.fusioncharts.helper.Logger.LEVEL.ERROR);
        } // end if
        return (_loc2);
    } // End of the function
    function getStyle(chartObject, intStyleType, animationParam)
    {
        var _loc3 = new Array();
        _loc3 = objectStyle[chartObject];
        var _loc5 = new com.fusioncharts.core.StyleObject();
        var _loc6 = false;
        var _loc2;
        if (intStyleType == TYPE.ANIMATION)
        {
            var _loc4 = new Array();
            for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
            {
                if (intStyleType == styleType[_loc3[_loc2]])
                {
                    _loc4.push(styles.get(_loc3[_loc2]));
                } // end if
            } // end of for
            animationParam = animationParam.toUpperCase();
            for (var _loc2 = 0; _loc2 < animationParam.length; ++_loc2)
            {
                if (_loc4[_loc2].param.toUpperCase() == animationParam)
                {
                    _loc5 = (com.fusioncharts.core.StyleObject)(_loc4[_loc2]);
                    _loc6 = true;
                    break;
                } // end if
            } // end of for
        }
        else
        {
            for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
            {
                if (intStyleType == styleType[_loc3[_loc2]])
                {
                    _loc5 = (com.fusioncharts.core.StyleObject)(styles.get(_loc3[_loc2]));
                    _loc6 = true;
                    break;
                } // end if
            } // end of for
        } // end else if
        _loc5.isDefined = _loc6;
        return (_loc5);
    } // End of the function
    function overrideStyle(chartObject, defaultObject, intStyleType, animationParam)
    {
        var _loc3 = new com.fusioncharts.core.StyleObject();
        _loc3 = this.getStyle(chartObject, intStyleType, animationParam);
        if (_loc3.isDefined == true)
        {
            var _loc5 = new com.fusioncharts.core.StyleObject();
            var _loc2;
            for (var _loc2 in _loc3)
            {
                _loc5[_loc2] = com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2], defaultObject[_loc2]);
            } // end of for...in
            for (var _loc2 in defaultObject)
            {
                _loc5[_loc2] = com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2], defaultObject[_loc2]);
            } // end of for...in
            var _loc6 = defaultObject.name.toUpperCase();
            _loc6 = _loc6 == undefined ? (String("_S" + getTimer())) : (_loc6);
            this.addStyle(_loc6, intStyleType, _loc5);
            this.overrideAssociation(chartObject, _loc3.name, _loc6);
            return (_loc3);
        }
        else
        {
            _loc6 = defaultObject.name;
            _loc6 = _loc6 == undefined ? (String("_S" + getTimer())) : (_loc6);
            this.addStyle(_loc6, intStyleType, defaultObject);
            this.associateStyle(chartObject, _loc6);
            return (defaultObject);
        } // end else if
    } // End of the function
    function isValidStyle(strStyleName)
    {
        return (styles.containsKey(strStyleName));
    } // End of the function
    function getTextStyle(chartObject)
    {
        var _loc3 = new com.fusioncharts.core.StyleObject();
        _loc3 = this.getStyle(chartObject, TYPE.FONT, "");
        var _loc2 = new Object();
        _loc2.align = com.fusioncharts.helper.Utils.getFirstValue(_loc3.align, "center");
        _loc2.vAlign = com.fusioncharts.helper.Utils.getFirstValue(_loc3.valign, "center");
        _loc2.bold = _loc3.bold == "1" ? (true) : (false);
        _loc2.italic = _loc3.italic == "1" ? (true) : (false);
        _loc2.underline = _loc3.underline == "1" ? (true) : (false);
        _loc2.font = com.fusioncharts.helper.Utils.getFirstValue(_loc3.font, "Verdana");
        _loc2.size = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3.size, 9));
        _loc2.color = com.fusioncharts.core.StyleObject.checkHexColor(com.fusioncharts.helper.Utils.getFirstValue(_loc3.color, "000000"));
        _loc2.isHTML = _loc3.ishtml == "1" ? (true) : (false);
        _loc2.leftMargin = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3.leftmargin, 0));
        _loc2.letterSpacing = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3.letterspacing, 0));
        _loc2.bgColor = com.fusioncharts.core.StyleObject.checkHexColor(_loc3.bgcolor);
        _loc2.borderColor = com.fusioncharts.core.StyleObject.checkHexColor(_loc3.bordercolor);
        return (_loc2);
    } // End of the function
    function getMaxAnimationTime()
    {
        var _loc5 = 0;
        var _loc8 = 0;
        var _loc6 = 0;
        var _loc4;
        var _loc7;
        var _loc3;
        for (var _loc7 = 0; _loc7 < arguments.length; ++_loc7)
        {
            _loc4 = new Array();
            _loc4 = objectStyle[arguments[_loc7]];
            for (var _loc3 = 0; _loc3 < _loc4.length; ++_loc3)
            {
                if (styleType[_loc4[_loc3]] == TYPE.ANIMATION)
                {
                    _loc5 = Number(com.fusioncharts.helper.Utils.getFirstValue(styles.get(_loc4[_loc3]).duration, 2));
                    if (!isNaN(Number(styles.get(_loc4[_loc3]).wait)))
                    {
                        _loc5 = _loc5 + Number(styles.get(_loc4[_loc3]).wait);
                    } // end if
                    _loc6 = _loc5 > _loc6 ? (_loc5) : (_loc6);
                } // end if
            } // end of for
            _loc8 = _loc6 > _loc8 ? (_loc6) : (_loc8);
        } // end of for
        return (_loc8 * 1000);
    } // End of the function
    function applyAnimation(mc, chartObject, macroIns, dX, adX, dY, adY, dAlpha, dXScale, dYScale, dRotation)
    {
        var _loc8 = new Array();
        _loc8 = objectStyle[chartObject];
        var _loc2;
        var _loc3 = new Array();
        for (var _loc2 = 0; _loc2 < _loc8.length; ++_loc2)
        {
            if (styleType[_loc8[_loc2]] == TYPE.ANIMATION)
            {
                _loc3.push(styles.get(_loc8[_loc2]));
            } // end if
        } // end of for
        if (_loc3.length > 0)
        {
            var _loc7 = new Array();
            var _loc9;
            var _loc5;
            for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
            {
                var _loc4;
                var end;
                if (_loc3[_loc2].param.toLowerCase() !== "_x")
                {
                }
                else
                {
                } // end else if
                if (!(end == null || end == undefined || isNaN(end)) && _loc4 != end)
                {
                    _loc9 = com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].easing, "regular");
                    switch (_loc9.toLowerCase())
                    {
                        case "back":
                        {
                            _loc5 = mx.transitions.easing.Back.easeOut;
                            break;
                        } 
                        case "elastic":
                        {
                            _loc5 = mx.transitions.easing.Elastic.easeOut;
                            break;
                        } 
                        case "bounce":
                        {
                            _loc5 = mx.transitions.easing.Bounce.easeOut;
                            break;
                        } 
                        case "regular":
                        {
                            _loc5 = mx.transitions.easing.Regular.easeOut;
                            break;
                        } 
                        case "strong":
                        {
                            _loc5 = mx.transitions.easing.Strong.easeOut;
                            break;
                        } 
                        case "none":
                        {
                            _loc5 = mx.transitions.easing.None.easeNone;
                            break;
                        } 
                        default:
                        {
                            _loc5 = mx.transitions.easing.Regular.easeOut;
                            break;
                        } 
                    } // End of switch
                    var duration = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].duration, 2));
                    if (_loc3[_loc2].wait != undefined && _loc3[_loc2].wait != null && Number(_loc3[_loc2].wait) > 0)
                    {
                        _loc7[_loc2] = new mx.transitions.Tween(mc, _loc3[_loc2].param, _loc5, _loc4, _loc4, Number(_loc3[_loc2].wait), true);
                        _loc7[_loc2].onMotionFinished = function ()
                        {
                            this.continueTo(end, duration);
                            delete this.onMotionFinished;
                        };
                        continue;
                    } // end if
                    _loc7[_loc2] = new mx.transitions.Tween(mc, _loc3[_loc2].param, _loc5, _loc4, end, duration, true);
                } // end if
            } // end of for
            false;
        } // end if
    } // End of the function
    function applyFilters(mc, chartObject, arrNotApply)
    {
        var _loc5 = new Array();
        _loc5 = objectStyle[chartObject];
        var _loc2;
        var _loc3 = mc.filters;
        var _loc7 = mc.filters;
        if (_loc7.length == 0 || _loc7 == undefined)
        {
            _loc7 = new Array();
        } // end if
        for (var _loc2 = 0; _loc2 < _loc5.length; ++_loc2)
        {
            if (styleType[_loc5[_loc2]] == TYPE.SHADOW || styleType[_loc5[_loc2]] == TYPE.BLUR || styleType[_loc5[_loc2]] == TYPE.GLOW || styleType[_loc5[_loc2]] == TYPE.BEVEL)
            {
                var _loc9 = false;
                for (var _loc4 = 0; _loc4 < arrNotApply.length; ++_loc4)
                {
                    if (arrNotApply[_loc4] == styleType[_loc5[_loc2]])
                    {
                        _loc9 = true;
                        break;
                    } // end if
                } // end of for
                if (_loc9 == false)
                {
                    _loc3.push(styles.get(_loc5[_loc2]));
                } // end if
            } // end if
        } // end of for
        var _loc21;
        var _loc23;
        var _loc22;
        var _loc24;
        if (_loc3.length > 0)
        {
            var _loc26 = new Array();
            for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
            {
                switch (_loc3[_loc2].type)
                {
                    case TYPE.SHADOW:
                    {
                        var _loc15 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].distance, 2));
                        var _loc18 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].angle, 210));
                        var _loc13 = com.fusioncharts.core.StyleObject.checkHexColor(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].color, "666666"));
                        var _loc10 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].alpha, 60));
                        _loc10 = _loc10 / 100;
                        var _loc17 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blurx, 4));
                        var _loc16 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blury, 4));
                        var _loc19 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].strength, 1));
                        var _loc12 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].quality, 1));
                        _loc21 = new flash.filters.DropShadowFilter(_loc15, _loc18, parseInt(_loc13, 16), _loc10, _loc17, _loc16, _loc19, _loc12, false, false, false);
                        _loc7.push(_loc21);
                        break;
                    } 
                    case TYPE.BLUR:
                    {
                        _loc17 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blurx, 4));
                        _loc16 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blury, 4));
                        _loc12 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].quality, 1));
                        _loc23 = new flash.filters.BlurFilter(_loc17, _loc16, _loc12);
                        _loc7.push(_loc23);
                        break;
                    } 
                    case TYPE.GLOW:
                    {
                        _loc13 = com.fusioncharts.core.StyleObject.checkHexColor(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].color, "FF0000"));
                        _loc10 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].alpha, 100));
                        _loc10 = _loc10 / 100;
                        _loc17 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blurx, 8));
                        _loc16 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blury, 8));
                        _loc19 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].strength, 2));
                        _loc12 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].quality, 1));
                        _loc22 = new flash.filters.GlowFilter(parseInt(_loc13, 16), _loc10, _loc17, _loc16, _loc19, _loc12, false, false);
                        _loc7.push(_loc22);
                        break;
                    } 
                    case TYPE.BEVEL:
                    {
                        _loc15 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].distance, 4));
                        _loc18 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].angle, 45));
                        var _loc14 = com.fusioncharts.core.StyleObject.checkHexColor(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].shadowcolor, "000000"));
                        var _loc6 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].shadowalpha, 50));
                        _loc6 = _loc6 / 100;
                        var _loc20 = com.fusioncharts.core.StyleObject.checkHexColor(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].highlightColor, "FFFFFF"));
                        var _loc8 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].highlightAlpha, 50));
                        _loc8 = _loc8 / 100;
                        _loc17 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blurx, 4));
                        _loc16 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].blury, 4));
                        _loc19 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].strength, 1));
                        _loc12 = Number(com.fusioncharts.helper.Utils.getFirstValue(_loc3[_loc2].quality, 1));
                        _loc24 = new flash.filters.BevelFilter(_loc15, _loc18, parseInt(_loc20, 16), _loc8, parseInt(_loc14, 16), _loc6, _loc17, _loc16, _loc19, _loc12, "inner", false);
                        _loc7.push(_loc24);
                        break;
                    } 
                } // End of switch
            } // end of for
            mc.filters = _loc7;
            false;
        } // end if
    } // End of the function
} // End of Class
