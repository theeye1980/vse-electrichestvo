<form method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<input type="text" placeholder="Поиск по сайту" value="<?php echo get_search_query() ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="найти" />
</form>