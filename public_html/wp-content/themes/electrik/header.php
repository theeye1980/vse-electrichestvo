<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta name="google-site-verification" content="RGYSsxPQkXQ-QxrhNi65fPLyfBvUHb1FPYfbqGAwa7U" />
<meta name='yandex-verification' content='4d0b91eb15c3490c' />
<?php if(is_single()) { ?>
<?php } ?>


    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( "", true); ?></title>
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" type="image/x-icon" />
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
        <script>
            jQuery(document).ready(function($) {
                var $menu = $("#menu-container");
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 150 && $menu.hasClass("navbar-static-top")) {
                        $menu.removeClass("navbar-static-top").addClass("navbar-fixed-top");
                    } else if ($(this).scrollTop() <= 150 && $menu.hasClass("navbar-fixed-top")) {
                        $menu.removeClass("navbar-fixed-top").addClass("navbar-static-top");
                    }
                });
            });
			
			jQuery(document).ready(function($){
				var $menu = $("#promo");
				height = jQuery('.main-content').height()/3;
					$(window).scroll(function(){
						if ( $(this).scrollTop() > height && $menu.hasClass("mobile-static") ) {
							$menu.removeClass("mobile-static").addClass("mobile-fixed");
						} else if($(this).scrollTop() <= height && $menu.hasClass("mobile-fixed")) {
								$menu.removeClass("mobile-fixed").addClass("mobile-static");
						}
			});//scroll
		});
			
            jQuery(document).ready(function($) {

                $(function() {
                    $(window).scroll(function() {
                        if ($(this).scrollTop() > 160) {
                            //$('#back-top').fadeIn();                
                            if ($('#back-top').position().top == '-300') {
                                $('#back-top').animate({
                                    opacity: 1,
                                    top: "300px"
                                }, 800);
                            }
                        } else {
                            if ($('#back-top').position().top == '300') {
                                $('#back-top').animate({
                                    opacity: 0,
                                    top: "-300px"
                                }, 800);
                            }
                        }
                    });

                    // scroll body to 0px on click
                    $('#back-top a').click(function() {
                        $('body,html').animate({
                            scrollTop: 0
                        }, 800);
                        return false;
                    });
                });
            });
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(this).on('click', 'a[href^=#]', function() {
                    $('html, body').animate({
                        scrollTop: $('span[id="' + this.hash.slice(1) + '"]').offset().top - 125
                    }, 1000);
                    return false;
                });
            });
        </script>
</head>

<body>

   <div class="main-bg">
    	<header id="header" class="header">
			<div id="main-slider" class="liquid-slider">
				<div style="background-image: url(<?php bloginfo('template_directory'); ?>/img/3.jpg); background-position: top center;"></div>
			</div>
       
			<div class="container main-header">
				<div class="row logo">
					<div class="col-sm-24 col-md-9 logotip">
						<a href="<?php bloginfo('url'); ?>">
							<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt='Все электричество'>
						</a>
					</div>
					
					<div class="col-sm-24 col-md-15 search-soc">
						<div class="row">
							<div class="col-xs-19 service-menu">
								<?php wp_nav_menu( array( 'menu'=> 'Сервисы') ); ?>
							</div>
							<div class="col-xs-5">
								<div class="fb"><a href="#"></a></div>
								<div class="tw"><a href="#"></a></div>
								<div class="gp"><a href="#"></a></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-24 search-row">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>

				</div>
			</div>
            <div id="menu-container" class="menu-container navbar-static-top">
                <div class="container">
            		<div class="row">

                        <div class="col-sm-24 col-md-24 menu">
                    		<nav id="navik" class="navbar navbar-default visible-md visible-lg">
                       			<?php wp_nav_menu( array( 'menu'=> 'primary', 'theme_location' => 'primary', 'depth' => 2, 'container' => 'div', 'menu_class' => 'nav navbar-nav') ); ?>


                    		</nav>
                		</div>
            		</div>
        		</div>
			</div>

    	</header>
	   
	   
	   
	   		<div id="promo" class="mobile-ad mobile-static">
		    <span class="close_it" onclick="document.getElementById('promo').style.display='none'"></span>
			<!--noindex-->

	   <!-- Yandex.RTB R-A-281869-2 -->
<div id="yandex_rtb_R-A-281869-2"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-281869-2",
                renderTo: "yandex_rtb_R-A-281869-2",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
	   

<!--/noindex-->





		</div>
	   
	   

	   
    <!-- .header-->
    <div class="bg-cont">
    <div class="container main-content">
        <div class="row">
            <p id="back-top"><a href="#top"><span></span></a></p>