(() => {
  var e;
  (e = jQuery).fn.moreLess = function (s) {
    var t = e.extend(
      {
        moreLabel: "Read more",
        lessLabel: "Read less",
        moreClass: "",
        lessClass: "",
        wordsCount: 50,
      },
      s
    );
    function a(e, s) {
      var a = e.html().trim().split(/\s+/);
      a.length > t.wordsCount &&
        (a.splice(t.wordsCount, 9e9),
        a.push(
          '<a href="#" data-id="' +
            s +
            '" class="moreless-expand-content ' +
            t.moreClass +
            '">' +
            t.moreLabel +
            "</a>"
        )),
        e.html(
          new DOMParser().parseFromString(a.join(" "), "text/html").body
            .innerHTML
        );
    }
    var n = [],
      l = [];
    this.each(function (s) {
      var t = e(this);
      n.push(t.html()), l.push(t), a(t, s);
    }),
      e(document).on("click", ".moreless-expand-content", function (s) {
        s.preventDefault();
        var a = e(this).attr("data-id");
        l[a].html(
          n[a] +
            '<a href="#" data-id="' +
            a +
            '" class="moreless-collapse-content ' +
            t.lessClass +
            '">' +
            t.lessLabel +
            "</a>"
        );
      }),
      e(document).on("click", ".moreless-collapse-content", function (s) {
        s.preventDefault();
        var t = e(this).attr("data-id");
        a(l[t], t);
      });
  };
})();
