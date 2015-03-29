/**
 * @file
 * Custom scripts for theme.
 */
(function ($) {
    Drupal.behaviors.ketsjup = {
        attach: function(context, settings) {

            // Make sure search always shows up below header.
            $(window).resize(function() {
               positionSearch();
            });

            // Click handler for search icon on desktop.
            $('#desk-search-toggle').click(function(e) {
                e.preventDefault();
                positionSearch();
               $('.navbar-right.navbar-form').fadeToggle(200);
            });

            // Override the main menu toggle on mobile because it appears to be broken in Radix.
            $('a[data-toggle="collapse"]').click(function() {
                var target = $(this).data("target");
                $(target).slideToggle();
            });


            $('#main-menu .caret').click(function() {
                $(this).parent().toggleClass('open');
            });

            function positionSearch() {
                var position = $('#navigation').height() + 15;
                var search = $('.navbar-right.navbar-form');
                if ($(window).width() >= 992) {
                    $(search).css({
                        'position' : 'absolute',
                        'top': position,
                        'right': 0
                    });
                } else {
                    $(search).removeAttr("style");
                }
            }
        }
    }
})(jQuery);
