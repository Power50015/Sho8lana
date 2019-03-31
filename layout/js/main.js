/* eslint-disable no-unused-vars */
/*global $, window, Typed, some_unused_var, setInterval*/
$(function () {
    "use strict";
    var stringHeader, headerHeight, typed, handelError;
    /*Start Header Section*/
    headerHeight = $(window).height() - $("nav").height();
    $("header#fullHeader").css("min-height", headerHeight);
    $("header .d-flex").css("min-height", $("header").height());
    $("header .over").css("min-height", $("header").height());
    handelError = $("#typed");
    $("#indexSearch").css("margin-top", $("#indexSearch").height() / -2);
    $(".port_grid_section .over").width(
        $(".port_grid_section .position-relative img").width()
    );
    $(window).resize(function () {
        var stringHeader, headerHeight, typed, handelError;
        /*Start Header Section*/
        headerHeight = $(window).height() - $("nav").height();
        $("header#fullHeader").css("min-height", headerHeight);
        $("header .d-flex").css("min-height", $("header").height());
        $("header .over").css("min-height", $("header").height());
        handelError = $("#typed");
        $("#indexSearch").css("margin-top", $("#indexSearch").height() / -2);
        $(".port_grid_section .over").width(
            $(".port_grid_section .position-relative img").width()
        );
    });
    //Typed.js is a library that types Plg

    stringHeader = ['<span class="font-color-1 f-85">انجز </span>مشاريعك <br> بالاعتماد على <br> توظيف مستقلين <br> محترفين ', '<span class="font-color-1 f-85 ">الأن </span>موقع <br> شغلانه <br> لتوظيف المستقلين <br> المحترفين '];
    /*End Header Section*/
    try {
        typed = new Typed("#typed", {
            /**
             * @property {array} strings strings to be typed
             * @property {string} stringsElement ID of element containing string children
             */
            strings: [stringHeader[0], stringHeader[1]],
            stringsElement: null,
            /**
             * @property {number} typeSpeed type speed in milliseconds
             */
            typeSpeed: 100,
            /**
             * @property {number} startDelay time before typing starts in milliseconds
             */
            startDelay: 1000,
            /**
             * @property {number} backSpeed backspacing speed in milliseconds
             */
            backSpeed: 60,
            /**
             * @property {boolean} smartBackspace only backspace what doesn't match the previous string
             */
            smartBackspace: true,
            /**
             * @property {boolean} shuffle shuffle the strings
             */
            shuffle: false,
            /**
             * @property {number} backDelay time before backspacing in milliseconds
             */
            backDelay: 700,

            /**
             * @property {boolean} fadeOut Fade out instead of backspace
             * @property {string} fadeOutClass css class for fade animation
             * @property {boolean} fadeOutDelay Fade out delay in milliseconds
             */
            fadeOut: false,
            fadeOutClass: "typed-fade-out",
            fadeOutDelay: 500,

            /**
             * @property {boolean} loop loop strings
             * @property {number} loopCount amount of loops
             */
            loop: true,
            loopCount: Infinity,

            /**
             * @property {boolean} showCursor show cursor
             * @property {string} cursorChar character for cursor
             * @property {boolean} autoInsertCss insert CSS for cursor and fadeOut into HTML <head>
             */
            showCursor: false,
            cursorChar: "|",
            autoInsertCss: true,

            /**
             * @property {string} attr attribute for typing
             * Ex: input placeholder, value, or just HTML text
             */
            attr: null,

            /**
             * @property {boolean} bindInputFocusEvents bind to focus and blur if el is text input
             */
            bindInputFocusEvents: false,

            /**
             * @property {string} contentType 'html' or 'null' for plaintext
             */
            contentType: "html"
        });
    } catch (e) {
        //window.console.log(e);
    }
    $("#send-msg").click(function (e) {
        e.preventDefault();
        var idUser = $("#id-send").val(),
            msgText = $("#msg").val();
        $.ajax({
            url: "massega.php?do=send",
            type: "POST",
            data: {
                i: idUser,
                m: msgText
            },
            success: function (text) {
                $("#msg").val("");
            }
        });
    });

    function getdata() {
        var idUser = $("#id-send").val();
        $.ajax({
            url: "massega.php?do=res&user=" + idUser,
            type: "POST",
            success: function (response) {
                $(".msg").html(response);
            }
        });
        $('.msg').animate({
            scrollTop: "9999999"
        }, 10000);
    }
    setInterval(function () {
        getdata();
    }, 1500);
    //   $('#canter-ul').css('left', ($('.row').width() / -2));
    // range js //

    $('.owl-carousel').owlCarousel();
});