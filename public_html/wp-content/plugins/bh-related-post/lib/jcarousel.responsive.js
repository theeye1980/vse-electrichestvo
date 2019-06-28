(function($) {
    $(function() {
        var jcarousel = $('.jcarousel');

$('.jcarousel')
    .on('jcarousel:create jcarousel:reload', function() {
        var element = $(this),
            width = element.innerWidth();

        if (width > 600) {
            width = width / 4;
        }
		else if (width > 500) {
			width = width / 3;
		}
		else if (width > 300) {
            width = width / 2;
        }

        element.jcarousel('items').css('width', width + 'px');
    })
            .jcarousel({
                wrap: 'circular'
            });
			  
			      $('.jcarousel-auto')


        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });
			
$('.jcarousel').jcarouselAutoscroll({
    autostart: false
});
			
        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
})(jQuery);
