<?php get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">
            <?php
              $current_cat = get_queried_object();
              $cat_name = $current_cat->name;
              $cat_slug = $current_cat->category_nicename;
              echo '<h2 class="ttl-pattern_4">カテゴリ：'.$cat_name.'</h2>';
            ?>
            <ul class="postlist-line">
              <?php
                $args = array(
                  'paged' => $paged,
                  'post_type' => array('post'),
                  'category_name' => $cat_slug, 
                  'posts_per_page' => 4,
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
            <?php get_template_part('parts/parts-pagination'); ?>
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar"> 
            <?php get_sidebar();?>
          </aside>
        </div>
      </div>
    </section>
<?php get_footer(); ?>