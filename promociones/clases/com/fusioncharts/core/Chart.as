class com.fusioncharts.core.Chart
{
    var getFV, getFN, formatColor, createText, parentMC, depth, width, height, x, y, debugMode, lang, scaleMode, params, config, elements, styleM, defColors, macro, dm, cMC, ttMC, tTip, tfTestMC, logMC, lgr, tfAppMsg, xmlData, objects, arrObjects;
    function Chart(targetMC, depth, width, height, x, y, debugMode, lang, scaleMode)
    {
        getFV = com.fusioncharts.helper.Utils.getFirstValue;
        getFN = com.fusioncharts.helper.Utils.getFirstNumber;
        formatColor = com.fusioncharts.extensions.ColorExt.formatHexColor;
        createText = com.fusioncharts.helper.Utils.createText;
        parentMC = targetMC;
        this.depth = depth;
        this.width = width;
        this.height = height;
        this.x = this.getFN(x, 0);
        this.y = this.getFN(y, 0);
        this.debugMode = this.getFV(debugMode, false);
        this.lang = this.getFV(lang, "EN");
        this.scaleMode = this.getFV(scaleMode, "noScale");
        params = new Object();
        config = new Object();
        config.intervals = new Object();
        elements = new Object();
        styleM = new com.fusioncharts.core.StyleManager(this);
        defColors = new com.fusioncharts.helper.DefaultColors();
        macro = new com.fusioncharts.helper.Macros();
        dm = new com.fusioncharts.helper.DepthManager(0);
        cMC = parentMC.createEmptyMovieClip("Chart", depth + 1);
        cMC._x = this.x;
        cMC._y = this.y;
        ttMC = parentMC.createEmptyMovieClip("ToolTip", depth + 3);
        tTip = new com.fusioncharts.helper.ToolTip(ttMC, this.x, this.y, this.width, this.height, 8);
        tfTestMC = parentMC.createEmptyMovieClip("TestTF", depth + 4);
        logMC = parentMC.createEmptyMovieClip("Log", depth + 2);
        logMC._x = this.x;
        logMC._y = this.y;
        lgr = new com.fusioncharts.helper.Logger(logMC, this.width, this.height);
        if (this.debugMode)
        {
            this.log("Info", "Chart loaded and initialized.", com.fusioncharts.helper.Logger.LEVEL.INFO);
            this.log("Initial Width", String(this.width), com.fusioncharts.helper.Logger.LEVEL.INFO);
            this.log("Initial Height", String(this.height), com.fusioncharts.helper.Logger.LEVEL.INFO);
            this.log("Scale Mode", this.scaleMode, com.fusioncharts.helper.Logger.LEVEL.INFO);
            this.log("Debug Mode", this.debugMode == true ? ("Yes") : ("No"), com.fusioncharts.helper.Logger.LEVEL.INFO);
            this.log("Application Message Language", this.lang, com.fusioncharts.helper.Logger.LEVEL.INFO);
            lgr.show();
        } // end if
    } // End of the function
    function setXMLData(objXML)
    {
        if (!objXML.hasChildNodes())
        {
            tfAppMsg = this.renderAppMessage(_global.getAppMessage("NODATA", lang));
            this.log("ERROR", "No data to display. There isn\'t any node/element in the XML document. Please check if your dataURL is properly URL Encoded or, if XML has been correctly embedded in case of dataXML.", com.fusioncharts.helper.Logger.LEVEL.ERROR);
        }
        else
        {
            xmlData = new XML();
            xmlData = objXML;
            tfAppMsg = this.renderAppMessage(_global.getAppMessage("RENDERINGCHART", lang));
            if (debugMode)
            {
                var _loc3 = xmlData.toString();
                _loc3 = com.fusioncharts.extensions.StringExt.replace(_loc3, "<", "&lt;");
                _loc3 = com.fusioncharts.extensions.StringExt.replace(_loc3, ">", "&gt;");
                _loc3 = com.fusioncharts.extensions.StringExt.replace(_loc3, "/r", "<BR>");
                this.log("XML Data", _loc3, com.fusioncharts.helper.Logger.LEVEL.CODE);
            } // end if
        } // end else if
    } // End of the function
    function parseStyleXML(arrStyleNodes)
    {
        var _loc8;
        var _loc2;
        var _loc4;
        for (var _loc8 = 0; _loc8 < arrStyleNodes.length; ++_loc8)
        {
            if (arrStyleNodes[_loc8].nodeName.toUpperCase() == "DEFINITION")
            {
                var _loc10 = arrStyleNodes[_loc8].childNodes;
                for (var _loc2 = 0; _loc2 < _loc10.length; ++_loc2)
                {
                    if (_loc10[_loc2].nodeName.toUpperCase() == "STYLE")
                    {
                        var _loc5 = _loc10[_loc2];
                        var _loc13 = this.getAttributesArray(_loc5);
                        var _loc15 = _loc13.name;
                        var _loc17 = _loc13.type;
                        try
                        {
                            var _loc18 = styleM.getStyleTypeId(_loc17);
                            var _loc9 = new com.fusioncharts.core.StyleObject();
                            var _loc7;
                            for (var _loc7 in _loc5.attributes)
                            {
                                _loc9[_loc7.toLowerCase()] = _loc5.attributes[_loc7];
                            } // end of for...in
                            styleM.addStyle(_loc15, _loc18, _loc9);
                        } // End of try
                        catch()
                        {
                        } // End of catch
                    } // end if
                } // end of for
            } // end if
        } // end of for
        for (var _loc8 = 0; _loc8 < arrStyleNodes.length; ++_loc8)
        {
            if (arrStyleNodes[_loc8].nodeName.toUpperCase() == "APPLICATION")
            {
                var _loc11 = arrStyleNodes[_loc8].childNodes;
                for (var _loc2 = 0; _loc2 < _loc11.length; ++_loc2)
                {
                    if (_loc11[_loc2].nodeName.toUpperCase() == "APPLY")
                    {
                        var _loc12 = this.getAttributesArray(_loc11[_loc2]);
                        var _loc3 = _loc12.toobject;
                        _loc3 = _loc3.toUpperCase();
                        var _loc19 = _loc12.styles;
                        if (this.isChartObject(_loc3))
                        {
                            var _loc6 = new Array();
                            _loc6 = _loc19.split(",");
                            var _loc14 = objects[_loc3];
                            for (var _loc4 = 0; _loc4 < _loc6.length; ++_loc4)
                            {
                                try
                                {
                                    styleM.associateStyle(_loc14, _loc6[_loc4]);
                                } // End of try
                                catch()
                                {
                                } // End of catch
                            } // end of for
                            continue;
                        } // end if
                        this.log("Invalid Chart Object in Style Definition", "\"" + _loc3 + "\" is not a valid Chart Object. Please see the list above for valid Chart Objects.", com.fusioncharts.helper.Logger.LEVEL.ERROR);
                    } // end if
                } // end of for
            } // end if
        } // end of for
        false;
        false;
        false;
        false;
    } // End of the function
    function setChartObjects(arrObjects)
    {
        this.arrObjects = arrObjects;
        objects = new com.fusioncharts.helper.FCEnum(arrObjects);
        var _loc2;
        if (debugMode)
        {
            var _loc4 = "";
            for (var _loc2 = 0; _loc2 < arrObjects.length; ++_loc2)
            {
                _loc4 = _loc4 + ("<LI>" + arrObjects[_loc2] + "</LI>");
            } // end of for
            this.log("Chart Objects", _loc4, com.fusioncharts.helper.Logger.LEVEL.INFO);
        } // end if
    } // End of the function
    function isChartObject(strObjName)
    {
        var _loc3 = false;
        var _loc2;
        for (var _loc2 = 0; _loc2 < arrObjects.length; ++_loc2)
        {
            if (arrObjects[_loc2].toUpperCase() == strObjName)
            {
                _loc3 = true;
                break;
            } // end if
        } // end of for
        return (_loc3);
    } // End of the function
    function setToolTipParam()
    {
        var _loc2 = styleM.getTextStyle(objects.TOOLTIP);
        tTip.setParams(_loc2.font, _loc2.size, _loc2.color, _loc2.bgColor, _loc2.borderColor, _loc2.isHTML, false);
    } // End of the function
    function log(strTitle, strMsg, intLevel)
    {
        if (debugMode)
        {
            lgr.record(strTitle, strMsg, intLevel);
        } // end if
    } // End of the function
    function returnAbtMenuItem()
    {
        var _loc2 = new ContextMenuItem("About FusionCharts", mx.utils.Delegate.create(this, openAboutFusionCharts));
        _loc2.separatorBefore = true;
        return (_loc2);
    } // End of the function
    function openAboutFusionCharts()
    {
        getURL("http://www.fusioncharts.com/", "_blank");
    } // End of the function
    function printChart()
    {
        var _loc2 = new PrintJob();
        var _loc3 = _loc2.start();
        if (_loc3)
        {
            _loc2.addPage(cMC, {xMin: 0, xMax: width, yMin: 0, yMax: height}, {printAsBitmap: true});
        } // end if
        _loc2.send();
        false;
    } // End of the function
    function reInit()
    {
        params = new Object();
        config = new Object();
        config.intervals = new Object();
        cMC = parentMC.createEmptyMovieClip("Chart", depth + 1);
        cMC._x = x;
        cMC._y = y;
        styleM = new com.fusioncharts.core.StyleManager(this);
        macro = new com.fusioncharts.helper.Macros();
        defColors.reset();
        dm.clear();
        dm.setStartDepth(0);
        timeElapsed = 0;
    } // End of the function
    function remove()
    {
        var _loc2;
        for (var _loc2 in config.intervals)
        {
            clearInterval(config.intervals[_loc2]);
        } // end of for...in
        this.removeAppMessage(tfAppMsg);
        cMC.removeMovieClip();
        tTip.hide();
    } // End of the function
    function destroy()
    {
        this.remove();
        cMC.removeMovieClip();
        lgr.destroy();
        tTip.destroy();
        ttMC.removeMovieClip();
        tfTestMC.removeMovieClip();
        logMC.removeMovieClip();
    } // End of the function
    function getAttributesArray(xmlNd)
    {
        var _loc3 = new Array();
        var _loc1;
        for (var _loc1 in xmlNd.attributes)
        {
            _loc3[_loc1.toString().toLowerCase()] = xmlNd.attributes[_loc1];
        } // end of for...in
        return (_loc3);
    } // End of the function
    function returnDataAsElement(x, y, w, h)
    {
        var _loc1 = new Object();
        _loc1.x = x;
        _loc1.y = y;
        _loc1.w = w;
        _loc1.h = h;
        _loc1.toX = x + w;
        _loc1.toY = y + h;
        return (_loc1);
    } // End of the function
    function toBoolean(num)
    {
        return (num == 1 ? (true) : (false));
    } // End of the function
    function invokeLink(strLink)
    {
        if (strLink != undefined && strLink != null && strLink != "")
        {
            strLink = unescape(strLink);
            if (strLink.charAt(0).toUpperCase() == "N" && strLink.charAt(1) == "-")
            {
                getURL(strLink.slice(2), "_blank");
            }
            else if (strLink.charAt(0).toUpperCase() == "F" && strLink.charAt(1) == "-")
            {
                var _loc3 = strLink.indexOf("-", 2);
                getURL(strLink.slice(_loc3 + 1), strLink.substr(2, _loc3 - 2));
            }
            else if (strLink.charAt(0).toUpperCase() == "P" && strLink.charAt(1) == "-")
            {
                _loc3 = strLink.indexOf("-", 2);
                var _loc2 = strLink.indexOf(",", 2);
                getURL("javaScript:var " + strLink.substr(2, _loc2 - 2) + " = window.open(\'" + strLink.slice(_loc3 + 1) + "\',\'" + strLink.substr(2, _loc2 - 2) + "\',\'" + strLink.substr(_loc2 + 1, _loc3 - _loc2 - 1) + "\'); " + strLink.substr(2, _loc2 - 2) + ".focus(); void(0);", "");
            }
            else
            {
                getURL(strLink, "_self");
            } // end else if
        } // end else if
    } // End of the function
    function renderAppMessage(strMessage)
    {
        return (_global.createBasicText(strMessage, parentMC, depth, width / 2, height / 2, "Verdana", 10, "666666", "center", "bottom"));
    } // End of the function
    function removeAppMessage(tf)
    {
        tf.removeTextField();
    } // End of the function
    function drawBackground()
    {
        var _loc2 = cMC.createEmptyMovieClip("Background", dm.getDepth("BACKGROUND"));
        var _loc4 = com.fusioncharts.extensions.ColorExt.parseColorList(params.bgColor);
        var _loc7 = com.fusioncharts.extensions.ColorExt.parseAlphaList(params.bgAlpha, _loc4.length);
        var _loc5 = com.fusioncharts.extensions.ColorExt.parseRatioList(params.bgRatio, _loc4.length);
        _loc2.moveTo(-width / 2, -height / 2);
        var _loc6 = {matrixType: "box", w: width, h: height, x: -width / 2, y: -height / 2, r: com.fusioncharts.extensions.MathExt.toRadians(params.bgAngle)};
        if (params.showBorder)
        {
            _loc2.lineStyle(params.borderThickness, parseInt(params.borderColor, 16), params.borderAlpha);
        } // end if
        var _loc3 = params.borderThickness / 2;
        _loc2.beginGradientFill("linear", _loc4, _loc7, _loc5, _loc6);
        _loc2.lineTo(width / 2 - _loc3, -height / 2 + _loc3);
        _loc2.lineTo(width / 2 - _loc3, height / 2 - _loc3);
        _loc2.lineTo(-width / 2 + _loc3, height / 2 - _loc3);
        _loc2.lineTo(-width / 2 + _loc3, -height / 2 + _loc3);
        _loc2._x = width / 2;
        _loc2._y = height / 2;
        _loc2.endFill();
        if (params.animation)
        {
            styleM.applyAnimation(_loc2, objects.BACKGROUND, macro, _loc2._x, -width / 2, _loc2._y, -height / 2, 100, 100, 100, null);
        } // end if
        styleM.applyFilters(_loc2, objects.BACKGROUND);
    } // End of the function
    function loadBgSWF()
    {
        if (params.bgSWF != "")
        {
            var _loc2 = cMC.createEmptyMovieClip("BgSWF", dm.getDepth("BGSWF"));
            _loc2.loadMovie(params.bgSWF);
            _loc2._alpha = params.bgSWFAlpha;
        } // end if
    } // End of the function
    function drawClickURLHandler()
    {
        if (params.clickURL != "")
        {
            var _loc2 = cMC.createEmptyMovieClip("ClickURLHandler", dm.getDepth("CLICKURLHANDLER"));
            _loc2.moveTo(0, 0);
            _loc2.beginFill(16777215, 0);
            _loc2.lineTo(width, 0);
            _loc2.lineTo(width, height);
            _loc2.lineTo(0, height);
            _loc2.lineTo(0, 0);
            _loc2.endFill();
            _loc2.useHandCursor = true;
            var strLink = params.clickURL;
            var chartRef = this;
            _loc2.onMouseDown = function ()
            {
                chartRef.invokeLink(strLink);
            };
            _loc2.onRollOver = function ()
            {
            };
        } // end if
    } // End of the function
    function detectNumberScales()
    {
        if (params.numberScaleValue.length == 0 || params.numberScaleUnit.length == 0 || params.formatNumberScale == false)
        {
            config.numberScaleDefined = false;
        }
        else
        {
            config.numberScaleDefined = true;
            config.nsv = new Array();
            config.nsu = new Array();
            config.nsv = params.numberScaleValue.split(",");
            var _loc2;
            for (var _loc2 = 0; _loc2 < config.nsv.length; ++_loc2)
            {
                config.nsv[_loc2] = Number(config.nsv[_loc2]);
                if (isNaN(config.nsv[_loc2]))
                {
                    config.numberScaleDefined = false;
                } // end if
            } // end of for
            config.nsu = params.numberScaleUnit.split(",");
            if (config.nsu.length != config.nsv.length)
            {
                config.numberScaleDefined = false;
            } // end if
        } // end else if
        params.numberPrefix = this.unescapeChar(params.numberPrefix);
        params.numberSuffix = this.unescapeChar(params.numberSuffix);
        if (config.numberScaleDefined == true)
        {
            maxDecimals = maxDecimals > 2 ? (maxDecimals) : (2);
        } // end if
        params.decimals = Number(this.getFV(params.decimals, maxDecimals));
        if (params.decimals < 0)
        {
            params.decimals = 0;
        } // end if
        params.yAxisValueDecimals = Number(this.getFV(params.yAxisValueDecimals, params.decimals));
    } // End of the function
    function unescapeChar(strChar)
    {
        if (strChar == "" || strChar == undefined)
        {
            return ("");
        } // end if
        if (strChar.indexOf("%") == -1)
        {
            return (strChar);
        } // end if
        var _loc1 = new Array();
        _loc1.push({char: "%", encoding: "%25"});
        _loc1.push({char: "&", encoding: "%26"});
        _loc1.push({char: "£ ", encoding: "%A3"});
        _loc1.push({char: "€", encoding: "%E2%82%AC"});
        _loc1.push({char: "€", encoding: "%80"});
        _loc1.push({char: "¥ ", encoding: "%A5"});
        _loc1.push({char: "¢ ", encoding: "%A2"});
        _loc1.push({char: "?", encoding: "%E2%82%A3"});
        _loc1.push({char: "+", encoding: "%2B"});
        _loc1.push({char: "#", encoding: "%23"});
        var _loc2;
        var _loc4 = strChar;
        for (var _loc2 = 0; _loc2 < _loc1.length; ++_loc2)
        {
            if (strChar == _loc1[_loc2].encoding)
            {
                _loc4 = _loc1[_loc2].char;
                break;
            } // end if
        } // end of for
        return (_loc4);
        false;
    } // End of the function
    function formatNumber(intNum, bFormatNumber, decimalPrecision, forceDecimals, bFormatNumberScale, defaultNumberScale, numScaleValues, numScaleUnits, numberPrefix, numberSuffix)
    {
        var _loc2 = String(intNum);
        var _loc3;
        if (bFormatNumberScale)
        {
            _loc3 = defaultNumberScale;
        }
        else
        {
            _loc3 = "";
        } // end else if
        if (bFormatNumberScale && config.numberScaleDefined)
        {
            var _loc4 = this.formatNumberScale(intNum, defaultNumberScale, numScaleValues, numScaleUnits);
            _loc2 = String(_loc4.value);
            intNum = _loc4.value;
            _loc3 = _loc4.scale;
        } // end if
        if (bFormatNumber)
        {
            _loc2 = this.formatDecimals(intNum, decimalPrecision, forceDecimals);
            _loc2 = this.formatCommas(_loc2);
        } // end if
        _loc2 = numberPrefix + _loc2 + _loc3 + numberSuffix;
        return (_loc2);
    } // End of the function
    function formatNumberScale(intNum, defaultNumberScale, numScaleValues, numScaleUnits)
    {
        var _loc6 = new Object();
        var _loc4 = defaultNumberScale;
        var _loc1 = 0;
        for (var _loc1 = 0; _loc1 < numScaleValues.length; ++_loc1)
        {
            if (Math.abs(Number(intNum)) >= numScaleValues[_loc1])
            {
                _loc4 = numScaleUnits[_loc1];
                intNum = Number(intNum) / numScaleValues[_loc1];
                continue;
            } // end if
            break;
        } // end of for
        _loc6.value = intNum;
        _loc6.scale = _loc4;
        return (_loc6);
    } // End of the function
    function formatDecimals(intNum, decimalPrecision, forceDecimals)
    {
        if (decimalPrecision <= 0)
        {
            return (String(Math.round(intNum)));
        } // end if
        var _loc4 = Math.pow(10, decimalPrecision);
        var _loc2 = String(Math.round(intNum * _loc4) / _loc4);
        if (forceDecimals)
        {
            if (_loc2.indexOf(".") == -1)
            {
                _loc2 = _loc2 + ".0";
            } // end if
            var _loc5 = _loc2.split(".");
            var _loc3 = decimalPrecision - _loc5[1].length;
            for (var _loc1 = 1; _loc1 <= _loc3; ++_loc1)
            {
                _loc2 = _loc2 + "0";
            } // end of for
        } // end if
        return (_loc2);
    } // End of the function
    function formatCommas(strNum)
    {
        var _loc11 = Number(strNum);
        if (isNaN(_loc11))
        {
            return ("");
        } // end if
        var _loc9 = "";
        var _loc10 = false;
        var _loc5 = "";
        var _loc3 = "";
        var _loc7 = 0;
        var _loc8 = 0;
        _loc7 = 0;
        _loc8 = strNum.length;
        if (strNum.indexOf(".") != -1)
        {
            _loc9 = strNum.substring(strNum.indexOf(".") + 1, strNum.length);
            _loc8 = strNum.indexOf(".");
        } // end if
        if (_loc11 < 0)
        {
            _loc10 = true;
            _loc7 = 1;
        } // end if
        _loc5 = strNum.substring(_loc7, _loc8);
        if (_loc5.length > 3)
        {
            var _loc4 = _loc5.length;
            for (var _loc2 = 0; _loc2 <= _loc4; ++_loc2)
            {
                if (_loc2 > 2 && (_loc2 - 1) % 3 == 0)
                {
                    _loc3 = _loc5.charAt(_loc4 - _loc2) + params.thousandSeparator + _loc3;
                    continue;
                } // end if
                _loc3 = _loc5.charAt(_loc4 - _loc2) + _loc3;
            } // end of for
        }
        else
        {
            _loc3 = _loc5;
        } // end else if
        if (_loc9 != "")
        {
            _loc3 = _loc3 + params.decimalSeparator + _loc9;
        } // end if
        if (_loc10 == true)
        {
            _loc3 = "-" + _loc3;
        } // end if
        return (_loc3);
    } // End of the function
    function getSetValue(num)
    {
        var _loc2;
        if (isNaN(num) || params.inThousandSeparator != "" || params.inDecimalSeparator != "")
        {
            if (num.length == undefined)
            {
                _loc2 = Number(num);
            }
            else
            {
                _loc2 = this.convertNumberSeps(num);
            } // end else if
        }
        else
        {
            _loc2 = Number(num);
        } // end else if
        if (!isNaN(_loc2) && Math.floor(_loc2) != _loc2)
        {
            var _loc4 = com.fusioncharts.extensions.MathExt.numDecimals(_loc2);
            maxDecimals = _loc4 > maxDecimals ? (_loc4) : (maxDecimals);
        } // end if
        return (_loc2);
    } // End of the function
    function convertNumberSeps(strNum)
    {
        var _loc3 = strNum;
        if (params.inThousandSeparator != "")
        {
            strNum = com.fusioncharts.extensions.StringExt.replace(strNum, params.inThousandSeparator, "");
        } // end if
        if (params.inDecimalSeparator != "")
        {
            strNum = com.fusioncharts.extensions.StringExt.replace(strNum, params.inDecimalSeparator, ".");
        } // end if
        if (isNaN(strNum))
        {
            this.log("ERROR", "Invalid number " + _loc3 + " specified in XML. FusionCharts can accept number in pure numerical form only. If your number formatting (thousand and decimal separator) is different, please specify so in XML. Also, do not add any currency symbols or other signs to the numbers.", com.fusioncharts.helper.Logger.LEVEL.ERROR);
        } // end if
        return (Number(strNum));
    } // End of the function
    var _version = "3.0.2";
    var testTFX = -2000;
    var testTFY = -2000;
    var _embeddedFont = "Verdana";
    var timeElapsed = 0;
    var maxDecimals = 0;
} // End of Class
