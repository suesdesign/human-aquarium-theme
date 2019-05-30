<?php
/*
*** Human Aquarium 1.0 ***
*   sidebar
*/
?>

<?php
	if ( is_active_sidebar( 'blog-post-footer' ) ) : ?>
	<div id="secondary" class="blog-post-footer" role="complementary">
		<?php dynamic_sidebar( 'blog-post-footer' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>
