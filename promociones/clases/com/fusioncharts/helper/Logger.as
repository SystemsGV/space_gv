class com.fusioncharts.helper.Logger
{
    var logMC, cWidth, cHeight, log, _iterator, cssStyle, logVisible, logMainMC, lWidth, lHeight, lX, lY, tWidth, tHeight, tY, tX, logDebugMsgTF, bgMC, tf, scrollMC, logScrollBar, objListener, debuggerState;
    static var LEVEL;
    function Logger(lMC, chartWidth, chartHeight)
    {
        logMC = lMC;
        cWidth = chartWidth;
        cHeight = chartHeight;
        LEVEL = new com.fusioncharts.helper.FCEnum("INFO", "ERROR", "CODE", "LINK");
        log = new Array();
        _iterator = 0;
        cssStyle = new TextField.StyleSheet();
        cssStyle.setStyle(".infoTitle", {fontFamily: "Arial", fontSize: 11, color: "#005900", fontWeight: "normal", textDecoration: "none"});
        cssStyle.setStyle(".info", {fontFamily: "Arial", fontSize: 11, color: "#333333", fontWeight: "normal", textDecoration: "none"});
        cssStyle.setStyle(".codeTitle", {fontFamily: "Arial", fontSize: 11, color: "#005900", fontWeight: "normal", textDecoration: "none"});
        cssStyle.setStyle(".code", {fontFamily: "Courier New", fontSize: 11, color: "#333333", marginLeft: 40, fontWeight: "normal", textDecoration: "none"});
        cssStyle.setStyle(".linkTitle", {fontFamily: "Arial", fontSize: 11, color: "#005900", fontWeight: "normal", textDecoration: "none"});
        cssStyle.setStyle(".link", {fontFamily: "Courier New", fontSize: 11, color: "#0000FF", fontWeight: "normal", textDecoration: "underline"});
        cssStyle.setStyle(".errorTitle", {fontFamily: "Arial", fontSize: 11, color: "#CC0000", fontWeight: "normal"});
        cssStyle.setStyle(".error", {fontFamily: "Arial", fontSize: 11, color: "#CC0000", fontWeight: "normal", textDecoration: "none"});
    } // End of the function
    function show()
    {
        logVisible = true;
        if (!isDrawn)
        {
            this.draw();
        }
        else
        {
            logMainMC._visible = true;
        } // end else if
        this.updateDisplay();
    } // End of the function
    function hide()
    {
        logMainMC._visible = false;
        logVisible = false;
    } // End of the function
    function draw()
    {
        var _loc3 = cWidth * 8.000000E-001;
        var _loc2 = cHeight * 7.000000E-001;
        lWidth = _loc3 < 200 ? (200) : (_loc3);
        lHeight = _loc2 < 125 ? (125) : (_loc2);
        lX = (cWidth - lWidth) / 2;
        lY = (cHeight - lHeight) / 2;
        tWidth = lWidth - (2 * tHPadding + scrollPadding + scrollWidth);
        tHeight = lHeight - 2 * tVPadding;
        tY = lY + tVPadding;
        tX = lX + tHPadding;
        logMainMC = logMC.createEmptyMovieClip("Main", 1);
        logDebugMsgTF = logMC.createTextField("DebugMsg", 2, 0, 0, cWidth, 0);
        bgMC = logMainMC.createEmptyMovieClip("Bg", 1);
        tf = logMainMC.createTextField("LogTF", 2, tX, tY, tWidth, tHeight);
        scrollMC = logMainMC.createEmptyMovieClip("ScrollB", 3);
        bgMC.moveTo(lX, lY);
        bgMC.lineStyle(1, borderColor, 100);
        bgMC.beginFill(bgColor, 100);
        bgMC.lineTo(lX + lWidth, lY);
        bgMC.lineTo(lX + lWidth, lY + lHeight);
        bgMC.lineTo(lX, lY + lHeight);
        bgMC.lineTo(lX, lY);
        tf.background = false;
        tf.border = false;
        tf.wordWrap = true;
        tf.multiline = true;
        tf.selectable = true;
        tf.html = true;
        tf.styleSheet = cssStyle;
        logScrollBar = new com.fusioncharts.helper.ScrollBar(tf, scrollMC, tX + tWidth + scrollPadding, tY, scrollWidth, tHeight, "E2E2E2", "999999", "666666");
        logDebugMsgTF.background = false;
        logDebugMsgTF.background = true;
        logDebugMsgTF.backgroundColor = 16777215;
        logDebugMsgTF.border = false;
        logDebugMsgTF.selectable = false;
        logDebugMsgTF.wordWrap = true;
        logDebugMsgTF.autoSize = "left";
        logDebugMsgTF.html = true;
        logDebugMsgTF.fontFamily = "Verdana";
        logDebugMsgTF.htmlText = "<font face=\'Verdana\' size=\'9\'><B>Debug Mode:</B> Click & press Shift + D to hide debugger</font>";
        objListener = new Object();
        objListener.onKeyDown = mx.utils.Delegate.create(this, alterLogVisibleState);
        Key.addListener(objListener);
        isDrawn = true;
    } // End of the function
    function record(strTitle, strMsg, level)
    {
        var _loc2 = new Object();
        _loc2.title = strTitle;
        _loc2.msg = strMsg;
        _loc2.level = level;
        log.push(_loc2);
        false;
        if (logVisible)
        {
            this.updateDisplay();
        } // end if
    } // End of the function
    function alterLogVisibleState()
    {
        if (Key.isDown(16) && Key.isDown(new String("D").charCodeAt(0)))
        {
            logMainMC._visible = !logMainMC._visible;
            logVisible = logMainMC._visible;
            debuggerState = logVisible ? ("hide") : ("show");
            logDebugMsgTF.htmlText = "<font face=\'Verdana\' size=\'9\'><B>Debug Mode:</B> Click & press Shift + D to " + debuggerState + " debugger</font>";
            if (logVisible)
            {
                this.updateDisplay();
            } // end if
        } // end if
    } // End of the function
    function updateDisplay()
    {
        var _loc4 = log.length;
        var _loc3 = tf.htmlText;
        for (var _loc2 = _iterator; _loc2 < _loc4; ++_loc2)
        {
            switch (log[_loc2].level)
            {
                case com.fusioncharts.helper.Logger.LEVEL.INFO:
                {
                    _loc3 = _loc3 + "<p><span class=\'infoTitle\'>" + log[_loc2].title + ": </span><span class=\'info\'>" + log[_loc2].msg + "</span></p>";
                    break;
                } 
                case com.fusioncharts.helper.Logger.LEVEL.ERROR:
                {
                    _loc3 = _loc3 + "<p><span class=\'errorTitle\'>" + log[_loc2].title + ": </span><span class=\'error\'>" + log[_loc2].msg + "</span></p>";
                    break;
                } 
                case com.fusioncharts.helper.Logger.LEVEL.CODE:
                {
                    _loc3 = _loc3 + "<p><span class=\'codeTitle\'>" + log[_loc2].title + ": </span><span class=\'code\'>" + log[_loc2].msg + "</span></p>";
                    break;
                } 
                case com.fusioncharts.helper.Logger.LEVEL.LINK:
                {
                    _loc3 = _loc3 + "<p><span class=\'linkTitle\'>" + log[_loc2].title + ": </span><span class=\'link\'>" + log[_loc2].msg + "</span></p>";
                    break;
                } 
            } // End of switch
        } // end of for
        tf.htmlText = _loc3;
        _iterator = _loc4;
        logScrollBar.invalidate();
    } // End of the function
    function destroy()
    {
        Key.removeListener(objListener);
        logScrollBar.destroy();
        bgMC.removeMovieClip();
        tf.removeMovieClip();
        scrollMC.removeMovieClip();
        logMainMC.removeMovieClip();
        logDebugMsgTF.removeMovieClip();
    } // End of the function
    var tVPadding = 15;
    var tHPadding = 15;
    var scrollWidth = 16;
    var scrollPadding = 3;
    var bgColor = 16514043;
    var borderColor = 10066329;
    var isDrawn = false;
} // End of Class
