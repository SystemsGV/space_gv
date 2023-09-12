class com.fusioncharts.helper.HashTable
{
    var table;
    function HashTable()
    {
        table = new Array();
    } // End of the function
    function put(key, value)
    {
        table[key] = value;
    } // End of the function
    function get(key)
    {
        return (table[key]);
    } // End of the function
    function remove(key)
    {
        delete table[key];
    } // End of the function
    function containsKey(key)
    {
        var _loc3 = false;
        var _loc2;
        for (var _loc2 in table)
        {
            if (_loc2 == key)
            {
                _loc3 = true;
                break;
            } // end if
        } // end of for...in
        return (_loc3);
    } // End of the function
    function size()
    {
        var _loc2 = 0;
        var _loc3;
        for (var _loc3 in table)
        {
            ++_loc2;
        } // end of for...in
        return (_loc2);
    } // End of the function
    function isEmpty()
    {
        return (this.size() == 0);
    } // End of the function
    function clear()
    {
        table = new Array();
    } // End of the function
} // End of Class
