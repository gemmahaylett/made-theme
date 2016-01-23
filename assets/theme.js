/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2015, Codrops
 * http://www.codrops.com
 */
;(function(window) {

  'use strict';

  jQuery(".flexnav").flexNav({
    'animationSpeed' : 250, // default drop animation speed 
    'transitionOpacity': true, // default opacity animation 
    'buttonSelector': '.menu-button', // default menu button class 
    'hoverIntent': false, // use with hoverIntent plugin 
    'hoverIntentTimeout': 150, // hoverIntent default timeout 
    'calcItemWidths': false // dynamically calcs top level nav item widths 
  });

  jQuery('.top-slider').owlCarousel({
    items: 3,
    margin: 10,
    loop: true,
    navText: ["",""],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            slideBy: 1
        },
        500:{
            items:3,
            nav:true,
            slideBy: 3
        },
        1600:{
            items:4,
            nav:true,
            slideBy: 4
        }
    }
  });

  jQuery('.top-slider').show();

  var bslider = jQuery('.bottom-slider');
  bslider.owlCarousel({
    items: 3,
    loop: true,
    margin: 10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            slideBy: 1
        },
        500:{
            items:2,
            slideBy: 2
        },
        1200:{
            items:3,
            slideBy: 3
        }
    }
  });

  jQuery('.bs-next').click(function() {
    bslider.trigger('next.owl.carousel');
  });
  // Go to the previous item
  jQuery('.bs-prev').click(function() {
    bslider.trigger('prev.owl.carousel');
  });

  /*jQuery('.related-posts').masonry({
    // options
    itemSelector: '.related-post-item',
    columnWidth: 150
  });*/

  var offset = 4;
  jQuery('.show-more-btn').click(function( event ) {
    event.preventDefault();
    jQuery.ajax({
      url: ajaxpagination.ajaxurl,
      type: 'post',
      data: {
        action: 'ajax_pagination',
        query_vars: ajaxpagination.query_vars,
        post_id: ajaxpagination.post_id,
        offset: offset + 1
      },
      success: function( html ) {
        var grid = document.querySelector('.related-posts');
        var item = document.createElement('article');
        salvattore.appendElements(grid, [item]);
        item.outerHTML = html;
      }
    });

    jQuery.ajax({
      url: ajaxpagination.ajaxurl,
      type: 'post',
      data: {
        action: 'ajax_pagination',
        query_vars: ajaxpagination.query_vars,
        post_id: ajaxpagination.post_id,
        offset: offset + 2
      },
      success: function( html ) {
        var grid = document.querySelector('.related-posts');
        var item = document.createElement('article');
        salvattore.appendElements(grid, [item]);
        item.outerHTML = html;
        offset = offset + 2; 

        if(jQuery('#show-more-hide').length > 0){
          jQuery('.show-more-btn').hide();
        }
      }
    });

    jQuery.ajax({
      url: ajaxpagination.ajaxurl,
      type: 'post',
      data: {
        action: 'ajax_pagination',
        query_vars: ajaxpagination.query_vars,
        post_id: ajaxpagination.post_id,
        offset: offset + 3
      },
      success: function( html ) {
        var grid = document.querySelector('.related-posts');
        var item = document.createElement('article');
        salvattore.appendElements(grid, [item]);
        item.outerHTML = html;
        offset = offset + 3; 

        if(jQuery('#show-more-hide').length > 0){
          jQuery('.show-more-btn').hide();
        }
      }
    });

    jQuery.ajax({
      url: ajaxpagination.ajaxurl,
      type: 'post',
      data: {
        action: 'ajax_pagination',
        query_vars: ajaxpagination.query_vars,
        post_id: ajaxpagination.post_id,
        offset: offset + 4
      },
      success: function( html ) {
        var grid = document.querySelector('.related-posts');
        var item = document.createElement('article');
        salvattore.appendElements(grid, [item]);
        item.outerHTML = html;
        offset = offset + 4; 

        if(jQuery('#show-more-hide').length > 0){
          jQuery('.show-more-btn').hide();
        }
      }
    });
  });

})(window);
