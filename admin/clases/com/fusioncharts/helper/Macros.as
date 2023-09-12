class com.fusioncharts.helper.Macros
{
    var table;
    function Macros()
    {
        table = new com.fusioncharts.helper.HashTable();
    } // End of the function
    function addMacro(strMacro, val)
    {
        table.put(strMacro, val);
    } // End of the function
    function evalMacroExp(strExp)
    {
        strExp = String(strExp);
        if (!this.containsMacro(strExp))
        {
            return (Number(strExp));
        } // end if
        strExp = com.fusioncharts.extensions.StringExt.removeSpaces(strExp);
        var _loc8 = strExp;
        var _loc9 = 0;
        var _loc7;
        var _loc5 = false;
        var _loc4;
        var _loc6;
        var _loc2;
        for (var _loc2 = 0; _loc2 < strExp.length; ++_loc2)
        {
            if (strExp.charAt(_loc2) == "$" && !_loc5)
            {
                _loc9 = _loc2;
                _loc5 = true;
            } // end if
            if (_loc5 && (this.isOperator(strExp.charAt(_loc2)) || _loc2 == strExp.length - 1))
            {
                _loc7 = _loc2;
                if (_loc2 == strExp.length - 1)
                {
                    ++_loc7;
                } // end if
                _loc4 = strExp.substring(_loc9, _loc7);
                _loc6 = table.get(_loc4).toString();
                if (_loc6 == undefined)
                {
                    if (!table.containsKey(_loc4))
                    {
                        _loc6 = "0";
                        throw new com.fusioncharts.helper.FCError("Invalid Macro", "Couldn\'t find Macro \"" + _loc4 + "\". Please provide a valid macro name in XML. Do remember that macros are Case-sensitive and you can only assign pre-defined macro values. See documentation for more details.", com.fusioncharts.helper.Logger.LEVEL.ERROR);
                    } // end if
                } // end if
                _loc8 = com.fusioncharts.extensions.StringExt.replace(_loc8, _loc4, _loc6);
                _loc5 = false;
            } // end if
        } // end of for
        return (this.evalExpression(_loc8));
    } // End of the function
    function evalExpression(strExp)
    {
        if (strExp == null || strExp == "" || parseInt(strExp) == NaN)
        {
            return (0);
        } // end if
        if (strExp.indexOf("+") == -1 && strExp.indexOf("-") == -1)
        {
            return (Number(strExp));
        } // end if
        var _loc6 = strExp;
        var _loc4 = new Array();
        var _loc3 = 0;
        var _loc1 = 0;
        var _loc2;
        _loc6 = com.fusioncharts.extensions.StringExt.replace(_loc6, "+", "#");
        _loc6 = com.fusioncharts.extensions.StringExt.replace(_loc6, "-", "#");
        _loc4 = _loc6.split("#");
        _loc3 = parseInt(_loc4[0]);
        for (var _loc2 = 0; _loc2 <= strExp.length; ++_loc2)
        {
            if (strExp.charAt(_loc2) == "+")
            {
                ++_loc1;
                if (!isNaN(_loc4[_loc1]))
                {
                    _loc3 = _loc3 + parseInt(_loc4[_loc1]);
                } // end if
                continue;
            } // end if
            if (strExp.charAt(_loc2) == "-")
            {
                ++_loc1;
                if (!isNaN(_loc4[_loc1]))
                {
                    _loc3 = _loc3 - parseInt(_loc4[_loc1]);
                } // end if
            } // end if
        } // end of for
        return (_loc3);
    } // End of the function
    function isOperator(char)
    {
        var _loc1 = false;
        if (char == "+" || char == "-")
        {
            _loc1 = true;
        } // end if
        return (_loc1);
    } // End of the function
    function containsMacro(strLiteral)
    {
        return (strLiteral.indexOf("$") != -1);
    } // End of the function
} // End of Class
