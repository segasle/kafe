
$(function() {
    $("body").css({padding: 0, margin: 0});
    var f = function () {
        $(".ndra-container").css({position: "relative"});
        var h1 = $("body").height();
        var h2 = $(window).height();
        var d = h2 - h1;
        var h = $(".ndra-container").height() + d;
        var ruler = $("<div>").appendTo(".ndra-container");
        h = Math.max(ruler.position().top, h);
        ruler.remove();
        $(".ndra-container").height(h);
    };
    setInterval(f, 1000);
    $(window).resize(f);
    f();


    $(".phone-number").each(function () {
        $(this).mask("+7(999)999-99-99");
    });
})