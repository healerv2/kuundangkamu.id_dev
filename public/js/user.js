$(function () {
    //datatoggle
    $('[data-toggle-open]').on('click', function (e) {
        var targeted = $(this).attr('data-toggle-open');
        $(this).toggleClass('collapsed');
        if ($(this).hasClass('collapsed')) {
            $('html').addClass('overflow')
            $('[data-toggle="' + targeted + '"]').addClass('open');
        } else {
            $('html').removeClass('overflow')
            $('[data-toggle="' + targeted + '"]').removeClass('open');
        };
        e.preventDefault();
    });
    $('[data-toggle-close]').on('click', function (e) {
        var targeted = $(this).attr('data-toggle-close');
        $('[data-toggle-open="' + targeted + '"]').trigger('click');
        e.preventDefault();
    });
    $('.hamburger').on('click', function () {
        var $element = $('<div class="header__nav_bg"></div>');
        $('header .header__nav').after($element);
        if ($(this).hasClass('collapsed')) {
            $element.fadeIn();
            $('header .header__nav_bg').on('click', function () { $('.hamburger').trigger('click') });
        } else {
            $('header .header__nav_bg').fadeOut(function () { $(this).remove(); });
        };
    })


    //menuspy
    var elm = document.querySelector('.header');
    var ms = new MenuSpy(elm, {
        enableLocationHash: false,
        threshold: 300,
    });
    var $headerheight = 70;
    $('.header .header__nav a[href^="#"], .footer__nav a[href^="#"], .btn--scroll').click(function (e) {
        $('html, body').stop().animate({ 'scrollTop': $(this.hash).offset().top - $headerheight }, 1000);
        $('html').removeClass('overflow').find('.header .header__nav').removeClass('open'); $('.hamburger').removeClass('collapsed');
        $('.header .header__nav_bg').fadeOut(function () { $(this).remove(); });
        e.preventDefault()
    });
    $(function () {
        setTimeout(function () { scroll(0, 0); }, 1);
        if (window.location.hash) {
            scroll(0, 0)
            $('html, body').animate({ 'scrollTop': $(window.location.hash).offset().top - $headerheight }, 1000);
        }
    })



    //headerscroll
    $(window).scroll(function (event) {
        if ($(this).scrollTop() > 0) {
            $('header').addClass('fixed')
        } else {
            $('header').removeClass('fixed')
        }
    });

    $('.video a.popup-close').click(function () {
        $('#popup-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        console.log("kasdjhasd");
    });
    //wow
    new WOW().init();
})