</div>
</div>
<!-- .container-->
</div>
<footer class="footer">
    <div class="container">
        <div class="site-fotter row">
            <div class="col-sm-24 col-md-24 footer-info">
                <div class="row">
                    <div class="col-sm-24 site-info">
                        <ul>
                            <li><a href="/karta-sajta">Карта сайта</a></li>
                            <!--noindex-->
                            <li><a href="/obratnaya-svyaz" rel="nofollow">Обратная связь</a></li>
                            <li><a href="/reklamodatelyam" rel="nofollow">Реклама на сайте</a></li>
                            <li><a href="/informaciya-o-sajte" rel="nofollow">О сайте</a></li>
                            <li><a href="/literatura" rel="nofollow">Литература</a></li>
                            <li><a href="/terminy" rel="nofollow">Термины электрика</a></li>
                            <li class="counter">
<script type="text/javascript">// <![CDATA[
document.write("<a href='//www.liveinternet.ru/click' "+ "target=_blank><img src='//counter.yadro.ru/hit?t54.6;r"+ escape(document.referrer)+((typeof(screen)=="undefined")?"": ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth? screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+ ";"+Math.random()+ "' alt='' title='LiveInternet: показано число просмотров и"+ " посетителей за 24 часа' "+ "border='0' width='88' height='31'><\/a>")
// ]]></script>
                            </li>
                            <!--/noindex-->
                        </ul>
                    </div>
                </div>
                <div class="row">
                   <center> <div class="col-sm-24 site-info">
                        <!--noindex-->
                        	<p> 
Наш сайт Все-электричество предоставляет вашему вниманию подробную информацию об электрике. Публикация наших материалов может разрешаться только в том случае если вы укажите ссылку на источник с указанием нашего проекта. Перед использованием нашего проекта рекомендуем прочесть  <a href="/soglashenie-ob-ispolzovanii-sajta" rel="nofollow">пользовательское соглашение</a>. Вся информация на сайте Все-электричество предоставлена в ознакомительных и познавательных целях. За применение этой информации администрация сайта ответственности не несет.</p>
<div>Сайт vse-elektrikchestvo © <?php echo date(Y); ?></div>

                        <!--/noindex-->
                    </div></center>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- .footer -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.touchSwipe.min.js"></script>
<?php if (is_single()) { ?>
	<script src="<?php bloginfo('template_directory'); ?>/js/loadmore.js"></script> 
<?php } ?>
<script>
  jQuery(document).ready(function($) {
    jQuery('#closeButton').on('click', function(e) { 
        jQuery('.callback').remove(); 
    });
});
</script>
<?php wp_footer(); ?>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter32241049 = new Ya.Metrika({id:32241049,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/32241049" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>