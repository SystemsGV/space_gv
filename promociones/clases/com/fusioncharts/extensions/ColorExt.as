class com.fusioncharts.extensions.ColorExt
{
    function ColorExt()
    {
    } // End of the function
    static function formatHexColor(sourceHexColor)
    {
        sourceHexColor = com.fusioncharts.extensions.StringExt.leftTrimChar(sourceHexColor, " ");
        sourceHexColor = com.fusioncharts.extensions.StringExt.leftTrimChar(sourceHexColor, "#");
        return (sourceHexColor);
    } // End of the function
    static function getDarkColor(sourceHexColor, intensity)
    {
        intensity = intensity > 1 || intensity < 0 ? (1) : (intensity);
        var _loc2 = parseInt(sourceHexColor, 16);
        var _loc3 = Math.floor(_loc2 / 65536);
        var _loc4 = Math.floor((_loc2 - _loc3 * 65536) / 256);
        var _loc5 = _loc2 - _loc3 * 65536 - _loc4 * 256;
        var _loc6 = _loc3 * intensity << 16 | _loc4 * intensity << 8 | _loc5 * intensity;
        return (_loc6);
    } // End of the function
    static function getLightColor(sourceHexColor, intensity)
    {
        intensity = intensity > 1 || intensity < 0 ? (1) : (intensity);
        var _loc2 = parseInt(sourceHexColor, 16);
        var _loc3 = Math.floor(_loc2 / 65536);
        var _loc4 = Math.floor((_loc2 - _loc3 * 65536) / 256);
        var _loc5 = _loc2 - _loc3 * 65536 - _loc4 * 256;
        var _loc6 = 256 - (256 - _loc3) * intensity << 16 | 256 - (256 - _loc4) * intensity << 8 | 256 - (256 - _loc5) * intensity;
        return (_loc6);
    } // End of the function
    static function parseColorList(strColors)
    {
        var _loc3 = new Array();
        var _loc5 = new Array();
        var _loc4 = 0;
        var _loc2;
        var _loc1;
        _loc3 = strColors.split(",");
        for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
        {
            _loc1 = com.fusioncharts.extensions.ColorExt.formatHexColor(_loc3[_loc2]);
            if (_loc1 != "" && _loc1 != null)
            {
                _loc5[_loc4] = parseInt(_loc1, 16);
                ++_loc4;
            } // end if
        } // end of for
        return (_loc5);
    } // End of the function
    static function parseAlphaList(strAlphas, numColors)
    {
        var _loc3 = new Array();
        var _loc4 = new Array();
        _loc3 = strAlphas.split(",");
        var _loc1;
        var _loc2;
        for (var _loc2 = 0; _loc2 < numColors; ++_loc2)
        {
            _loc1 = _loc3[_loc2];
            _loc1 = isNaN(_loc1) || _loc1 == undefined ? (100) : (Number(_loc1));
            _loc4[_loc2] = _loc1;
        } // end of for
        return (_loc4);
    } // End of the function
    static function parseRatioList(strRatios, numColors)
    {
        var _loc5 = new Array();
        var _loc3 = new Array();
        _loc5 = strRatios.split(",");
        var _loc6 = 0;
        var _loc2;
        var _loc1;
        for (var _loc1 = 0; _loc1 < numColors; ++_loc1)
        {
            _loc2 = _loc5[_loc1];
            _loc2 = isNaN(_loc2) || _loc2 == undefined ? (0) : (Math.abs(Number(_loc2)));
            _loc2 = _loc2 > 100 ? (100) : (_loc2);
            _loc3[_loc1] = _loc2;
            _loc6 = _loc6 + _loc2;
        } // end of for
        _loc6 = _loc6 > 100 ? (100) : (_loc6);
        if (_loc5.length < numColors)
        {
            for (var _loc1 = _loc5.length; _loc1 < numColors; ++_loc1)
            {
                _loc3[_loc1] = (100 - _loc6) / (numColors - _loc5.length);
            } // end of for
        } // end if
        _loc3[-1] = 0;
        var _loc7 = 0;
        for (var _loc1 = 0; _loc1 < numColors; ++_loc1)
        {
            _loc7 = Number(_loc3[_loc1 - 1]);
            _loc3[_loc1] = _loc7 + Number(_loc3[_loc1] / 100 * 255);
            _loc3[_loc1] = _loc3[_loc1] > 255 ? (255) : (_loc3[_loc1]);
        } // end of for
        return (_loc3);
    } // End of the function
} // End of Class
