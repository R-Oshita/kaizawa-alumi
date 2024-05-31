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
              <div class="row px-2 px-lg-0 postlist-card-list">
                <?php
                  $args = array(
                    'year' => $year,
                    'monthnum' => $monthnum,
                    'paged' => $paged,
                    'posts_per_page' => 6,
                    'post_type' => array('event'),
                  );
                  $wp_query = new WP_Query($args);
                  if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
                ?>
                <?php get_template_part('parts/parts-archivecard'); ?>
                <?php endwhile; else: ?>
                <p>記事がありません。</p>         
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            <?php else: ?>
              <div class="row px-2 px-lg-0 postlist-card-list">
                <?php
                  $args = array(
                    'paged' => $paged,
                    'posts_per_page' => 6,
                    'post_type' => array('event'),
                  );
                  $wp_query = new WP_Query($args);
                  if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
                ?>
                <?php get_template_part('parts/parts-archivecard'); ?>
                <?php endwhile; else: ?>
                <p>記事がありません。</p>         
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            <?php endif; ?>
            
            <?php get_template_part('parts/parts-pagination'); ?>
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar"> 
            <?php get_sidebar('event');?>
          </aside>
        </div>
      </div>
    </section>
<?php get_footer(); ?>