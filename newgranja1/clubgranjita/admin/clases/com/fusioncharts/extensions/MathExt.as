class com.fusioncharts.extensions.MathExt
{
    function MathExt()
    {
    } // End of the function
    static function numDecimals(num)
    {
        num = Math.abs(num);
        var _loc3 = num - Math.floor(num);
        var _loc1 = String(_loc3).length - 2;
        _loc1 = _loc1 < 0 ? (0) : (_loc1);
        return (_loc1);
    } // End of the function
    static function toRadians(angle)
    {
        return (angle / 180 * 3.141593E+000);
    } // End of the function
    static function toDegrees(angle)
    {
        return (angle / 3.141593E+000 * 180);
    } // End of the function
    static function remainderOf(a, b)
    {
        var _loc1 = Math.floor(a / b);
        return (com.fusioncharts.extensions.MathExt.roundUp(a - b * _loc1));
    } // End of the function
    static function boundAngle(angle)
    {
        if (angle >= 0)
        {
            return (com.fusioncharts.extensions.MathExt.remainderOf(angle, 360));
        }
        else
        {
            return (360 - com.fusioncharts.extensions.MathExt.remainderOf(Math.abs(angle), 360));
        } // end else if
    } // End of the function
    static function toNearestTwip(num)
    {
        var _loc3 = num;
        var _loc5 = _loc3 < 0 ? (-1) : (1);
        var _loc7 = Math.abs(_loc3);
        var _loc2 = Math.round(_loc7 * 100);
        var _loc1 = Math.floor(_loc2 / 5);
        var _loc4 = Number(String(_loc2 - _loc1 * 5));
        var _loc6 = _loc4 > 2 ? (_loc1 * 5 + 5) : (_loc1 * 5);
        return (_loc5 * (_loc6 / 100));
    } // End of the function
    static function roundUp(param)
    {
        param = param * 100;
        param = Math.round(Number(String(param)));
        param = param / 100;
        return (param);
    } // End of the function
} // End of Class
