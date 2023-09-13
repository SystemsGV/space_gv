class com.fusioncharts.helper.DefaultColors
{
    var colors, _iterator, bgColor, bgAngle, bgRatio, bgAlpha, canvasBgColor, canvasBgAngle, canvasBgAlpha, canvasBgRatio, canvasBorderColor, canvasBorderAlpha, showShadow, divLineColor, divLineAlpha, altHGridColor, altHGridAlpha, altVGridColor, altVGridAlpha, anchorBgColor, toolTipBgColor, toolTipBorderColor, baseFontColor, borderColor, borderAlpha, legendBgColor, legendBorderColor, plotGradientColor, plotBorderColor, plotFillColor, bgColor3D, bgAlpha3D, bgAngle3D, bgRatio3D, canvasbgColor3D, canvasBaseColor3D, divLineColor3D, legendbgColor3D, legendBorderColor3D, toolTipbgColor3D, toolTipBorderColor3D, baseFontColor3D, anchorbgColor3D;
    function DefaultColors()
    {
        colors = new Array("AFD8F8", "F6BD0F", "8BBA00", "FF8E46", "008E8E", "D64646", "8E468E", "588526", "FFF468", "008ED6", "9D080D", "A186BE", "CC6600", "FDC689", "ABA000", "F26D7D", "FFF200", "0054A6", "F7941C", "CC3300", "006600", "663300", "6DCFF6");
        _iterator = 0;
        bgColor = new Array("CBCBCB,E9E9E9", "CFD4BE,F3F5DD", "C5DADD,EDFBFE", "A86402,FDC16D", "FF7CA0,FFD1DD");
        bgAngle = new Array(270, 270, 270, 270, 270);
        bgRatio = new Array("0,100", "0,100", "0,100", "0,100", "0,100");
        bgAlpha = new Array("50,50", "60,50", "40,20", "20,10", "30,30");
        canvasBgColor = new Array("FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF");
        canvasBgAngle = new Array(0, 0, 0, 0, 0);
        canvasBgAlpha = new Array("100", "100", "100", "100", "100");
        canvasBgRatio = new Array("", "", "", "", "");
        canvasBorderColor = new Array("545454", "545454", "415D6F", "845001", "68001B");
        canvasBorderAlpha = new Array(100, 100, 100, 90, 100);
        showShadow = new Array(0, 1, 1, 1, 1);
        divLineColor = new Array("717170", "7B7D6D", "92CDD6", "965B01", "68001B");
        divLineAlpha = new Array(40, 45, 65, 40, 30);
        altHGridColor = new Array("767575", "D8DCC5", "99C4CD", "DEC49C", "FEC1D0");
        altHGridAlpha = new Array(5, 35, 10, 20, 15);
        altVGridColor = new Array("767575", "D8DCC5", "99C4CD", "DEC49C", "FEC1D0");
        altVGridAlpha = new Array(10, 20, 10, 15, 10);
        anchorBgColor = new Array("FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF");
        toolTipBgColor = new Array("FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF");
        toolTipBorderColor = new Array("545454", "545454", "415D6F", "845001", "68001B");
        baseFontColor = new Array("555555", "60634E", "025B6A", "A15E01", "68001B");
        borderColor = new Array("767575", "545454", "415D6F", "845001", "68001B");
        borderAlpha = new Array(50, 50, 50, 50, 50);
        legendBgColor = new Array("ffffff", "ffffff", "ffffff", "ffffff", "ffffff");
        legendBorderColor = new Array("545454", "545454", "415D6F", "845001", "D55979");
        plotGradientColor = new Array("ffffff", "ffffff", "ffffff", "ffffff", "ffffff");
        plotBorderColor = new Array("333333", "8A8A8A", "ffffff", "ffffff", "ffffff");
        plotFillColor = new Array("767575", "D8DCC5", "99C4CD", "DEC49C", "FEC1D0");
        bgColor3D = new Array("FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF");
        bgAlpha3D = new Array("100", "100", "100", "100", "100");
        bgAngle3D = new Array(90, 90, 90, 90, 90);
        bgRatio3D = new Array("", "", "", "", "");
        canvasbgColor3D = new Array("DDE3D5", "D8D8D7", "EEDFCA", "CFD2D8", "FEE8E0");
        canvasBaseColor3D = new Array("ACBB99", "BCBCBD", "C8A06C", "96A4AF", "FAC7BC");
        divLineColor3D = new Array("ACBB99", "A4A4A4", "BE9B6B", "7C8995", "D49B8B");
        legendbgColor3D = new Array("F0F3ED", "F3F3F3", "F7F0E8", "EEF0F2", "FEF8F5");
        legendBorderColor3D = new Array("C6CFB8", "C8C8C8", "DFC29C", "CFD5DA", "FAD1C7");
        toolTipbgColor3D = new Array("FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF");
        toolTipBorderColor3D = new Array("49563A", "666666", "49351D", "576373", "681C09");
        baseFontColor3D = new Array("49563A", "4A4A4A", "49351D", "48505A", "681C09");
        anchorbgColor3D = new Array("FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF", "FFFFFF");
    } // End of the function
    function getColor()
    {
        var _loc2 = colors[_iterator];
        ++_iterator;
        if (_iterator == colors.length - 1)
        {
            _iterator = 0;
        } // end if
        return (_loc2);
    } // End of the function
    function getPaletteIndex(index)
    {
        if (index == undefined || isNaN(index) || index < 1 || index > numPalettes)
        {
            return (0);
        }
        else
        {
            return (index - 1);
        } // end else if
    } // End of the function
    function get2DBgColor(index)
    {
        return (bgColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DBgAlpha(index)
    {
        return (bgAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DBgAngle(index)
    {
        return (bgAngle[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DBgRatio(index)
    {
        return (bgRatio[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DCanvasBgColor(index)
    {
        return (canvasBgColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DCanvasBgAngle(index)
    {
        return (canvasBgAngle[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DCanvasBgAlpha(index)
    {
        return (canvasBgAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DCanvasBgRatio(index)
    {
        return (canvasBgRatio[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DCanvasBorderColor(index)
    {
        return (canvasBorderColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DCanvasBorderAlpha(index)
    {
        return (canvasBorderAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DShadow(index)
    {
        return (showShadow[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DDivLineColor(index)
    {
        return (divLineColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DDivLineAlpha(index)
    {
        return (divLineAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DAltHGridColor(index)
    {
        return (altHGridColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DAltHGridAlpha(index)
    {
        return (altHGridAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DAltVGridColor(index)
    {
        return (altVGridColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DAltVGridAlpha(index)
    {
        return (altVGridAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DAnchorBgColor(index)
    {
        return (anchorBgColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DToolTipBgColor(index)
    {
        return (toolTipBgColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DToolTipBorderColor(index)
    {
        return (toolTipBorderColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DBaseFontColor(index)
    {
        return (baseFontColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DBorderColor(index)
    {
        return (borderColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DBorderAlpha(index)
    {
        return (borderAlpha[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DLegendBgColor(index)
    {
        return (legendBgColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DLegendBorderColor(index)
    {
        return (legendBorderColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DPlotGradientColor(index)
    {
        return (plotGradientColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DPlotBorderColor(index)
    {
        return (plotBorderColor[this.getPaletteIndex(index)]);
    } // End of the function
    function get2DPlotFillColor(index)
    {
        return (plotFillColor[this.getPaletteIndex(index)]);
    } // End of the function
    function getBgColor3D(index)
    {
        return (bgColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getBgAlpha3D(index)
    {
        return (bgAlpha3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getBgAngle3D(index)
    {
        return (bgAngle3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getBgRatio3D(index)
    {
        return (bgRatio3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getCanvasBgColor3D(index)
    {
        return (canvasbgColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getCanvasBaseColor3D(index)
    {
        return (canvasBaseColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getLegendBgColor3D(index)
    {
        return (legendbgColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getLegendBorderColor3D(index)
    {
        return (legendBorderColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getDivLineColor3D(index)
    {
        return (divLineColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getToolTipBgColor3D(index)
    {
        return (toolTipbgColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getToolTipBorderColor3D(index)
    {
        return (toolTipBorderColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getBaseFontColor3D(index)
    {
        return (baseFontColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function getAnchorBgColor3D(index)
    {
        return (anchorbgColor3D[this.getPaletteIndex(index)]);
    } // End of the function
    function reset()
    {
        _iterator = 0;
    } // End of the function
    var numPalettes = 5;
} // End of Class
