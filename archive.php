<?php get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">
            <?php
              if(is_month()) {
                //月別アーカイブページで表示するタイトル
                echo '<h2 class="ttl-pattern_4">';
                echo the_time("Y年m月");
                echo '</h2>';
              } else {
              }
            ?>
            <?php if (is_month()) : ?>
              <ul class="postlist-line">
                <?php
                  $args = array(
                    'year' => $year,
                    'monthnum' => $monthnum,
                    'paged' => $paged,
                    'post_type' => array('post'),
                    'posts_per_page' => 5,
                  );
                  $wp_query = new WP_Query($args);
                  if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
                ?>
                  <?php get_template_part('parts/parts-archiveline'); ?>
                <?php endwhile; else: ?>
                  <p>記事がありません。</p>         
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </ul><!-- //row -->
            <?php else: ?>
              <ul class="postlist-line">
                <?php
                  $args = array(
                    'paged' => $paged,
                    'post_type' => array('post'),
                    'posts_per_page' => 5,
                  );
                  $wp_query = new WP_Query($args);
                  if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
                ?>
                  <?php get_template_part('parts/parts-archiveline'); ?>
                <?php endwhile; else: ?>
                  <p>記事がありません。</p>         
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </ul><!-- //row -->
            <?php endif; ?>
            
            <?php get_template_part('parts/parts-pagination'); ?>
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar"> 
            <?php get_sidebar();?>
          </aside>
        </div>
      </div>
    </section>
<?php get_footer(); ?>