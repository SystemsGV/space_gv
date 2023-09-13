class com.fusioncharts.helper.FCEnum
{
    function FCEnum()
    {
        if (arguments.length == 0)
        {
            throw new Error("Cannot create empty Enumeration");
        } // end if
        var _loc3;
        if (arguments[0] instanceof Array)
        {
            var _loc4 = arguments[0];
            for (var _loc3 = 0; _loc3 < _loc4.length; ++_loc3)
            {
                _loc4[_loc3] = _loc3 + 1;
            } // end of for
            _size = _loc4.length;
        }
        else
        {
            for (var _loc3 = 0; _loc3 < arguments.length; ++_loc3)
            {
                arguments[_loc3] = _loc3 + 1;
            } // end of for
            _size = arguments.length;
        } // end else if
    } // End of the function
    function moveToFirst()
    {
        _iterator = 1;
    } // End of the function
    function hasMoreElements()
    {
        return (_iterator <= _size);
    } // End of the function
    function nextElement()
    {
        if (!this.hasMoreElements())
        {
            throw new Error("No more elements in enumeration");
        } // end if
        var _loc2;
        var _loc3 = new Object();
        for (var _loc2 in this)
        {
            if (this[_loc2] == _iterator)
            {
                _loc3.name = _loc2;
                _loc3.value = this[_loc2];
            } // end if
        } // end of for...in
        ++_iterator;
        return (_loc3);
    } // End of the function
    var _iterator = 1;
    var _size = 0;
} // End of Class
