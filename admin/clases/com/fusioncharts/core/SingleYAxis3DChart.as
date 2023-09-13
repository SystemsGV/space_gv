class com.fusioncharts.core.SingleYAxis3DChart extends com.fusioncharts.core.SingleYAxisChart
{
    var numNeg, numPos, numTrendLines, trendLines, elements, config, getAxisPosition, x, macro, y, width, height, params, dm, cMC, objects, styleM, divLines, createText, numVLines, vLines;
    function SingleYAxis3DChart(targetMC, depth, width, height, x, y, debugMode, lang)
    {
        super(targetMC, depth, width, height, x, y, debugMode, lang);
        numNeg = 0;
        numPos = 0;
    } // End of the function
    function calcTrendLinePos()
    {
        var _loc2;
        for (var _loc2 = 0; _loc2 <= numTrendLines; ++_loc2)
        {
            if (trendLines[_loc2].isValid == true)
            {
                trendLines[_loc2].y = this.getAxisPosition(trendLines[_loc2].startValue, config.yMax, config.yMin, elements.canvasBg.y, elements.canvasBg.toY, true, 0);
                if (trendLines[_loc2].startValue != trendLines[_loc2].endValue)
                {
                    trendLines[_loc2].toY = this.getAxisPosition(trendLines[_loc2].endValue, config.yMax, config.yMin, elements.canvasBg.y, elements.canvasBg.toY, true, 0);
                    if (trendLines[_loc2].isTrendZone)
                    {
                        trendLines[_loc2].tbY = Math.min(trendLines[_loc2].y, trendLines[_loc2].toY) + Math.abs(trendLines[_loc2].y - trendLines[_loc2].toY) / 2;
                    }
                    else if (trendLines[_loc2].valueOnRight)
                    {
                        trendLines[_loc2].tbY = trendLines[_loc2].toY;
                    }
                    else
                    {
                        trendLines[_loc2].tbY = trendLines[_loc2].y;
                    } // end else if
                    trendLines[_loc2].h = trendLines[_loc2].toY - trendLines[_loc2].y;
                    continue;
                } // end if
                trendLines[_loc2].toY = trendLines[_loc2].y;
                trendLines[_loc2].tbY = trendLines[_loc2].y;
                trendLines[_loc2].h = 0;
            } // end if
        } // end of for
    } // End of the function
    function feedMacros()
    {
        macro.addMacro("$chartStartX", x);
        macro.addMacro("$chartStartY", y);
        macro.addMacro("$chartWidth", width);
        macro.addMacro("$chartHeight", height);
        macro.addMacro("$chartEndX", width);
        macro.addMacro("$chartEndY", height);
        macro.addMacro("$chartCenterX", width / 2);
        macro.addMacro("$chartCenterY", height / 2);
        macro.addMacro("$canvasStartX", elements.canvasBg.x);
        macro.addMacro("$canvasStartY", elements.canvasBg.y);
        macro.addMacro("$canvasWidth", elements.canvasBg.w);
        macro.addMacro("$canvasHeight", elements.canvasBg.h);
        macro.addMacro("$canvasEndX", elements.canvasBg.toX);
        macro.addMacro("$canvasEndY", elements.canvasBg.toY);
        macro.addMacro("$canvasCenterX", elements.canvasBg.x + elements.canvasBg.w / 2);
        macro.addMacro("$canvasCenterY", elements.canvasBg.y + elements.canvasBg.h / 2);
    } // End of the function
    function drawCanvas()
    {
        if (params.showCanvasBase)
        {
            var _loc3 = cMC.createEmptyMovieClip("CanvasBase", dm.getDepth("CANVASBASE"));
            var _loc7 = new com.fusioncharts.core.chartobjects.Column3D(_loc3, elements.canvasBase.x - config.shifts.xShift + elements.canvasBase.w / 2, elements.canvasBase.toY + params.canvasBaseDepth - 1.000000E-001, elements.canvasBase.w, params.canvasBaseDepth, config.shifts.xShift, config.shifts.yShift, params.canvasBaseColor, false, "", null);
            _loc7.draw(params.use3DLighting);
            styleM.applyFilters(_loc3, objects.CANVAS);
            if (params.animation)
            {
                styleM.applyAnimation(_loc3, objects.CANVAS, macro, null, 0, null, 0, 100, null, null, null);
            } // end if
        } // end if
        if (params.showCanvasBg)
        {
            var _loc2 = cMC.createEmptyMovieClip("CanvasBg", dm.getDepth("CANVASBG"));
            if (params.use3DLighting)
            {
                var _loc4 = new Array();
                var _loc5 = [params.canvasBgAlpha, params.canvasBgAlpha];
                var _loc8 = [0, 255];
                _loc4 = [com.fusioncharts.extensions.ColorExt.getDarkColor(params.canvasBgColor, 8.500000E-001), com.fusioncharts.extensions.ColorExt.getLightColor(params.canvasBgColor, 5.500000E-001)];
                var _loc6 = {matrixType: "box", w: elements.canvasBg.w, h: elements.canvasBg.h, x: elements.canvasBg.x, y: elements.canvasBg.y, r: 7.853982E-001};
                _loc2.beginGradientFill("linear", _loc4, _loc5, _loc8, _loc6);
            }
            else
            {
                _loc2.beginFill(parseInt(params.canvasBgColor, 16), params.canvasBgAlpha);
            } // end else if
            _loc2.moveTo(elements.canvasBg.x, elements.canvasBg.y);
            _loc2.lineTo(elements.canvasBg.toX, elements.canvasBg.y);
            _loc2.lineTo(elements.canvasBg.toX, elements.canvasBg.toY);
            _loc2.lineTo(elements.canvasBg.x, elements.canvasBg.toY);
            _loc2.lineTo(elements.canvasBg.x, elements.canvasBg.y);
            _loc2.endFill();
            _loc2.beginFill(com.fusioncharts.extensions.ColorExt.getDarkColor(params.canvasBgColor, 8.000000E-001), params.canvasBgAlpha);
            _loc2.moveTo(elements.canvasBg.toX, elements.canvasBg.y);
            _loc2.lineTo(elements.canvasBg.toX + params.canvasBgDepth, elements.canvasBg.y + params.canvasBgDepth);
            _loc2.lineTo(elements.canvasBg.toX + params.canvasBgDepth, elements.canvasBg.toY - params.canvasBgDepth);
            _loc2.lineTo(elements.canvasBg.toX, elements.canvasBg.toY);
            _loc2.lineTo(elements.canvasBg.toX, elements.canvasBg.y);
            _loc2.endFill();
            styleM.applyFilters(_loc2, objects.CANVAS);
            if (params.animation)
            {
                styleM.applyAnimation(_loc2, objects.CANVAS, macro, null, 0, null, 0, 100, null, null, null);
            } // end if
        } // end if
        clearInterval(config.intervals.canvas);
    } // End of the function
    function drawDivLines()
    {
        var _loc4;
        var _loc7;
        var _loc6;
        var _loc5 = dm.getDepth("DIVLINES") - 1;
        var _loc3;
        _loc7 = styleM.getTextStyle(objects.YAXISVALUES);
        _loc7.align = "right";
        _loc7.vAlign = "middle";
        var _loc2;
        for (var _loc2 = 0; _loc2 < divLines.length; ++_loc2)
        {
            if (divLines[_loc2].value == 0 && divLines[_loc2].value != config.yMin)
            {
                this.drawZeroPlane(_loc2);
            }
            else if (_loc2 == 0 || _loc2 == divLines.length - 1)
            {
                if (params.showLimits && divLines[_loc2].showValue)
                {
                    ++_loc5;
                    _loc6 = this.getAxisPosition(divLines[_loc2].value, config.yMax, config.yMin, elements.canvasBg.y, elements.canvasBg.toY, true, 0);
                    _loc4 = this.createText(false, divLines[_loc2].displayValue, cMC, _loc5, elements.canvasBg.x - params.yAxisValuesPadding, _loc6, 0, _loc7, false, 0, 0);
                } // end if
            }
            else
            {
                _loc6 = this.getAxisPosition(divLines[_loc2].value, config.yMax, config.yMin, elements.canvasBg.y, elements.canvasBg.toY, true, 0);
                ++_loc5;
                _loc3 = cMC.createEmptyMovieClip("DivLine_" + _loc2, _loc5);
                _loc3.lineStyle(params.divLineThickness, parseInt(params.divLineColor, 16), params.divLineAlpha);
                if (params.divLineIsDashed)
                {
                    com.fusioncharts.extensions.DrawingExt.dashTo(_loc3, -elements.canvasBg.w / 2, 0, elements.canvasBg.w / 2, 0, params.divLineDashLen, params.divLineDashGap);
                }
                else
                {
                    _loc3.moveTo(-elements.canvasBg.w / 2, 0);
                    _loc3.lineTo(elements.canvasBg.w / 2, 0);
                } // end else if
                _loc3._x = elements.canvasBg.x + elements.canvasBg.w / 2;
                _loc3._y = _loc6 - params.divLineThickness / 2;
                if (params.animation)
                {
                    styleM.applyAnimation(_loc3, objects.DIVLINES, macro, null, 0, _loc3._y, 0, 100, 100, null, null);
                } // end if
                styleM.applyFilters(_loc3, objects.DIVLINES);
                if (params.showDivLineValues && divLines[_loc2].showValue)
                {
                    ++_loc5;
                    _loc4 = this.createText(false, divLines[_loc2].displayValue, cMC, _loc5, elements.canvasBg.x - params.yAxisValuesPadding, _loc6, 0, _loc7, false, 0, 0);
                } // end else if
            } // end else if
            if (divLines[_loc2].showValue)
            {
                if (params.animation)
                {
                    styleM.applyAnimation(_loc4.tf, objects.YAXISVALUES, macro, elements.canvasBg.x - params.yAxisValuesPadding - _loc4.width, 0, _loc6 - _loc4.height / 2, 0, 100, null, null, null);
                } // end if
                styleM.applyFilters(_loc4.tf, objects.YAXISVALUES);
            } // end if
        } // end of for
        false;
        false;
        clearInterval(config.intervals.divLines);
    } // End of the function
    function drawZeroPlane(i)
    {
        if (params.showZeroPlane)
        {
            var _loc5;
            _loc5 = styleM.getTextStyle(objects.YAXISVALUES);
            _loc5.align = "right";
            _loc5.vAlign = "middle";
            var _loc6 = dm.getDepth("ZEROPLANE");
            var _loc8 = _loc6++;
            var _loc4 = this.getAxisPosition(0, config.yMax, config.yMin, elements.canvasBg.y, elements.canvasBg.toY, true, 0);
            var _loc3 = cMC.createEmptyMovieClip("ZeroPlane", _loc6);
            var _loc7 = new com.fusioncharts.core.chartobjects.Column3D(_loc3, elements.canvasBase.x - config.shifts.xShift + elements.canvasBase.w / 2, _loc4 + config.shifts.yShift + 1, elements.canvasBase.w, 1, config.shifts.xShift, config.shifts.yShift, params.zeroPlaneColor, params.zeroPlaneShowBorder, params.zeroPlaneBorderColor, 100);
            _loc7.draw(params.use3DLighting);
            _loc3._alpha = params.zeroPlaneAlpha;
            if (params.animation)
            {
                styleM.applyAnimation(_loc3, objects.DIVLINES, macro, null, 0, null, 0, params.zeroPlaneAlpha, null, null, null);
            } // end if
            styleM.applyFilters(_loc3, objects.DIVLINES);
            if (params.showDivLineValues && divLines[i].showValue)
            {
                var _loc2 = this.createText(false, divLines[i].displayValue, cMC, _loc8, elements.canvasBg.x - params.yAxisValuesPadding, _loc4, 0, _loc5, false, 0, 0);
            } // end if
            if (divLines[i].showValue)
            {
                if (params.animation)
                {
                    styleM.applyAnimation(_loc2.tf, objects.YAXISVALUES, macro, elements.canvasBg.x - params.yAxisValuesPadding - _loc2.width, 0, _loc4 - _loc2.height / 2, 0, 100, null, null, null);
                } // end if
                styleM.applyFilters(_loc2.tf, objects.YAXISVALUES);
            } // end if
        } // end if
    } // End of the function
    function drawTrendLines()
    {
        var _loc5;
        var _loc4;
        var _loc8 = dm.getDepth("TRENDLINES");
        var _loc6 = dm.getDepth("TRENDVALUES");
        var _loc7 = 0;
        var _loc3;
        _loc5 = styleM.getTextStyle(objects.TRENDVALUES);
        _loc5.vAlign = "middle";
        var _loc2;
        for (var _loc2 = 1; _loc2 <= numTrendLines; ++_loc2)
        {
            if (trendLines[_loc2].isValid == true)
            {
                _loc3 = cMC.createEmptyMovieClip("TrendLine_" + _loc2, _loc8);
                if (trendLines[_loc2].isTrendZone)
                {
                    _loc3.lineStyle();
                    trendLines[_loc2].h = Math.abs(trendLines[_loc2].h);
                    _loc3.moveTo(0, 0);
                    _loc3.beginFill(parseInt(trendLines[_loc2].color, 16), trendLines[_loc2].alpha);
                    _loc3.lineTo(0, -trendLines[_loc2].h / 2);
                    _loc3.lineTo(elements.canvasBg.w, -trendLines[_loc2].h / 2);
                    _loc3.lineTo(elements.canvasBg.w, trendLines[_loc2].h / 2);
                    _loc3.lineTo(0, trendLines[_loc2].h / 2);
                    _loc3.lineTo(0, 0);
                    _loc3._x = elements.canvasBg.x;
                    _loc3._y = trendLines[_loc2].tbY;
                }
                else
                {
                    _loc3.lineStyle(trendLines[_loc2].thickness, parseInt(trendLines[_loc2].color, 16), trendLines[_loc2].alpha);
                    if (!trendLines[_loc2].isDashed)
                    {
                        _loc3.moveTo(0, 0);
                        _loc3.lineTo(elements.canvasBg.w, trendLines[_loc2].h);
                    }
                    else
                    {
                        com.fusioncharts.extensions.DrawingExt.dashTo(_loc3, 0, 0, elements.canvasBg.w, trendLines[_loc2].h, trendLines[_loc2].dashLen, trendLines[_loc2].dashGap);
                    } // end else if
                    _loc3._x = elements.canvasBg.x;
                    _loc3._y = trendLines[_loc2].y;
                } // end else if
                if (params.animation)
                {
                    styleM.applyAnimation(_loc3, objects.TRENDLINES, macro, null, 0, _loc3._y, 0, 100, 100, 100, null);
                } // end if
                styleM.applyFilters(_loc3, objects.TRENDLINES);
                _loc5.color = trendLines[_loc2].color;
                if (trendLines[_loc2].valueOnRight == false)
                {
                    _loc5.align = "right";
                    _loc4 = this.createText(false, trendLines[_loc2].displayValue, cMC, _loc6, elements.canvasBg.x - params.yAxisValuesPadding, trendLines[_loc2].tbY, 0, _loc5, false, 0, 0);
                    _loc7 = elements.canvasBg.x - params.yAxisValuesPadding - _loc4.width;
                }
                else
                {
                    _loc5.align = "left";
                    _loc4 = this.createText(false, trendLines[_loc2].displayValue, cMC, _loc6, elements.canvas.toX + params.yAxisValuesPadding, trendLines[_loc2].tbY, 0, _loc5, false, 0, 0);
                    _loc7 = elements.canvas.toX + params.yAxisValuesPadding;
                } // end else if
                if (params.animation)
                {
                    styleM.applyAnimation(_loc4.tf, objects.TRENDVALUES, macro, _loc7, 0, trendLines[_loc2].tbY - _loc4.height / 2, 0, 100, null, null, null);
                } // end if
                styleM.applyFilters(_loc4.tf, objects.TRENDVALUES);
                ++_loc8;
                ++_loc6;
            } // end if
        } // end of for
        false;
        false;
        false;
        clearInterval(config.intervals.trend);
    } // End of the function
    function drawVLines()
    {
        var _loc4 = dm.getDepth("VLINES");
        var _loc3;
        var _loc2;
        for (var _loc2 = 1; _loc2 <= numVLines; ++_loc2)
        {
            if (vLines[_loc2].isValid == true)
            {
                _loc3 = cMC.createEmptyMovieClip("vLine_" + _loc2, _loc4);
                _loc3.lineStyle(vLines[_loc2].thickness, parseInt(vLines[_loc2].color, 16), vLines[_loc2].alpha);
                if (!vLines[_loc2].isDashed)
                {
                    _loc3.moveTo(0, 0);
                    _loc3.lineTo(0, -elements.canvasBg.h);
                }
                else
                {
                    com.fusioncharts.extensions.DrawingExt.dashTo(_loc3, 0, 0, 0, -elements.canvasBg.h, vLines[_loc2].dashLen, vLines[_loc2].dashGap);
                } // end else if
                _loc3._x = vLines[_loc2].x + config.shifts.xShift;
                _loc3._y = elements.canvasBg.toY;
                if (params.animation)
                {
                    styleM.applyAnimation(_loc3, objects.VLINES, macro, _loc3._x, 0, _loc3._y, 0, 100, null, 100, null);
                } // end if
                styleM.applyFilters(_loc3, objects.VLINES);
                ++_loc4;
            } // end if
        } // end of for
        false;
        clearInterval(config.intervals.vLine);
    } // End of the function
    function reInit()
    {
        super.reInit();
        numNeg = 0;
        numPos = 0;
    } // End of the function
} // End of Class
