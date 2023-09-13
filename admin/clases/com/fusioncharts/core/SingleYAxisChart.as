class com.fusioncharts.core.SingleYAxisChart extends com.fusioncharts.core.Chart
{
    var divLines, trendLines, vLines, params, config, formatNumber, getAttributesArray, getFV, formatColor, getFN, toBoolean, getSetValue;
    function SingleYAxisChart(targetMC, depth, width, height, x, y, debugMode, lang)
    {
        super(targetMC, depth, width, height, x, y, debugMode, lang);
        divLines = new Array();
        trendLines = new Array();
        vLines = new Array();
    } // End of the function
    function getAxisLimits(maxValue, minValue, stopMaxAtZero, setMinAsZero)
    {
        maxValue = isNaN(maxValue) == true || maxValue == undefined ? (90) : (maxValue);
        minValue = isNaN(minValue) == true || minValue == undefined ? (0) : (minValue);
        if (maxValue == minValue && maxValue == 0)
        {
            maxValue = 90;
        } // end if
        stopMaxAtZero = com.fusioncharts.helper.Utils.getFirstValue(stopMaxAtZero, false);
        setMinAsZero = com.fusioncharts.helper.Utils.getFirstValue(setMinAsZero, true);
        var _loc10 = Math.floor(Math.log(Math.abs(maxValue)) / 2.302585E+000);
        var _loc12 = Math.floor(Math.log(Math.abs(minValue)) / 2.302585E+000);
        var _loc6 = Math.max(_loc12, _loc10);
        var _loc3 = Math.pow(10, _loc6);
        if (Math.abs(maxValue) / _loc3 < 2 && Math.abs(minValue) / _loc3 < 2)
        {
            --_loc6;
            _loc3 = Math.pow(10, _loc6);
        } // end if
        var _loc8 = Math.floor(Math.log(maxValue - minValue) / 2.302585E+000);
        var _loc9 = Math.pow(10, _loc8);
        if (maxValue - minValue > 0 && _loc3 / _loc9 >= 10)
        {
            _loc3 = _loc9;
            _loc6 = _loc8;
        } // end if
        var _loc7 = (Math.floor(maxValue / _loc3) + 1) * _loc3;
        var _loc5;
        if (minValue < 0)
        {
            _loc5 = -1 * ((Math.floor(Math.abs(minValue / _loc3)) + 1) * _loc3);
        }
        else if (setMinAsZero)
        {
            _loc5 = 0;
        }
        else
        {
            _loc5 = Math.floor(Math.abs(minValue / _loc3) - 1) * _loc3;
            _loc5 = _loc5 < 0 ? (0) : (_loc5);
        } // end else if
        if (stopMaxAtZero && maxValue <= 0)
        {
            _loc7 = 0;
        } // end if
        if (params.yAxisMaxValue == null || params.yAxisMaxValue == undefined || params.yAxisMaxValue == "")
        {
            config.yMaxGiven = false;
        }
        else
        {
            config.yMaxGiven = true;
        } // end else if
        if (params.yAxisMinValue == null || params.yAxisMinValue == undefined || params.yAxisMinValue == "" || Number(params.yAxisMinValue) == NaN)
        {
            config.yMinGiven = false;
        }
        else
        {
            config.yMinGiven = true;
        } // end else if
        if (config.yMaxGiven == false || config.yMaxGiven == true && Number(params.yAxisMaxValue) < maxValue)
        {
            config.yMax = _loc7;
        }
        else
        {
            config.yMax = Number(params.yAxisMaxValue);
        } // end else if
        if (config.yMinGiven == false || config.yMinGiven == true && Number(params.yAxisMinValue) > minValue)
        {
            config.yMin = _loc5;
        }
        else
        {
            config.yMin = Number(params.yAxisMinValue);
        } // end else if
        config.range = Math.abs(config.yMax - config.yMin);
        config.interval = _loc3;
    } // End of the function
    function calcDivs()
    {
        if (config.yMinGiven == false && config.yMaxGiven == false && params.adjustDiv == true)
        {
            config.formatDivDecimals = false;
            if (config.yMax > 0 && config.yMin < 0)
            {
                var _loc14 = false;
                var _loc15 = config.interval > 10 ? (config.interval / 10) : (config.interval);
                var _loc19 = this.getDivisibleRange(config.yMin, config.yMax, params.numDivLines, _loc15, false);
                var _loc6 = _loc19 - (params.numDivLines + 1) * _loc15;
                var _loc3;
                var _loc18;
                var _loc11;
                var _loc8;
                var _loc16;
                var _loc2;
                var _loc4;
                var _loc5;
                while (_loc14 == false)
                {
                    _loc6 = _loc6 + (params.numDivLines + 1) * _loc15;
                    if (this.isRangeDivisible(_loc6, params.numDivLines, _loc15))
                    {
                        _loc18 = _loc6 - config.range;
                        _loc3 = _loc6 / (params.numDivLines + 1);
                        _loc8 = Math.min(Math.abs(config.yMin), config.yMax);
                        _loc16 = config.range - _loc8;
                        _loc11 = _loc8 == Math.abs(config.yMin) ? (-1) : (1);
                        if (params.numDivLines == 0)
                        {
                            _loc14 = true;
                            continue;
                        } // end if
                        for (var _loc5 = 1; _loc5 <= Math.floor((params.numDivLines + 1) / 2); ++_loc5)
                        {
                            _loc2 = _loc3 * _loc5;
                            if (_loc2 - _loc8 > _loc18)
                            {
                                continue;
                            } // end if
                            if (_loc2 > _loc8)
                            {
                                _loc4 = _loc6 - _loc2;
                                if (_loc4 / _loc3 == Math.floor(_loc4 / _loc3) && _loc2 / _loc3 == Math.floor(_loc2 / _loc3))
                                {
                                    config.range = _loc6;
                                    config.yMax = _loc11 == -1 ? (_loc4) : (_loc2);
                                    config.yMin = _loc11 == -1 ? (-_loc2) : (-_loc4);
                                    _loc14 = true;
                                } // end if
                                continue;
                            } // end if
                            continue;
                        } // end of for
                    } // end if
                } // end while
            }
            else
            {
                var _loc17 = this.getDivisibleRange(config.yMin, config.yMax, params.numDivLines, config.interval, true);
                _loc18 = _loc17 - config.range;
                config.range = _loc17;
                if (config.yMax > 0)
                {
                    config.yMax = config.yMax + _loc18;
                }
                else
                {
                    config.yMin = config.yMin - _loc18;
                } // end else if
            } // end else if
        }
        else if (params.adjustDiv == true)
        {
            if (params.numDivLines > 0)
            {
                var _loc7 = 0;
                var _loc13 = 1;
                var _loc10;
                while (true)
                {
                    _loc10 = params.numDivLines + _loc7 * _loc13;
                    _loc10 = _loc10 == 0 ? (1) : (_loc10);
                    if (this.isRangeDivisible(config.range, _loc10, config.interval))
                    {
                        break;
                    } // end if
                    _loc7 = _loc13 == -1 || _loc7 > params.numDivLines ? (++_loc7) : (_loc7++);
                    if (_loc7 > 25)
                    {
                        _loc10 = 0;
                        break;
                    } // end if
                    _loc13 = _loc7 <= params.numDivLines ? (_loc13 * -1) : (1);
                } // end while
                params.numDivLines = _loc10;
                config.formatDivDecimals = false;
            } // end if
        }
        else
        {
            config.formatDivDecimals = true;
        } // end else if
        if (config.yMax > 0 && config.yMin < 0)
        {
            config.zeroPRequired = true;
        }
        else
        {
            config.zeroPRequired = false;
        } // end else if
        config.divInterval = (config.yMax - config.yMin) / (params.numDivLines + 1);
        config.zeroPIncluded = false;
        var _loc12 = config.yMin - config.divInterval;
        for (var _loc9 = 0; _loc9 <= params.numDivLines + 1; ++_loc9)
        {
            _loc12 = Number(String(_loc12 + config.divInterval));
            config.zeroPIncluded = _loc12 == 0 ? (true) : (config.zeroPIncluded);
            divLines[_loc9] = this.returnDataAsDivLine(_loc12);
            if (_loc9 % params.yAxisValuesStep == 0)
            {
                divLines[_loc9].showValue = true;
                continue;
            } // end if
            divLines[_loc9].showValue = false;
        } // end of for
        if (config.zeroPRequired == true && config.zeroPIncluded == false)
        {
            divLines.push(this.returnDataAsDivLine(0));
            divLines.sortOn("value", Array.NUMERIC);
            ++params.numDivLines;
        } // end if
    } // End of the function
    function isRangeDivisible(range, numDivLines, interval)
    {
        var _loc1 = range / (numDivLines + 1);
        if (com.fusioncharts.extensions.MathExt.numDecimals(_loc1) > com.fusioncharts.extensions.MathExt.numDecimals(interval))
        {
            return (false);
        }
        else
        {
            return (true);
        } // end else if
    } // End of the function
    function getDivisibleRange(yMin, yMax, numDivLines, interval, interceptRange)
    {
        var _loc3 = Math.abs(yMax - yMin);
        var _loc4 = _loc3 / (numDivLines + 1);
        if (!this.isRangeDivisible(_loc3, numDivLines, interval))
        {
            if (interceptRange)
            {
                var _loc5 = interval > 1 ? (2) : (5.000000E-001);
                if (Number(_loc4) / Number(interval) < _loc5)
                {
                    interval = interval / 10;
                } // end if
            } // end if
            _loc4 = (Math.floor(_loc4 / interval) + 1) * interval;
            _loc3 = _loc4 * (numDivLines + 1);
        } // end if
        return (_loc3);
    } // End of the function
    function returnDataAsDivLine(value)
    {
        var _loc2 = new Object();
        _loc2.value = value;
        if (config.formatDivDecimals)
        {
            _loc2.displayValue = this.formatNumber(value, params.formatNumber, params.yAxisValueDecimals, false, params.formatNumberScale, params.defaultNumberScale, config.nsv, config.nsu, params.numberPrefix, params.numberSuffix);
        }
        else if (config.numberScaleDefined)
        {
            _loc2.displayValue = this.formatNumber(value, params.formatNumber, params.decimals, false, params.formatNumberScale, params.defaultNumberScale, config.nsv, config.nsu, params.numberPrefix, params.numberSuffix);
        }
        else
        {
            _loc2.displayValue = this.formatNumber(value, params.formatNumber, 10, false, params.formatNumberScale, params.defaultNumberScale, config.nsv, config.nsu, params.numberPrefix, params.numberSuffix);
        } // end else if
        _loc2.showValue = true;
        return (_loc2);
    } // End of the function
    function getAxisPosition(value, upperLimit, lowerLimit, startAxisPos, endAxisPos, isYAxis, xPadding)
    {
        var _loc4;
        var _loc2;
        var _loc1;
        var _loc3;
        _loc4 = upperLimit - lowerLimit;
        if (isYAxis)
        {
            _loc2 = endAxisPos - startAxisPos;
            _loc1 = _loc2 / _loc4 * (value - lowerLimit);
            _loc3 = endAxisPos - _loc1;
        }
        else
        {
            _loc2 = endAxisPos - startAxisPos - 2 * xPadding;
            _loc1 = _loc2 / _loc4 * (value - lowerLimit);
            _loc3 = startAxisPos + xPadding + _loc1;
        } // end else if
        return (_loc3);
    } // End of the function
    function returnDataAsTrendObj(startValue, endValue, displayValue, color, thickness, alpha, isTrendZone, showOnTop, isDashed, dashLen, dashGap, valueOnRight)
    {
        var _loc1 = new Object();
        _loc1.startValue = startValue;
        _loc1.endValue = endValue;
        _loc1.displayValue = displayValue;
        _loc1.color = color;
        _loc1.thickness = thickness;
        _loc1.alpha = alpha;
        _loc1.isTrendZone = isTrendZone;
        _loc1.showOnTop = showOnTop;
        _loc1.isDashed = isDashed;
        _loc1.dashLen = dashLen;
        _loc1.dashGap = dashGap;
        _loc1.valueOnRight = valueOnRight;
        _loc1.isValid = true;
        _loc1.y = 0;
        _loc1.toY = 0;
        _loc1.tbY = 0;
        return (_loc1);
    } // End of the function
    function returnDataAsVLineObj(index, color, thickness, alpha, isDashed, dashLen, dashGap)
    {
        var _loc1 = new Object();
        _loc1.index = index;
        _loc1.color = color;
        _loc1.thickness = thickness;
        _loc1.alpha = alpha;
        _loc1.isDashed = isDashed;
        _loc1.dashLen = dashLen;
        _loc1.dashGap = dashGap;
        _loc1.isValid = true;
        _loc1.x = 0;
        return (_loc1);
    } // End of the function
    function parseVLineNode(vLineNode, index)
    {
        var _loc4;
        var _loc7;
        var _loc8;
        var _loc5;
        var _loc6;
        var _loc3;
        ++numVLines;
        var _loc2 = this.getAttributesArray(vLineNode);
        _loc4 = String(this.formatColor(this.getFV(_loc2.color, "333333")));
        _loc7 = this.getFN(_loc2.thickness, 1);
        _loc8 = this.getFN(_loc2.alpha, 80);
        _loc5 = this.toBoolean(Number(this.getFV(_loc2.dashed, 0)));
        _loc6 = this.getFN(_loc2.dashlen, 5);
        _loc3 = this.getFN(_loc2.dashgap, 2);
        vLines[numVLines] = this.returnDataAsVLineObj(index, _loc4, _loc7, _loc8, _loc5, _loc6, _loc3);
    } // End of the function
    function parseTrendLineXML(arrTrendLineNodes)
    {
        var _loc6;
        var _loc11;
        var _loc12;
        var _loc10;
        var _loc16;
        var _loc17;
        var _loc5;
        var _loc4;
        var _loc13;
        var _loc15;
        var _loc9;
        var _loc14;
        var _loc3;
        for (var _loc3 = 0; _loc3 <= arrTrendLineNodes.length; ++_loc3)
        {
            if (arrTrendLineNodes[_loc3].nodeName.toUpperCase() == "LINE")
            {
                ++numTrendLines;
                var _loc8 = arrTrendLineNodes[_loc3];
                var _loc2 = this.getAttributesArray(_loc8);
                _loc6 = this.getFN(this.getSetValue(_loc2.startvalue), this.getSetValue(_loc2.value));
                _loc11 = this.getFN(this.getSetValue(_loc2.endvalue), _loc6);
                _loc12 = _loc2.displayvalue;
                _loc10 = String(this.formatColor(this.getFV(_loc2.color, "333333")));
                _loc16 = this.getFN(_loc2.thickness, 1);
                _loc5 = this.toBoolean(Number(this.getFV(_loc2.istrendzone, 0)));
                _loc17 = this.getFN(_loc2.alpha, _loc5 == true ? (40) : (99));
                _loc4 = this.toBoolean(this.getFN(_loc2.showontop, 0));
                _loc13 = this.toBoolean(this.getFN(_loc2.dashed, 0));
                _loc15 = this.getFN(_loc2.dashlen, 5);
                _loc9 = this.getFN(_loc2.dashgap, 2);
                _loc14 = this.toBoolean(this.getFN(_loc2.valueonright, 0));
                trendLines[numTrendLines] = this.returnDataAsTrendObj(_loc6, _loc11, _loc12, _loc10, _loc16, _loc17, _loc5, _loc4, _loc13, _loc15, _loc9, _loc14);
                numTrendLinesBelow = _loc4 == false ? (++numTrendLinesBelow) : (numTrendLinesBelow++);
            } // end if
        } // end of for
    } // End of the function
    function validateTrendLines()
    {
        var _loc2;
        for (var _loc2 = 0; _loc2 <= numTrendLines; ++_loc2)
        {
            if (isNaN(trendLines[_loc2].startValue) || trendLines[_loc2].startValue < config.yMin || trendLines[_loc2].startValue > config.yMax || isNaN(trendLines[_loc2].endValue) || trendLines[_loc2].endValue < config.yMin || trendLines[_loc2].endValue > config.yMax)
            {
                trendLines[_loc2].isValid = false;
                continue;
            } // end if
            trendLines[_loc2].displayValue = this.getFV(trendLines[_loc2].displayValue, this.formatNumber(trendLines[_loc2].startValue, params.formatNumber, params.yAxisValueDecimals, false, params.formatNumberScale, params.defaultNumberScale, config.nsv, config.nsu, params.numberPrefix, params.numberSuffix));
        } // end of for
    } // End of the function
    function reInit()
    {
        super.reInit();
        numTrendLines = 0;
        numTrendLinesBelow = 0;
        numVLines = 0;
        divLines = new Array();
        trendLines = new Array();
        vLines = new Array();
    } // End of the function
    var numTrendLines = 0;
    var numTrendLinesBelow = 0;
    var numVLines = 0;
} // End of Class
