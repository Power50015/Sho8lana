/* eslint-disable no-unused-vars */
/*global $, window, Typed, some_unused_var*/
$(function () {
    'use strict';

    var stringHeader, headerHeight, typed;
    /*Start Header Section*/
    headerHeight = $(window).height() - $('nav').height();
    $('header#fullHeader').css("min-height", headerHeight);
    $('header .d-flex').css("min-height", $('header').height());
    $('header .over').css("min-height", $('header').height());

    $('#indexSearch').css("margin-top", $('#indexSearch').height() / -2);


    
 //   $('#canter-ul').css('left', ($('.row').width() / -2));
});