
<?php get_header(); ?>
      <section>
        <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
        <?php endif; ?>
        </div>
      </section>
<?php get_footer(); ?>