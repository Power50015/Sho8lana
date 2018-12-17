/*global $, window*/
$(function () {
    'use strict';
    /* Index Header Section*/
    var headerHeight = $(window).height() - $('nav').height();
    $('header').height(headerHeight);
    $('header .d-flex').height(headerHeight);
    $('header .over').height(headerHeight);
    
    
});