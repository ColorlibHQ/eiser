/**
 * Eiser front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Simple Lightbox, AjaxChimp and the
 * parallax background that build the same markup, so the theme's
 * stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  // An element's content height, as jQuery's .height() measured it.
  function contentHeight(el) {
    var style = window.getComputedStyle(el);
    return el.getBoundingClientRect().height -
      parseFloat(style.paddingTop) - parseFloat(style.paddingBottom) -
      parseFloat(style.borderTopWidth) - parseFloat(style.borderBottomWidth);
  }

  // The element's direct children that match selector.
  function childrenMatching(el, selector) {
    return Array.prototype.filter.call(el.children, function (child) {
      return child.matches(selector);
    });
  }

  /*-------------------------------------------------------------------------------
    Navbar
  -------------------------------------------------------------------------------*/

  //* Navbar Fixed
  UI.ready(function () {
    var header = document.querySelector('header');
    var areas = UI.toElements('.header_area');
    if (!header || !areas.length) return;
    var navOffsetTop = contentHeight(header) + 50;
    window.addEventListener('scroll', function () {
      var fixed = window.pageYOffset >= navOffsetTop;
      areas.forEach(function (area) { area.classList.toggle('navbar_fixed', fixed); });
    }, { passive: true });
  });

  /*----------------------------------------------------*/
  /*  Parallax Effect js
  /*----------------------------------------------------*/
  // The jquery.parallax plugin appended to the theme's stellar.js: the banner
  // overlay moves at a third of the scroll distance.
  UI.parallax('.bg-parallax');

  // Sidebar lists: the link of an item with a sub-list opens that sub-list
  // and closes the others.
  UI.ready(function () {
    var dropToggle = [];
    UI.toElements('.widgets_inner .list li').forEach(function (li) {
      if (!li.querySelector('ul')) return;
      childrenMatching(li, 'a').forEach(function (a) {
        if (dropToggle.indexOf(a) < 0) dropToggle.push(a);
      });
    });

    dropToggle.forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropToggle.forEach(function (other) {
          var li = other !== link && other.closest('li');
          if (li) UI.slide(li.querySelectorAll('ul'), 'up', 200);
        });
        var own = link.closest('li');
        if (own) UI.slide(childrenMatching(own, 'ul'), 'toggle', 200);
      });
    });
  });

  /*----------------------------------------------------*/
  /*  MailChimp Slider
  /*----------------------------------------------------*/
  UI.ajaxChimp('#mc_embed_signup form');

  // Styled selects, except the ones WooCommerce drives itself: the review
  // rating, the country/state pickers (selectWoo, or rebuilt on a country
  // change) and a product's variation selects, whose options it rebuilds.
  UI.ready(function () {
    UI.enhanceSelects(UI.toElements(
      'select:not(#rating):not(#billing_country):not(#billing_state)' +
      ':not(#shipping_country):not(#shipping_state)' +
      ':not(#calc_shipping_country):not(#calc_shipping_state)' +
      ':not(.country_select):not(.state_select)'
    ).filter(function (select) {
      return !select.closest('.variations');
    }));
  });

  /*----------------------------------------------------*/
  /*  Simple LightBox js
  /*----------------------------------------------------*/
  UI.simpleLightbox('.imageGallery1 .light');

  UI.counter('.counter', { time: 1000 });

  /*----------------------------------------------------*/
  /*  Members Slider
  /*----------------------------------------------------*/
  UI.owl('.feature_p_slider', {
    loop: true,
    margin: 30,
    items: 4,
    nav: false,
    autoplay: false,
    smartSpeed: 1500,
    dots: true,
    responsiveClass: true,
    responsive: {
      0: { items: 1 },
      360: { items: 2 },
      576: { items: 3 },
      768: { items: 4 }
    }
  });

  /*----------------------------------------------------*/
  /*  Clients Slider
  /*----------------------------------------------------*/
  UI.owl('.clients_slider', {
    loop: true,
    margin: 30,
    items: 5,
    nav: false,
    autoplay: false,
    smartSpeed: 1500,
    dots: false,
    responsiveClass: true,
    responsive: {
      0: { items: 1 },
      400: { items: 2 },
      575: { items: 3 },
      768: { items: 4 },
      992: { items: 5 }
    }
  });

  // The old script also set up a jQuery UI range slider on #slider-range
  // (with its value in #amount), but no template outputs those elements and
  // jQuery UI's slider was never loaded, so it is gone.

  // Search Bar
  UI.ready(function () {
    UI.toElements('.search_icon').forEach(function (icon) {
      // The icon is an <a href="#">; without this the page also jumps to the top.
      icon.addEventListener('click', function (e) {
        e.preventDefault();
        UI.toElements('.header_search').forEach(function (search) {
          search.classList.toggle('show_search');
        });
      });
    });
  });
}());
