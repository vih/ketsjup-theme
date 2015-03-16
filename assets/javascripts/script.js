/**
 * @file
 * Custom scripts for theme.
 */
(function ($) {
    Drupal.behaviors.ketsjup = {
        attach: function(context, settings) {

            $(window).resize(function() {
               positionSearch();
            });

            $('#desk-search-toggle').click(function(e) {
                e.preventDefault();
                positionSearch();
               $('.navbar-right.navbar-form').fadeToggle(200);
            });

            $('a[data-toggle="collapse"]').click(function() {
                var target = $(this).data("target");
                $(target).slideToggle();
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
