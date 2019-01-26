<?php
/*
*** Human Aquarium 1.0 ***
*   Loop for page
*/
?> 
 
<main id="maincontent" role="main">

<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>

  <article class="page" id="post-<?php the_ID(); ?>">
    <header>
      <h1 class="entry-title">
        <?php the_title(); ?>
      </h1>
    </header>
    <div class="entry">
      <?php the_content() ?>
    </div><!--.entry-->
  </article><!-- finish enclosing post-->  
<?php endwhile; ?>

<?php else : ?>
<!-- Stuff to do if there are no pages-->
<h2 class="entry-title">Not found</h2>
<p>Sorry, no pages matched your criteria. Perhaps searching will help</p>
<?php get_search_form(); ?>
   
<?php endif; ?>

</main>

<aside id="blog">
      <div>
        <?php $the_query = new WP_Query( 'posts_per_page=2' ); ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          
        <article <?php post_class('two-columns') ?> id="post-<?php the_ID(); ?>">
          <header>
            <h3 class="entry-title">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
              <?php the_title(); ?>
              </a>
            </h3>
            <time class="date"><?php the_time('F jS, Y') ?></time>
          </header>
          <div class="entry">
            <?php if ( has_post_thumbnail() ) :?>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('medium'); ?>
              </a>
            <?php endif; ?>
            <?php the_excerpt() ?>
          </div><!--.entry-->
          <footer>
            <p class="postmetadata">
              <?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?><br>
              <?php the_tags('Tags: ', ', ', '<br />'); ?>
            </p><!-- .metadata-->
          </footer>
        </article><!-- finish enclosing post-->  
      

        <?php endwhile; ?>    
        <?php else : ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </aside>