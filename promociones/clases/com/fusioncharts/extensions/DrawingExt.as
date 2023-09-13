class com.fusioncharts.extensions.DrawingExt
{
    function DrawingExt()
    {
    } // End of the function
    static function dashTo(mc, x, y, toX, toY, len, gap)
    {
        if (arguments.length < 7)
        {
            return (false);
        } // end if
        if (len <= 0)
        {
            return (false);
        } // end if
        var _loc12 = len + gap;
        var _loc9 = toX - x;
        var _loc8 = toY - y;
        var _loc11 = Math.sqrt(Math.pow(_loc9, 2) + Math.pow(_loc8, 2));
        var _loc10 = Math.floor(Math.abs(_loc11 / _loc12));
        var _loc4 = Math.atan2(_loc8, _loc9);
        var _loc3 = x;
        var _loc2 = y;
        _loc9 = Math.cos(_loc4) * _loc12;
        _loc8 = Math.sin(_loc4) * _loc12;
        var _loc5 = 0;
        for (var _loc5 = 0; _loc5 < _loc10; ++_loc5)
        {
            mc.moveTo(_loc3, _loc2);
            mc.lineTo(_loc3 + Math.cos(_loc4) * len, _loc2 + Math.sin(_loc4) * len);
            _loc3 = _loc3 + _loc9;
            _loc2 = _loc2 + _loc8;
        } // end of for
        mc.moveTo(_loc3, _loc2);
        _loc11 = Math.sqrt(Math.pow(toX - _loc3, 2) + Math.pow(toY - _loc2, 2));
        if (_loc11 > len)
        {
            mc.lineTo(_loc3 + Math.cos(_loc4) * len, _loc2 + Math.sin(_loc4) * len);
        }
        else if (_loc11 > 0)
        {
            mc.lineTo(_loc3 + Math.cos(_loc4) * _loc11, _loc2 + Math.sin(_loc4) * _loc11);
        } // end else if
        mc.moveTo(toX, toY);
        return (true);
    } // End of the function
    static function drawPoly(mc, x, y, sides, radius, startAngle)
    {
        if (arguments.length < 5)
        {
            return;
        } // end if
        if (sides > 2)
        {
            startAngle = startAngle == null || startAngle == undefined ? (0) : (startAngle);
            var _loc4;
            var _loc2;
            _loc4 = 6.283185E+000 / sides;
            startAngle = startAngle / 180 * 3.141593E+000;
            mc.moveTo(x + Math.cos(startAngle) * radius, y - Math.sin(startAngle) * radius);
            for (var _loc2 = 1; _loc2 <= sides; ++_loc2)
            {
                mc.lineTo(x + Math.cos(startAngle + _loc4 * _loc2) * radius, y - Math.sin(startAngle + _loc4 * _loc2) * radius);
            } // end of for
        } // end if
    } // End of the function
} // End of Class
