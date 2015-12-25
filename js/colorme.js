$('.carousel').carousel({
    interval: 4000 //changes the speed
})
$(window).bind('scroll', function () {

    if ($(window).scrollTop() > (window.innerHeight / 2)) {
        $('#main-content').addClass('move-down');
        $('footer').addClass('move-down');
        $('#menu').addClass('fixed');
    } else {
        $('#main-content').removeClass('move-down');
        $('footer').removeClass('move-down');
        $('#menu').removeClass('fixed');
    }

});
