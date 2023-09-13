class com.fusioncharts.extensions.StringExt
{
    function StringExt()
    {
    } // End of the function
    static function replace(str, pattern, replacement)
    {
        return (str.split(pattern).join(replacement));
    } // End of the function
    static function removeSpaces(str)
    {
        return (com.fusioncharts.extensions.StringExt.replace(str, " ", ""));
    } // End of the function
    static function leftTrimChar(str, strChar)
    {
        if (str == undefined)
        {
            return ("");
        } // end if
        var _loc3 = str;
        if (_loc3.indexOf(strChar) != -1)
        {
            var _loc4 = _loc3.length;
            var _loc2 = -1;
            var _loc1;
            for (var _loc1 = 0; _loc1 <= _loc4; ++_loc1)
            {
                if (_loc3.charAt(_loc1) != strChar && _loc2 == -1)
                {
                    _loc2 = _loc1;
                    break;
                } // end if
            } // end of for
            _loc3 = _loc3.substring(_loc2);
        } // end if
        return (_loc3);
    } // End of the function
} // End of Class
