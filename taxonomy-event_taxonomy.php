<?php get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">
            <?php
              $current_cat = get_queried_object();
              $cat_name = $current_cat->name;
              echo '<h2 class="ttl-pattern_4">カテゴリ：'.$cat_name.'</h2>';
            ?>
            <div class="row px-2 px-lg-0 postlist-card-list">
              <?php
                $this_obj = get_queried_object();
                $term_slug = $this_obj->slug;
                $args = array(
                  'paged' => $paged,
                  'post_type' => array('event'),
                  'tax_query' => array(
                      array(
                        'taxonomy' => 'event_taxonomy',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                      ),
                    ),
                  'posts_per_page' => 6,
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
            <?php get_template_part('parts/parts-pagination'); ?>
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar"> 
            <?php get_sidebar('event');?>
          </aside>
        </div>
      </div>
    </section>
<?php get_footer(); ?>