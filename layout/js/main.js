/*global $, window*/
$(function () {
    'use strict';
    /* Index Header Section*/
    var headerHeight = $(window).height() - $('nav').height();
    $('header#fullHeader').css("min-height", headerHeight);
    $('header .d-flex').css("min-height", $('header').height());
    $('header .over').css("min-height", $('header').height());
    
    
});