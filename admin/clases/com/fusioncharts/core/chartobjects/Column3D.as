class com.fusioncharts.core.chartobjects.Column3D extends MovieClip
{
    var mc, x, y, wFront, height, xShift, yShift, color, showBorder, borderColor, borderAlpha;
    function Column3D(target, x, y, wFront, height, xShift, yShift, color, showBorder, borderColor, borderAlpha)
    {
        super();
        mc = target;
        this.x = x;
        this.y = y;
        this.wFront = wFront;
        this.height = height;
        this.xShift = xShift;
        this.yShift = yShift;
        this.color = color;
        this.showBorder = showBorder;
        this.borderColor = borderColor;
        this.borderAlpha = borderAlpha;
    } // End of the function
    function draw(use3DLighting)
    {
        var _loc2 = wFront / 2;
        var _loc16;
        var _loc15;
        if (showBorder)
        {
            mc.lineStyle(1, parseInt(borderColor, 16), borderAlpha);
        } // end if
        if (use3DLighting)
        {
            var _loc3 = new Array();
            var _loc4 = [100, 100];
            var _loc5 = [0, 255];
        } // end if
        if (height >= 0)
        {
            if (use3DLighting)
            {
                _loc3 = [com.fusioncharts.extensions.ColorExt.getLightColor(color, 5.500000E-001), com.fusioncharts.extensions.ColorExt.getDarkColor(color, 6.500000E-001)];
                var _loc8 = {matrixType: "box", w: wFront, h: height, x: 0, y: -height, r: 1.570796E+000};
                mc.beginGradientFill("linear", _loc3, _loc4, _loc5, _loc8);
            }
            else
            {
                mc.beginFill(parseInt(color, 16), 100);
            } // end else if
            mc.moveTo(-_loc2, 0);
            mc.lineTo(-_loc2, -height);
            mc.lineTo(_loc2, -height);
            mc.lineTo(_loc2, 0);
            mc.lineTo(-_loc2, 0);
            mc.endFill();
            if (use3DLighting)
            {
                _loc3 = [com.fusioncharts.extensions.ColorExt.getDarkColor(color, 8.500000E-001), com.fusioncharts.extensions.ColorExt.getLightColor(color, 3.500000E-001)];
                _loc8 = {matrixType: "box", w: wFront + xShift, h: -yShift, x: -_loc2, y: -height, r: 7.853982E-001};
                mc.beginGradientFill("linear", _loc3, _loc4, _loc5, _loc8);
            }
            else
            {
                mc.beginFill(com.fusioncharts.extensions.ColorExt.getDarkColor(color, 7.500000E-001), 100);
            } // end else if
            mc.moveTo(-_loc2, -height);
            mc.lineTo(-_loc2 + xShift, -height - yShift);
            mc.lineTo(xShift + _loc2, -height - yShift);
            mc.lineTo(_loc2, -height);
            mc.lineTo(-_loc2, -height);
            mc.endFill();
            if (use3DLighting)
            {
                _loc3 = [com.fusioncharts.extensions.ColorExt.getLightColor(color, 7.500000E-001), com.fusioncharts.extensions.ColorExt.getDarkColor(color, 4.500000E-001)];
                _loc3 = [com.fusioncharts.extensions.ColorExt.getDarkColor(color, 7.500000E-001), com.fusioncharts.extensions.ColorExt.getDarkColor(color, 3.500000E-001)];
                _loc8 = {matrixType: "box", w: wFront, h: height, x: _loc2, y: -height, r: 1.570796E+000};
                mc.beginGradientFill("linear", _loc3, _loc4, _loc5, _loc8);
            }
            else
            {
                mc.beginFill(com.fusioncharts.extensions.ColorExt.getDarkColor(color, 6.000000E-001), 100);
            } // end else if
            mc.moveTo(_loc2, 0);
            mc.lineTo(_loc2, -height);
            mc.lineTo(_loc2 + xShift, -height - yShift);
            mc.lineTo(_loc2 + xShift, -yShift);
            mc.lineTo(_loc2, 0);
            mc.endFill();
            mc._x = x;
            mc._y = y;
            var _loc7 = new flash.geom.Rectangle(-_loc2 + 1, -height, wFront + xShift - 2, height - yShift);
            mc.scale9Grid = _loc7;
        }
        else
        {
            if (use3DLighting)
            {
                _loc3 = [com.fusioncharts.extensions.ColorExt.getLightColor(color, 5.500000E-001), com.fusioncharts.extensions.ColorExt.getDarkColor(color, 6.500000E-001)];
                _loc8 = {matrixType: "box", w: wFront, h: -height, x: -_loc2 - xShift, y: yShift, r: 1.570796E+000};
                mc.beginGradientFill("linear", _loc3, _loc4, _loc5, _loc8);
            }
            else
            {
                mc.beginFill(parseInt(color, 16), 100);
            } // end else if
            mc.moveTo(-_loc2 - xShift, yShift);
            mc.lineTo(-_loc2 - xShift, yShift - height);
            mc.lineTo(_loc2 - xShift, yShift - height);
            mc.lineTo(_loc2 - xShift, yShift);
            mc.lineTo(-_loc2 - xShift, yShift);
            mc.endFill();
            if (use3DLighting)
            {
                _loc3 = [com.fusioncharts.extensions.ColorExt.getDarkColor(color, 8.500000E-001), com.fusioncharts.extensions.ColorExt.getLightColor(color, 3.500000E-001)];
                _loc8 = {matrixType: "box", w: wFront + xShift, h: -yShift, x: -_loc2 - xShift, y: yShift, r: 7.853982E-001};
                mc.beginGradientFill("linear", _loc3, _loc4, _loc5, _loc8);
            }
            else
            {
                mc.beginFill(com.fusioncharts.extensions.ColorExt.getDarkColor(color, 7.500000E-001), 100);
            } // end else if
            mc.moveTo(-_loc2 - xShift, yShift);
            mc.lineTo(-_loc2, 0);
            mc.lineTo(_loc2, 0);
            mc.lineTo(_loc2 - xShift, yShift);
            mc.lineTo(-_loc2 - xShift, yShift);
            mc.endFill();
            if (use3DLighting)
            {
                _loc3 = [com.fusioncharts.extensions.ColorExt.getDarkColor(color, 7.500000E-001), com.fusioncharts.extensions.ColorExt.getDarkColor(color, 3.500000E-001)];
                _loc8 = {matrixType: "box", w: wFront, h: -height, x: _loc2, y: 0, r: 1.570796E+000};
                mc.beginGradientFill("linear", _loc3, _loc4, _loc5, _loc8);
            }
            else
            {
                mc.beginFill(com.fusioncharts.extensions.ColorExt.getDarkColor(color, 6.000000E-001), 100);
            } // end else if
            mc.moveTo(_loc2, 0);
            mc.lineTo(_loc2 - xShift, yShift);
            mc.lineTo(_loc2 - xShift, yShift - height);
            mc.lineTo(_loc2, -height);
            mc.lineTo(_loc2, 0);
            mc.endFill();
            mc._x = x + xShift;
            mc._y = y - yShift;
            _loc7 = new flash.geom.Rectangle(-_loc2 - xShift + 1, yShift, wFront + xShift - 2, -height - yShift);
            mc.scale9Grid = _loc7;
        } // end else if
        mc.cacheAsBitmap = true;
    } // End of the function
    static function calcShifts(width, angle, depth)
    {
        var _loc4 = depth * Math.cos(angle * 1.745329E-002);
        if (_loc4 >= width - 1)
        {
            _loc4 = width - 1;
            depth = _loc4 / Math.cos(angle * 1.745329E-002);
        } // end if
        var _loc7;
        var _loc3;
        _loc7 = width * 6.666667E-001;
        if (width >= 25)
        {
            depth = depth == -1 ? (15) : (depth);
            _loc7 = width - depth * Math.cos(angle * 1.745329E-002);
        }
        else
        {
            depth = depth == -1 ? (20) : (depth);
        } // end else if
        _loc3 = depth * Math.cos(angle * 1.745329E-002);
        var _loc2 = new Object();
        _loc2.wFront = _loc7;
        _loc2.wShadow = _loc3;
        _loc2.depth = depth;
        _loc2.xShift = _loc3;
        _loc2.yShift = _loc3 * Math.tan(angle * 1.745329E-002);
        return (_loc2);
    } // End of the function
} // End of Class
