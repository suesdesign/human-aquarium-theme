<?php
/*
*** Human Aquarium 1.0 ***
*   Search form
*/
?>

<?php $template_directory = get_template_directory() . '/assets/img/search-icon.svg'; ?>


<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( '', 'label' ) ?></span>
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<button type="submit" class="search-submit icon"><?php echo file_get_contents("$template_directory"); ?><span class="screen-reader"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span></button>
</form>



