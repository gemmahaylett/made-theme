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

  var support = { animations : Modernizr.cssanimations },
    animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
    animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
    onEndAnimation = function( el, callback ) {
      var onEndCallbackFn = function( ev ) {
        if( support.animations ) {
          if( ev.target != this ) return;
          this.removeEventListener( animEndEventName, onEndCallbackFn );
        }
        if( callback && typeof callback === 'function' ) { callback.call(); }
      };
      if( support.animations ) {
        el.addEventListener( animEndEventName, onEndCallbackFn );
      }
      else {
        onEndCallbackFn();
      }
    };

  // from http://www.sberry.me/articles/javascript-event-throttling-debouncing
  function throttle(fn, delay) {
    var allowSample = true;

    return function(e) {
      if (allowSample) {
        allowSample = false;
        setTimeout(function() { allowSample = true; }, delay);
        fn(e);
      }
    };
  }

  // sliders - flickity
  var sliders = [].slice.call(document.querySelectorAll('.slider')),
    // array where the flickity instances are going to be stored
    flkties = [],
    // grid element
    grid = document.querySelector('.grid'),
    // isotope instance
    iso,
    // filter ctrls
    filterCtrls = [].slice.call(document.querySelectorAll('.filter > button'));

  function init() {
    // preload images
    if(grid){
      imagesLoaded(grid, function() {
        initFlickity();
        initIsotope();
        initEvents();
        classie.remove(grid, 'grid--loading');
      });
    }
  }

  function initFlickity() {
    sliders.forEach(function(slider){
      var flkty = new Flickity(slider, {
        prevNextButtons: false,
        wrapAround: true,
        cellAlign: 'left',
        contain: true,
        resize: false
      });

      // store flickity instances
      flkties.push(flkty);
    });
  }

  function initIsotope() {
    iso = new Isotope( grid, {
      itemSelector: '.grid__item',
      percentPosition: true,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: '.grid__sizer'
      },
      transitionDuration: '0.6s'
    });
  }

  function initEvents() {
    filterCtrls.forEach(function(filterCtrl) {
      filterCtrl.addEventListener('click', function() {
        classie.remove(filterCtrl.parentNode.querySelector('.filter__item--selected'), 'filter__item--selected');
        classie.add(filterCtrl, 'filter__item--selected');
        iso.arrange({
          filter: filterCtrl.getAttribute('data-filter')
        });
        recalcFlickities();
        iso.layout();
      });
    });

    // window resize / recalculate sizes for both flickity and isotope/masonry layouts
    window.addEventListener('resize', throttle(function(ev) {
      recalcFlickities()
      iso.layout();
    }, 50));

    // add to cart
    [].slice.call(grid.querySelectorAll('.grid__item')).forEach(function(item) {
      //item.querySelector('.action--buy').addEventListener('click', addToCart);
    });
  }

  function addToCart() {
    classie.add(cart, 'cart--animate');
    setTimeout(function() {cartItems.innerHTML = Number(cartItems.innerHTML) + 1;}, 200);
    onEndAnimation(cartItems, function() {
      classie.remove(cart, 'cart--animate');
    });
  }

  function recalcFlickities() {
    for(var i = 0, len = flkties.length; i < len; ++i) {
      flkties[i].resize();
    }
  }

  init(); 

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

        if(jQuery('#show-more-hide')){
          jQuery('.show-more-btn').hide();
        }  
      }
    });
  });

})(window);
