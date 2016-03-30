/**
 * @file
 * Custom scripts for theme.
 */
(function ($) {
  // Show dropdown on hover.
  Drupal.behaviors.ketsjup_dropdown = {
    attach: function (context, setting) {
      $('.dropdown-submenu').once('radix-dropdown', function () {
        // Show dropdown on hover.
        $(this).mouseenter(function () {
          $(this).addClass('open');
        });
        $(this).mouseleave(function () {
          $(this).removeClass('open');
        });
      });
    }
  };

  Drupal.behaviors.ketsjup = {
    attach: function (context, settings) {

      // Make sure search always shows up below header.
      $(window).resize(function () {
        positionSearch();
      });

      // Click handler for search icon on desktop.
      $('#desk-search-toggle').click(function (e) {
        e.preventDefault();
        positionSearch();
        $('.navbar-right.navbar-form', context).fadeToggle(200);
      });

      // Override the main menu toggle on mobile because it appears to be broken in Radix.
      $('a[data-toggle="collapse"]', context).click(function () {
        var target = $(this).data("target");
        $(target).slideToggle();
      });


      $('#main-menu .caret', context).click(function () {
        $(this).parent().toggleClass('open');
      });

      // Dropdowns for side menus.
      $('.menu-block-wrapper .ul.menu li.dropdown-submenu', context).mouseenter(function () {
        $(this).addClass('open');
      });
      $('.menu-block-wrapper ul.menu li.dropdown-submenu', context).mouseleave(function () {
        $(this).removeClass('open');
      });

      function positionSearch() {
        var position = $('#navigation').height() + 15;
        var search = $('.navbar-right.navbar-form');
        if ($(window).width() >= 992) {
          $(search).css({
            'position': 'absolute',
            'top': position,
            'right': 0
          });
        }
        else {
          $(search).removeAttr("style");
        }
      }
    }
  };
})(jQuery);
