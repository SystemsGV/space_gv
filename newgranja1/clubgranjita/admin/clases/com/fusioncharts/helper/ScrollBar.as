class com.fusioncharts.helper.ScrollBar
{
    var tf, scrollMC, x, y, w, h, scrollBgColor, scrollBarColor, btnColor, mcScrollBg, mcScrollBar, mcBtnUp, mcBtnDown, scrollBgX, scrollBgY, scrollBgW, scrollBgH, btnCenterX, upBtnEnd, downBtnStart, scrollInterval, showScrollBar, viewLines, totalLines, scrollBarX, scrollBarY, scrollBarW, scrollBarH, scrollBarDragH, scrollListener, ratioMoved;
    function ScrollBar(t, targetMC, x, y, w, h, scrollBgColor, scrollBarColor, btnColor)
    {
        tf = t;
        scrollMC = targetMC;
        this.x = x;
        this.y = y;
        this.w = w;
        this.h = h;
        this.scrollBgColor = parseInt(scrollBgColor, 16);
        this.scrollBarColor = parseInt(scrollBarColor, 16);
        this.btnColor = parseInt(btnColor, 16);
        this.drawBase();
        this.drawScrollBar();
    } // End of the function
    function drawBase()
    {
        mcScrollBg = scrollMC.createEmptyMovieClip("bg", 1);
        mcScrollBar = scrollMC.createEmptyMovieClip("bar", 2);
        mcBtnUp = scrollMC.createEmptyMovieClip("btnUp", 3);
        mcBtnDown = scrollMC.createEmptyMovieClip("btnDown", 4);
        scrollBgX = x;
        scrollBgY = y + btnHeight + scrollVPadding;
        scrollBgW = w;
        scrollBgH = h - (2 * btnHeight + 2 * scrollVPadding);
        btnCenterX = x + w / 2;
        upBtnEnd = y + btnHeight;
        downBtnStart = upBtnEnd + scrollBgH + 2 * scrollVPadding;
        mcBtnUp.lineStyle();
        mcBtnUp.beginFill(btnColor, 100);
        mcBtnUp.moveTo(btnCenterX, y);
        mcBtnUp.lineTo(btnCenterX - w / 2, upBtnEnd);
        mcBtnUp.lineTo(btnCenterX + w / 2, upBtnEnd);
        mcBtnUp.lineTo(btnCenterX, y);
        mcBtnUp.endFill();
        mcBtnDown.lineStyle();
        mcBtnDown.beginFill(btnColor, 100);
        mcBtnDown.moveTo(btnCenterX - w / 2, downBtnStart);
        mcBtnDown.lineTo(btnCenterX + w / 2, downBtnStart);
        mcBtnDown.lineTo(btnCenterX, downBtnStart + btnHeight);
        mcBtnDown.lineTo(btnCenterX - w / 2, downBtnStart);
        mcBtnDown.endFill();
        mcScrollBg.moveTo(scrollBgX, scrollBgY);
        mcScrollBg.lineStyle();
        mcScrollBg.beginFill(scrollBgColor, 100);
        mcScrollBg.lineTo(scrollBgX + scrollBgW, scrollBgY);
        mcScrollBg.lineTo(scrollBgX + scrollBgW, scrollBgY + scrollBgH);
        mcScrollBg.lineTo(scrollBgX, scrollBgY + scrollBgH);
        mcScrollBg.lineTo(scrollBgX, scrollBgY);
        mcScrollBg.endFill();
        mcBtnUp.onPress = mx.utils.Delegate.create(this, scrollUp);
        mcBtnUp.onRelease = mcBtnUp.onReleaseOutside = mx.utils.Delegate.create(this, clearScrollInterval);
        mcBtnDown.onPress = mx.utils.Delegate.create(this, scrollDown);
        mcBtnDown.onRelease = mcBtnDown.onReleaseOutside = mx.utils.Delegate.create(this, clearScrollInterval);
    } // End of the function
    function scrollDown()
    {
        function scrollDownByOne(tf)
        {
            if (tf.scroll < tf.maxscroll)
            {
                ++tf.scroll;
            } // end if
        } // End of the function
        scrollInterval = setInterval(scrollDownByOne, scrollSpeed, tf);
    } // End of the function
    function scrollUp()
    {
        function scrollUpByOne(tf)
        {
            if (tf.scroll > 1)
            {
                --tf.scroll;
            } // end if
        } // End of the function
        scrollInterval = setInterval(scrollUpByOne, scrollSpeed, tf);
    } // End of the function
    function clearScrollInterval()
    {
        clearInterval(scrollInterval);
    } // End of the function
    function drawScrollBar()
    {
        showScrollBar = tf.maxscroll > tf.scroll ? (true) : (false);
        if (showScrollBar)
        {
            viewLines = tf.bottomScroll - tf.scroll + 1;
            totalLines = tf.maxscroll + tf.bottomScroll - tf.scroll;
            scrollBarX = scrollBgX + scrollBarHPadding;
            scrollBarY = scrollBgY + scrollBarVPadding;
            scrollBarW = scrollBgW - 2 * scrollBarHPadding;
            scrollBarH = int(viewLines / totalLines * (scrollBgH - 2 * scrollBarVPadding));
            scrollBarH = scrollBarH < 5 ? (5) : (scrollBarH);
            scrollBarDragH = scrollBgH - scrollBarH - 2 * scrollBarVPadding;
            mcScrollBar.clear();
            mcScrollBar.moveTo(scrollBarX, scrollBarY);
            mcScrollBar.lineStyle();
            mcScrollBar.beginFill(scrollBarColor, 100);
            mcScrollBar.lineTo(scrollBarX + scrollBarW, scrollBarY);
            mcScrollBar.lineTo(scrollBarX + scrollBarW, scrollBarY + scrollBarH);
            mcScrollBar.lineTo(scrollBarX, scrollBarY + scrollBarH);
            mcScrollBar.lineTo(scrollBarX, scrollBarY);
            mcScrollBar.endFill();
            mcScrollBar.onPress = mx.utils.Delegate.create(this, scrollBarDown);
            mcScrollBar.onRelease = mcScrollBar.onReleaseOutside = mx.utils.Delegate.create(this, scrollBarUp);
            scrollListener = new Object();
            scrollListener.onScroller = mx.utils.Delegate.create(this, updateScrollBar);
            tf.addListener(scrollListener);
        } // end if
    } // End of the function
    function invalidate()
    {
        this.drawScrollBar();
    } // End of the function
    function scrollBarDown()
    {
        isBarScrolling = true;
        lastScroll = tf.scroll;
        lastScrollY = mcScrollBar._y;
        mcScrollBar.startDrag(false, 0, 0, 0, scrollBgH - scrollBarH - 2 * scrollBarVPadding);
        mcScrollBar.onEnterFrame = mx.utils.Delegate.create(this, scrollText);
    } // End of the function
    function scrollBarUp()
    {
        isBarScrolling = false;
        mcScrollBar.stopDrag();
        delete mcScrollBar.onEnterFrame;
        if (Math.floor(mcScrollBar._y) == 0)
        {
            tf.scroll = 1;
        } // end if
        if (Math.floor(mcScrollBar._y) == scrollBarDragH)
        {
            tf.scroll = tf.maxscroll;
        } // end if
    } // End of the function
    function scrollText()
    {
        if (isBarScrolling)
        {
            ratioMoved = (mcScrollBar._y - lastScrollY) / scrollBarDragH;
            tf.scroll = lastScroll + Math.ceil(ratioMoved * tf.maxscroll);
        } // end if
    } // End of the function
    function updateScrollBar()
    {
        if (!isBarScrolling)
        {
            mcScrollBar._y = (tf.scroll - 1) / (tf.maxscroll - 1) * scrollBarDragH;
            if (tf.scroll == 1)
            {
                mcScrollBar._y = 0;
            } // end if
            if (tf.scroll == tf.maxscroll)
            {
                mcScrollBar._y == scrollBarDragH;
            } // end if
        } // end if
    } // End of the function
    function destroy()
    {
        tf.removeListener(scrollListener);
        mcScrollBg.removeMovieClip();
        mcScrollBar.removeMovieClip();
        mcBtnUp.removeMovieClip();
        mcBtnDown.removeMovieClip();
    } // End of the function
    var scrollVPadding = 3;
    var scrollBarHPadding = 3;
    var scrollBarVPadding = 3;
    var btnHeight = 10;
    var scrollSpeed = 50;
    var isBarScrolling = false;
    var lastScroll = 1;
    var lastScrollY = 0;
} // End of Class
