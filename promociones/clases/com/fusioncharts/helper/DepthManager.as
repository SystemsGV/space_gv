class com.fusioncharts.helper.DepthManager
{
    var depths;
    function DepthManager(startDepth)
    {
        depths = new Array();
        this.setStartDepth(startDepth);
    } // End of the function
    function reserveDepths(objectName, numDepths)
    {
        if (numDepths > 0)
        {
            var _loc2 = new Object();
            _loc2.start = _iterator + 1;
            _loc2.end = _loc2.start + numDepths - 1;
            _loc2.num = numDepths;
            depths[objectName] = _loc2;
            _iterator = _iterator + numDepths;
        } // end if
    } // End of the function
    function getDepth(objName)
    {
        var _loc2 = depths[objName].start;
        if (isNaN(_loc2) || _loc2 == undefined)
        {
            return (0);
        }
        else
        {
            return (_loc2);
        } // end else if
    } // End of the function
    function setStartDepth(startDepth)
    {
        _iterator = startDepth;
        _startDepth = startDepth;
    } // End of the function
    function clear()
    {
        delete this.depths;
        depths = new Array();
    } // End of the function
    var _iterator = 0;
    var _startDepth = 0;
} // End of Class
