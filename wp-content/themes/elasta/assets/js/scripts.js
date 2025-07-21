jQuery(document).ready(function($) {
  "use strict";
  // Mean Menu
  var $navmenu = $('nav');
  var $menu_starts = ($navmenu.data('nav') !== undefined) ? $navmenu.data('nav') : 1199;
  $('.elst-navigation').meanmenu({
    meanMenuContainer: '.elst-header .elst-header-left',
    meanMenuOpen: '<span></span>',
    meanMenuClose: '<span></span>',
    meanExpand: '<i class="fa fa-angle-down"></i>',
    meanContract: '<i class="fa fa-angle-up"></i>',
    meanScreenWidth: $menu_starts,
  });  
  $(".mean-container .mean-nav > ul > li:last-child a:last-child").focusout(function(){
    $('a.meanmenu-reveal').focus();
  });

  $('.elst-trigger-btn').click (function(){
    $(this).toggleClass('open');
    $('.elst-full-header').toggleClass('open');
    $('.elst-fixed-header').toggleClass('open');
    $('.elst-navigation-overlay').toggleClass('open');
  });
  $('.elst-navigation-overlay').click (function(){
    $('.elst-trigger-btn').removeClass('open');
    $('.elst-fixed-header').removeClass('open');
    $('.elst-navigation-overlay').removeClass('open');
  });

  //Elasta Navigation Hover Script
  $('.elst-navigation .has-dropdown').on ({
    focusin : function() {
      $(this).find('ul.dropdown-nav').first().stop(false, false).fadeIn(300);
    },
    focusout : function() {
      $(this).find('ul.dropdown-nav').first().stop(false, false).fadeOut(300);
    },
    mouseenter : function() {
      $(this).find('ul.dropdown-nav').first().stop(false, false).fadeIn(300);
    },
    mouseleave : function() {
      $(this).find('ul.dropdown-nav').first().stop(false, false).fadeOut(300);
    }
  });

  $(window).load(function() {
    $('.elst-news-item, li.product, .elst-download-item, .project-item, .elst-team-item').hover (
      function() {
        $(this).addClass('elst-hover');
      },
      function() {
        $(this).removeClass('elst-hover');
      }
    );

    

  });

  // Search Box Script
  $('html').click(function() {
    $('.elst-search-link .elst-search-box').fadeOut(200);
  });
  $('.elst-search-link').click(function(e) {
    e.stopPropagation();
    $('.elst-search-link .elst-search-box').find('input[type="text"]').focus();
  });
  $('.elst-search-link a').click(function() {
    $('.elst-search-link .elst-search-box').fadeToggle(200);
  });

  // Nice Select Script
  $('.elst-header select, .elst-post-wrap select, .elst-secondary select, .elst-footer select').niceSelect();

  if ($('header').hasClass('header-style-six')) {
    if ($('div').hasClass('mean-container')) {
      $('.header-style-six .elst-brand').show();
      $('.elst-header .elst-brand').insertAfter($('.mean-bar'));
    } else {
      var li_length = $('.elst-navigation ul').first().children().size();
      var half_length = li_length / 2;
      var final_length = Math.ceil(half_length)
      if (li_length >= 2) {
          $('.elst-navigation ul').first().children('li:nth-child(' + final_length + ')').addClass('center-point');
      }
      $('.header-style-six .elst-brand').show();
      $('.elst-header .elst-brand').insertAfter($('.elst-navigation ul li.center-point'));
    }
  }

  // Masonry Script
  var $grid = $('.elst-masonry').isotope ({
    itemSelector: '.masonry-item',
    layoutMode: 'packery',
    percentPosition: true,
  });
  var filterFns = {
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  $('.masonry-filters').on( 'click', 'li a', function() {
    var filterValue = $( this ).attr('data-filter');
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({
      filter: filterValue
    });
  });
  $('.masonry-filters').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'li a', function() {
      $buttonGroup.find('.active').removeClass('active');
      $(this).addClass('active');
    });
  });

  if ($('div').hasClass('title-style-eleven')) {
    $(".title-style-eleven h2").each(function() {
      var elText,
          openSpan = '<span class="first-word">',
          closeSpan = '</span>';
      elText = $(this).text().split(" ");
      elText.unshift(openSpan);
      elText.splice(2, 0, closeSpan);
      elText = elText.join(" ");
      $(this).html(elText);
    });
  }

  

});