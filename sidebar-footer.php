<?php
/*
*** Suesdesign Starter Theme ***
*   The sidebar containing the footer widget areas.
*/
?>


<div id="footerwidgets" role="complementary">
<?php if ( is_active_sidebar( 'footer' ) ) : ?>
	<div class="footer-widget">
		<?php dynamic_sidebar( 'footer' ); ?>
	</div><!-- .first -->
<?php endif; ?>
</div><!--#footerwidgets -->