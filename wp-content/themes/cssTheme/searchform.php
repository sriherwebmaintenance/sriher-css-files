<form method="get" class="searchform" action="<?php bloginfo('url'); ?>/">
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" class="stext" placeholder="Type and Press Enter to Search" />
		<input type="submit" class="searchsubmit" value="Search"/>
		<span class="search_close ion" style="display: none;">&#xf129;</span>
	</div>
</form>
