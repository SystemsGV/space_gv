class com.fusioncharts.helper.FCError extends Error
{
    var name, message, level;
    function FCError(name, message, level)
    {
        super(message);
        this.name = name;
        this.message = message;
        this.level = level;
    } // End of the function
} // End of Class
